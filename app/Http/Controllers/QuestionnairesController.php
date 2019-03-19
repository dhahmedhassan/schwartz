<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use Illuminate\Http\Request;

use App\Question;
use App\QuestionnaireDetail;

class QuestionnairesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questionnaires = Questionnaire::with('questionnaire_details')->get();
        $questions = Question::all();
        // return $questions;
        // return $questionnaires;s
        // dd($questionnaires);
        // return redirect()->route('questionnaires.index', compact('questionnaires'));
        return view('questionnaires.index', compact([
            'questionnaires',
            'questions'
            ]));
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
        Questionnaire::create([
            'user_id' => auth()->user()->id
        ]);

        $lastQuestionnaire = Questionnaire::all()->last()->id;

        foreach ($requests['answer'] as $key => $value) {
            // echo $key . "<br>";

            QuestionnaireDetail::create([
                'questionnaire_id' => $lastQuestionnaire,
                'question_id' => $key,
                'body' => $value,                
            ]);
            // print_r($key)  ;
            // echo print_r($value) . "<br>";
        }

        // $request->session()->flash('success', 'New Questionnaire Has been created!');
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
