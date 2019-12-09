<?php

namespace App\Http\Controllers;

use App\Entities\Answer;
use App\Entities\Outcome;
use App\Entities\Question;
use App\Entities\QuestionType;
use App\Entities\Quiz;
use App\Repositories\QuestionRepository as repo;
use App\Repositories\AnswerRepository as AnsweRepo;
use Doctrine\ORM\EntityManager;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuestionController extends Controller
{
    private $repo;
    private $em;
    private $aRepo;

    public function __construct(repo $repo, EntityManager $em, AnsweRepo $aRepo) {
        $this->repo = $repo;
        $this->em = $em;
        $this->aRepo = $aRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new Response(json_encode($this->repo->getAll()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function store(Request $request)
    {
        $content = $request->input('data');

        $newQuestion = new Question();

        $quiz = $this->em->getRepository(Quiz::class)->find($request->input('id'));
        $type = $this->em->getRepository(QuestionType::class)->find($content['type']);

        $newQuestion->setQuiz($quiz);
        $newQuestion->setQuestionType($type);
        $newQuestion->setValue($content['question']);
        $this->repo->create($newQuestion);

        foreach ($content['answers'] as $a)
        {
            $newAnswer = new Answer();
            $outcome = $this->em->getRepository(Outcome::class)->find($a['outcome']);

            $newAnswer->setQuestion($newQuestion);
            $newAnswer->setOutcome($outcome);
            $newAnswer->setValue($a['answer']);
            $this->aRepo->create($newAnswer);
        }

        return  $array = [['value' => $request->input('data'), 'id' => $request->input('id')]];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new Response(json_encode($this->repo->findById($id)));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return ['response' => $this->repo->delete($this->repo->findById($id))];
    }
}
