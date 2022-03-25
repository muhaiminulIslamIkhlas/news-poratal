<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use App\Models\Thana;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getDivsions()
    {
        $divisions = Division::get()->map->format();
        return response()->json($divisions);
    }

    public function getDistrictByDivision($divisionId)
    {
        $districs = District::where('division_id',$divisionId)->get()->map->format();
        return response()->json($districs);
    }

    public function getUpozillaByDivision($upoId)
    {
        $upozillas = Thana::where('district_id',$upoId)->get()->map->format();
        return response()->json($upozillas);
    }
}
