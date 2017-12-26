<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GoogleMaps;
use Mapper;

class MapController extends Controller
{
    /* 
    Done
    */
    public function dataBrick1()
    {
        $arrLatitude = array(51.33094528,
                            51.62840455,
                            54.48125503,
                            51.5174084,
                            54.51262717,
                            51.14569694,
                            52.71681114,
                            53.07772994,
                            53.47874519,
                        );
        $arrLongitude = array(-3.41009542, 
                            0.81708516,
                            -1.44745039,
                            -0.21704177,
                            -6.03053087,
                            -1.53349564,
                            -1.56248113,
                            -0.14538955,
                            -2.53252477,
                        );
        $arrCount = array(1585407, 
                            1353933,
                            2379805,
                            5157079,
                            99684,
                            1687174,
                            4213788,
                            1171391,
                            4826018,
                        );
        return $this->generateMap($arrLatitude, $arrLongitude, $arrCount);
    }

    /* 
    
    */
    public function dataBrick2()
    {
        $arrLatitude = array(51.33094528,
                            51.62840455,
                            54.48125503,
                            51.5174084,
                            54.51262717,
                            51.14569694,
                            52.71681114,
                            53.07772994,
                            53.47874519,
                        );
        $arrLongitude = array(-3.41009542, 
                            0.81708516,
                            -1.44745039,
                            -0.21704177,
                            -6.03053087,
                            -1.53349564,
                            -1.56248113,
                            -0.14538955,
                            -2.53252477,
                        );
        $arrCount = array(1585407, 
                            1353933,
                            2379805,
                            5157079,
                            99684,
                            1687174,
                            4213788,
                            1171391,
                            4826018,
                        );
        return $this->generateMap($arrLatitude, $arrLongitude, $arrCount);
    }

    /*                                                                                          
    
    */
    public function dataBrick3()
    {
        $arrLatitude = array(51.33094528,
                            51.62840455,
                            54.48125503,
                            51.5174084,
                            54.51262717,
                            51.14569694,
                            52.71681114,
                            53.07772994,
                            53.47874519,
                        );
        $arrLongitude = array(-3.41009542, 
                            0.81708516,
                            -1.44745039,
                            -0.21704177,
                            -6.03053087,
                            -1.53349564,
                            -1.56248113,
                            -0.14538955,
                            -2.53252477,
                        );
        $arrCount = array(1585407, 
                            1353933,
                            2379805,
                            5157079,
                            99684,
                            1687174,
                            4213788,
                            1171391,
                            4826018,
                        );
        return $this->generateMap($arrLatitude, $arrLongitude, $arrCount);
    }

    /*                                                                                          
    
    */
    public function spark1()
    {
        $arrLatitude = array(51.33094528,
                            51.62840455,
                            54.48125503,
                            51.5174084,
                            54.51262717,
                            51.14569694,
                            52.71681114,
                            53.07772994,
                            53.47874519,
                        );
        $arrLongitude = array(-3.41009542, 
                            0.81708516,
                            -1.44745039,
                            -0.21704177,
                            -6.03053087,
                            -1.53349564,
                            -1.56248113,
                            -0.14538955,
                            -2.53252477,
                        );
        $arrCount = array(1585407, 
                            1353933,
                            2379805,
                            5157079,
                            99684,
                            1687174,
                            4213788,
                            1171391,
                            4826018,
                        );
        return $this->generateMap($arrLatitude, $arrLongitude, $arrCount);
    }

    /*                                                                                          
    
    */
    public function spark2()
    {
        $arrLatitude = array(51.33094528,
                            51.62840455,
                            54.48125503,
                            51.5174084,
                            54.51262717,
                            51.14569694,
                            52.71681114,
                            53.07772994,
                            53.47874519,
                        );
        $arrLongitude = array(-3.41009542, 
                            0.81708516,
                            -1.44745039,
                            -0.21704177,
                            -6.03053087,
                            -1.53349564,
                            -1.56248113,
                            -0.14538955,
                            -2.53252477,
                        );
        $arrCount = array(1585407, 
                            1353933,
                            2379805,
                            5157079,
                            99684,
                            1687174,
                            4213788,
                            1171391,
                            4826018,
                        );
        return $this->generateMap($arrLatitude, $arrLongitude, $arrCount);
    }

    /*                                                                                          
    
    */
    public function spark3()
    {
        $arrLatitude = array(51.33094528,
                            51.62840455,
                            54.48125503,
                            51.5174084,
                            54.51262717,
                            51.14569694,
                            52.71681114,
                            53.07772994,
                            53.47874519,
                        );
        $arrLongitude = array(-3.41009542, 
                            0.81708516,
                            -1.44745039,
                            -0.21704177,
                            -6.03053087,
                            -1.53349564,
                            -1.56248113,
                            -0.14538955,
                            -2.53252477,
                        );
        $arrCount = array(1585407, 
                            1353933,
                            2379805,
                            5157079,
                            99684,
                            1687174,
                            4213788,
                            1171391,
                            4826018,
                        );
        return $this->generateMap($arrLatitude, $arrLongitude, $arrCount);
    }

    private function generateMap(array $arrLatitude, array $arrLongitude, array $arrCount)
    {
        Mapper::map(53.07772994, -2.14538955, ['zoom' => 7, 'marker' => false]);        
        for ($i=0; $i < 9; $i++) { 
            Mapper::circle([['latitude' => $arrLatitude[$i], 'longitude' => $arrLongitude[$i]]], ['radius' => 50000])->informationWindow($arrLatitude[$i], $arrLongitude[$i], 'Total Kejahatan-'.$arrCount[$i], ['open' => true, 'maxWidth'=> 300]);
        }
        return view('map');
    }
}