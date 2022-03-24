<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information;

class InformationController extends Controller
{
    public function index(){
        $informationList = Information::all();
        return view('admin.information.index', compact('informationList'));
    }

    public function create(){
        $informationList = Information::all();
        return view('admin.information.create', compact('informationList'));
    }

    public function store(Request $request){
        $request->validate([
            'info_key' => 'required',
            'info_value' => 'required',
            'date_time' => 'required'
        ]);

        $information = new Information();
        $information->info_key = $request->info_key;
        $information->info_value = $request->info_value;
        $information->date_time = $request->date_time;
        $information->save();

        return redirect('/admin/information/index');
    }

    public function delete($id){
        $information = Information::where('id', $id)->first();

        $information->delete();

        return redirect('admin/information/index');
    }
}
