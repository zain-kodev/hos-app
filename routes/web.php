<?php

use App\Http\Controllers\BackEndAdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    return view('welcome');
//    return Inertia::render('Welcome', [
//        'canLogin' => Route::has('login'),
//        'canRegister' => Route::has('register'),
//        'laravelVersion' => Application::VERSION,
//        'phpVersion' => PHP_VERSION,
//    ]);
});
Route::get('redirect', function () {
    if(auth()->check()){
        $level = auth()->user()->is_admin;
        switch ($level) {
            case 0:
                return redirect('/');
                break;
            case 1:
                return redirect('/AdminDashboard');
                break;

        }

    }else{
        return redirect('/');
    }

});
Route::get('/AdminDashboard', function ($filter_type = null, $filter = null) {

    $o = DB::table('orders')
        ->join('users','users.id','=','orders.user_id')
        ->select('orders.*','users.*', DB::raw('ic_orders.id as OID, ic_orders.created_at as oca'))
        ->orderBy('orders.created_at','desc');
    $cou = DB::table('orders')
        ->join('users','users.id','=','orders.user_id')
        ->select('orders.*','users.*', DB::raw('ic_orders.id as OID, ic_orders.created_at as oca'))
        ->orderBy('orders.created_at','desc')->get();

    if ($filter_type == 'type') {
        $o->where('orders.state', $filter);
    }

    $o = $o->get();
   // dd($o);
    $users = DB::table('users')->get();
    $products = DB::table('products')->get();
    return view('AdminDashboard.dashboard',compact('o','users','products','cou'));
})->middleware(['auth'])->name('AdminDashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});




require __DIR__.'/auth.php';
