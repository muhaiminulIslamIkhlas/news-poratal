<?php

namespace App\Http\Helper;

use App\Http\Repositories\HelperRepositoryInterface;

class Helper implements HelperRepositoryInterface
{

    /**
     * @param $image
     * @return string
     */
    public function imageUpload($image):string
    {
        // TODO: Implement imageUpload() method.
        return "URL";
    }
}
