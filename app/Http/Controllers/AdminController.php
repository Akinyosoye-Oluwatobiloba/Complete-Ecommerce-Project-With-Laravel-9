<?php

namespace App\Http\Controllers;

use App\Mail\order;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Mail;
USE PDF;
class AdminController extends Controller
{
    public function view_category(){
        $data = Category::all();
        return view('admin.category', compact('data'));
    }
    public function add_category(Request $request){
        $data = new Category;

        $data->category_name = $request->category;

        $data->save();
        return redirect()->back()->with('message','category added successfully');

    }
    public function delete_category($id){
        $data=Category::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Category deleted Successfully');
    }
     public function view_product(){
        $category =Category::all();
        return view('admin.product', compact('category'));
    }
    public function add_product(Request $request){
        $product = new Product;
        $product->title= $request->title;
        $product->description= $request->description;

        // image collection
        if($request->hasFile('image')){

            $file = $request->image;
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('products', $filename);
            $product->image=$filename;
        }

        $product->price= $request->price;
        $product->discount_price= $request->discount_price;
        $product->quantity= $request->quantity;
        $product->category= $request->category;
        $product->save();
        return redirect()->back()->with('message', 'Products Added Successfully');

    }
    public function show_product(){
        $product = Product::all();
        return view('admin.show_product',compact('product'));
    }
    public function update_product_confirm(Request $request,$id){
        $product = product::find($id);
        $product->title = $request->title;
        $product->description= $request->description;
        $product->price= $request->price;

        if($request->hasFile('image')){
            $file = $request->image;
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('products', $filename);
            $product->image=$filename;
        }
        $product->discount_price= $request->discount_price;
        $product->quantity= $request->quantity;
        $product->category= $request->category;
        $product->update();
        return redirect()->back()->with('message', 'Products Updated Successfully');
    }
    public function show_orders(){
        $orders = order::all();
        return view('admin.order',compact('orders'));
    }
    public function delivered($id){
        $order= order::find($id);
        if($order->delivery_status ='not delivered'){
            return redirect()->back();
        }else{
        $order->delivery_status='delivered';
        }
        $order->payment_status = 'paid';
        $order->save();
        return redirect()->back();
        }
        public function exit($id){
            $order = order::find($id);
            $order->delivery_status ='not delivered';
            $order->save();
            return redirect()->back();
        }
        public function print_pdf($id){
            $order = order::find($id);
            $pdf =PDF::loadview('admin.pdf',compact('order')); // This PDF that is highlighted as an error is not one
            return $pdf->download('order details.pdf');
        }
        public function send_email($id){
            $order= order::find($id);

            return view('admin.email_info',compact('order'));
        }
       
}
