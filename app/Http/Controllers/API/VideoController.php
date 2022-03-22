<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function getAllVideo($limit=10): \Illuminate\Http\JsonResponse
    {
        $video = Video::take($limit)->orderBy('order','ASC')->get();
        return response()->json($video);
    }

    public function getVideo($id): \Illuminate\Http\JsonResponse
    {
        $video = Video::find($id);
        return response()->json($video);
    }
}

