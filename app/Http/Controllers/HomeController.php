<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
        return view('dashboard.index');
    }

    public function profile($id)
    {
        $user = User::findOrFail($id);
        return view('dashboard.profile',compact('user'));
    }

    public function profileUpdate(Request $request,$id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password == null ? $user->password : bcrypt($request->password),
            'kelamin' => $request->kelamin,
            'telp' => $request->telp,
            'alamat' => $request->alamat,
            'role' => $user->role == 'admin' ? 'admin' : 'customer',
        ]);


        return redirect("/home");
    }
    
}
