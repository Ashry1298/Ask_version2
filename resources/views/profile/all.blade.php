@extends("layout")
@section('title')
{{Auth::user()->username}}
@endsection
@section("email")
<a class="nav-link disabled" href="#">{{Auth::user()->email}}</a>
@endsection
@section('content')
<div class="card">
    <h1> Your Questions :  </h1>    
    @foreach (Auth::user()->questions as $question)
    <ul>
        <li>{{ $question->content }}</li>
        <a class="btn btn-secondary" href="{{route('questions.show',$question->id)}}">Answer</a>
    </ul>
    @endforeach
</div>
@endsection


