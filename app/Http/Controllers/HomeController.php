<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Models\Compte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }

    public function resetPassword()
    {
        return view('reset_password');
    }

    public function resetPasswordPost(Request $request)
    {

        
        
        $id = Auth::user()->id;

        //dd($id);

        $compte = Compte::findOrFail($id);

        //dd($compte);

        if (Hash::check($request->old_password, $compte->password)) {
            $compte->password = Hash::make($request->input('new_password'));
            $compte->update();
            return redirect()->route('dashboard')->with('success', 'Votre mot de passe a été changer avec succée');

        } else {
            return redirect()->route('reset_password')->withErrors(['old_password' => 'Le mot de passe actuel est incorrect.']);
        }
    }

    public function profile(){
        $compte = Auth::user();
        return view('profile', compact('compte'));
    }
}
