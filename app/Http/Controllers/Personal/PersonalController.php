<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function index()
    {

        return view('personal.main.index');
    }
}
