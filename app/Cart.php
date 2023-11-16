<?php
namespace App;
class Cart{
    public $products = null;
    public $totalPrice = 0;
    public $totalQuanty = 0;
    public $tax = 0;
    public $grandTotal = 0; // Thêm thuộc tính grandTotal

    public function __construct($cart)
    {
        if ($cart && is_object($cart)) {
            $this->products = $cart->products;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQuanty = $cart->totalQuanty;
            $this->tax = $cart->tax;
            $this->grandTotal = $cart->grandTotal; // Sao chép giá trị grandTotal từ đối tượng Cart ban đầu
        }
    }

    public function AddCart($product, $id){
        $newProduct = ['quanty' => 0, 'price' => $product->price, 'productInfo' => $product];
        if ($this->products) {
            if (array_key_exists($id, $this->products)) {
                $newProduct = $this->products[$id];
            }
        }
        $newProduct['quanty']++;
        $newProduct['price'] = $newProduct['quanty'] * $product->price;
        $this->products[$id] = $newProduct;
        $this->totalPrice += $newProduct['price'];
    }

    public function DeleteItemCart($product_id){
        $this->totalQuanty -= $this->products[$product_id]['quanty'];
        $this->totalPrice -= $this->products[$product_id]['price'];
        unset($this->products[$product_id]);
    }
}


?>