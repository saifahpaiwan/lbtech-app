<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        // dd(" users index "); 
        return view('users.index');
    }

    public function create()
    {
        // dd(" users create ");
        return view('users.create');
    }

    public function edit($id)
    {
        // dd(" users edit ");
        return view('users.edit', compact('id'));
    }
}
