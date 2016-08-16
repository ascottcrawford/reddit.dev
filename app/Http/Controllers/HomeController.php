<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function showWelcome() {
        return view('welcome');
    }


    public function rollDice($guess)
    {
        $dicenumber = rand(1, 6);

            $data = [
                'dicenumber' => $dicenumber,
                'guessnumber' => $guessnumber
            ];

        // multiple values
        return view('roll-dice')->with($data);
    }

    public function upper($name)
     {
         $upper = strtoupper($name);
         $data = [
             'upper' => $upper
         ];
         return view('uppercase')->with($data);
     }
}
