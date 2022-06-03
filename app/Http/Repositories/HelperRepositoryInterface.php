<?php

namespace App\Http\Repositories;

interface HelperRepositoryInterface
{
    public function imageUpload($image,$date):string;
    public function deleteImage($image):void;
}
