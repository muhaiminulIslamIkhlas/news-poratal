<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keyword as KeywordModel;

class Keyword extends Controller
{
    public function index()
    {
        return view('admin.news.keyword.index');
    }

    public function indexTrending()
    {
        $keywordlist = KeywordModel::where('trending',1)->orderBy('id','desc')->get();
        return view('admin.trending.index', compact('keywordlist'));
    }

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required'
        ]);
        $keyword = new KeywordModel();
        $keyword->name = $request->name;
        $keyword->save();

        return redirect('/admin/news/keyword/list');
    }

    public function list()
    {
        $keywordlist = KeywordModel::orderBy('id','desc')->get();
        return view('admin.news.keyword.list', compact('keywordlist'));
    }

    public function view($id)
    {
        $keyword = KeywordModel::where('id', $id)->first();

        return view('admin.news.keyword.view', compact('keyword'));
    }

    public function edit($id)
    {
        $keyword = KeywordModel::where('id', $id)->first();
        return view('admin.news.keyword.edit', compact('keyword'));
    }

    public function update(Request $request)
    {
        $keyword = KeywordModel::where('id', $request->id)->first();
        $keyword->name = $request->name;
        $keyword->save();

        return redirect('/admin/news/keyword/list');
    }

    public function delete($id)
    {
        $keyword = KeywordModel::where('id', $id)->first();
        $keyword->delete();

        return back();
    }

    public function makeTrending($id)
    {
        $keyword = KeywordModel::find($id);
        $keyword->trending = 1;
        $keyword->save();

        return back();
    }

    public function removeTrending($id)
    {
        $keyword = KeywordModel::find($id);
        $keyword->trending = 0;
        $keyword->save();

        return back();
    }
}
