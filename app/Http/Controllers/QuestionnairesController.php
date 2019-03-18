<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use Illuminate\Http\Request;

use App\Question;

class QuestionnairesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $request = request();

        unset($request['_token']);

        $questions = Question::whereIn('id', $request->id)->get();

        // return view('questionnaires.create', compact($request));
        return view('questionnaires.create')->with([
            'request' =>$request,
            'questions' => $questions
           ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requests = request()->all();
        unset($requests['_token']);

        // print_r($request);
        foreach ($requests['answer'] as $key => $value) {
            // echo $key . "<br>";

            Questionnaire::create([
                'question_id' => $key,
                'body' => $value,
                'user_id' => auth()->user()->id
            ]);
            // print_r($key)  ;
            // echo print_r($value) . "<br>";
        }

        return redirect()->home();
        // dd($request);
        // return $requests;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function show(Questionnaire $questionnaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function edit(Questionnaire $questionnaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Questionnaire $questionnaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Questionnaire  $questionnaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Questionnaire $questionnaire)
    {
        //
    }
}
