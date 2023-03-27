@extends('layout')
@section('title')
    {{$user_data->name}}
@endsection
@section('content')
    <div class="card">
        <img src="https://cdn-icons-png.flaticon.com/512/219/219983.png" class="card-img-top" alt="..." height="200px">
        <div class="card-body">
            <h5 class="card-title"></h5>
            <p class="card-text">Followers : 99</p>
            <p class="card-text">Answers : 0</p>
            <p class="card-text">Following : 99</p>
        </div>
    </div>
    @auth
    @if($user_data->id !=Auth::user()->id)
    <form action="{{route('profile.AskQuestion',$user_data->id)}}" method="POST">
        @csrf
        <div class="form-floating">
            <textarea class="form-control" name="content" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Question ? </label>
        </div>
        <div class="mb-3 form-check">
          <input type="checkbox" name="anon" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Anonymous</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endif
    @endauth
    <div class="card">
        @foreach ($user_data->questions as $question)
          @if ($question->answer)
            <ul>
                <li>Question : {{ $question->content }}</li>
            </ul>
            <ul>
                <li>Answer : {{ $question->answer }}</li>
            </ul>
            @endif
        @endforeach
    </div>

</div>
    @endsection
