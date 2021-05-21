<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SinglePageController extends Controller
{
    /**
     * controller for single page application
     * 
     * 
     */
    public function index(){
        return view('app');
    }
}
