<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function getCategory()
    {
        $categories = Category::with('subCategories')->get();
        return response()->json([$categories]);
    }

    public function getNews($categoryId,$type,$limit)
    {
        $limit = $limit > 10 ? 10 : $limit;
        $news = News::where('category_id',$categoryId)
                    ->where('type',$type)
                    ->orderBy('order','ASC')
                    ->take($limit)
                    ->get()
                    ->map->format();
        return response()->json($news);
    }
}
