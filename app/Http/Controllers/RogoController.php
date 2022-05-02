<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class rogocontroller extends Controller
{
    public function index()
    {
        $title = "Hello View!";
        return view("main", compact("title"));
    }
}
