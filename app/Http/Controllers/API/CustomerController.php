<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Jobs\SendRQsByEmail;
use App\Mail\NewOrderEmail;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules;
use Illuminate\Validation\ValidationException;

class CustomerController extends BaseController
{
    public function addNewCustomer(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', Rules\Password::defaults()],
        ],[
            'name.required' => 'الاسم مطلوب',
            'email.unique' => 'الرجاء استخدام لريد الكتروني آخر',
            'email.required' => 'البريد الالكتروني مطلوب',
            //'password.confirmed' => 'كلمة المرور المدخلة غير متطابقة',
            'password.required' => 'كلمة المرور مطلوبة',
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //event(new Registered($user));
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = $request->user();
            $token = $user->createToken('my-app-token')->plainTextToken;
            return $this->sendResponse([
                'user'=>$user,
                'token'=>$token
            ],'');
        }

    }

    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = $request->user();
            $token =  $user->createToken('my-app-token')->plainTextToken;

                return response()->json(
                    [
                        'token' => $token,
                        'uid' => $user->id,
                        'uname' => $user->name,
                        'upac' => $user->file_code,
                        'uphone' => $user->phone,
                        'uemail' => $user->email,
                        'message' => '',
                        'success' => true
                    ], 200);

            //dd($response);

        } else{
            return $this->sendError('خطأ في اسم المستخدم او كلمة المرور', ['error'=>'Unauthorised']);
        }
    }

    public function placeOrder(Request $request){

        //return response()->json(['errors' => $request->all()], 200);
        $products = $request->input('products'); // This is an array
        //dd($products);
        // Convert array to Collection
        //$coll = collect($data);
        try {
            $validatedData = $request->validate([
                'address' => 'required|string|max:255',
                'phone' => 'required|string|max:255',
                'note' => 'nullable|string|max:1000',
                'city' => 'required|string|max:255',
            ]);

            // If validation passes, you can use $validatedData
            // For example, save to the database or perform other actions
        } catch (ValidationException $e) {
            // Handle the validation exception
            // You can access the errors using $e->validator->errors()

            return response()->json(['errors' => $e->validator->errors()], 422);
        }

        //dd($request->all());
        //DB::beginTransaction();
        try {
            $pros = [];
            foreach ($products as $item) {
                //$decodedItems = json_decode($item, true); // Use true to get an associative array



                    $product_id = $item['product_id'];
                    $quantity = $item['quantity'];
                    $prod = Product::find($product_id);
                    $pros[] = [
                        'name' => $prod->name,
                        'price' => $prod->price,
                        'quantity' => $quantity,
                        'total_price_quantity' => $prod->price * $quantity,
                    ];

            }
            //dd($pros);
            $lastRecord = Order::latest()->first();
            $order = new Order();
            $user = User::find($request->uid);
            $user->forceFill([
                'city' => $request->city,
            ])->save();
            $order->user()->associate($user->id);

            $order->phone = $request->phone;
            $order->note = $request->note;
            $order->address = $request->address;

            $order->products = $pros;

            $order->sub_total = $request->total;
            $order->total = $request->total;
            $order->order = $lastRecord->order + 1;

            $order->save();

            Mail::to($user)->send(new NewOrderEmail($order));
            return $this->sendResponse([
                'order'=>$order
            ],'');
        }catch (\Exception $e){
            return $this->sendError($e,[]);
        }


    }


    public function customerOrders(Request $request){
        $user = User::find($request->uid);
        $orders = OrderResource::collection($user->orders()->get());
            return $this->sendResponse([
                'orders'=>$orders
            ],'');
    }


    public function confirmPay(Request $request){
        $re = $request->order;
        Order::where('order',$re)->update([
            //'invoice_id' => $id,
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
        return response()->json(
            [
                'message' => '',
                'success' => true
            ], 200);

    }


}