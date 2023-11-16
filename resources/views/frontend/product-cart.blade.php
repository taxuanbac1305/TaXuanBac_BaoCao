@extends('layouts.site')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{ URL::to('/') }}">Trang chủ</a></li>
                    <li class="active">Giỏ hàng của bạn</li>
                </ol>
            </div>
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Hình ảnh</td>
                            <td class="description">Mô tả</td>
                            <td class="price">Giá</td>
                            <td class="quantity">Số lượng</td>
                            <td class="total">Tổng tiền</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (Session::get('Cart')->products as $item)
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img
                                            src="{{ asset('uploads/product/' . $item['productInfo']->image) }}"
                                            alt="" style="height: 100px; width: 100px;"></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="">{{ $item['productInfo']->name }}</a></h4>
                                    <p>Mã ID: {{ $item['productInfo']->id }}</p>
                                    <p>{{ $item['productInfo']->description }}</p>
                                </td>
                                <td class="cart_price">
                                    <p>{{ number_format($item['productInfo']->price) . ' ' . 'VND' }}</p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <a class="cart_quantity_up"
                                            href="{{ route('cart.increase', ['id' => $item['productInfo']->id]) }}"> + </a>
                                        <input class="cart_quantity_input" type="number" min="1" name="quanty"
                                            value="{{ $item['quanty'] }}" data-product-id="{{ $item['productInfo']->id }}"
                                            onchange="updateCartItemQuantity(this)">
                                        <a class="cart_quantity_down"
                                            href="{{ route('cart.decrease', ['id' => $item['productInfo']->id]) }}"> - </a>
                                    </div>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">{{ number_format($item['price']) . ' ' . 'VND' }}</p>
                                </td>
                                <td class="cart_delete">
                                    <a class="cart_quantity_delete"
                                        href="{{ route('deleteCartItem', $item['productInfo']->id) }}"><i
                                            class="fa fa-times"></i></a>
                                </td>
                                <!-- ... -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section> <!--/#cart_items-->
    <section id="do_action">
        <div class="container">
            <div class="heading">
                <h3>Số tiền cần thanh toán</h3>
                <p>Cảm ơn bạn vì đã yêu thích và lựa chọn sản phẩm của chúng tôi</p>
            </div>
            <div class="row">

                <div class="col-sm-6">
                    <div class="total_area">
                        <ul>
                            <li id="totalPrice">Tổng<span>{{ number_format($totalPrice) . ' ' . 'VND' }}</span></li>
                            <li id="taxValue">Thuế<span>{{ number_format($tax) . ' ' . 'VND' }}</span></li>
                            <li id="shippingFeeValue">Phí vận chuyển<span>Free</span></li>
                            <li id="grandTotal">Thành tiền<span>{{ number_format($grandTotal) . ' ' . 'VND' }}</span></li>
                        </ul>
                        {{-- <a class="btn btn-default update" href="">Update</a> --}}
                        
                        <?php
                        $user_id = Session::get('user_id');
                        if ($user_id != null) {
                            echo '<a class="btn btn-default check_out" href="' . URL::to('/checkout') . '">Thanh toán</a>';
                        } else {
                            // Chuyển hướng đến trang đăng nhập
                            header('Location: /DungProject/public/checkout-login');
                            exit();
                        }
                        ?>
                    </div>

                </div>
            </div>
        </div>
    </section><!--/#do_action-->
@endsection
