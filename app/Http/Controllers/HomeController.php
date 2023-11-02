<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\product;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use function Ramsey\Uuid\v1;

class HomeController extends Controller
{
    //
    public function redirect(){
        $usertype = Auth::user()->usertype;

        
        if ($usertype == 1){

            return view('admin.home');
        }else {
            return view('home.userpage');
        }

    }
    
    public function index(){

        $products = product::all();

        return view('home.userpage',compact('products'));
    }

    public function prodcut_details($id){

        $product = product::where('id',$id)->first();

        return view('home.prodcut_details',compact('product'));
    }
    public function add_cart(Request $request ,  $id){
        if(Auth::id()){

            // get product 
            $product = product::where('id',$id)->first();

            // get user authentiction
            $user = Auth::user();

            // set data in cart  name	email	phone	address	product_title	price	quantity	image	product_id	user_id 
            $cart = new Cart();

            $cart->name = $user->name;
            $cart->email = $user->email;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->product_title = $product->title;
            $cart->price = $product->price;
            $cart->quantity = $request->quantity;
            $cart->user_id = $user->id;
            $cart->product_id = $product->id;
            $cart->image = $product->image;
            $cart->total_price = ($request->quantity * $product->price )  - ($product->discount_price *$request->quantity );

            $cart->save();

            return redirect()->back();

        }else{
            return redirect('login');
        }
    }

    public function showCart(){
        if(Auth::id()){
            $id = Auth::user()->id;

            $products = Cart::where('user_id',$id) ->get();
    
            return view('home.showCart',compact('products'));

        }else{
            return redirect('login');
        }

       
    }



    public function remove_cart($id){

        Cart::where('id',$id)->delete();
        return redirect()->back();
    }

    public function cash_order(){

        if(Auth::id()){

            $userId= Auth::user()->id;

            $data = Cart::where('user_id',$userId)->get();

            foreach($data as $data){

                $order = new Order();

                $order->name = $data->name;
                $order->email = $data->email;
                $order->phone = $data->phone;
                $order->address = $data->address;
                $order->product_title = $data->product_title;
                $order->price = $data->total_price;
                $order->quantity = $data->quantity;
                $order->user_id = $data->id;
                $order->product_id = $data->id;
                $order->image = $data->image;
                $order->payment_status = 'cash on delivary';
                $order->delivary_status = 'processing';
                
               
                $order->save();

                $cartID = $data->id;
                $cart = Cart::where('id',$cartID)->delete();


            }
            return redirect()->back();

        }else {
            return redirect('login');
        }

    }

    public function apiTest(){
       $products =  product::get();

       return response()->json($products);

    }



}
