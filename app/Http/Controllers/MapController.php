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
        $arrLatitude = $this->getDatabrick1Lat();
        $arrLongitude = $this->getDatabrick1Long();
        $arrCount = $this->getDatabrick1Count();
        return $this->generateMapWithCount('#FF0000', $arrLatitude, $arrLongitude, $arrCount);
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
        $arrLatitude = $this->getSpark1Lat();
        $arrLongitude = $this->getSpark1Long();
        return $this->generateMap('#FF0000', $arrLatitude, $arrLongitude);
    }

    /*                                                                                          
        KMeans MLLib
    */
    public function spark2()
    {
        $arrLatitude = $this->getSpark2Lat();
        $arrLongitude = $this->getSpark2Long();
        return $this->generateMap('#FF0000', $arrLatitude, $arrLongitude);
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

    public function compare()
    {
        $latSpark1 = $this->getSpark1Lat();
        $longSpark1 = $this->getSpark1Long();;
        
        $latSpark2 = $this->getSpark2Lat();
        $longSpark2 = $this->getSpark2Long();

        $latDatabrick1 = $this->getDatabrick1Lat();
        $longDatabrick1 = $this->getDatabrick1Long();
        $countDatabrick1 = $this->getDatabrick1Count();

        Mapper::map(53.07772994, -2.14538955, ['zoom' => 7, 'marker' => false]);
        // Spark 1
        for ($i=0; $i < 9; $i++) { 
            Mapper::circle([['latitude' => $latSpark1[$i], 'longitude' => $longSpark1[$i]]], ['strokeColor' => '#79fc05', 'fillColor' => '#79fc05', 'radius' => 50000])
            ->informationWindow($latSpark1[$i], $longSpark1[$i], 
            'Latitude: ' . $latSpark1[$i] . '<br>Longitude: ' . $longSpark1[$i], 
            ['open' => false, 'maxWidth'=> 300]);
        }
        // Spark 2
        for ($i=0; $i < 9; $i++) { 
            Mapper::circle([['latitude' => $latSpark2[$i], 'longitude' => $longSpark2[$i]]], ['strokeColor' => '#FF0000', 'fillColor' => '#FF0000', 'radius' => 50000])
            ->informationWindow($latSpark2[$i], $longSpark2[$i], 
            'Latitude: ' . $latSpark2[$i] . '<br>Longitude: ' . $longSpark2[$i], 
            ['open' => false, 'maxWidth'=> 300]);
        }
        // Databrick 1
        for ($i=0; $i < 9; $i++) { 
            Mapper::circle([['latitude' => $latDatabrick1[$i], 'longitude' => $longDatabrick1[$i]]], ['strokeColor' => '#FFFF00', 'fillColor' => '#FFFF00', 'radius' => 50000])
            ->informationWindow($latDatabrick1[$i], $longDatabrick1[$i], 
            'Total Kejahatan: ' . $countDatabrick1[$i] . '<hr>Latitude: ' . $latDatabrick1[$i] . '<br>Longitude: ' . $longDatabrick1[$i], 
            ['open' => false, 'maxWidth'=> 300]);
        }

        return view('map');
    }

    private function generateMapWithCount($fillColor, array $arrLatitude, array $arrLongitude, array $arrCount)
    {
        Mapper::map(53.07772994, -2.14538955, ['zoom' => 7, 'marker' => false]);        
        for ($i=0; $i < 9; $i++) { 
            Mapper::circle([['latitude' => $arrLatitude[$i], 'longitude' => $arrLongitude[$i]]], ['strokeColor' => $fillColor, 'fillColor' => $fillColor, 'radius' => 50000])->informationWindow($arrLatitude[$i], $arrLongitude[$i], 
            'Total Kejahatan: ' . $arrCount[$i] . '<hr>Latitude: ' . $arrLatitude[$i] . '<br>Longitude: ' . $arrLongitude[$i], 
            ['open' => true, 'maxWidth'=> 300]);
        }
        return view('map');
    }
    
    private function generateMap($fillColor, array $arrLatitude, array $arrLongitude)
    {
        Mapper::map(53.07772994, -2.14538955, ['zoom' => 7, 'marker' => false]);        
        for ($i=0; $i < 9; $i++) { 
            Mapper::circle([['latitude' => $arrLatitude[$i], 'longitude' => $arrLongitude[$i]]], ['strokeColor' => $fillColor, 'fillColor' => $fillColor, 'radius' => 50000])->informationWindow($arrLatitude[$i], $arrLongitude[$i], 
            'Latitude: ' . $arrLatitude[$i] . '<br>Longitude: ' . $arrLongitude[$i], 
            ['open' => true, 'maxWidth'=> 300]);
        }
        return view('map');
    }

    private function getSpark1Long()
    {
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
        return $arrLongitude;
    }

    private function getSpark1Lat()
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
        return $arrLatitude;
    }

    private function getSpark2Long()
    {
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
        return $arrLongitude;
    }

    private function getSpark2Lat()
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
        return $arrLatitude;
    }

    private function getDatabrick1Long()
    {
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
        return $arrLongitude;
    }

    private function getDatabrick1Lat()
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
        return $arrLatitude;
    }

    private function getDatabrick1Count()
    {
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
        return $arrCount;
    }

    private function getDatabrick2Long()
    {
        # code...
    }

    private function getDatabrick2Lat()
    {
        # code...
    }

    private function getDatabrick2Count()
    {
        # code...
    }

    private function getDatabrick3Long()
    {
        # code...
    }

    private function getDatabrick3Lat()
    {
        # code...
    }

    private function getDatabrick3Count()
    {
        # code...
    }
}