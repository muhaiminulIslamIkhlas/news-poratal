<?php

namespace App\Http\Controllers;

use App\Http\Repositories\HelperRepositoryInterface;
use App\Models\News;
use App\Models\NewsDetails;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Keyword;
use Intervention\Image\Facades\Image;

class NewsController extends Controller
{

    /**
     * @var HelperRepositoryInterface
     */
    private $_helepr;

    public function __construct(HelperRepositoryInterface $helper)
    {
        $this->_helepr = $helper;
    }

    /**
     * @return void
     */
    public function index()
    {
        $news = News::all();
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        $categories = Category::get();
        $keyWords = Keyword::get();
        return view('admin.news.create', compact('categories', 'keyWords'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'title' => 'required',
            'sort_description' => 'required',
            'category_id' => 'required',
            'type' => 'required',
            'details' => 'required',
            'ticker' => 'required',
            'representative' => 'required',
            'keyword' => 'required',
        ]);
        $imagePath = $this->_helepr->imageUpload($request->file('image'));
        $news = new News();
        $news->title = $request->title;
        $news->sort_description = $request->sort_description;
        $news->category_id = $request->category_id;
        $news->sub_category_id = $request->sub_category_id;
        $news->order = $request->order;
        $news->type = $request->type;
        $news->image = $imagePath;
        $news->save();
        $newsDetails = new NewsDetails();
        $newsDetails->news_id = $news->id;
        $newsDetails->details = $request->details;
        $newsDetails->ticker = $request->ticker;
        $newsDetails->representative = $request->representative;
        $newsDetails->keyword = json_encode($request->keyword);
        $newsDetails->save();

        return response()->json(json_decode($newsDetails->keyword));
    }
}
