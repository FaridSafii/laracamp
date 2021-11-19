<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Checkout;
use Illuminate\Support\Facades\Mail;
use App\Mail\Checkout\Paid;

class CheckoutController extends Controller
{
  public function update(Request $request,Checkout $checkout)
  {
      //update paid on checkout
      $checkout->is_paid=true;
      $checkout->save();

      //send email
      Mail::to($checkout->User->email)->send(new Paid($checkout));
      $request->session()->flash('success',"Checkout with ID {$checkout->id} has been update ");
      return redirect(route('admin.dashboard'));
  }  
}
