<?php

namespace App\Http\Controllers;

use App\Http\Repositories\HelperRepositoryInterface;
use App\Models\District;
use App\Models\News;
use App\Models\NewsDetails;
use App\Models\Region;
use App\Models\Thana;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Keyword;
use App\Models\LiveNews;
use App\Models\NewsKeyword;
use App\Models\Published;
use App\Models\Timeline;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class NewsController extends Controller
{
    public const PRCCHOD_ID = 1;
    public const RAJNITI_ID = 2;
    public const JATIO_ID = 3;
    public const KHELA_ID = 4;
    public const ANTORJATIK_ID = 5;
    public const BINODON_ID = 6;
    public const HEALTH_ID = 7;
    public const FEATURE_ID = 8;

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
        $news = News::orderby('date', 'DESC')->get();
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        $timelines = Timeline::orderBy('id','desc')->get();
        $categories = Category::get();
        $keyWords = Keyword::get();
        $divisions = $this->_helepr->getDivsions();
        return view('admin.news.create', compact('categories', 'keyWords', 'divisions','timelines'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048',
            'title' => 'required|max:255',
            'sort_description' => 'required',
            'category_id' => 'required',
            'type' => 'required',
            'details' => 'required',
            'ticker' => 'required',
            'date' => 'required',
            'representative' => 'required',
            'keyword' => 'required',
            'order' => 'required',
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
        $news->date = $request->date;
        $news->timeline_id = $request->timeline_id;
        $news->save();
        $newsDetails = new NewsDetails();
        $newsDetails->news_id = $news->id;
        $newsDetails->details = $request->details;
        $newsDetails->ticker = $request->ticker;
        $newsDetails->representative = $request->representative;
        $newsDetails->shoulder = $request->shoulder;
        $newsDetails->keyword = json_encode($request->keyword);
        $newsDetails->save();
        foreach($request->keyword as $keyword){
            $item = new NewsKeyword();
            $item->news_id = $news->id;
            $item->keyword_id = $keyword;
            $item->save();
        }
        $region = new Region();
        $region->news_id = $news->id;
        $region->division = $request->division;
        $region->district = $request->district;
        $region->upozilla = $request->upozilla;
        $region->save();
        $publisher = new Published();
        $publisher->news_id = $news->id;
        $publisher->created_by = auth()->user()->id;
        $publisher->save();

        return redirect('admin/news/index-by-category/' . $request->category_id . '/' . $request->category_name);
    }

    public function publish($newsId)
    {
        $news = News::find($newsId);
        $news->published = 1;
        $news->save();
        $publisher =  Published::where('news_id',$newsId)->first();
        $publisher->published_by = auth()->user()->id;
        $publisher->save();
        return back();
    }

    public function createByCategory($categoryId, $categoryName)
    {
        $timelines = Timeline::orderBy('id','desc')->get();
        $keyWords = Keyword::get();
        $divisions = $this->_helepr->getDivsions();
        return view('admin.news.add-by-category.create', compact('categoryId', 'keyWords', 'divisions', 'categoryName','timelines'));
    }

    public function getList($categoryId, $categoryName)
    {
        $news = News::where('category_id', $categoryId)->orderby('date', 'DESC')->get();
        return view('admin.news.add-by-category.index', compact('news', 'categoryName','categoryId'));
    }

    public function edit($newsId, $categoryName)
    {
        $timelines = Timeline::orderBy('id','desc')->get();
        $newskeyWordJson = NewsDetails::select('keyword')->where('news_id', $newsId)->first();
        $newsKeywords = json_decode($newskeyWordJson->keyword);
        $keyWords = Keyword::get();
        $news = News::find($newsId);
        $divisions = $this->_helepr->getDivsions();
        $categoryId = $news->category_id;
        return view('admin.news.add-by-category.edit', compact('news', 'keyWords', 'divisions', 'newsKeywords', 'categoryName','timelines','categoryId'));
    }

    public function delete($newsId)
    {
        $news = News::find($newsId);
        $news->delete();
        DB::table("news_keywords")->where('news_id',$newsId)->delete();
        return back();
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048',
            'title' => 'required|max:255',
            'sort_description' => 'required',
            'category_id' => 'required',
            'type' => 'required',
            'details' => 'required',
            'ticker' => 'required',
            'date' => 'required',
            'representative' => 'required',
            'keyword' => 'required',
            'order' => 'required',
        ]);


        $news = News::find($request->id);
        $news->title = $request->title;
        $news->sort_description = $request->sort_description;
        $news->category_id = $request->category_id;
        $news->sub_category_id = $request->sub_category_id;
        $news->order = $request->order;
        $news->type = $request->type;
        $news->timeline_id = $request->timeline_id;
        if ($request->hasFile('image')) {
            $imagePath = $this->_helepr->imageUpload($request->file('image'));
            $news->image = $imagePath;
        }
        $news->date = $request->date;
        $news->save();
        $newsDetails = NewsDetails::where('news_id', $request->id)->first();
        $newsDetails->details = $request->details;
        $newsDetails->ticker = $request->ticker;
        $newsDetails->representative = $request->representative;
        $newsDetails->shoulder = $request->shoulder;
        $newsDetails->keyword = json_encode($request->keyword);
        $newsDetails->save();
        $region = Region::where('news_id', $request->id)->first();
        $region->news_id = $news->id;
        $region->division = $request->division;
        $region->district = $request->district;
        $region->upozilla = $request->upozilla;
        $region->save();
        DB::table("news_keywords")->where('news_id',$news->id)->delete();
        foreach($request->keyword as $keyword){
            $item = new NewsKeyword();
            $item->news_id = $news->id;
            $item->keyword_id = $keyword;
            $item->save();
        }

        return redirect('admin/news/index-by-category/' . $request->category_id . '/' . $request->categoryName);
    }

    public function view($newsId)
    {
        $news = News::find($newsId);
        $keyWords = Keyword::whereIn('id',json_decode($news->details->keyword))->get();
        return view('admin.news.add-by-category.view', compact('news','keyWords'));
    }

    public function getDistrictByDivId($divisionID)
    {
        $districts = District::where('division_id', $divisionID)->get();
        return response()->json($districts);
    }

    public function getUpozillaByDisId($districtID)
    {
        $upozilla = Thana::where('district_id', $districtID)->get();
        return response()->json($upozilla);
    }

    public function getKeyWord($newsId)
    {
        $newskeyWordJson = NewsDetails::select('keyword')->where('news_id', $newsId)->first();
        $keywords = Keyword::get();
        $newsKeywords = json_decode($newskeyWordJson->keyword);

        $html = '';
        foreach ($keywords as $keyWord) {
            $selected = in_array($keyWord->name, $newsKeywords) ? 'selected' : '';
            $html .= '<option value"' . $keyWord->id . ' ' . $selected . '>' . $keyWord->name . '</option>';
        }

        return response()->json($html);
    }

    public function publishNews($id)
    {
        $news = News::find($id);
        $news->published = 1;
        $news->save();
        $published = Published::where('news_id',$id)->first();
        $published->published_by = auth()->user()->id;
        $published->save();

        return back();
    }

    public function liveNews($newsId)
    {
        $liveNews = LiveNews::where('news_id',$newsId)->orderBy(DB::raw("DATE_FORMAT(date,'%d-%M-%Y')"), 'DESC')->get();
        return view('admin.live-news.index',compact('newsId','liveNews'));
    }

    public function liveNewsStore(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'details' => 'required',
            'date' => 'required',
        ]);

        $liveNews = new LiveNews();
        $liveNews->title = $request->title;
        $liveNews->details = $request->details;
        $liveNews->date = $request->date;
        $liveNews->news_id = $request->news_id;
        $liveNews->save();

        return back();
    }

    public function liveNewsDelete($newsId)
    {
        $liveNews = LiveNews::find($newsId);
        $liveNews->delete();

        return back();
    }

    public function liveNewsEdit($newsId)
    {
        $liveNews = LiveNews::find($newsId);
        return view('admin.live-news.edit',compact('liveNews'));
    }

    public function liveNewsUpdate(Request $request)
    {
        $liveNews =  LiveNews::where('news_id',$request->news_id)->first();
        $liveNews->title = $request->title;
        $liveNews->details = $request->details;
        $liveNews->date = $request->date;
        $liveNews->news_id = $request->news_id;
        $liveNews->save();

        return redirect('admin/news/live-index/'.$request->news_id);
    }
}
