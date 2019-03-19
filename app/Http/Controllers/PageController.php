<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    function getLogin(){
        return view('user.login');
    }
    function getRegister(){
        return view('user.register');
    }
}
