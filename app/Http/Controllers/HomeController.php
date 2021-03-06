<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quiz; 

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home')->with(array(
          'quizzes' => Quiz::all(),
        ));
    }
}
