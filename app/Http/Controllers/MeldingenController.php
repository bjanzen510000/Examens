<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Meldingen;

class MeldingenController extends Controller
{
    // Meldingen worden gemaakt op de view meldingen
    public function create()
    {
        return view('meldingen');
    }
    // Slaat de melding op.
    public function storeMelding()
    {
        //nieuwe melding wordt gemaakt met alle gegevens.
        $meldingen = new Meldingen();

        $meldingen->id = request('id');
        $meldingen->bedrijfsnaam = request('bedrijfsnaam');
        $meldingen->contactpersoon = request('contactpersoon');
        $meldingen->telefoonnummer = request('telefoonnummer');
        $meldingen->domeinnaam = request('domeinnaam');
        $meldingen->beschrijving = request('beschrijving');
        $meldingen->categorie = request('categorie');
        $meldingen->status = 'aangemeld';
        $meldingen->user_id = auth()->user()->id;

        // melding wordt opgeslagen
        $meldingen->save();
        // geeft melding wanneer is verzonden:
        return back()->with('status', 'Uw melding is ontvangen, bekijk de status op de pagina "Mijn Meldingen".');


    }
    // Functie om alleen de meldingen van de gebruiker te laten zien op de pagina mijn meldingen
    public function mijnMeldingen()
    {
        $meldingen = meldingen::where('user_id', auth()->user()->id)->get();

        $view = view('home');
        $view->meldingen = $meldingen;

        return $view;
    }
    // Functie om de smiley te bewerken
    public function bewerkSmiley($id)
    {
        // Zoekt de id van de melding
        $melding = meldingen::find($id);
        // Vraagt de smiley op
        $melding->smiley = request('smiley');
        $melding->save();
        // stuurt terug
        return redirect()->back();
    }
    // Functie om de status te bewerken
    public function bewerkStatus($id)
    {
        //zoekt de id
        $melding = meldingen::find($id);
        //vraagt de status op
        $melding->status = request('status');
        // slaat de status op
        $melding->save();
        // bericht dat de status is bijgewerkt.
        return redirect()->back()->with('status', 'De status is bijgewerkt');
    }

};