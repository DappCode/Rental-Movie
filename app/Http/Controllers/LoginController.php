<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movies;

class LoginController extends Controller
{
    
    public function index()
    {
        return Movies::find(1);



    }


}
