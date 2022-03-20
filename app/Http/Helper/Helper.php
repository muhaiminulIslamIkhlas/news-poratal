<?php

namespace App\Http\Helper;

use App\Http\Repositories\HelperRepositoryInterface;
use Illuminate\Support\Facades\URL;
use Intervention\Image\Facades\Image;

class Helper implements HelperRepositoryInterface
{

    /**
     * @param $image
     * @return string
     */
    public function imageUpload($image):string
    {
        $file = $image;
        $ogImage = Image::make($file);
        $imageName = time().$file->getClientOriginalName();
        $originalPath = public_path('/images/').time().$file->getClientOriginalName();
        $ogImage =  $ogImage->save($originalPath);
        return URL::to('/').'/public/images/'.$imageName;
    }
}
