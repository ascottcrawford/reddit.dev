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

    public function uppercase($word = 'Crazy')
     {
         
         return view('uppercase')->with('word', $uppercase);
     }

     public function increment($number = 0)
     {
        $number += 1;
        return view('increment')->with('number', $number);
     }

}
