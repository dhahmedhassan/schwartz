@extends('layouts.app')

@section('content')
    <h1>Questionnaire Create</h1>

    <form action="/questionnaires" method="post">
        {{ csrf_field() }}
        <div class="card">
            @foreach ($questions as $question)
                        <div class="form-group">
                                <label for="answer{{ $question->id }}">
                                    <strong>              
                                            {{ $question->rog_num }} &nbsp;)&nbsp;
                                            @if ($question->subpart !== '')
                                                &nbsp;({{ $question->subpart }})&nbsp;
                                            @endif 
                                        </strong> 
                                        {{ $question->body }}
                                </label>

                                <textarea class="form-control" name="answer[{{ $question->id }}]" id="answer{{ $question->id }}" rows="3"></textarea>
                        </div>
                        <hr>

                @endforeach
        </div>
   
        <button type="submit" id="submit" class="btn btn-primary ml-auto">submit</button>
    </form>
    
@endsection