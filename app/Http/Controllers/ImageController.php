<?php

namespace App\Http\Controllers;

use App\Http\Repositories\HelperRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    /**
     * @var HelperRepositoryInterface
     */
    private $_helepr;

    public function __construct(HelperRepositoryInterface $helper)
    {
        $this->_helepr = $helper;
    }
    public function index(){
        return view('admin.news.image.index');
    }

    public function create(Request $request){
        $request->validate([
            'title' => 'required|max:255',
            'image_file' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'date' => 'required',
            'order'     => 'required'
        ]);

        $image = $this->_helepr->imageUpload($request->file('image_file'));

        $imageModel = new Image();
        $imageModel->title = $request->title;
        $imageModel->image_file = $image;
        $imageModel->date = $request->date;
        $imageModel->order = $request->order;
        $imageModel->save();

        return redirect('/admin/news/image/list');
    }

    public function list(){
        $imageList = Image::get();

        return view('admin.news.image.list', compact('imageList'));
    }

    public function view($id){
        $image = Image::where('id', $id)->first();

        return view('admin.news.image.view', compact('image'));
    }

    public function edit($id){
        $image = Image::where('id', $id)->first();

        return view('admin.news.image.edit', compact('image'));
    }
    public function update(Request $request){
        $request->validate([
            'title' => 'required|max:255',
            // 'video_thumbnail' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            // 'date_time' => 'required',
            'order'     => 'required'
        ]);

        $image = Image::where('id', $request->id)->first();
        $image->title = $request->title;
        // $video->video_thumbnail = $request->video_thumbnail;
        // $video->date_time = $request->date_time;
        $image->order = $request->order;
        $image->save();

        return redirect('/admin/news/image/list');

    }

    public function delete($id){
        $video = Image::where('id', $id)->first();
        $video->delete();

        return redirect('/admin/news/image/list');
    }
}
