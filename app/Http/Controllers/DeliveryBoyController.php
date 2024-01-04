<?php

namespace App\Http\Controllers;

use App\Models\DeliveryBoy;
use Illuminate\Http\Request;

class DeliveryBoyController extends Controller
{
    public function index()
    {
        return view('Backend.deliveryBoy.add');
    }
    public function save(Request $request)
    {
        DeliveryBoy::create([
            'delivery_boy_name' => $request -> delivery_boy_name,
            'delivery_boy_phone_number' => $request -> delivery_boy_phone_number,
            'delivery_boy_password' => $request -> delivery_boy_password,
            'delivery_boy_status' => $request -> delivery_boy_status,
            'added_on' => $request -> added_on
        ]);

        return back()-> with('sms', 'Delivery Boy saved.');
    }
    public function manage()
    {
        $boy = DeliveryBoy::all();
        return view('Backend.deliveryBoy.manage', compact('boy'));
    }
    public function boy_delete($id)
    {
        $boy = DeliveryBoy::find($id);
        $boy->delete();
        return back()->with('sms','Deleted Successfully');
    }
    public function status_update($id, $status)
    {
        $boy = DeliveryBoy::find($id);
        if ($boy->delivery_boy_status == 1) {
            $boy->update([
                'delivery_boy_status' => $status
            ]);
        }
        else {
            $boy->update([
                'delivery_boy_status' => $status
            ]);
        }
        
        return back();
    }

    public function update(Request $request)
    {
        $boy = DeliveryBoy::find($request->id);
        $boy->update([
            'delivery_boy_name' => $request -> delivery_boy_name,
            'delivery_boy_phone_number' => $request -> delivery_boy_phone_number
        ]);
        return redirect()->back()->with('sms','Updated Successfully');
    }
}
