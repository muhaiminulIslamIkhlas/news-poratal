<?php

namespace App\Http\Controllers;

use App\Http\Repositories\HelperRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Keyword;

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
//        echo $this->_helepr->imageUpload('hello');
        return view('admin.news.index');
    }

    public function create()
    {
        $categories = Category::get();
        $keyWords = Keyword::get();
        return view('admin.news.create',compact('categories','keyWords'));
    }
}
