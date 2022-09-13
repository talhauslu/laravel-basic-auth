<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function registrationProcess(Request $request){

        $request->validate([
            'username' => 'required|unique:users,username|min:3',
            'email' => 'required|unique:users,email|min:7',
            'password' => 'required|min:5|max:12',
            'password-check' => 'same:password',
        ]);

        $data = new User();
        $data->username = $request->username;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->active = 0;
        $data->save();
        $request->session()->flash('success', ['You have signed up succesfully.']);

        $user = User::query()->where('username', $request->username)->first();
        Auth::login($user);
        return redirect()->route('dashboard',[$user->id]);

        // return $request->username. " & " .$request->email. " & " .$request->password;
    }
    public function loginProcess(Request $request){

        $request->validate([
            'username' => 'required|min:3',
            'password' => 'required|min:5|max:12',
        ]);

        $user = User::query()->where('username', $request->username)->first();
        if(!$user) {
            return back()->withErrors('Invalid username or password.');
        }

        if(Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->route('dashboard',[$user->id]);
            Session::push('user', $user->username);
        } else {
            return back()->withErrors('Invalid username or password.');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('loginform');
    }

    public function dashboard(Request $request){
        return view('dashboard');
    }

}
