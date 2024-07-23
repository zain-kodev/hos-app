<?php

namespace App\Http\Controllers\BackEnd;

use App\Helpers\OnlineStore;
use App\Helpers\ProHelpere;
use App\Jobs\AcceptOrderJob;
use App\Jobs\CreateNewProject;
use App\Mail\AcceptOrder;
use App\Models\ActivateFile;
use App\Models\BennarStatus;
use App\Models\Orders;
use App\Models\Packages;
use App\Models\PackageServices;
use App\Models\ProjectServices;
use App\Models\ProjectStages;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller as Controller;

use Symfony\Component\HttpFoundation\StreamedResponse;

class OrdersController extends Controller
{

    public function newOrders($filter_type = null, $filter = null): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $db_ext = DB::connection('OnlineStoreDB');

        $o = $db_ext->table('ic_orders')
            ->join('ic_users','ic_users.id','=','ic_orders.user_id')
            ->select('ic_orders.*','ic_users.*', DB::raw('ic_orders.id as OID, ic_orders.created_at as oca'))
            ->orderBy('ic_orders.created_at','desc');
        $cou = $db_ext->table('ic_orders')
            ->join('ic_users','ic_users.id','=','ic_orders.user_id')
            ->select('ic_orders.*','ic_users.*', DB::raw('ic_orders.id as OID, ic_orders.created_at as oca'))
            ->orderBy('ic_orders.created_at','desc')->get();

        if ($filter_type == 'type') {
            $o->where('ic_orders.state', $filter);
        }

