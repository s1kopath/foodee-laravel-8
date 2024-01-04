<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        return view('Backend.coupon.add');
    }
    public function save(Request $request)
    {
        Coupon::create([
            'coupon_code' => $request -> coupon_code,
            'coupon_type' => $request -> coupon_type,
            'coupon_value' => $request -> coupon_value,
            'cart_min_value' => $request -> cart_min_value,
            'expired_on' => $request -> expired_on,
            'coupon_status' => $request -> coupon_status,
            'added_on' => $request -> added_on
        ]);

        return back()-> with('sms', 'Coupon Code saved.');
    }
    public function manage()
    {
        $coupons = Coupon::all();
        return view('Backend.coupon.manage', compact('coupons'));
    }
    public function coupon_delete($id)
    {
        $coupon = Coupon::find($id);
        $coupon->delete();
        return back()->with('sms','Deleted Successfully');
    }
    public function status_update($id, $status)
    {
        $coupon = Coupon::find($id);
        if ($coupon->coupon_status == 1) {
            $coupon->update([
                'coupon_status' => $status
            ]);
        }
        else {
            $coupon->update([
                'coupon_status' => $status
            ]);
        }
        
        return back();
    }

    public function update(Request $request)
    {
        $coupon = Coupon::find($request->id);
        $coupon->update([
            'coupon_code' => $request -> coupon_code,
            'coupon_value' => $request -> coupon_value,
            'cart_min_value' => $request -> cart_min_value,
        ]);
        if ($request -> coupon_type != null) {
            $coupon->update([
                'coupon_type' => $request -> coupon_type,
            ]);
        }
        return redirect()->back()->with('sms','Updated Successfully');
    }
}
