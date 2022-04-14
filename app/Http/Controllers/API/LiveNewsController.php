<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\LiveNews;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LiveNewsController extends Controller
{
    protected const LIVE_NEWS = 19;

    public function getAllLiveNews($limit)
    {
        $news = News::where('category_id', self::LIVE_NEWS)->orderBy('order', 'asc')->take($limit)->get();
        return response($news);
    }

    public function getLiveNews($newsId, $limit)
    {
        $news = News::where('id', $newsId)->first();
        $liveNews = LiveNews::where('news_id', $newsId)->orderBy(DB::raw("DATE_FORMAT(date,'%d-%M-%Y')"), 'DESC')->take($limit)->get();
        return response([
            'news' => $news,
            'live_news' => $liveNews
        ]);
    }
}
