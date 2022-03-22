<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Opinion;
use Illuminate\Http\Request;

class OpinionController extends Controller
{
    public function getAllOpinion($limit=10): \Illuminate\Http\JsonResponse
    {
        $opinion = Opinion::take($limit)->orderBy('order','ASC')->get();
        return response()->json($opinion);
    }

    public function getOpinion($id)
    {
        $opinion = Opinion::find($id);
        return response()->json($opinion);
    }
}
