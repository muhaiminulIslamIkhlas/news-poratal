<?php

namespace App\Http\Helper;

use App\Http\Repositories\HelperRepositoryInterface;
use App\Models\District;
use App\Models\Division;
use App\Models\Thana;
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
        return URL::to('/').'/images/'.$imageName;
    }

    public function getDivsions()
    {
        $divisions = Division::get();
        return $divisions;
    }

    public function getDistrictByDivision($divId)
    {
        $districs = District::where('division_id',$divId)->get();
        return $districs;
    }

    public function getUpozillaByDistrict($upoId)
    {
        $upozillas = Thana::where('district_id',$upoId)->get();
        return $upozillas;
    }
}
