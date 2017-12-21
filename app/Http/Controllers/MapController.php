<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GoogleMaps;
use Mapper;

class MapController extends Controller
{
    public function index()
    {
        // $response = GoogleMaps::load('geocoding')
        //             ->setParam (['address' =>'santa cruz'])
        //             ->get();
        // echo $response;
        Mapper::map(53.381128999999990000, -1.470085000000040000);

        return view('map');
    }
}