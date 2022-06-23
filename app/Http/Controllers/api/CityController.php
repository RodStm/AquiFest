<?php

namespace App\Http\Controllers\api;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CityController extends Controller
{
  
 
    public function findByName($name)
    {
    $cities = DB::table('cities')->select('cities.name')->where('name', 'like', '%' . $name . '%')->get();

        return response()->json(array(
            'response' => 'success',
            'cities' => $cities
          ));
        }
    
}
