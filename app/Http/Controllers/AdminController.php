<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\product;
use App\Models\User;
use App\Notifications\AddProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    //
    public function view_category(){
        $Categories = Category::get();

        return view('admin.category',compact('Categories'));
    }
    public function add_category(Request $request){

        Category::create([
            'name'=>$request->name,
        ]);

        return redirect()->back();
    }
    public function delete_category($id){
        Category::where('id',$id)->delete();
        return redirect()->back() ;
    }

    public function view_product(){
       $category =  Category::get();
        return view('admin.product',compact('category'));
    }
    public function add_product(Request $request){

        // title	description	iamge	category	quantity	price	discount_price	

        $product = new product();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
       

        //that step is very improtent  
        $image = $request->image ;

        $imagename = time().'.'.$image->getClientOriginalExtension();

        $request->image->move('product',$imagename);

        $product->image = $imagename;

        $product->save();

        $users = User::where('id','!=',auth()->user()->id)->get();

        $userAddProduct = auth()->user()->name;

        Notification::send($users ,new AddProduct($userAddProduct,$product->title,$product->id));


        return redirect()->back();

        // return $users ;


        // product::create([
        //     'title'=>$request->title,
        //     'description'=>$request->description,
        //     'image'=>$request->image,
        //     'category'=>$request->category,
        //     'quantity'=>$request->quantity,
        //     'price'=>$request->price,
        //     'discount_price'=>$request->discount_price,

        // ]);
        }
  
    public function showProduct(){
        $products =  product::get();
        
        return view('admin.show' , compact('products'));

    }
    public function deleteProduct($id){

        product::where('id',$id)->delete();

        return redirect()->back() ;
    }

    public function updateProdcut($id){

        $product = product::where('id',$id)->first();
        $Categories = Category::get();
        
        return view('admin.update',compact('product','Categories'));
    }


    public function storeProdcut(Request $request,$id){

        $product = product::find($id);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
       
        //that step is very improtent  
        $image = $request->image ;

        $imagename = time().'.'.$image->getClientOriginalExtension();

        $request->image->move('product',$imagename);

        $product->image = $imagename;

        $product->save();


        return redirect()->back();
        
    }
    public function showOrders(){

        $orders  =Order::get();

       return view('admin.showOrders',compact('orders'));
    }
    public function delivary($id){

        $order = Order::find($id);

        $order->delivary_status = 'delivered';
        
        $order->payment_status = 'paid';

        $order->save();

        return redirect()->back();
    }
    public function Show_notification_product($id){

       $product = product::where('id',$id)->get();

       $productId = product::find($id);

       $getID = DB::table('notifications')->where('data->product_id',$id)->pluck('id');

       DB::table('notifications')->where('id',$getID)->update(['read_at'=>now()]);


        return view('admin.show_Notification_product',compact('product'));
    }
    public function markAsRead(){

        $user = User::find(auth()->user()->id); 

        foreach ($user->unreadNotifications as $notification) {
            $notification->markAsRead();
            $notification->delete;
        }
        return redirect()->back();
    }
}
