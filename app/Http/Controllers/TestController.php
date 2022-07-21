<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function Test(){
        // $user= User::all()->toArray();
        // dd($user);
        return view("test");
    }
}
