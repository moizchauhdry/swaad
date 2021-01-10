<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class CustomerController extends Controller
{
    public function index() {
        $customers = User::orderBy('id','DESC')->get();
        return view('admin.customers.index',compact('customers'));
    }

    public function customerSuspendAccount(Request $request) {
        $customer = User::find($request->customer_id);
        if ($customer->status == 1) {
            $customer->update(['status' => '0']);
        } else {
            $customer->update(['status' => '1']);
        }
        return TRUE;
    }
    
}
