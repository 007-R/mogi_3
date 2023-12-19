<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();
        $user_info = User::find($user_id);
        $sell_items = Item::where('user_id', $user_id)->get();
        $purchase_items = Purchase::where('user_id', Auth::id())->get();
        return view("mypage", compact('user_info', "sell_items", "purchase_items"));
    }
    public function profile()
    {
        $user_id = Auth::id();
        $user_info = User::find($user_id);
        return view("profile", compact('user_info'));
    }
    public function update(Request $request)
    {
        /*dd($request->all());*/
        $user_id = Auth::id();
        $user_info = User::find($user_id);

        if ($request->file('image')) {
            $request->file('image')->storeAs('public/user/', $user_info -> email . ".jpg");
            User::find($user_id)->update(['image' => "storage/user/" . $user_info->email . '.jpg']);
        }
        if ($request->user_name) {
            $user_info->update(['name' => $request->user_name]);
        }
        if ($request->postcode) {
            $user_info->update(['postcode' => $request->postcode]);
            if ($request->address) {
                $user_info->update(['address' => $request->main]);
            }
            if ($request->building) {
                $user_info->update(['building' => $request->building]);
            }
            return redirect('/mypage');
        }
    }
}