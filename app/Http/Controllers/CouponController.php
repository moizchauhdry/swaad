<?php

namespace App\Http\Controllers;

use App\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::orderBy('id','desc')->get();
        return view('admin.coupons.index',get_defined_vars());
    }
    public function create()
    {
        return view('admin.coupons.create');
    }
    public function store(Request $request)
    {
        $coupon = new Coupon();
        $coupon->name= $request->name;
        $coupon->type=$request->type;
        $coupon->amount=$request->value;
        $coupon->status=$request->status;
        $coupon->save();
        return redirect()->route('coupons.index')->withSuccess('Coupon Added Successfully');
    }
    public function edit($id)
    {
        $coupon = Coupon::find($id);
        return view('admin.coupons.edit',get_defined_vars());
    }
    public function update(Request $request,$id)
    {
        $coupon = Coupon::find($id);
        $coupon->name= $request->name;
        $coupon->type=$request->type;
        $coupon->amount=$request->value;
        $coupon->status=$request->status;
        $coupon->update();
        return redirect()->route('coupons.index')->withSuccess('Coupon Updated Successfully');
    }
    public function destroy(Request $request)
    {
        Coupon::where('id', $request->coupon_id)->delete();
        return response()->json(['status' => 1, 'message' => 'Record deleted successfully.']);
    }
}
