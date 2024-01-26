<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin/login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only(['name', 'password']);

        if (Auth::guard('admins')->attempt($credentials)) {
            return redirect("/admin");
        }
        ;
        return back()->withErrors([
            'login' => ['ログインに失敗しました'],
        ]);
    }

    public function main()
    {
        $users = User::all();
        return view('admin.main', compact('users'));
    }
    public function delete(Request $request)
    {
        $id = $request->only('user_id');
        User::where('id', $id)->delete();
        return redirect('/admin');
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

    public function mail(Request $request)
    {
        Mail::to($request->email)->send(new SendMail($request));

        return redirect('/admin') -> with('message', 'メール送信しました');
    }
}
