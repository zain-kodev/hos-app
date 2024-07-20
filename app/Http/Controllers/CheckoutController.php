<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Jobs\SendNewOrderEmail;
use App\Jobs\SendRQsByEmail;
use App\Mail\NewOrderEmail;
use App\Models\Order;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Moyasar\Facades\Payment;

class CheckoutController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if ($user->shopping_cart->isEmpty()) { //el carrito esta vacio
            return Redirect::route('shopping-cart.index');
        }
        $cities = DB::table('cities')->get();
        return Inertia::render('Checkout/Checkout', [
            'products' => ProductResource::collection($user->shopping_cart),
            'meta' => $user->shopping_cart_total,
            'cities' => $cities
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'note' => 'nullable|string|max:1000',
            'city' => 'required|string|max:255',
        ]);

        //dd($request->all());
        //DB::beginTransaction();
        $lastRecord = Order::latest()->first();
        $order = new Order();
        $user = auth()->user();
        $user->forceFill([
            'city' => $request->city,
        ])->save();
        $order->user()->associate($user->id);

        $order->phone = $request->phone;
        $order->note = $request->note;
        $order->address = $request->address;
        //dd($user->shopping_cart);
        $order->products = $user->shopping_cart->map(function ($item, $key) {
            return [
                'name' => $item->name,
                'price' => $item->price,
                'quantity' => $item->pivot->quantity,
                'total_price_quantity' => $item->pivot->total_price_quantity,
                'variations' => $item->pivot->variations
            ];
        });

        $total_price = $user->shopping_cart_total; //mutator

        if ($total_price['discount']) {
            $discount = $total_price['discount'];
            $order->discount = [
                'code' => $discount['code'],
                'type' => $discount['type'],
                'value' => $discount['value'],
                'applied' => $discount['applied'],
            ];
        }
        //dd($total_price['tax_percent']);
        // $order->tax_percent = $total_price['tax_percent'];
        //$order->tax_amount = $total_price['tax_amount'];
        //$order->shipping = $total_price['shipping'];
        $order->sub_total = $total_price['sub_total'];
        $order->total = $total_price['total'];
        //$order->order = rand(1000, 9999) . date('md') . $user->id;
        $order->order = $lastRecord->order + 1;

        $order->save();

        session()->forget('discount_code');
        Mail::to($user)->send(new NewOrderEmail($order));
        //SendNewOrderEmail::dispatch($order)->afterResponse();
        return Redirect::route('order-details', [$order->order])->with(
            'success',
            'اكتمل الطلب بنجاح'
        );
    }

    public function thanksPayment (Request $request)
    {

        $id = $request->id;
        $status = $request->status;
        //$amount = $request->amount;
        $message = $request->message;
        //dd($id);


        $payment =  Payment::fetch($id);
        //dd($payment);
        $re = $payment->metadata['order'];
        if ($status == 'paid'){

            Order::where('order',$re)->update([
                'invoice_id' => $id,
                'paid' => 'yes'
            ]);

            $order = Order::where('order',$re)->with('user')->first();
            $tody = Carbon::today();
            $Order3['Bennar'] = $order->order;
            $Order3['Bank'] = '---';
            $Order3['FileCode'] = $order->order;
            $Order3['DRP'] = \Carbon\Carbon::parse($tody)->format('F d, Y');
            $Order3['Name'] = $order->user->name;
            $Order3['Email'] = $order->user->email;
            $Order3['City'] = $order->user->city;
            $Order3['Phone'] = $order->user->phone ? :'-----';
            $Order3['RQS'] = 1;
            $Order3['SOA'] = $order->total;
            $Order3['currency'] = 'SAR';
            $Order3['total'] = $order->total;
            SendRQsByEmail::dispatch($Order3);
            return Redirect::route('order-details', [$re])->with(
                'success',
                ' تمت عملية الدفع  بنجاح ، سيتم ارسال سند استلام المبلغ على ايميلك'
            );
        }else{
            return Redirect::route('order-details', [$re])->with(
                'error',
                'لم تتم عملية الدفع حاول مرة اخرى'
            );
        }
    }
}
