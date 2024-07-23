<?php

namespace App\Http\Controllers\BackEnd;

use App\Helpers\OnlineStore;
use App\Http\Controllers\Controller;
use App\Mail\AcceptOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class InvoiceController extends Controller
{
    public function ViewInvoice(Request $request){
        //OnlineStore::Invoice($request->order,$request->order_id);
        return OnlineStore::DownloadInvoicePdf($request->order_id);

    }


    public function MailInvoice(Request $request)
    {
        $db_ext = DB::connection('OnlineStoreDB');

        $order = $db_ext->table('ic_orders')
            ->join('ic_users','ic_users.id','=','ic_orders.user_id')
            ->select('ic_orders.*','ic_users.*', DB::raw('ic_orders.id as OID'))
            ->where('ic_orders.id',$request->order_id)
            ->first();

        // $response->headers->set('Content-Type', 'text/html');

        //dd($order);
        //return new \App\Mail\AcceptOrder($order);
        //return OnlineStore::generatePdf($request->order_id);
        Mail::to($order->email)->send(new AcceptOrder($order));
        //AcceptOrderJob::dispatch($order);
        //dd($result);
        //Log::info('Job dispatched successfully. Result: '.$result);
        //Artisan::call('queue:work');
        session()->flash('Flash','تم ارسال بريد الكتروني بالفاتورة');
        return redirect()->back();
    }


}
