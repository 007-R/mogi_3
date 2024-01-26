<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddressRequest;
use App\Models\User;
use App\Models\Address;
use App\Models\Item;
use App\Models\Purchase;
use App\Models\Master;
use App\Models\Staff;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $user_info = User::find($user_id);
        $sell_items = Item::where('user_id', $user_id)->get();
        $purchase_items = Purchase::where('user_id', Auth::id())->get();
        $staff = Staff::with('master')->where('user_id', $user_id)->get();
        $masters = Master::where('user_id', $user_id)->get();
        return view("mypage", compact('user_info', "sell_items", "purchase_items", "masters", "staff"));
    }
    public function profile()
    {
        $user_id = Auth::id();
        $user_info = User::with('address')->find($user_id);
        /*dd($user_info);*/
        return view("profile", compact('user_info'));
    }
    public function update(AddressRequest $request)
    {
        $user_id = Auth::id();
        $user_info = User::find($user_id);
        if ($request->file('image')) {
            $request->file('image')->storeAs('public/user/', $user_info->email . ".jpg");
            User::find($user_id)->update(['image' => "storage/user/" . $user_info->email . '.jpg']);
        }
        if ($request->user_name) {
            $user_info->update(['name' => $request->user_name]);
        }
        if($user_info -> address_id){
            $address = Address::find($user_info -> address_id);
            if ($request->postcode) {
                $address->update(['postcode' => $request->postcode]);
            }
            if ($request->address) {
                $address->update(['address' => $request->address]);
            }
            if ($request->building) {
                    $address->update(['building' => $request->building]);
            }
        }else {
            Address::create($request->all());
            $address_id = Address::latest()->first()->id;
            $user_info->update(['address_id' => $address_id]);
            }
        return redirect('/mypage');
        }
    public function shop(Request $request)
    {
        Master::create($request->only('user_id', 'name', 'password'));
        return redirect('/mypage');
    }
}