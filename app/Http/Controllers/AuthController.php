<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;




class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function login(){
        return view('auth.login');
    }

    public function signUp(){
        return view('auth.register');
    }





    public function loginUser(Request $request)
    {

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->put('id', Auth::user()->id);
            $request->session()->put('name', Auth::user()->name);
            return redirect()->route('index');
        } else {
            return redirect()->route('login');
        }

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */




    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|unique:users',
            'address' => 'required',
            'password' => 'required',
        ]);
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        $user->address = $request->input('address');

        $user->password = $request->input('password');
        $user->save();
        return redirect()->route('login');
    }



    public function logOut(Request $request){

        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
