<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use App\Models\User;
use App\Models\Staff;


class MasterController extends Controller
{
    public function index()
    {
        return view('master/login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['name', 'password']);

        if (Auth::guard('masters')->attempt($credentials)) {
            return redirect("/master");
        }
        ;
        return back()->withErrors([
            'login' => ['ログインに失敗しました'],
        ]);
    }

    public function main()
    {
        $staff = Staff::with('user')->where('master_id', Auth::id())->get();

        $invited_staff = Staff::where('master_id', Auth::id())->get('user_id')->toArray();
        $invited_staff_id = [];
        foreach ($invited_staff as $s) {
            $invited_staff_id[] = $s['user_id'];
        }

        $potential_staff = User::whereNotIn('id', $invited_staff)->get();

        return view('master.main', compact('staff', 'potential_staff'));
    }
    public function delete(Request $request)
    {
        $user_id = $request->only('user_id');
        $master_id = $request->only('master_id');
        Staff::where('user_id', $user_id)->where('master_id', $master_id)->delete();
        return redirect('/master');
    }
    public function add(Request $request)
    {
        Staff::create($request->only('user_id', 'master_id'));
        return redirect('/master');
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
}
