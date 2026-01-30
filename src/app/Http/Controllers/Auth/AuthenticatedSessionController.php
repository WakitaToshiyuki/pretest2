<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controllers{
    public function store(Request $request){
        $request->authenticate();
        $request->session()->regenerate();
        // 管理者
        if (Auth::guard('manager')->check()) {
            return redirect()->intended('/admin/attendance/list');
        }
        // 一般ユーザー
        return redirect()->intended('/');
    }
}
