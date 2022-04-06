<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArchiveController extends Controller
{
    public function index($limit)
    {
        $news = News::orderBy(DB::raw("DATE_FORMAT(date,'%d-%M-%Y')"), 'DESC')->take($limit)->get();
        return response()->json($news);
    }

    public function filter(Request $request)
    {
        $news = News::select('*');
        if($request->category_id){
            $news->where('category_id', $request->category_id);
        }

        if($request->startDate && $request->endDate){
            $news->whereBetween(DB::raw('DATE(date)'), [$request->startDate, $request->endDate]);
        }else if($request->startDate){
            $news->whereBetween(DB::raw('DATE(date)'), [$request->startDate, $request->startDate]);
        }else if($request->endDate){
            $news->whereBetween(DB::raw('DATE(date)'), [$request->endDate, $request->endDate]);
        }

        if($request->division || $request->district || $request->upozilla){
            $news->join('regions','regions.news_id','news.id');
        }

        if($request->division){
            $news->where('regions.division',$request->division);
        }

        if($request->district){
            $news->where('regions.district',$request->district);
        }

        if($request->upozilla){
            $news->where('regions.upozilla',$request->upozilla);
        }

        if($request->title){
            $news->where('title','LIKE','%'.$request->title.'%');
        }

        $news->take($request->limit);
        
        return response()->json($news->get());
    }
}
