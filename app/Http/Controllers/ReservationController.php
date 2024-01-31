<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use App\Models\Livre;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    //
    public function show(){
            $reservations =Reservation::paginate(6);;
            return view('backOffice.reservations' , compact('reservations'));
    }


    public function stor(Request $request)
    {
        $request->validate([
            'startDate' => ['required', 'date'],
            'endDate' => ['required', 'date', 'after_or_equal:startDate'],
        
        ]);

      

        $available = Reservation::where('id_livre', $request->book_id)
                ->where('date_start', '<=', $request->endDate)
                ->where('date_fin', '>=', $request->startDate)
                ->count() == 0;

        if ($available) {
            Reservation::create([
                'id_livre' => $request->book_id,
                'id_user' => Auth::id(),
                'date_start' => $request->startDate,
                'date_fin' => $request->endDate,
                'statut' => 'reserved',
            ]);

            Session::flash('success', 'Reservation successful.');
        } else {
            Session::flash('error', 'The book is already reserved for the specified date range.');
        }

        return redirect()->back();
    }
        
}
