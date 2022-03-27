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
        $categories = Category::get();
        $keyWords = Keyword::get();
        $divisions = $this->_helepr->getDivsions();
        return view('admin.news.create', compact('categories', 'keyWords', 'divisions'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg,webp|max:2048',
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
        $news->date = $request->date;
        $news->save();
        $newsDetails = new NewsDetails();
        $newsDetails->news_id = $news->id;
        $newsDetails->details = $request->details;
        $newsDetails->ticker = $request->ticker;
        $newsDetails->representative = $request->representative;
        $newsDetails->keyword = json_encode($request->keyword);
        $newsDetails->save();
        $region = new Region();
        $region->news_id = $news->id;
        $region->division = $request->division;
        $region->district = $request->district;
        $region->upozilla = $request->upozilla;
        $region->save();

        if($request->category_id == self::PRCCHOD_ID){
            return redirect('admin/news/procchod/index');
        }

        if($request->category_id == self::RAJNITI_ID){
            return redirect('admin/news/rajniti/index');
        }

        if($request->category_id == self::JATIO_ID){
            return redirect('admin/news/jatio/index');
        }

        if($request->category_id == self::KHELA_ID){
            return redirect('admin/news/khela/index');
        }

        if($request->category_id == self::ANTORJATIK_ID){
            return redirect('admin/news/antorjatik/index');
        }

        if($request->category_id == self::BINODON_ID){
            return redirect('admin/news/binodon/index');
        }

        if($request->category_id == self::HEALTH_ID){
            return redirect('admin/news/health/index');
        }

        if($request->category_id == self::FEATURE_ID){
            return redirect('admin/news/feature/index');
        }

        return redirect('admin/news/index');
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

    public function procchod()
    {
        $news = News::where('category_id',self::PRCCHOD_ID)->orderby('date', 'DESC')->get();
        return view('admin.news.procchod.index', compact('news'));
    }

    public function procchodCreate()
    {
        $categories = Category::get();
        $keyWords = Keyword::get();
        $divisions = $this->_helepr->getDivsions();
        return view('admin.news.procchod.create', compact('categories', 'keyWords', 'divisions'));
    }

    public function rajniti()
    {
        $news = News::where('category_id',self::RAJNITI_ID)->orderby('date', 'DESC')->get();
        return view('admin.news.rajniti.index', compact('news'));
    }

    public function rajnitiCreate()
    {
        $categories = Category::get();
        $keyWords = Keyword::get();
        $divisions = $this->_helepr->getDivsions();
        return view('admin.news.rajniti.create', compact('categories', 'keyWords', 'divisions'));
    }

    public function jatio()
    {
        $news = News::where('category_id',self::JATIO_ID)->orderby('date', 'DESC')->get();
        return view('admin.news.jatio.index', compact('news'));
    }

    public function jatioCreate()
    {
        $categories = Category::get();
        $keyWords = Keyword::get();
        $divisions = $this->_helepr->getDivsions();
        return view('admin.news.jatio.create', compact('categories', 'keyWords', 'divisions'));
    }

    public function khela()
    {
        $news = News::where('category_id',self::KHELA_ID)->orderby('date', 'DESC')->get();
        return view('admin.news.khela.index', compact('news'));
    }

    public function khelaCreate()
    {
        $categories = Category::get();
        $keyWords = Keyword::get();
        $divisions = $this->_helepr->getDivsions();
        return view('admin.news.khela.create', compact('categories', 'keyWords', 'divisions'));
    }

    public function antorjatik()
    {
        $news = News::where('category_id',self::ANTORJATIK_ID)->orderby('date', 'DESC')->get();
        return view('admin.news.antorjatik.index', compact('news'));
    }

    public function antorjatikCreate()
    {
        $categories = Category::get();
        $keyWords = Keyword::get();
        $divisions = $this->_helepr->getDivsions();
        return view('admin.news.antorjatik.create', compact('categories', 'keyWords', 'divisions'));
    }

    public function binodon()
    {
        $news = News::where('category_id',self::BINODON_ID)->orderby('date', 'DESC')->get();
        return view('admin.news.binodon.index', compact('news'));
    }

    public function binodonCreate()
    {
        $categories = Category::get();
        $keyWords = Keyword::get();
        $divisions = $this->_helepr->getDivsions();
        return view('admin.news.binodon.create', compact('categories', 'keyWords', 'divisions'));
    }

    public function health()
    {
        $news = News::where('category_id',self::HEALTH_ID)->orderby('date', 'DESC')->get();
        return view('admin.news.health.index', compact('news'));
    }

    public function healthCreate()
    {
        $categories = Category::get();
        $keyWords = Keyword::get();
        $divisions = $this->_helepr->getDivsions();
        return view('admin.news.health.create', compact('categories', 'keyWords', 'divisions'));
    }

    public function feature()
    {
        $news = News::where('category_id',self::FEATURE_ID)->orderby('date', 'DESC')->get();
        return view('admin.news.feature.index', compact('news'));
    }

    public function featureCreate()
    {
        $categories = Category::get();
        $keyWords = Keyword::get();
        $divisions = $this->_helepr->getDivsions();
        return view('admin.news.feature.create', compact('categories', 'keyWords', 'divisions'));
    }

    public function test()
    {
        echo Date('Y-m-d');
    }
}
