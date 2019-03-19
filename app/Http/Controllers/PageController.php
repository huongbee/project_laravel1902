<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Hash;

class PageController extends Controller
{
    function getLogin(){
        return view('user.login');
    }
    function postLogin(Request $req){
        $email = $req->email;
        $password = $req->password;
        // $req->only('email','password');
        if(Auth::attempt(['email'=>$email,'password'=>$password])){
            // $user = Auth::user();
            // dd($user);
            return redirect('/');
        }
        else{
            echo 'khong tim thay';
        }
        
    } 
    function getRegister(){
        return view('user.register');
    }
    function postRegister(Request $req){
        $mess = [
            'email.required'=>'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',
            'email.min' => 'Email ít nhất :min kí tự',
            'email.unique'=> ':attribute đã có người sử dụng',
            'password_confirmation.same' => 'Password không giống nhau'
        ];
        $rules = [
            'email'=>'required|email|min:10|unique:users,email',
            'username'=>'required|min:3|unique:users',
            'password'=>'required|min:6',
            'password_confirmation' => 'same:password'
        ];
        $validator = Validator::make($req->all(),$rules,$mess);
        if($validator->fails())
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        else{

            $user = new User;
            $user->email = $req->email;
            $user->username = $req->username;
            $user->fullname = $req->fullname;
            $user->birthdate = $req->birthdate;
            $user->password = Hash::make($req->password);
            $user->save();
            return redirect()->route('login');
        }
    }  
}
// bcrypt