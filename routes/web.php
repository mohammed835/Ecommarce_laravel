<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;

route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

route::get('redirect',[HomeController::class,'redirect']);

route::get('view_category',[AdminController::class,'view_category'])->name('view_category');

route::post('add_category',[AdminController::class,'add_category'])->name('add_category');

route::get('delete_category/{id}',[AdminController::class,'delete_category'])->name('delete_category');

route::get('view_product',[AdminController::class,'view_product'])->name('view_product');

route::post('add_product',[AdminController::class,'add_product'])->name('add_product');

route::get('showProduct',[AdminController::class,'showProduct'])->name('showProduct');

route::get('showOrders',[AdminController::class,'showOrders'])->name('showOrders');

route::get('show_Notification_product/{id}',[AdminController::class,'Show_notification_product'])->name('show_Notification_product');

route::get('markAsRead',[AdminController::class,'markAsRead'])->name('markAsRead');

// deleteProduct showOrders delivary show_Notification_product

route::get('deleteProduct/{id}',[AdminController::class,'deleteProduct'])->name('deleteProduct');

route::get('updateProdcut/{id}',[AdminController::class,'updateProdcut'])->name('updateProdcut');

route::get('delivary/{id}',[AdminController::class,'delivary'])->name('delivary');


route::post('storeProdcut/{id}',[AdminController::class,'storeProdcut'])->name('storeProdcut');

//prodcut_details showCart remove_cart cash_order
route::get('prodcut_details/{id}',[HomeController::class,'prodcut_details'])->name('prodcut_details');

route::post('add_cart/{id}',[HomeController::class,'add_cart'])->name('add_cart');

route::get('showCart/',[HomeController::class,'showCart'])->name('showCart');

route::get('remove_cart/{id}',[HomeController::class,'remove_cart'])->name('remove_cart');

route::get('cash_order/',[HomeController::class,'cash_order'])->name('cash_order');

// mail test 
route::get('send',function(){

    Mail::to('safwatm892@gmail.com')->send(new OrderShipped);

    return response('email sended successfully');

});
