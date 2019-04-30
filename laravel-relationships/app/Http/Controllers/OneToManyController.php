<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;

class OneToManyController extends Controller
{
    public function oneToMany()
    {        
        //$country = Country::where('name', 'Brasil')->get()->first();

        $keySearch = 'a';

        $countries = Country::where('name', 'LIKE', "%{$keySearch}%")->with('states')->get();

        foreach ($countries as $country)
        {
            echo "<b>{$country->name}</b>";

            $states = $country->states;
    
            foreach ($states as $state)
            {
                echo "<hr>{$state->initials} - {$state->name}";
            }    
            echo '<hr>';         
        }               
    }

    public function ManyToOne()
    {
        $stateName = 'São Paulo';

        $state = State::where('name', $stateName)->get()->first();

        echo "<b>{$state->name}</b>";

        $country = $state->country;

        echo "<hr><br>País: {$country->name}";
    }

    public function oneToManyTwo()
    {        
        //$country = Country::where('name', 'Brasil')->get()->first();
        
        $keySearch = 'a';

        $countries = Country::where('name', 'LIKE', "%{$keySearch}%")->with('states')->get();

        foreach ($countries as $country)
        {
            echo "<b>{$country->name}</b>";

            $states = $country->states;
    
            foreach ($states as $state)
            {
                echo "<hr>{$state->initials} - {$state->name}:";

                foreach ($state->cities as $city)
                {
                    echo " {$city->name}, ";
                }
            }    
            echo '<hr>';         
        }               
    }

    public function oneToManyInsert()
    {
        $dataForm = [
            'name'     => 'Bahia',
            'initials' => 'BA',
        ];

        $country = Country::find(1);
        
        $insertState = $country->states()->create($dataForm);        
    }

    public function hasManyThrough()
    {
        $country = Country::find(1);

        echo "<b> {$country->name} :</b> <br>";

        $cities = $country->cities;
        
        foreach ($cities as $city)
        {
            echo " {$city->name} , ";
        }
        echo " <br>Total cidades: {$cities->count()}";
    }
}
