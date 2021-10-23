<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\verifyOtpRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create(){
        return view('client.register.create',[
            'title' => 'ثبت نام',
        ]);
    }
    public function virifyotp(verifyOtpRequest $request,User $user){
        if(Hash::check($request->get('otp'),$user->password)){
            auth()->login($user);
            return redirect(route('client.index'));
        }
        return back()->withErrors(['otp' => 'کد وارد شده صحیح نیست.']);
    }
    public function sendemail(RegisterRequest $request){
        $user = User::genrateOtp($request->get('email'));
        return redirect(route('client.register.otp',$user));
    }
    public function otp(User $user){
        return view('client.register.otp',[
            'user' => $user,
            'title' => 'ورود'
        ]);
    }
}