        $o = $o->get();
        $users = $db_ext->table('ic_users')->get();
        $products = $db_ext->table('ic_products')->get();
        return view('online_store.orders.orders_list',compact('o','users','products','cou'));
    }

    public function orderDetails(Request $request)
    {
        $db_ext = DB::connection('OnlineStoreDB');

        $order = $db_ext->table('ic_orders')
            ->join('ic_users','ic_users.id','=','ic_orders.user_id')
            ->select('ic_orders.*','ic_users.*', DB::raw('ic_orders.id as OID, ic_orders.phone as Ophone, ic_orders.created_at as oca'))
            ->where('ic_orders.id',$request->id)
            ->first();
        $coupons = $db_ext->table('ic_discount_codes')->get();
        $products = $db_ext->table('ic_products')->where('active',1)->get();
        //OnlineStore::Invoice($order,$request->id);

       OnlineStore::generatePdf($order->OID);
        return view('online_store.orders.details',compact('order','coupons','products'));
    }

    public function orderEdit(Request $request)
    {
        $db_ext = DB::connection('OnlineStoreDB');

        $order = $db_ext->table('ic_orders')
            ->join('ic_users','ic_users.id','=','ic_orders.user_id')
            ->select('ic_orders.*','ic_users.*', DB::raw('ic_orders.id as OID, ic_orders.phone as Ophone'))
            ->where('ic_orders.id',$request->id)
            ->first();
        $coupons = $db_ext->table('ic_discount_codes')->get();
        $products = $db_ext->table('ic_products')->where('active',1)->get();
        //OnlineStore::Invoice($order,$request->id);


        return view('online_store.orders.edit',compact('order','coupons','products'));
    }

    public function orderVipEdit(Request $request)
    {
        $db_ext = DB::connection('OnlineStoreDB');

        $order = $db_ext->table('ic_orders')
            ->join('ic_users','ic_users.id','=','ic_orders.user_id')
            ->select('ic_orders.*','ic_users.*', DB::raw('ic_orders.id as OID, ic_orders.phone as Ophone'))
            ->where('ic_orders.id',$request->id)
            ->first();
        $coupons = $db_ext->table('ic_discount_codes')->get();
        $products = $db_ext->table('ic_products')->where('active',1)->get();
        //OnlineStore::Invoice($order,$request->id);


        return view('online_store.orders.edit2',compact('order','coupons','products'));
    }

    public function orderDetailsPrint(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $db_ext = DB::connection('OnlineStoreDB');

        $order = $db_ext->table('ic_orders')
            ->join('ic_users','ic_users.id','=','ic_orders.user_id')
            ->select('ic_orders.*','ic_users.*', DB::raw('ic_orders.id as OID'))
            ->where('ic_orders.id',$request->id)
            ->first();
        //dd($order);

        return view('online_store.orders.print_invoice',compact('order'));
    }

    public function orderDetailsPrint2(Request $request): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $db_ext = DB::connection('OnlineStoreDB');

        $order = $db_ext->table('ic_orders')
            ->join('ic_users','ic_users.id','=','ic_orders.user_id')
            ->select('ic_orders.*','ic_users.*', DB::raw('ic_orders.id as OID'))
            ->where('ic_orders.id',$request->id)
            ->first();
        //dd($order);

        return view('online_store.orders.download_invoice',compact('order'));
    }



    public function acceptOrder(Request $request){
        $db_ext = DB::connection('OnlineStoreDB');
        $order = $db_ext->table('ic_orders')
            ->join('ic_users','ic_users.id','=','ic_orders.user_id')
            ->select('ic_orders.*','ic_users.*', DB::raw('ic_orders.id as OID, ic_orders.created_at as OCA,ic_orders.phone as Ophone'))
            ->where('ic_orders.id',$request->id)
            ->first();


        $db_ext->table('ic_orders')->where('id',$request->id)->update([
            'state' =>'complete'
        ]);

        Mail::to($order->email)->send(new AcceptOrder($order));
       // AcceptOrderJob::dispatch($order);


        session()->flash('Flash', 'تمت الموافقة على المشروع بنجاح');
        return redirect()->back();
    }


    public function createNewOrder(Request $request){
        $db_ext = DB::connection('OnlineStoreDB');
        $users = $db_ext->table('ic_users')->where('id',$request->usr_id)->first();
        $products = $db_ext->table('ic_products')->where('id',$request->pro_id)->get();
        //dd($products);
        $order =[];
        $user = auth()->user();
        $order->user()->associate($user->id);

        $order->phone = $request->phone;
        $order->note = $request->note;
        $order->address = $request->address;

        $order->products = $user->shopping_cart->map(function ($item, $key) {
            return [
                'name' => $item->name,
                'price' => $item->price,
                'quantity' => $item->pivot->quantity,
                'total_price_quantity' => $item->pivot->total_price_quantity,
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
        $order->order = rand(1000, 9999) . date('md') . $user->id;

        $order->save();
        //return view('online_store.orders.new_order',compact('users','products'));
    }






    public function applyCoupon(Request $request){
        $db_ext = DB::connection('OnlineStoreDB');
        $oid = $request->oid;
        $cid = $request->coupon;

        $discount = $db_ext->table('ic_discount_codes')->where('id',$cid)->first();
        $order = $db_ext->table('ic_orders')->where('id',$oid)->first();
        if ($discount->type == 'amount'){
           $dis = [
                'code' => $discount->code,
                'type' => $discount->type,
                'value' => $discount->value,
                'applied' => $discount->value,
            ];
            $db_ext->table('ic_orders')->where('id',$oid)->update([
                'discount' => $dis,
                'total' => $order->sub_total - $discount->value ,
            ]);
        }elseif ($discount->type == 'percent'){
            $val = $order->sub_total * $discount->value / 100 ;
            $dis = [
                'code' => $discount->code,
                'type' => $discount->type,
                'value' => $discount->value,
                'applied' => $val,
            ];
            $db_ext->table('ic_orders')->where('id',$oid)->update([
                'discount' => $dis,
                'total' => $order->sub_total - $val ,
            ]);
        }

        session()->flash('Flash','تم تطبيق الكوبون');
        return redirect()->back();

    }

    public function removeFromOrderUpdate(Request $request){
        $db_ext = DB::connection('OnlineStoreDB');
        $oid = $request->oid;
        $kid = $request->kid;
        $order = $db_ext->table('ic_orders')->where('id',$oid)->first();
        $items = json_decode($order->products, true);
        //dd($discount['code']);

        if ($order->discount != null){
            $discount = json_decode($order->discount, true);
            if ($discount['type'] == 'percent'){

                $newTotal = ($order->sub_total - $items[$kid]['price']);
                $val = ($newTotal * $discount['value']) / 100 ;
                $db_ext->table('ic_orders')->where('id',$oid)->update([
                    'sub_total' => $newTotal ,
                    'total' => $newTotal - $val ,
                ]);

            }elseif($discount['type'] == 'amount'){
                $newTotal = ($order->sub_total - $items[$kid]['price']) ;
                $val = $newTotal - $discount['value'] ;
                $db_ext->table('ic_orders')->where('id',$oid)->update([
                    'sub_total' => $newTotal ,
                    'total' => $val ,
                ]);
            }
        }else{
            $db_ext->table('ic_orders')->where('id',$oid)->update([
                'sub_total' => $order->sub_total - $items[$kid]['price'] ,
                'total' => $order->total - $items[$kid]['price'] ,
            ]);
        }


        unset($items[$kid]);
        $newJsonData = json_encode($items);

        $db_ext->table('ic_orders')->where('id',$oid)->update([
            'products' => $newJsonData,
        ]);
        session()->flash('Flash','تم حذف المنتج');
        return redirect()->back();

    }


    public function addToOrderVipUpdate(Request $request){

        //dd($request->count);
        $db_ext = DB::connection('OnlineStoreDB');
        $oid = $request->oid;
        $orderItem = $db_ext->table('ic_orders')->where('id',$oid)->first();
        $formData = json_decode($orderItem->products, true);
        $price = $orderItem->total;
        foreach ($request->count as $key => $count) {
            $newData = [
                'name' => $request->name[$key],
                'price' => $request->price[$key],
                'quantity' => $count,
                'total_price_quantity' => $request->price[$key] * $count,
                'variations' => '[]' // You can modify this if needed
            ];
            $price += $request->price[$key] * $count;
            $formData[] = $newData;
        }

        $updatedJsonFormData = json_encode($formData);
        $db_ext->table('ic_orders')->where('id',$oid)->update([
            'products' => $updatedJsonFormData,
            'sub_total' => $price,
            'total' => $price,
        ]);

        session()->flash('Flash','تم إضافة المنتجات');
        return redirect()->back()->with('success', 'Form data successfully saved to the database');
    }
    public function addToOrderUpdate(Request $request){

        $db_ext = DB::connection('OnlineStoreDB');
        $oid = $request->oid;
        $products = $request->products;
        $order = $db_ext->table('ic_orders')->where('id',$oid)->first();
        $items = json_decode($order->products, true);
       // dd($products);
        $price = $order->total;
        foreach ($products as $product){
            $pro = $db_ext->table('ic_products')->where('id',$product)->first();
            $newItem = ["name" => $pro->name, "price" => $pro->price, "quantity" => 1, "total_price_quantity" => $pro->price, "variations" => "[]"];
            $items[] = $newItem;
            $price +=$pro->price;
        }

        if ($order->discount != null){
            $discount = json_decode($order->discount, true);
            if ($discount['type'] == 'percent'){

                $newTotal = ($order->sub_total + $price);
                $val = ($newTotal * $discount['value']) / 100 ;
                $db_ext->table('ic_orders')->where('id',$oid)->update([
                    'sub_total' => $newTotal ,
                    'total' => $newTotal - $val ,
                ]);

            }elseif($discount['type'] == 'amount'){
                $newTotal = ($order->sub_total + $price) ;
                $val = $newTotal - $discount['value'] ;
                $db_ext->table('ic_orders')->where('id',$oid)->update([
                    'sub_total' => $newTotal ,
                    'total' => $val ,
                ]);
            }
        }else{
            $db_ext->table('ic_orders')->where('id',$oid)->update([
                'sub_total' => $price ,
                'total' => $price ,
            ]);
        }


        $newJsonData = json_encode($items);
        $db_ext->table('ic_orders')->where('id',$oid)->update([
            'products' => $newJsonData,
        ]);
        session()->flash('Flash','تم إضافة المنتجات');
        return redirect()->back();
    }
    public function editInvoiceNote(Request $request){
        $db_ext = DB::connection('OnlineStoreDB');
        $oid = $request->oid;
        $note = $request->invoice_note;
        if (isset($note)){
            $db_ext->table('ic_orders')->where('id',$oid)->update([
                'invoice_note' => $note ,
            ]);
            session()->flash('Flash','تم إضافة الملاحظات');
            return redirect()->back();
        }else{
            session()->flash('Flash2','الحقل فارغ');
            return redirect()->back();
        }

    }


    public function addOrderToProjects(Request $request){


        $db_ext = DB::connection('OnlineStoreDB');
        $order = $db_ext->table('ic_orders')
            ->join('ic_users','ic_users.id','=','ic_orders.user_id')
            ->select('ic_orders.*','ic_users.*', DB::raw('ic_orders.id as OID, ic_orders.created_at as OCA,ic_orders.phone as Ophone'))
            ->where('ic_orders.id',$request->id)
            ->first();
        $proDta = [];
        $proDta['RQS'] = 1;
        $proDta['Bank'] = 'AHLI';
        $proDta['DRP'] = $order->OCA;
        $proDta['SOA'] = $order->total;
        $proDta['Port'] = 'NO';
        $proDta['City'] = 'NO';
        $proDta['Country'] = 'SA';
        $proDta['Name'] = $order->name;
        $proDta['FileCode'] = ProHelpere::makeFileCode($order->order, 'DKO', $order->city);
        $proDta['Bennar'] = $order->order;
        $proDta['Phone'] = $order->Ophone;
        $proDta['Email'] = $order->email;
        $proDta['address'] = $order->address;
        $proDta['note'] = $order->note;
        $proDta['total'] = $order->total;
        $proDta['name'] = $order->name;
        $proDta['email'] = $order->email;
         CreateNewProject::dispatch($proDta);
        session()->flash('Flash','تم إضافة المشروع');
        return redirect()->back();
//        $che = Orders::where('number',$order->order)->first();
//        //$input['RecValue'] = $request->Price;
//        if (!isset($che)){
//            $input = [];
//            $input['number'] = $order->order;
//            $input['date_created'] = Carbon::now();
//            $input['total'] = $order->total;
//            $input['customer_note'] = $order->note;
//            $input['first_name'] = $order->name;
//            $input['last_name'] = 'ko';
//            $input['customer_note'] = "no note";
//            $input['address_1'] = $order->address;
//            $input['address_2'] = $order->address;
//            $input['email'] = $order->email;
//            $input['phone'] =  $order->phone;
//            $input['status'] = "completed";
//            $input['city'] = "--";
//            $input['state'] = "--";
//            $input['country'] = "sa";
//            $input['currency'] = "SAR";
//            $input['is_vat_exempt'] = "1";
//            $input['_billing_myfield12'] = "مرحلة بناء الهيكل الإنشائي فقط";
//            $input['payment_method_title'] = "حوالة بنكية";
//            $input['cart_tax'] = "0.00";
//
//            $input2['bennar_number'] = $order->order;
//            $input2['bennar_status'] = 6;
//            $input2['client_type'] = 'عميل خير عون';
//            $input2['notes'] = 'لا توجد ملاحظات';
//            //dd($input);
//            BennarStatus::create($input2);
//            Orders::create($input);
//            // session()->flash('Flash', 'تم حفظ بيانات المشروع بنجاح');
//        }
//
//        $che2 = ActivateFile::where('Bennar',$order->order)->first();
//        //$input['RecValue'] = $request->Price;
//        if (!isset($che2)){
//
//            $fvfv = ActivateFile::create([
//                'RQS' => 1,
//                'Bank' => 'AHLI',
//                'DRP' => $order->OCA,
//                'SOA' => $order->total,
//                'Port' => 'no',
//                'City' => 'no',
//                'Country' => 'sa',
//                'Name' => $order->name,
//                'FileCode' => ProHelpere::makeFileCode($order->order, 'DKO', $order->city),
//                'Bennar' => $order->order,
//                'Phone' => $order->phone,
//                'Email' => $order->email,
//                'Status' => 'Approved',
//            ]);
//            $PID = Packages::find(9);
//
//            $Services = PackageServices::join('services','services.id','=','p_services.SID')->where('p_services.PID',$PID->id)->get();
//            //dd($Services);
//            DB::table('projects_files')->insert([
//                'PrfileID'=>$order->order
//            ]);
//            foreach($Services as $item){
//                $input['Bennar_Code'] = $order->order;
//                $input['ServiceCode'] = $item->ServiceCode;
//                $input['ServiceID'] = $item->ServiceName;
//                ProjectServices::updateOrCreate(
//                    [
//                        'Bennar_Code' => $order->order
//                    ],[
//                        'ServiceCode' =>$item->ServiceCode,
//                        'ServiceID' =>$item->ServiceName
//                    ]
//                );
//            }
//            ProjectStages::updateOrCreate(
//
//                [
//                    'Bennar' => $order->order
//                ],
//
//                [
//                    'current_main_Stage' => 1,
//                    'current_sub_Stage' => 2,
//                ]
//            );
//        }

    }

}
