<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    function default() {
        return view('welcome');
    }

    function index() {
        return view('index');
    }
}
