<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    //
    public function getLogin(){
        return view("backend/login");
    }
    public function postLogin(LoginRequest $LoginRequest){
        
        // $rules = [
        //     "email"=>"required|email",
        //     "password"=>"required|min:3|max:6"
        // ];
        // $messages = [
        //     "email.required"=>"Email không được để trống !",
        //     "email.email"=>"Email không hợp lệ !",
        //     "password.required"=>"Mật khẩu không được để trống !",
        //     "password.min"=>"Mật khẩu không được ít hơn 2 ký tự !",
        //     "password.max"=>"Mật khẩu không được nhiều hơn 6 ký tự !",
        // ];
        // $request->validate($rules, $messages);
        
        // $users = DB::table('users')
        //     ->where("email", $request->email)
        //     ->where("password", $request->password)
        //     ->get()
        //     ->toArray();
        $email = $LoginRequest->email;
        $password = $LoginRequest->password;
        if(Auth::attempt(['email' => $email, 'password' => $password])){
            // $request->session()->put("email", $request->email);
            return redirect("/admin");
        }
        else{
            return redirect()->back()->withErrors("Tài khoản không hợp lệ !");
        }
    }
}
