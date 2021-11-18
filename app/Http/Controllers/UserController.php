<?php

namespace App\Http\Controllers;
use Laravel\Socialite\Facades\Socialite;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\User\AfterRegister;


use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login()
    {
        return view('auth.user.login');
    }

    public function google()
    {
       return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        $callback = Socialite::driver('google')->stateless()->user();
        $data = [
            'name' => $callback->getName(),
            'email' => $callback->getEmail(),
            'avatar' => $callback->getAvatar(),
            'email_verified_at' => date('Y-m-d H:i:s', time()),
        ];
        //$user = User::firstOrCreate(['email'=> $data['email']],$data);
        $user = User::whereEmail($data['email'])->first();
        if (!$user) {
            $user = User::create($data);
           Mail::to($user->email)->send(new AfterRegister($user));
        }
        Auth::login($user, true);
        return redirect(route('home'));
    }
}
