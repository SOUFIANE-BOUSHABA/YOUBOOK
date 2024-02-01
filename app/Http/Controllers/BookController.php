<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livre;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Input;

class BookController extends Controller
{
    //
    public function showBooks(){
        $books =Livre::paginate(6);;
        return view('backOffice.book' , compact('books'));
    }

    public function showBooksForUser(){
        $books =Livre::paginate(20);
        return view('frontOffice.book' , compact('books'));
    }


    public function store(Request $request){
        $book =Livre::create([
            'titre'=> $request->name,
            'auteur'=> $request->auteur,
            'annee_publication'=> $request->annee_publication,
            'statut'=> 'disponible',
        ]);
        return redirect()->route('show.books');
    }



    public function delete($id){
        Livre::find($id)->delete();
        return redirect()->route('show.books');
    }



    public function updateBook(Request $request , $id){
        $book = Livre::find($id);
        $book->update([
            'titre'=> $request->name,
            'auteur'=> $request->auteur,
            'annee_publication'=> $request->annee_publication,
            
        ]);
        return redirect()->route('show.books');
    }



    public function showDetailBook($id){
        $book=Livre::find($id);
         return view('frontOffice.detail' , compact('book'));
    }



    public function search(Request $request){
        dd($request);
    return 'hhhhhhhhhhhhh';
    }
}
