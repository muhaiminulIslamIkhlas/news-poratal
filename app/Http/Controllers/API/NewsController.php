<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function getCategory(): \Illuminate\Http\JsonResponse
    {
        $categories = Category::with('subCategories')->get();
        return response()->json([$categories]);
    }

    public function getAllNews($categoryId,$type,$limit): \Illuminate\Http\JsonResponse
    {
        $news = News::where('category_id',$categoryId)
                    ->where('type',$type)
                    ->orderBy('order','ASC')
                    ->take($limit)
                    ->get()
                    ->map->format();
        return response()->json($news);
    }

    public function getNews($id): \Illuminate\Http\JsonResponse
    {
        $news = News::find($id)->formatDetails();
        return response()->json($news);
    }
}
