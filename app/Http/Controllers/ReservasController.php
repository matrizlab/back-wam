<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservasController extends Controller
{
    function index(){

        return view('reservas');
    }
}
