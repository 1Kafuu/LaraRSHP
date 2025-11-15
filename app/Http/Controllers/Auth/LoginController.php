<?php

namespace App\Http\Controllers\Auth;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class LoginController extends Controller
{

    use AuthenticatesUsers;

    // protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }


    public function showLoginForm() {
        return view ('auth.login');
    }

    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:2',
        ]);

        if($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        

        $user = User::with(['role_user'=>function($query) {
                 $query->where('status', 1);
        }, 'role_user.role'])
        ->where('email', $request->input('email'))
        ->first();
        
        if (!$user) {
            return redirect()->back()
                ->withErrors(['email'=>'Email tidak ditemukan'])
                ->withInput();
        }

        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()
                ->withErrors(['password'=>'Paswword salah.'])
                ->withInput();
        }

        $namaRole = Role::where('idrole', $user->role_user[0]->idrole ?? null)->first();

        Auth::login($user);

        $request->session()->put('user', [
            'id' => $user->iduser,
            'name' => $user-> nama,
            'email' => $user->email,
            'role' => $user->role_user[0]->idrole ?? 'user',
            'role_name' => $namaRole->nama_role ?? 'User',
            'status' => $user->role_user[0]->status ?? 'active'
        ]);

        return redirect('/home')->with('success', 'Login Berhasil');
    }

    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Logout berhasil');
    }
}
