<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\Location;    

class OneToOneController extends Controller
{
    public function oneToOne()
    {
        $country = Country::where('name', 'China')->get()->first();

        echo $country->name;

        $location = $country->location;
        echo "<hr>Latitude: {$location->latitude}";
        echo "<hr>Longitude: {$location->longitude}";
    }

    public function oneToOneInverse()
    {
        $latitude  = 456;
        $longitude = 654;

        $location = Location::where('latitude', $latitude)
                                ->where('longitude', $longitude)
                                ->get()
                                ->first();
        
        $country = $location->country;
        echo $country->name;
    }

    public function oneToOneInsert()
    {
        $dataForm = [
            'name'      => 'Belgica',
            'latitude'  => 89,
            'longitude' => 98,
        ];
                
        $country  = Country::create($dataForm);        
        
        $location = $country->location()->create($dataForm);

        var_dump($location);

    }
}
