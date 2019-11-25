<?php

namespace App\Http\Controllers;

use App\Entities\Question;
use App\Entities\Quiz;
use App\Repositories\QuestionRepository as repo;
use Doctrine\ORM\EntityManager;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuestionController extends Controller
{
    private $repo;
    private $em;

    public function __construct(repo $repo, EntityManager $em) {
        $this->repo = $repo;
        $this->em = $em;
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $content = $request->input('data');
        $id = $request->input('id');

        $newQuestion = new Question();

        $quiz = $this->em->getRepository(Quiz::class)->find($id);

        // TODO: create Question

        $newQuestion->setQuiz($quiz);
        $newQuestion->setQuestionType();
        $newQuestion->setValue();

        $this->repo->create($newQuestion);

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
        //
    }
}
