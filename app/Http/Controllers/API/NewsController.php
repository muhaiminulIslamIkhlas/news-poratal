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

    public function getCategoryById($id)
    {
        $category = Category::where('id', $id)->with('subCategories')->first();
        return response()->json($category);
    }

    public function getAllNews($categoryId, $type, $limit, $skip = 0, $sub = 0): \Illuminate\Http\JsonResponse
    {
        $key = 'category_id';
        if ($sub) {
            $key = 'sub_category_id';
            $news = News::where('published', 1)
                ->where($key, $categoryId)
                ->where('type', $type)
                ->orderBy('order', 'ASC')
                ->skip($skip)
                ->take($limit)
                ->get()
                ->map->format();
            return response()->json($news);
        }
        $news = News::where('published', 1)
            ->where($key, $categoryId)
            ->where('sub_category_id', null)
            ->where('type', $type)
            ->orderBy('order', 'ASC')
            ->skip($skip)
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

    public function getAllNewsByCategory($categoryId, $limit, $skip)
    {
        $news = News::where('published', 1)->where('category_id', $categoryId)
            ->skip($skip)
            ->take($limit)
            ->get()
            ->map->format();

        $category = Category::find($categoryId);
        return response()->json([
            'category' => $category,
            'news' => $news
        ]);
    }

    public function getAllNewsBySubCategory($subCategoryId, $limit,$skip)
    {
        $news = News::where('published', 1)->where('sub_category_id', $subCategoryId)
            ->skip($skip)
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
