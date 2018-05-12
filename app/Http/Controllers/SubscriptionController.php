<?php

namespace App\Http\Controllers;

use App\Subscriber;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function subscribed(Request $request){
        
        $subscriber = new Subscriber;
        $subscriber->email=$request->email;
        $subscriber->lang=$request->lang;

        $subscriber->save();
    }
}
