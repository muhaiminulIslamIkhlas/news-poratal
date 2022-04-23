<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Keyword;
use Illuminate\Http\Request;

class TrendingController extends Controller
{
    public function allTrending($limit, $skip = 0)
    {
        $trendingList = Keyword::where('trending', 1)->orderBy('id', 'desc')->skip($skip)->take($limit)->get();
        return response()->json($trendingList);
    }
}
