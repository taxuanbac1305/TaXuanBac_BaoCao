@extends('layouts.site')
@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="{{ URL::to('/') }}">Home</a></li>
                    <li class="active">Checkout Cart</li>
                </ol>
            </div>

            <div class="step-one">
                <h2 class="heading">Step1</h2>
            </div>
            <div class="checkout-options">
                <h3>New User</h3>
                <p>Checkout options</p>
                <ul class="nav">
                    <li>
                        <label><input type="checkbox"> Register Account</label>
                    </li>
                    <li>
                        <label><input type="checkbox"> Guest Checkout</label>
                    </li>
                    <li>
                        <a href=""><i class="fa fa-times"></i>Cancel</a>
                    </li>
                </ul>
            </div><!--/checkout-options-->

            <div class="register-req">
                <p>Please register or log in to checkout your cart and review your purchase history</p>
            </div><!--/register-req-->

            <div class="shopper-informations">
                <div class="row">
                    <div class="col-sm-5 clearfix">
                        <div class="bill-to">
                            <p>Fill in shipping information</p>
                            <div class="form-one">
                                <form action="{{ URL::to('/save-checkout') }}" method="POST" enctype="multipart/form-data">
                                    @csrf <!-- Thêm token csrf để bảo vệ form -->
                                    
                                    <input type="text" name="delivery_phone" placeholder="Số điện thoại" />
                                    <input type="text" name="delivery_address" placeholder="Địa chỉ" />
                                    <input type="text" name="note" placeholder="Ghi chú" />

                                    {{-- <input type="hidden" name="delivery_name" placeholder="Họ và Tên" /> --}}
                                    <?php
                                    $user_name = Session::get('user_name');
                                    if ($user_name != null) {
                                        echo '<input type="hidden" name="delivery_name" value="' . $user_name . '" />';
                                    } else {
                                        // Chuyển hướng đến trang đăng nhập
                                        header('Location: /DungProject/public/checkout-login');
                                        exit();
                                    }
                                    ?>
                                    {{-- <input type="hidden" name="delivery_gender" placeholder="Giới tính" /> --}}
                                    <?php
                                    $gender = Session::get('gender');
                                    if ($gender != null) {
                                        echo '<input type="hidden" name="delivery_gender" value="' . $gender . '" />';
                                    } else {
                                        // Chuyển hướng đến trang đăng nhập
                                        header('Location: /DungProject/public/checkout-login');
                                        exit();
                                    }
                                    ?>

                                    {{-- <input type="hidden" name="delivery_email" placeholder="Địa chỉ email" /> --}}
                                    <?php
                                    $email = Session::get('email');
                                    if ($email != null) {
                                        echo '<input type="hidden" name="delivery_email" value="' . $email . '" />';
                                    } else {
                                        // Chuyển hướng đến trang đăng nhập
                                        header('Location: /DungProject/public/checkout-login');
                                        exit();
                                    }
                                    ?>
                                    <!-- Giá trị user_id được truyền vào từ trang trước -->
                                    <input type="hidden" name="created_by" value="1" />

                                    <?php
                                    $user_id = Session::get('user_id');
                                    if ($user_id != null) {
                                        echo '<input type="hidden" name="user_id" value="' . $user_id . '" />';
                                    } else {
                                        // Chuyển hướng đến trang đăng nhập
                                        header('Location: /checkout-login');
                                        exit();
                                    }
                                    ?>
                                    <!-- Giá trị mặc định cho created_by -->
                                    <input type="hidden" name="update_by" value="" />
                                    <!-- Giá trị mặc định cho update_by -->
                                    <input type="hidden" name="status" value="1" />
                                    <input type="submit" class="btn btn-primary" value="Gửi" />
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-4 ">
                        <div class="order-message">
                            <img src="{{ asset('images/shopping.gif') }}" alt=""
                                style="height: 400px; width: 500px;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="review-payment">
                <h2>Review shopping cart</h2>
            </div>


            <div class="payment-options">
                <span>
                    <label><input type="checkbox"> Direct Bank Transfer</label>
                </span>
                <span>
                    <label><input type="checkbox"> Check Payment</label>
                </span>
                <span>
                    <label><input type="checkbox"> Paypal</label>
                </span>
            </div>
        </div>
    </section> <!--/#cart_items-->
@endsection
