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
        $validatedData = Validator::make($request->all(),[
            'about_us' => 'required|string',
            'terms_condition' => 'required|string',
            'privacy_policy' => 'required|string',
            'shiping_return' => 'required|string',

        ]);

        if ($validatedData->fails()) {
            return redirect()->back()
                ->withErrors($validatedData)
                ->withInput();
        }


        DB::table('ic_app_info')
            ->where('id',$request->id)
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
