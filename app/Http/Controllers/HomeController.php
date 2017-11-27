<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $movies = $this->movie->with('movies')->orderBy('id','DESC')->paginate(10);

        return view('movies.index', compact('movies'));
    }
}
