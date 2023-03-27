@extends('layout')
@section('title')
    {{ Auth::user()->username }}
@endsection
@section('email')
    <a class="nav-link disabled" href="#">{{ Auth::user()->email }}</a>
@endsection
@section('content')
    @include('inc/errors')
    @if (session()->has('succes-submit'))
        <div class="alert alert-success">
            <ul>
                <li>{{ session()->get('succes-submit') }}</li>
            </ul>
        </div>
    @endif
    @if (session()->has('account'))
        <div class="alert alert-success">
            <ul>
                <li>{{ session()->get('account') }}</li>
            </ul>
        </div>
    @endif
    <div class="card">
        <img src="https://cdn-icons-png.flaticon.com/512/219/219983.png" class="card-img-top" alt="..." height="200px">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <p class="card-text">Followers : 99</p>
            <p class="card-text">Answers : 0</p>
            <p class="card-text">Following : 99</p>
        </div>
    </div>
    <div class="card">
        <h1> Your Questions : </h1>
        <a class="btn btn-secondary" href="{{ route('questions.all') }}">Show Questions</a>
        <div class="container">
            <div class="card">
                @foreach (Auth::user()->questions as $question)
                    <ul>
                        <li>Question : {{ $question->content }}</li>
                    </ul>
                    @if (!$question->answer)
                    <ul>
                        <li>{{"Answer this question: "}}</li>
                        <a class="btn btn-secondary" href="{{ route('question.show',$question->id) }}">Answer</a>
                    </ul>
                        
                    @else
                        <ul>
                            <li>Answer : {{ $question->answer }}</li>
                        </ul>
                    @endif
                @endforeach
            </div>

        </div>
    @endsection
