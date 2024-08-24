<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AppInfoController extends Controller
{

    public function AppInfo(){
        $info = DB::table('app_info')->get();
        return view('AdminDashboard.online_store.app_info.index',compact('info'));
    }
    public function edit_info(Request $request){

       // dd($request->all());
        $validatedData = Validator::make($request->all(),[
            'about_us' => 'required',
            'terms_condition' => 'required',
            'privacy_policy' => 'required',
            'shiping_return' => 'required',

        ]);

        if ($validatedData->fails()) {
            return redirect()->back()
                ->withErrors($validatedData)
                ->withInput();
        }


        DB::table('app_info')
            ->where('id',$request->ProID)
            ->update([
                'about_us' => $request->about_us,
                'terms_condition' => $request->terms_condition,
                'privacy_policy' => $request->privacy_policy,
                'shiping_return' => $request->shiping_return,
            ]);
        session()->flash('Flash','تم تعديل البيانات');
        return redirect()->back();
    }
}
