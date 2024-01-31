<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livre;

class BookController extends Controller
{
    //
    public function showBooks(){
        $books =Livre::all();
        return view('backOffice.book' , compact('books'));
    }

    public function store(Request $request){
        $book =Livre::create([
            'titre'=> $request->name,
            'auteur'=> $request->auteur,
            'annee_publication'=> $request->annee_publication,
            'statut'=> 'ne pas reserver',
        ]);
        return redirect()->route('show.books');
    }
}
