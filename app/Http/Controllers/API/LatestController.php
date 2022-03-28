<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Latest;
use App\Models\News;
use Carbon\Traits\Date;
use Illuminate\Http\Request;

class LatestController extends Controller
{
    public function getAllSorbadhik($limit, $date = '')
    {
        if ($date) {
            $latest = Latest::select('news_id')->where('date', $date)->orderBy('count', 'DESC')->take($limit)->get();
            $latestId = $this->mapArray($latest);
        } else {
            $date = Date('Y-m-d');
            $latest = Latest::select('news_id')->where('date', $date)->orderBy('count', 'DESC')->take($limit)->get();
            $latestId = $this->mapArray($latest);
        }

        $news = News::where('id', $latestId)->get()->map->format();

        return response()->json($news);
    }

    public function mapArray($array): array
    {
        $mappedArray = [];
        foreach ($array as $item){
            $mappedArray[] = $item->news_id;
        }
        return $mappedArray;
    }

    public function getAllLatest($limit,$date): \Illuminate\Http\JsonResponse
    {
        $latest = News::whereRaw("DATE_FORMAT(date,'%Y-%m-%d') like ?", ["%$date%"])->where('type','latest')->orderBy('order','ASC')->take($limit)->get()->map->format();
        return response()->json($latest);
    }
}
