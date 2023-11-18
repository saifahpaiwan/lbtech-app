<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    { 
        $data = blog::where('status', 1)->where('id', 3)->first();
        return view('index', compact('data'));
    }

}
