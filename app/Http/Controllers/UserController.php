<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmaiLinkReset;
use Password;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function login()
    {
        return view('/login');
    }
    // -------------------- Login action -----------------------
    function login_action(Request $request)
    {
        $request->validate([

            'email' => 'required|email',
            'password' => 'required',

        ]);
        $credentials = $request->only('email', 'password');


        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            return view('home');
        }

        return back()->withErrors([
            'email' => 'Thông tin đăng nhập không chính xác.',
        ]);
    }






    public function showLinkRequestForm()
    {
        return view('password_reset');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);
        $user = User::where('email', $request->email)->first();
        $token = Password::createToken($user);

        // Mail::to($user->email)->send(new SendEmailLinkReset($token, $user->email));
        Mail::to($user->email)->send(new SendEmaiLinkReset('success', $token, $user->email));

        return back()->with('status', 'Password reset link has been sent to your email!');
    }

    public function showResetForm($token)
    {
        return view('form_reset_password')->with(['token' => $token]);
    }

    public function reset(Request $request)
    {

        $request->validate([
            'token' => 'required',
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        $password = $request->only('password');

        if ($user->email == $request->email) {
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect()->route('login')->with('status', 'Your password has been reset!');

        }

        return back()->withErrors(['token' => 'Invalid token.']);
    }

    function updateNewPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'token' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        // Tìm người dùng bằng email và token
        $user = DB::table('users')->where('email', $request->email)->first();

        if ($user && Hash::check($request->token, $user->reset_token)) {
            $user->password = $request->password;
            $user->save();

            // Thông báo thành công
            return redirect()->route('login')->with('status', 'Password updated successfully!');
        }

        return back()->withErrors(['token' => 'Invalid token or email']);
    }
}
