<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function index(){
        return view("backend/index");
    }
    public function logout(Request $request){
        // $request->session()->forget("email");
        Auth::logout();
        return redirect("/login");
    }
}
