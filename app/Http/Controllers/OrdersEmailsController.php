<?php

namespace App\Http\Controllers;

use App\Jobs\SendNewOrderEmail;
use App\Mail\NewOrderEmail;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OrdersEmailsController extends Controller
{
    public function newOrderEmail(){
        $order = Order::find(82);
        //dd($order->products);
        //$json = json_encode($order->products); // Convert array to JSON string
        //$products = json_decode($json);
        //SendNewOrderEmail::dispatch($order)->afterResponse();
        //Mail::to($order->user->email)->send(new NewOrderEmail($order));
        //SendNewOrderEmail::dispatch($order)->afterResponse();
        return (new NewOrderEmail($order))->render();

       // return "done";
    }
}
