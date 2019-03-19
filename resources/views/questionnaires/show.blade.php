@extends('layouts.app')

@section('content')
    <h1>Place to Show Each Questionnaire by Id</h1>


    @if ($questionnaire)
        @foreach ($questionnaire as $item)
        Questionnaire Id {{ $item->questionnaire_id }}
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">
                        <b>Question rog Num &nbsp;
                        @if ($questions)
                            @foreach ($questions as $question)
                                @if ($question->id == $item->question_id)
                                    {{ $question->rog_num }} &nbsp; 

                                    @if (!$question->subpart == '')
                                        <b>{{ $question->subpart }}) &nbsp;</b>
                                    @endif
                                </b>
                                {{ $question->body }}
                                @endif
                                
                            @endforeach
                        @endif
                    </h4>
                    <p class="card-text">
                        <b>Answer Body :</b> {{ $item->body }}
                    </p>
                    <p class="card-text">
                        <b>Created at  :</b>{{ $item->created_at }}
                    </p>
                </div>
            </div>

        @endforeach
    @endif
@endsection