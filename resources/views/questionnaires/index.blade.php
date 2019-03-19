@extends('layouts.app')

@section('content')
    <h1>Questionnaire Index</h1>
    
    @foreach ($questionnaires as $questionnaire)
        <center>
            <h3>
                Questionnaire Id: {{ $questionnaire->id }}
             </h3>
        </center>
       
       @foreach ($questionnaire->questionnaire_details as $details)
       
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        Question &nbsp;  
                        @foreach ($questions as $question)
                            @if ($details->question_id == $question->id )
                            <b>{{ $question->rog_num }} &nbsp;</b>
                            @if (!$question->subpart == '')
                                <b>{{ $question->subpart }}) &nbsp;</b>
                            @endif
                                {{ $question->body }}
                            @endif    
                            
                        @endforeach
                    </h4>
                    <p class="card-text">
                        Answer Body &nbsp; : {{ $details->body }}
                    </p>
                    <p class="card-text">
                        Answer Created at &nbsp; : {{ $details->created_at }}
                    </p>
                </div>
            </div>

       @endforeach
       <hr>
    @endforeach
@endsection