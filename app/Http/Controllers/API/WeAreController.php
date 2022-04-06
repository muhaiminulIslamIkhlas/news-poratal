<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\WeAre;
use Illuminate\Http\Request;

class WeAreController extends Controller
{
    public function getAllWeAre()
    {
        $memeber = WeAre::get();
        return response()->json($memeber);
    }
}
