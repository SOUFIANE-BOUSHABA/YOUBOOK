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
}
