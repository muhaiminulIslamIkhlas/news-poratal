<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class OpinionController extends Controller
{
    protected const OPINION_ID = 20;

    public function getAllOpinion($limit = 10,$skip = 0): \Illuminate\Http\JsonResponse
    {
        $opinion = News::where('published', 1)->where('category_id', self::OPINION_ID)->skip($skip)->take($limit)->orderBy('order', 'ASC')->get()->map->format();
        return response()->json($opinion);
    }

    public function getOpinion($id)
    {
        $opinion = News::find($id)->formatDetails();
        return response()->json($opinion);
    }
}
