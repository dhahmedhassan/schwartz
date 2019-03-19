@extends('layouts.app')

@section('content')
    <h1>Questionnaire Index</h1>
    
    @foreach ($questionnaires as $questionnaire)
        <center>
            <h3>
                <a href="/questionnaires/{{ $questionnaire->id }}">
                    Questionnaire Id: {{ $questionnaire->id }}
                </a>
             </h3>
        </center>
       
    @endforeach
@endsection