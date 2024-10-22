<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    function index(){
        return view('welcome');
    }
    function about(){
        return view('about');
    }
}
