<?php

namespace App\Http\Controllers;
use App\meldingen;
use Illuminate\Http\Request;

class BeheerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // Haalt alle meldingen op voor BEHEER, met de categorie beheer.
    public function index()
    {
        $meldingen = meldingen::where('categorie', 'beheer')->get();


        // laat alle meldingen op de view beheer zien.
        $view = view('beheer');
        $view->meldingen = $meldingen;
        // laat de view beheer zien
        return $view;


    }
}
