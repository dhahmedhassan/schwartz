@extends('layouts.app')

@section('content')
    <h1>Questionnaire Create</h1>

    <form action="/questionnaires" method="post">
        {{ csrf_field() }}
        <div class="card">
            @foreach ($questions as $question)
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" name="id[{{ $question->id }}]" value="{{ $question->id }}" id="{{ $question->id }}">
                            <strong>              
                                {{ $question->rog_num }} &nbsp;)&nbsp;
                                @if ($question->subpart !== '')
                                    &nbsp;({{ $question->subpart }})&nbsp;
                                @endif 
                            </strong> 
                            {{ $question->body }}
                    </label>
                </div>

                @endforeach
        </div>
   
        <button type="submit" id="submit" class="btn btn-primary ml-auto">submit</button>
    </form>
    
@endsection