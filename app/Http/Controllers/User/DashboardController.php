<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Checkout;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $checkouts = Checkout::with('Camp')->whereUserId(Auth::id())->get();
        return view('user.dashboard',[
            'checkouts'=>$checkouts
        ]);
    }

    public function store(Request $request)
    {  
        //return $request;
        $data = $request->all();
        
        $user = Auth::user();
        $user->email = $data['email'];
        $user->name = $data['name'];
        $user->save();

        return view('user.profil'); 
    }
}
