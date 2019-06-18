<?php

namespace App\Http\Controllers;
use App\meldingen;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class DataController extends Controller
{
    function index()
    {
        // Haalt alle data van de meldingen op
        $meldingen = meldingen::all();
        // Zet het op de Home view ( homepagina )
        $view = view('home');
        $view->meldingen = $meldingen;

        return $view;
    }

}


