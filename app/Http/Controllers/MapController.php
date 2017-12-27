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
        return $this->generateMapWithCount($arrLatitude, $arrLongitude, $arrCount);
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
        KMeans ML
    */
    public function spark1()
    {

        $arrLatitude = array(51.07528142,
                            53.51457366,
                            51.57330775,
                            51.51291783,
                            54.82142467,
                            52.50175842,
                            51.03457216,
                            51.88591794,
                            53.47909496,
                        );
        $arrLongitude = array(-1.31237259, 
                            -2.63951082,
                            -0.1706831,
                            -2.80669524,
                            -1.4610006,
                            -1.73947437,
                            -4.1573587,
                            0.87905727,
                            -1.13558389,
                        );
        return $this->generateMap($arrLatitude, $arrLongitude);
    }

    /*                                                                                          
        KMeans MLLib
    */
    public function spark2()
    {
        $arrLatitude = array(51.55334656,
                            53.52667693,
                            51.9822497,
                            54.52663451,
                            52.57192355,
                            54.66030682,
                            53.48222802,
                            51.08995159,
                            51.30615584,
                        );
        $arrLongitude = array(-0.16157981, 
                            -1.89086623,
                            0.83866673,
                            -1.17805069,
                            -1.59104211,
                            -6.20879952,
                            -2.86649543,
                            -1.40398857,
                            -3.36950673,
                        );
        return $this->generateMap($arrLatitude, $arrLongitude);
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

    private function generateMapWithCount(array $arrLatitude, array $arrLongitude, array $arrCount)
    {
        Mapper::map(53.07772994, -2.14538955, ['zoom' => 7, 'marker' => false]);        
        for ($i=0; $i < 9; $i++) { 
            Mapper::circle([['latitude' => $arrLatitude[$i], 'longitude' => $arrLongitude[$i]]], ['radius' => 50000])->informationWindow($arrLatitude[$i], $arrLongitude[$i], 
            'Total Kejahatan: ' . $arrCount[$i] . '<hr>Latitude: ' . $arrLatitude[$i] . '<br>Longitude: ' . $arrLongitude[$i], 
            ['open' => true, 'maxWidth'=> 300]);
        }
        return view('map');
    }
    
    private function generateMap(array $arrLatitude, array $arrLongitude)
    {
        Mapper::map(53.07772994, -2.14538955, ['zoom' => 7, 'marker' => false]);        
        for ($i=0; $i < 9; $i++) { 
            Mapper::circle([['latitude' => $arrLatitude[$i], 'longitude' => $arrLongitude[$i]]], ['radius' => 50000])->informationWindow($arrLatitude[$i], $arrLongitude[$i], 
            'Latitude: ' . $arrLatitude[$i] . '<br>Longitude: ' . $arrLongitude[$i], 
            ['open' => true, 'maxWidth'=> 300]);
        }
        return view('map');
    }
}