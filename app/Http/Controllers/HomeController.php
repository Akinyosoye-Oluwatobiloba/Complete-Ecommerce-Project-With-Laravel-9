<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Session as FacadesSession;
use Session;

use Stripe;


// use App\Model\Product;
class HomeController extends Controller
{
    public function redirect(){
        $usertype = Auth::user()->usertype;
        if($usertype == '1'){
            return view('admin.home');

        }
        else{
            $product = Product::paginate('10');
            return view('home.userpage', compact('product'));
        }
    }
    public function index(){
        $product = Product::paginate('10');
        return view('home.userpage', compact('product'));
    }
    public function delete_product($id){
        $product = Product::find($id);
        $product->delete();
        return redirect()->back()->with('message', 'Product Deleted Successfully');
    }
    public function update_product(Request $request, $id){
        $product = Product::find($id);
        return view('admin.update_product',compact('product'));

    }
    public function product_details($id){
        $product = Product::find($id);
        return view('home.products_details', compact('product'));
    }
    public function add_cart(Request $request)
    {
        if (Auth::id()){

            $user = Auth::user();
            $product = Product::find($request->product_id);
           $cart = new Cart;
           $cart->name = $user->name;
           $cart->email = $user->email;

           if($product->discount_price != null){

            $cart->price =$product->discount_price * $request->quantity;

           }
           else{
            $cart->price = $product->price * $request->quantity;

           }
           $cart->phone = $user->phone;
           $cart->address = $user->address;
           $cart->id = $cart->user_id; // user id
           $cart->product_title = $product->title;

           $cart->image= $product->image;
           $cart->product_id = $product->id; // product id
           $cart->quantity = $request->quantity;

            $cart->save();
            return redirect()->back();
        }else{
            return redirect('login');
        }

    }
    public function show_cart(){
 if(Auth::id()){
     $cart = cart::all();
     $id = Auth::user()->id;
     //  $cart = cart::where('user_id','=','$id')->get();

     return view('home.showcart',compact('cart'));

    }
    else{
        return redirect('login');
    }

    }
    public function remove_cart($id){
        $cart = cart::find($id);
        $cart->delete();

        if($cart = null){
            return redirect('/show_cart');
        }else{
        return redirect('/show_cart');
        }
        return redirect()->back();
    }
    public function cash_order(){
        $user=Auth::user();
        $userid= $user->id;

        $data = cart::all();

        foreach($data as $data){
            $order = new order;
            $order->name = $data->name;
            $order->email = $data->email;
            $order->phone = $data->phone;

            $order->address = $data->address;

            $order->user_id= $data->user_id;

            $order->product_title= $data->product_title;

            $order->price= $data->price;

            $order->quantity = $data->quantity;
            // $order->product_id = $data->product->id;
            $order->image= $data->image;

            $order->Payment_status = 'Cash On Delivery';

            $order->delivery_status = 'processing';

            $order->save();



            $cart_id = $data->id;

            $cart = cart::find($cart_id);
            $cart->delete();


        }
        return redirect()->back()->with('message','We have received your order, We will get back to you soon');

        }
        public function stripe($totalprice){
            return view('home.stripe',compact('totalprice'));
        }
        public function stripePost(Request $request, $totalprice)

        {
            
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));



            Stripe\Charge::create ([

                    "amount" =>$totalprice * 100,

                    "currency" => "usd",

                    "source" => $request->stripeToken,

                    "description" => "Thanks for Payment."

            ]);


            $user=Auth::user();
            $userid= $user->id;

            $data = cart::all();

            foreach($data as $data){
                $order = new order;
                $order->name = $data->name;
                $order->email = $data->email;
                $order->phone = $data->phone;

                $order->address = $data->address;

                $order->user_id= $data->user_id;

                $order->product_title= $data->product_title;

                $order->price= $data->price;

                $order->quantity = $data->quantity;
                // $order->product_id = $data->product->id;
                $order->image= $data->image;

                $order->Payment_status = 'Cash On Delivery';

                $order->delivery_status = 'processing';

                $order->save();



                $cart_id = $data->id;

                $cart = cart::find($cart_id);
                $cart->delete();


            }
            FacadesSession::flash('success', 'Payment successful!');



            return back();

        }

    }

