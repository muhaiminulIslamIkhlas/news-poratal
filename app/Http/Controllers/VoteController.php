<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function index()
    {
        $votes = Vote::all();
        return view('admin.vote.index',compact('votes'));
    }

    public function create()
    {
        return view('admin.vote.create');
    }

    public function store(Request $request)
    {
        echo 'hello';
        $request->validate([
            'description' => 'required',
            'order' => 'required',
            'date' => 'required'
        ]);

        $vote = new Vote();
        $vote->description = $request->description;
        $vote->order = $request->order;
        $vote->date = $request->date;
        $vote->yes = 0;
        $vote->no = 0;
        $vote->no_comments = 0;

        $vote->save();

        return view('admin.vote.index');
    }

    public function delete($id)
    {
        $vote = Vote::find($id);
        $vote->delete();
        return back();
    }

    public function vote($vote)
    {

    }
}
