<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Goods;
use App\Models\order_details;
use App\Models\orders;
use App\Models\Products;
use App\Models\shipping_orders;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\Mail;
use App\Models\VNPay;
use Illuminate\Support\Facades\Session;

class UserFrontController extends Controller
{
    function index()
    {
        session(['user_index'=>1]);
        return view('users/index');
    }

    function about()
    {
        return view('users/about');
    }

    function cart()
    {
        $carts = Cart::content();
        return view('users/cart', compact('carts'));
    }

    function location()
    {
        return view('users/location');
    }

    function product()
    {
        //nội dung với ở đây:
        $goods = Goods::all();
        $categories = Categories::all();
        if (session('category_ID')) {
            $id = session('category_ID');
            $products = Products::where('category_id', $id)->get();
            session()->forget('category_ID');
        } else {
            $products = Products::all();
        }
        $cartCount = Cart::count();
        return view('users/product', compact('goods', 'categories', 'products', 'cartCount'));
    }

    function displayAllProduct()
    {
        return redirect('users/product');
    }

    function showProduct($id)
    {
        session(['category_ID' => $id]);
        return redirect('users/product');
    }

    function countProduct(Request $request)
    {
        $id = $request->id;
        $rowId = $request->rowId;
        $product = Products::find($id);
        Cart::add(
            [
                'id' => $id,
                'rowId'=>$rowId,
                'name' => $product->name,
                'qty' => 1,
                'price' => $product->subPrice,
                'options' => ['image' => $product->image]
            ]
        );
        return response()->json(['cartCount' => Cart::count(), 'id' => $id]);
    }

    function updateAndDeleteProduct(Request $request){
        $rowId = $request->rowId;
        $qty = $request->qtv;
        $id = $request->id;
        $carts = Cart::content();
        foreach($carts as $cart){
            if($cart->id == $id && $cart->qty != $qty){
                Cart::update($rowId,$qty);
                return response()->json([
                    'cart_qtv'=>$cart->qty,
                    'cart_price'=>$cart->price,
                    'cartCount'=>Cart::count(),
                    'cartSubTotal'=>Cart::tax(),
                    'cartTotal'=>Cart::total()
                ]);
            }
        }

        Cart::remove($rowId);
        return response()->json([
            'cartCount'=>Cart::count(),
            'cartSubTotal'=>Cart::tax(),
            'cartTotal'=>Cart::total()
        ]);
    }

    function checkout()
    {
        // nội dung viết tiếp:
        if(Cart::count() == 0){
            if(session('total_shipping')){
                session()->forget('total_shipping');
            }
            return redirect('users/index');
        }

        if(Auth::check()){
            $user = Auth::user();
        } else{
            $user = "";
        }

        $carts = Cart::content();

        return view('users/checkout',compact('user','carts'));
    }

    function radioChecked(Request $request){
        $payment = $request->payment;
        $shipping = $request->shipping;
        if($payment == "COD"){
            if(session('total_shipping')){
                session()->forget('total_shipping');
            }
            return response()->json([
                'fee'=>0,
                'total'=>Cart::total()
            ]);
        } else{
            if($shipping == "Grab"){
                session(['total_shipping'=>(int) (Cart::total() + 20000)]);
                return response()->json([
                    'fee'=>20000,
                    'total'=>session('total_shipping')
                ]);
            } else{
                session(['total_shipping'=>(int) (Cart::total() + 40000)]);
                return response()->json([
                    'fee'=>40000,
                    'total'=>session('total_shipping')
                ]);
            }
        }
    }

