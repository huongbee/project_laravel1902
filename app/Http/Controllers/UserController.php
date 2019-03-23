<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Hash;
use Auth;
use Mail;

class UserController extends Controller
{
    function postResetPassword(Request $req){
        //compare password
        // validator
        if($req->password != $req->password_confirmation){
            return redirect()->back()->with('error','Password confirmation not match');
        }
        //find user
        $user = User::where('email',$req->email)->first();
        if(!$user){
            return redirect()->back()->with('error','Cannot find');
        }
        //update password
        $user->password = Hash::make($req->password);
        //delete token
        $user->remember_token = null;
        $user->save();
        return redirect()->route('login')->with('success','Password updated!');
    }
    function getResetPassword($token){
        if(!isset($token) || $token=='') return \abort(404);
        //find user
        $user = User::where('remember_token',$token)->first();
        if(!$user){
            return \abort(404);
        }
        $email = $user->email;
        return view('user.reset-password',compact('email'));
    }
    function sendMailForgetpassword(Request $req){
        //validate
        $user = User::where('email',$req->email)->first();
        if($user){
            //save token 
            $token = csrf_token();
            $user->remember_token = $token;
            $user->save();

            $link = "http://localhost:8000/reset-password/$token";
            //send mail
            Mail::send( 'user.mail-content', 
                        ['user' => $user, 'link'=>$link],
                        function ($message) use($user){
                $message->from('huonghuong08.php@gmail.com', 'Admin 1902');
                $message->to($user->email,$user->fullname);
                $message->subject('Admin 1902 Reset Password');
            });
            return redirect()->back()->with('success','Check your email to reset password');
        }
        else return redirect()->back()->with('error','Cannot find user');
    }

    function getForgetPassword(){
        return view('user.forget-password');
    }
    function logout(){
        Auth::logout();
        return redirect('login');
    }
    function getLogin(){
        return view('user.login');
    }
    function postLogin(Request $req){
        //required pw
        $username = $req->username;
        $password = $req->password;
        // dd($req->only('username','password'));
        if(\Auth::attempt(['username'=>$username,'password'=>$password])){
            return redirect('/');
        }
        else{
            return redirect()->route('login')
                    ->with('error','Login fail!!');
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


    public function redirectToProvider($providers){
        return \Socialite::driver($providers)->redirect();
    }
      public function handleProviderCallback($providers){
        try{
            $socialUser = \Socialite::driver($providers)->user();
            //return $user->getEmail();
        }
        catch(\Exception $e){
            // dd($e->getResponse()->getBody()->getContents());
            return redirect()->route('login')->with(['error'=>"Đăng nhập không thành công"]);
        }
        // dd($socialUser);
        // kiem tra db ton tai email hay chua
        // neu chua ton tai => luu tai khoan
        // model SocialProvider
        $socialProvider = \App\SocialProvider::where('provider_id',$socialUser->getId())->first();
        if(!$socialProvider){
            //tạo mới
            $user = User::where('email',$socialUser->getEmail())->first();
            if($user){
              return redirect()->route('login')->with('error',"Email đã có người sử dụng");
            }
            else{
                $user = new User();
                $user->email = $socialUser->getEmail();
                $user->username = $socialUser->getEmail();
                $user->fullname = $socialUser->getName();
                    //   if($providers == 'google'){
                    //     $image = explode('?',$socialUser->getAvatar());
                    //     $user->avatar = $image[0];
                    //   }
                    //   $user->avatar = $socialUser->getAvatar();
                $user->save();
            }
            //
            $provider = new \App\SocialProvider();
            $provider->provider_id = $socialUser->getId();
            $provider->provider = $providers;
            $provider->email = $socialUser->getEmail();
            $provider->save();
        }
        else{
            $user = User::where('email',$socialUser->getEmail())->first();
        }
        Auth()->login($user);
        return redirect('/')->with('success',"Đăng nhập thành công");
      }
}
