<?php

namespace App\Http\Controllers;
use App\Models\Camp;
use App\Models\CampBenefit;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $satu = Camp::with('CampBenefit')->where('id',1)->get();
        $dua = Camp::with('CampBenefit')->where('id',2)->get();
        //return $satu;
        return view('welcome',[
            'satu'=>$satu,
            'dua'=>$dua
        ]);
    }
}
