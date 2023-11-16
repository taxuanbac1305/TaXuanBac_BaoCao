<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Cart;
use App\Models\Brand;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;

session_start();

class CheckoutController extends Controller
{
    public function checkout_login()
    {
        return view('frontend.checkout-login');
    }
    public function add_user(Request $request)
    {
        
        $data = array();
        $data['name'] = $request->name;
        $data['username'] = $request->username;
        $data['password'] = $request->password;
        $data['gender'] = $request->gender;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['status'] = $request->status;
        $data['roles'] = $request->roles;
        $data['created_by'] = $request->created_by;
        $data['update_by'] = null;
        $get_image = $request->file('image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move(public_path('uploads/user'), $new_image);
            $data['image'] = $new_image;
            $user_id = User::insertGetId($data);
            Session::put('email', $request->email);
            Session::put('gender', $request->gender);
            Session::put('user_id', $user_id);
            Session::put('user_name', $request->name);
            return Redirect::to('/checkout');
        }
        $data['image'] = 'free_image.gif';
        $user_id = User::insertGetId($data);


        Session::put('email', $request->email);
        Session::put('gender', $request->gender);
        Session::put('user_id', $user_id);
        Session::put('user_name', $request->name);
        return Redirect::to('/checkout');
    }
    public function checkout()
    {
        return view('frontend.checkout-index');
    }

    public function save_checkout(Request $request)
    {
        $data = array();
        $data['user_id'] = $request->user_id;
        $data['delivery_name'] = $request->delivery_name;
        $data['delivery_gender'] = $request->delivery_gender;
        $data['delivery_email'] = $request->delivery_email;
        $data['delivery_phone'] = $request->delivery_phone;
        $data['delivery_address'] = $request->delivery_address;
        $data['note'] = $request->note;
        $data['order_total'] = Session::get('grandTotal'); // Retrieve the grand total from the session
        $data['created_by'] = $request->created_by;
        $data['update_by'] = null;
        $data['status'] = $request->status;
        $delivery_id = Order::insertGetId($data);
        Session::put('delivery_id', $delivery_id);
        Session::put('delivery_name', $request->delivery_name);

        $content = Session::get('Cart')->products;
        foreach ($content as $v_content) {
            $order_d_data['order_id'] = $delivery_id;
            $order_d_data['product_id'] = $v_content['productInfo']->id; // Access the product ID
            $order_d_data['product_name'] = $v_content['productInfo']->name; // Access the product name
            $order_d_data['product_price'] = $v_content['productInfo']->price; // Access the product price
            $order_d_data['product_quantity'] = $v_content['quanty']; // Access the product quantity
            Orderdetail::create($order_d_data);
        }
        Session::forget('Cart');

        return Redirect::to('/thankyourpay');
    }
    public function thankyourpay(){
        return view('frontend.thankyourpay');
    }
    public function login_user(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $result = User::where('email', $email)->where('password', $password)->first();
        if ($result) {
            Session::put('email', $result->email);
            Session::put('gender', $result->gender);
            Session::put('user_id', $result->id);
            Session::put('user_name', $result->name);
            return Redirect::to('/trang-chu');
        } else {
            return Redirect::to('/checkout-login');
        }
    }
    public function checkout_logout()
    {
        Session::flush();
        return Redirect::to('/checkout-login');
    }

    
}
