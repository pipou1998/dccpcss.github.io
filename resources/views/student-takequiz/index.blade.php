@extends('layouts.master')

@section('content')

    @include('inc.messages') <!-- Show messages here -->

    <div class="card p-4" style="margin-top: 20px;" >

        @if(count($buttons) > 0)
        
        <form action="{{ route('take.quiz.board') }}" method="POST">
            @csrf

            @foreach($buttons as $sr)

                <input type="hidden" name="under" value="{{ $sr->under}}">
                <input type="hidden" name="type" value="{{ $sr->type}}">
                <button name="quizno" value="{{ $sr->quiz_no}}" class="btn btn-success p-4">
                {{ $sr->quiz_no}} ({{ $sr->about}})
                </button>

            @endforeach

        </form>

        @else
            <p class="text-muted">No Quiz Available</p>
        @endif

    </div>

@endsection
