<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        return view('user_index');
    }

    public function save(Request $request,CreateNewUser $creater){
        $user=$creater->create($request->all());
        Auth::login($user);
        // return redirect('/attendance');
        return redirect('/');
    }
}
