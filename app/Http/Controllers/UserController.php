<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        if(!Auth::check()) return;
    }

    public function index()
    {
        $user = Auth::user();
        return view("users.edit", ["user" => $user]);
    }

    public function update(Request $request)
    {
        $email = $request->input("email");
        $name = $request->input("name");
        $size = $request->input("partySize");

        $user = Auth::user();
        if(isset($email) && $user->email !== $email)
        {
            $user->email = $email;
        }

        if(isset($name) && $user->name !== $name) {
            $user->name = $name;
        }

        if(isset($size) && $user->party_size !== $size)
        {
            $user->party_size = $size;
        }
        $user->save();

        return back()->with("success", "Profile details updated");
    }
}
