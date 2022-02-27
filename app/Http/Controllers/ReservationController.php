<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::orderBy('id','DESC')->get();
        return view ('admin.reservations.index',compact('reservations'));
    }

    public function status(Request $request)
    {
        $rsv = Reservation::find($request->rsv_id);
        $rsv->update(['status' => $request->status]);

         $details = [
            'title' => 'Reservation - swaadbern.ch',
            'body' => 'This is for testing email using smtp'
        ];

        \Mail::to($rsv->email)->send(new \App\Mail\GeneralMail($details));

        return redirect()->back()->with('success','The reservation status updated & email have been sent to user successfully.');
    }
}
