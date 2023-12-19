<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;
use App\Models\Purchase;
use App\Models\Payment;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function purchase_info($id)
    {
        $item_id = $id;
        $item = Item::find($item_id);
        $purchase_user_id = Auth::id();
        $address_id = User::find($purchase_user_id)->address_id;
        $address = Address::find($address_id);
        $payment = Payment::find(1);

        return view('purchase_info', compact('item', 'address', 'payment'));
    }
    public function pay_select($id)
    {
        $payments = Payment::all();
        $item_id = $id;
        return view('pay_setting', compact('payments', 'item_id'));
    }
    public function pay_set($id, Request $request)
    {
        $item_id = $id;
        $item = Item::find($item_id);
        $purchase_user_id = Auth::id();
        $address_id = User::find($purchase_user_id)->address_id;
        $address = Address::find($address_id);
        $payment = Payment::find(1);

        return view('purchase_info', compact('item', 'address', 'payment'));
    }

    public function address_input($id)
    {
        $item_id = $id;
        return view('address_setting', compact('item_id'));
    }

    public function address_set($id, Request $request)
    {
        $item_id = $id;
        $item = Item::find($item_id);
        $address_input = $request->only(['postcode', 'address', 'building']);
        Address::create($address_input);
        $address = Address::latest()->first();
        $payment = Payment::find(1);
        return view('purchase_info', compact('item', 'address', 'payment'));
    }

    public function order($id, Request $request)
    {
        $item_id = $id;
        $purchase_user_id = Auth::id();
        $address_id = $request->address_id;
        $payment_id = $request->payment_id;

        Purchase::create(['item_id'=> $item_id, 'user_id'=> $purchase_user_id, 'address_id'=>$address_id , 'payment_id'=>$payment_id]);
        return redirect('/')->with('message', '注文を受け付けました');
    }
}
