<?php

namespace App\Http\Controllers\frontend;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use Session;

session_start();

class GiohangController extends Controller
{
    public function index(Request $request)
    {
        $cart = Session::get('Cart');
        $totalPrice = $this->calculateTotalPrice($cart);
        $tax = $this->calculateTax($totalPrice);
        $grandTotal = $this->calculateGrandTotal($totalPrice, $tax);
        Session::put('grandTotal', $grandTotal);
        return view('frontend.product-cart')->with('cart', $cart)
            ->with('totalPrice', $totalPrice)
            ->with('tax', $tax)
            ->with('grandTotal', $grandTotal);
    }

    public function AddCart(Request $request, $product_id)
    {


        $product = Product::where('id', $product_id)->first();
        if ($product != null) {

            $oldCart = Session('Cart') ? Session('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->AddCart($product, $product_id);
            $request->session()->put('Cart', $newCart);

        }
        return Redirect::to('/cart');

    }



    public function increaseQuantity($id)
    {
        $cart = new Cart(Session::get('Cart')); // Khởi tạo đối tượng Cart từ session
        $product = Product::find($id); // Lấy thông tin sản phẩm từ database

        if ($product) {
            $cart->AddCart($product, $id); // Tăng số lượng sản phẩm trong giỏ hàng
            $this->updateCart($cart); // Cập nhật giỏ hàng mới vào session
        }

        // Chuyển hướng hoặc trả về kết quả tùy theo logic của bạn
        return Redirect::to('/cart');
    }

    public function decreaseQuantity($id)
    {
        $cart = new Cart(Session::get('Cart')); // Khởi tạo đối tượng Cart từ session

        if (isset($cart->products[$id])) {
            $cart->products[$id]['quanty']--; // Giảm số lượng sản phẩm trong giỏ hàng

            if ($cart->products[$id]['quanty'] <= 0) {
                unset($cart->products[$id]); // Xóa sản phẩm khỏi giỏ hàng nếu số lượng là 0 hoặc âm
            } else {
                $cart->products[$id]['price'] = $cart->products[$id]['quanty'] * $cart->products[$id]['productInfo']->price; // Tính lại giá tiền
            }

            $this->updateCart($cart); // Cập nhật giỏ hàng mới vào session
        }

        // Chuyển hướng hoặc trả về kết quả tùy theo logic của bạn
        return Redirect::to('/cart');
    }

    private function calculateTax($totalPrice)
    {
        $tax = $totalPrice * 0.05;
        return $tax;
    }

    private function calculateGrandTotal($totalPrice, $tax)
    {
        $grandTotal = $totalPrice + $tax;
        return $grandTotal;
    }

    private function updateCart($cart)
    {
        Session::put('Cart', $cart); // Cập nhật giỏ hàng mới vào session

        // Tính lại tổng tiền và tổng số lượng sản phẩm
        $totalPrice = $this->calculateTotalPrice($cart);
        $totalQuanty = $this->calculateTotalQuanty($cart);

        // Tính giá trị thuế và thành tiền
        $tax = $this->calculateTax($totalPrice);
        $grandTotal = $this->calculateGrandTotal($totalPrice, $tax);

        // Cập nhật giá trị cho các thuộc tính
        $cart->totalPrice = $totalPrice;
        $cart->totalQuanty = $totalQuanty;
        $cart->tax = $tax;
        $cart->grandTotal = $grandTotal;
    }

    private function calculateTotalPrice($cart)
    {
        $totalPrice = 0;

        foreach ($cart->products as $item) {
            $totalPrice += $item['price'];
        }

        return $totalPrice;
    }

    private function calculateTotalQuanty($cart)
    {
        $totalQuanty = 0;

        foreach ($cart->products as $item) {
            $totalQuanty += $item['quanty'];
        }

        return $totalQuanty;
    }

    public function deleteCartItem($product_id)
    {
        $cart = new Cart(Session::get('Cart')); // Khởi tạo đối tượng Cart từ session

        if (isset($cart->products[$product_id])) {
            $cart->DeleteItemCart($product_id); // Xóa sản phẩm khỏi giỏ hàng
            $this->updateCart($cart); // Cập nhật giỏ hàng mới vào session
        }

        // Chuyển hướng hoặc trả về kết quả tùy theo logic của bạn
        return Redirect::to('/cart');
    }
}
