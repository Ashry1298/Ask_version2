<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{

    public function store(Request $request)
    {
        $id = Auth::user()->id;
        $request->validate(['content' => 'required']);
        Question::create([
            'content' => $request->content,
            'user_id' => $id,
            'is_answered' == 1,
            'asked_at' => now()
        ]);
        return redirect()->route('profile.index')->with('succes-submit', 'Your question successfully submitted');
    }
    public function show($id)
    {
        $question = Question::where('id', '=', $id)->first();
        return view("profile.show-question", compact('question'));
    }
    public function all()
    {
        return view('profile.allquestion');
    }

    public function AskQuestion(Request $request, $id)
    {
        $request->validate(['content' => 'required|string']);
        Question::create([
            'content' => $request->content,
            'user_id' => $id
        ]);
        return back();
    }

    public function answer(Request $request, $id)
    {
        $request->validate(['answer' => 'required']);
        Question::where('id', '=', $id)->update([
            'answer' => $request->answer,
            'answered_at' => now(),
            'is_answered' => true
        ]);
        return redirect()->route('profile.index')->with('succes-submit', 'Your answer submitted successfully');
    }
}
