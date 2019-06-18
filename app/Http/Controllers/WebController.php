<?php

namespace App\Http\Controllers;
use App\meldingen;
use Illuminate\Http\Request;

class WebController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Haalt alle meldingen op voor WEB, met de categorie Web.
        $meldingen = meldingen::where('categorie', 'web')->get();


        // laat alle meldingen op de view web zien.
        $view = view('web');
        $view->meldingen = $meldingen;
        //haalt de view 'web' op
        return $view;


    }
}
