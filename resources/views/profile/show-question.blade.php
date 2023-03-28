@extends('layout')
@section('title')
    {{ Auth::user()->username }}
@endsection
@section('email')
    <a class="nav-link disabled" href="#">{{ Auth::user()->email }}</a>
@endsection
@section('content')
    @if (!$question->is_answered == 1)
        <div class="card">
            <div class="card">
                <h1> Question : </h1>
                <ul>
                    <li>{{ $question->content }}</li>
                </ul>
                <form action="{{ route('answer.store', $question->id) }}" method="POST">
                    @csrf
                    <div class="form-floating">
                        <textarea class="form-control" name="answer" placeholder="Leave a comment here" id="floatingTextarea2"
                            style="height: 100px"></textarea>
                        <label for="floatingTextarea2">Answer the Question </label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        @else
            <div class="text-center alert alert-danger " role="alert">
                {{ 'You have answered this question before' }}
            </div>
            <a class="btn btn-secondary" href="{{ route('profile.index') }}">Back</a>
    @endif
@endsection