    function submitCheckOut(Request $request){
        $name = $request->name;
        $phone = $request->phone;
        $address = $request->address;
        $payment = $request->payment;
        session(['order_name'=>$name]);
        $order = new orders();
        if(Auth::check()){
            $user = Auth::user();
            $order->user_id = $user->id;
        } else{
            $order->user_id = null;
        }
        $order->name = $name;
        $order->phone = $phone;
        $order->address = $address;
        if($payment == "COD"){
            $order->total = (int) Cart::total();
            $order->save();
        } else{
            $order->total = session('total_shipping');
            $order->save();

            $shipping =$request->shipping;
            $shipping_order = new shipping_orders();
            $shipping_order->phone = $phone;
            $shipping_order->date = date('Y-m-d');
            $shipping_order->type = $shipping;
            $shipping_order->status = "Chưa giao hàng";
            if($shipping == "Grab"){
                $shipping_order->fee = 20000;
            } else{
                $shipping_order->fee = 40000;
            }
            $shipping_order->order_id = $order->id;
            $shipping_order->save();
            session(['shipping_order'=>$shipping_order->id]);
        }
        session(['order_id'=>$order->id]);

        $carts = Cart::content();

        foreach($carts as $cart){
            $order_detail = new order_details();
            $order_detail->product_name = $cart->name;
            $order_detail->product_price = $cart->price;
            $order_detail->product_qty = $cart->qty;
            $order_detail->product_id = $cart->id;
            $order_detail->order_id = $order->id;
            $order_detail->save();
        }
        if($payment == "COD"){
            $this->sendMailSuccess($name);

            Cart::destroy();
            if(session('shipping_order')){
            session()->forget('shipping_order');
            }
            session()->forget('order_id');

            return redirect('users/index')->with('status',"Thanh toán thành công. Đơn hàng đã được tạo");
        } else{
              if(session('total_shipping')){
                $total = session('total_shipping');
              } else{
                $total = Cart::total();
              }
              //1. Lay URL thanh toan VNPay
              $data_url = VNPay::vnpay_create_payment(
                [
                    'vnp_TxnRef' => $order->id,  //id cua don hang
                    'vnp_OrderInfo' => 'Mo ta ve don hang o day ....', //Thông tin mô tả nội dung thanh toán (Tiếng Việt, không dấu). Ví dụ: **Nap tien cho thue bao 0123456789. So tien 100,000 VND**
                    'vnp_Amount' => $total
                ]
            );

            //2. Chuyen huong toi URL lay duoc
            return redirect()->to($data_url);

        }
    }

    public function vnPayCheck(Request $request)
    {
        //1. Lay data tu URL (do VNPay gui ve qua $vnp_ReturnUrl)
        $vnp_ResponseCode = $request->get('vnp_ResponseCode'); //Ma phan hoi ket qua thanh toan
        $vnp_TxnRef = $request->get('vnp_TxnRef'); //ticket_id
        $vnp_Amount = $request->get('vnp_Amount'); //so tien thanh toan

        //2. Kiem tra ket qua giao dich tra ve tu VNPay
        if ($vnp_ResponseCode != null) {
            //neu thanh cong
            if ($vnp_ResponseCode == 00) {
                //1. Gui email:
                if (Auth::check()) {
                    $user = Auth::user();
                    $Getname = array('Getname' => $user->name);
                    $email = array('email' => $user->email);
                    Mail::send('users.sendMail', $Getname, function ($message) use ($Getname, $email) {
                        $message->from('cuongnhts2212008@fpt.edu.vn', 'Cường');
                        $message->to($email['email'], $Getname['Getname']);
                        $message->subject('Chúc mừng đã đơn hàng thành công');
                    });
                } else {
                   $this->sendMailSuccess(session('order_name'));
                }
                //2. Xoa gio hang
                Cart::destroy();
                session()->forget('total_shipping');
                if(session('shipping_order')){
                    session()->forget('shipping_order');
                    }
                    session()->forget('order_id');
                //3. Thong bao ket qua
                return redirect("users/index")->with('status', 'Thanh toán thành công. Đơn hàng đã được tạo');
            } else {

                if(session('shipping_order')){
                    shipping_orders::find(session('shipping_order'))->delete();
                }
                orders::find(session('order_id'))->delete();
                Cart::destroy();

                return redirect("users/index")->with('error', 'Thanh toán thất bại');
            }
        }
    }



    function sendMailSuccess($name){
        $Getname = array('Getname' => $name);
        Mail::send("users.sendMail", $Getname, function ($message) use ($Getname) {
            $message->from('cuongnhts2212008@fpt.edu.vn', 'Cường');
            $message->to('cuongnhts2212008@fpt.edu.vn', $Getname['Getname']);
            $message->subject('Chúc mừng đã đơn hàng thành công');
        });
    }

    function User_Orders(){
        if(Auth::check()){
            $user = Auth::user();
            $orders = orders::where('user_id',$user->id)->get();
            $orders_detail = order_details::all();
            return view('users/orders_history',compact('orders','orders_detail'));
        } else{
            return view('users/orders_history');
        }
    }

    function Product_Detail($id){
        $product = Products::find($id);

        return view('users/product_detail',compact('product'));
    }

    function submitUpdate(Request $request){
        $id = $request->id;
        $countValue = $request->num;
        $rowId = $request->rowId;
        // $check = 0 ;
        $product = Products::find($id);
        // $carts = Cart::content();
        // foreach($carts as $cart){
        //     if($cart->id == $id){
        //         Cart::update($cart->rowId,$countValue);
        //         $check = 1;
        //         break;
        //     }
        // }
        // if($check == 0){
            Cart::add(
                [
                    'id' => $id,
                    'rowId'=>$rowId,
                    'name' => $product->name,
                    'qty' => $countValue,
                    'price' => $product->subPrice,
                    'options' => ['image' => $product->image]
                ]
            );
        // }
        return back()->with('status',"Đã thêm vào giỏ hàng thành công");

    }
}
