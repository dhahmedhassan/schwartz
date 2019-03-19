@extends('layouts.app')

@section('content')
    <h1>Form {{ $form[0]->id }}</h1>
    <form action="/questionnaires/create" method="get">
        @if ($form)
            @foreach ($form[0]->questions as $item)

                    <div class="card">
                        <div class="form-check form-check-inline">
                            <label class="form-check-label" id="{{ $item->id }}">
                                <input class="form-check-input" type="checkbox" name="id[{{ $item->id }}]" id="{{ $item->id }}" value="{{ $item->id }}"> 
                                <b>
                                        {{ $item->rog_num }} &nbsp;
                                        @if ($item->subpart !== '')
                                            ({{ $item->subpart }}) &nbsp;
                                        @endif
                                    </b>
                                {{ $item->body }}
                            </label>
                        </div>

                    </div>

                @endforeach
            @endif
        <button type="submit" id="submit" class="btn btn-primary ml-auto">submit</button>
    </form>
@endsection