<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keyword as KeywordModel;

class Keyword extends Controller
{
public function index(){
    return view('admin.news.keyword.index');
}

public function create(Request $request){
    $keyword = new KeywordModel();
    $keyword->name = $request->name;
    $keyword->save();

    return redirect('/admin/news/keyword/list');
}
public function list(){
    $keywordlist = KeywordModel::get();
    return view('admin.news.keyword.list', compact('keywordlist'));
}

public function view($id){
    $keyword = KeywordModel::where('id', $id)->first();

    return view('admin.news.keyword.view', compact('keyword'));
}

public function edit($id){
    $keyword = KeywordModel::where('id', $id)->first();
    return view('admin.news.keyword.edit', compact('keyword'));
}

public function update(Request $request){
    $keyword = KeywordModel::where('id', $request->id)->first();
    $keyword->name = $request->name;
    $keyword->save();

    return redirect('/admin/news/keyword/list');
}

public function delete($id){
    $keyword = KeywordModel::where('id', $id)->first();
    $keyword->delete();

    return back();
}
}