<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Master;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin/login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['userid', 'password']);
        $guard = $request->guard;

        if (Auth::guard('administrators')->attempt($credentials)) {
            return redirect("admin/");
        }
        ;
        return back()->withErrors([
            'login' => ['ログインに失敗しました'],
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('login.index')->with([
            'auth' => ['ログアウトしました'],
        ]);
    }

    public function master_edit()
    {
        $masters = Master::all();
        return view('admin.master_edit', compact('masters'));
    }

    public function master_creation(Request $request)
    {
        $new_shop_id = Master::latest('shop_id')->first();
        $new_shop_id = $new_shop_id['shop_id'] + 1;

        Master::create([
            'name' => $request->name,
            'userid' => $request->userid,
            'shop_id' => $new_shop_id,
            'password' => $request->password
        ]);

        $masters = Master::all();
        return view('admin.master_edit', compact('masters'))->with('message', '代表者を新規登録しました');
    }
}
