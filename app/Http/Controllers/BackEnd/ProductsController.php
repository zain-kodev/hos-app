<?php

namespace App\Http\Controllers\BackEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    public function products($filter_type = null, $filter = null): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        //$db_ext = DB::connection('OnlineStoreDB');
        $products = DB::table('products')
            ->join('categories','products.category_id','=','categories.id')
            ->select('products.*','categories.*', DB::raw('ic_products.name as ProName, ic_products.id as ProID'))
            ->orderBy('products.created_at','asc');

        if ($filter_type == 'category') {
            $products->where('categories.slug', $filter);
        }
        if ($filter_type == 'available') {
            $products->where('products.active', $filter);
        }

        $products = $products->get();
        $cats = DB::table('categories')->get();
        return view('AdminDashboard.online_store.products.index',compact('products','cats'));

    }

    public function productDetails($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        //dd($request->all());
        //$db_ext = DB::connection('OnlineStoreDB');
        $product = DB::table('ic_products')
            ->join('ic_categories','ic_products.category_id','=','ic_categories.id')
            ->select('ic_products.*','ic_categories.*', DB::raw('ic_products.name as ProName, ic_products.id as ProID'))
            ->where('ic_products.id',$id)
            ->orderBy('ic_products.created_at','asc')
            ->first();
        //dd($product);
        return view('online_store.products.product_details',compact('product'));

    }

    public function productEdit($id): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        //$db_ext = DB::connection('OnlineStoreDB');
        $product = DB::table('products')
            ->join('ic_categories','ic_products.category_id','=','ic_categories.id')
            ->select('ic_products.*','ic_categories.*', DB::raw('ic_products.name as ProName, ic_products.id as ProID'))
            ->where('ic_products.id',$id)
            ->orderBy('ic_products.created_at','asc')
            ->first();
        $categories = DB::table('ic_categories')->get();
        $images = DB::table('ic_images')->where('product_id',$product->ProID)->get();
        //dd($images);
        return view('online_store.products.product_edit',compact('product','categories','images'));

    }


    public function productEditPost(Request $request): \Illuminate\Http\RedirectResponse
    {
        //dd($request->all());
        $validatedData = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'description_min' => 'required',
            'description_max' => 'required',
            'sentence' => 'required|string',
            'price' => 'required|numeric',
            //'slug' => 'required|string',
            'category_id' => 'required|numeric',
            //'description_max' => 'required|string',
            //'paymentMethod' => 'required|string|max:255',
        ]);

        if ($validatedData->fails()) {
            return redirect()->back()
                ->withErrors($validatedData)
                ->withInput();
        }

        //$db_ext = DB::connection('OnlineStoreDB');
        $product = DB::table('products')
            ->where('id',$request->ProID)
            ->update([
                'name' => $request->name,
                'description_min' => $request->description_min,
                'description_max' => $request->description_max,
                'sentence' => $request->sentence,
                'price' => $request->price,
                'category_id' => $request->category_id,
                //'slug' => $request->slug,
            ]);
        session()->flash('Flash','تم تعديل البيانات');
        return redirect()->back();
        //dd($product);
        //return view('online_store.products.product_edit',compact('product'));

    }

    public function uploadTempProductMainImage(Request $request): string
    {
        $this->validate($request, [
            //'Docs' => 'required|mimes:jpg,jpeg,pdf,dwg,rvt,DWG,',
            //'Docs' => 'required|size:200000',
        ],
            $messsages = array(
                //'Docs.mimes'=>'خطأ في صيغة الملف',
            )
        );
        if($request->hasFile('photo')) {
            $tms = date('Y-m-d');
            $ran = mt_rand(10000, 99999);
            $file = $request->file('contract');
            $filename = uniqid().'_'.$tms.'.'.$file->getClientOriginalExtension();
            $file->storeAs('products_images/',$ran.'_'.$filename,'s3');
            DB::table('temp_files')->insert([
                'usr_id' => auth()->user()->id,
                'FileName' => 'products_images/'.$ran.'_'.$filename
            ]);
            return $filename;
        }

        return '';

    }


}



