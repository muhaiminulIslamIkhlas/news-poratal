<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Keyword;
use Illuminate\Http\Request;

class TrendingController extends Controller
{
    public function allTrending($limit)
    {
        $trendingList = Keyword::where('trending',1)->orderBy('id','desc')->take($limit)->get();
        return response()->json($trendingList);
    }
}
