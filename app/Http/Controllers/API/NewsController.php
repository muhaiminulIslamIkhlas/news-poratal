<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Latest;
use App\Models\News;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function getCategory(): \Illuminate\Http\JsonResponse
    {
        $categories = Category::with('subCategories')->orderBy('order', 'ASC')->get();
        return response()->json([$categories]);
    }

    public function getAllNews($categoryId, $type, $limit): \Illuminate\Http\JsonResponse
    {
        $news = News::where('category_id', $categoryId)
            ->where('type', $type)
            ->orderBy('order', 'ASC')
            ->take($limit)
            ->get()
            ->map->format();
        return response()->json($news);
    }

    public function increaseCount($id)
    {
        $latest = Latest::where('news_id', $id)->where('date', Date('Y-m-d'))->first();
        if ($latest) {
            $latest->count += 1;
            $latest->save();
        } else {
            $latest = new Latest();
            $latest->news_id = $id;
            $latest->count = 1;
            $latest->date = Date('Y-m-d');
            $latest->save();
        }
    }

    public function getNews($id): \Illuminate\Http\JsonResponse
    {
        $news = News::find($id)->formatDetails();
        $this->increaseCount($id);
        return response()->json($news);
    }

    public function getAllNewsByCategory($categoryId, $limit)
    {
        $news = News::where('category_id', $categoryId)
            ->take($limit)
            ->get()
            ->map->format();

        $category = Category::find($categoryId);
        return response()->json([
            'category' => $category,
            'news' => $news
        ]);
    }

    public function getAllNewsBySubCategory($subCategoryId, $limit)
    {
        $news = News::where('sub_category_id', $subCategoryId)
            ->take($limit)
            ->get()
            ->map->format();

        $subCategory = Subcategory::find($subCategoryId);
        return response()->json([
            'sub-category' => $subCategory,
            'news' => $news
        ]);
    }
}
