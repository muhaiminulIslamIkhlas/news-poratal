<?php

namespace App\Http\Controllers;

use App\Http\Repositories\HelperRepositoryInterface;
use Illuminate\Http\Request;

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
        $request->validate([
            'title' => 'required|unique:posts',
            'body' => 'required',
            'publish_at' => 'nullable|date',
        ]);

        return view('admin.news.create',com);
    }
}
