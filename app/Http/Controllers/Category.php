<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category as CategoryModel;


class Category extends Controller
{
    public function index(){
        return view('admin.news.category.index');
    }

    public function create(Request $request){
        $request->validate([
            'name' => 'required|max:255'
        ]);
        $category = new CategoryModel();
        $category->name = $request->name;
        $category->save();

        return redirect('/admin/news/category/list');
    }
    public function list(){
        $categorylist = CategoryModel::get();
        return view('admin.news.category.list', compact('categorylist'));
    }

    public function view($id){
        $category = CategoryModel::where('id', $id)->first();

        return view('admin.news.category.view', compact('category'));
    }

    public function edit($id){
        $category = CategoryModel::where('id', $id)->first();
        return view('admin.news.category.edit', compact('category'));
    }

    public function update(Request $request){
        $category = CategoryModel::where('id', $request->id)->first();
        $category->name = $request->name;
        $category->save();

        return redirect('/admin/news/category/list');
    }

    public function delete($id){
        $category = CategoryModel::where('id', $id)->first();
        $category->delete();

        return back();
    }
}
