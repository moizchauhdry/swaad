<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\SiteConfiguration;

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

        $site = SiteConfiguration::first();

        $details = [
            'title' => 'Reservation - swaadbern.ch',
            'body' => $rsv->status == 'ACCEPTED' ? $site->rsv_accepted_msg : $site->rsv_rejected_msg
        ];

        \Mail::to($rsv->email)->send(new \App\Mail\GeneralMail($details));

        return redirect()->back()->with('success','The reservation status updated & email have been sent to user successfully.');
    }
}
