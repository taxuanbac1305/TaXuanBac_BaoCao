<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | TXB-Carworld</title>
    <link href="{{ asset('../public/frontend/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{
    asset('../public/frontend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('../public/frontend/css/prettyPhoto.css') }}" rel="stylesheet">
    <link href="{{ asset('../public/frontend/css/price-range.css') }}" rel="stylesheet">
    <link href="{{
    asset('../public/frontend/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('../public/frontend/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('../public/frontend/css/responsive.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!--[if lt IE 9]>
<script src="js/html5shiv.js"></script> <script src="js/respond.min.js"></script> <![endif]-->
    <link rel="shortcut icon" href="images /ico / favicon.ico ">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
    <script>
        window.addEventListener('load', function () {
            var quantityInputs = document.querySelectorAll('.cart-quantity-input');

            quantityInputs.forEach(function (input) {
                input.addEventListener(' change ', function () {
                    var productId = input.getAttribute('data-product-id');
                    var newQuantity = parseInt(input.value);

                    fetch('/update-cart/' + productId + '/' + newQuantity)
                        .then(response => response.json())
                        .then(data => {
                            // Cập nhật giỏ hàng trên giao diện người dùng với dữ liệu mới từ server
                            // Ví dụ: Cập nhật tổng số lượng hoặc tổng giá trị
                        })
                        .catch(error => {
                            console.error(' Lỗi khi cập nhật giỏ hàng: ', error);
                        });
                });
            });
        });
    </script>
</head><!-- /head-->

<body>
    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> 0909865953</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> xuanbac89793@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->

        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="index.html"><img src="{{ asset('../public/frontend/images/logo111.png') }}"
                                    alt="" /></a>
                        </div>
                        <div class="btn-group pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa"
                                    data-toggle="dropdown">
                                    USA
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Canada</a></li>
                                    <li><a href="#">UK</a></li>
                                </ul>
                            </div>

                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa"
                                    data-toggle="dropdown">
                                    DOLLAR
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Canadian Dollar</a></li>
                                    <li><a href="#">Pound</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="{{ URL::to('/checkout-login') }}"><i class="fa fa-user"></i> Account</a>
                                </li>
                                <li><a href="#"><i class="fa fa-star"></i> Favorite</a></li>
                                <?php 
                                    $user_id = Session::get('user_id');
                                    // $delivery_id = Session::get('delivery_id');
                                    if($user_id != NULL ){
                                ?>
                                <li><a href="{{ URL::to('/checkout') }}"><i class="fa fa-crosshairs"></i> Pay</a>
                                    <?php 
                                    } else{
                                ?>
                                <li><a href="{{ URL::to('/checkout-login') }}"><i class="fa fa-crosshairs"></i> Pay</a>
                                </li>
                                <?php 
                                    }
                                ?>


                                </li>
                                <?php 
                                    $user_id = Session::get('user_id');
                                    if($user_id != NULL){
                                ?>
                                <li><a href="{{ URL::to('/cart') }}"><i class="fa fa-shopping-cart"></i> Cart</a>
                                </li>
                                <?php 
                                    } else{
                                ?>
                                <li><a href="{{ URL::to('/checkout-login') }}"><i class="fa fa-shopping-cart"></i>
                                        Cart</a>
                                </li>
                                <?php 
                                    }
                                ?>
                                <?php 
                                    $user_id = Session::get('user_id');
                                    if($user_id != NULL){
                                ?>
                                <li><a href="{{ URL::to('/checkout-logout') }}"><i class="fa fa-lock"></i> Log
                                        out</a></li>
                                <?php 
                                    } else{
                                ?>
                                <li><a href="{{ URL::to('/checkout-login') }}"><i class="fa fa-lock"></i> Log
                                        in</a>
                                </li>
                                <?php 
                                    }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->

        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{ URL::to('/trang-chu') }}" class="active">Home</a></li>
                                <li class="dropdown"><a href="#">Product<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.html">Products</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">News<i class="fa fa-angle-down"></i></a>
                                    @php
                                        $all_categorypost = \App\Models\CategoryPost::orderBy('id','DESC')->get();
                                    @endphp
                                    <ul role="menu" class="sub-menu">
                                        @foreach($all_categorypost as $key =>$danhmucbaiviet)
                                        <li><a href="{{ URL::to('/danh-muc-bai-viet/'.$danhmucbaiviet->slug) }}">{{ $danhmucbaiviet->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="404.html">Cart</a></li>
                                <li><a href="contact-us.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <form action="{{ URL::to('/tim-kiem') }}" method="POST">
                            @csrf <!-- Thêm token csrf để bảo vệ form -->
                            <div class="search_box pull-right">
                                <input type="text" name="keywords_submit" placeholder="Tìm kiếm sản phẩm" />
                                <input type="submit" name="search_items" class="btn btn-info btn-sm"
                                    value="Tìm kiếm" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->

    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        @php
                        $all_banner2 = \App\Models\Banner::all();
                        @endphp
                        <ol class="carousel-indicators">
                            @foreach ($all_banner2 as $key => $banner)
                            <li data-target="#slider-carousel" data-slide-to="{{ $key }}" {{ $key==0 ? ' class="active"'
                                : '' }}></li>
                            @endforeach
                        </ol>

                        <div class="carousel-inner">
                            @php
                                $all_banner = \App\Models\Banner::all();
                            @endphp

                            @foreach ($all_banner as $key => $banner)
                                <div class="item{{ $key == 0 ? ' active' : '' }}">
                                    <div class="col-sm-6">
                                        <h1><span>E</span>-SHOPPER</h1>
                                        <h2>{{ $banner->name }}</h2>
                                        <p>{{ $banner->description }}</p>
                                        <button type="button" class="btn btn-default get">Get it now</button>
                                    </div>
                                    <div class="col-sm-6">
                                        <img src="{{ asset('../public/uploads/banner/' . $banner->image) }}"
                                            class="girl img-responsive" alt=""
                                            style="height: 500px; width: 500px; padding-right: 2px;" />

                                    </div>
                                </div>
                            @endforeach

                        </div>

                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section><!--/slider-->

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <x-list-category />
                        <x-list-brand />

                    </div>
                </div>

                <div class="col-sm-9 padding-right">

                    @yield('content')




                </div>
            </div>
        </div>
    </section>

    <footer id="footer"><!--Footer-->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="companyinfo">
                            <h2><span>TXB</span>-Carworld</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
                        </div>
                    </div>
                    <div class="col-sm-7">


                        <div class="col-sm-3">
                            <div class="address">
                                <img src="{{ asset('../public/frontend/images/map.png') }}" alt="" />
                                <p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-widget">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>Service</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="#">Online Help</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                    <li><a href="#">Order Status</a></li>
                                    <li><a href="#">Change Location</a></li>
                                    <li><a href="#">FAQ’s</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>Quock Shop</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="#">Lamboghini</a></li>
                                    <li><a href="#">Ferrari</a></li>
                                    <li><a href="#">Bugatti</a></li>
                                    <li><a href="#">Porsche</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>Policies</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="#">Terms of Use</a></li>
                                    <li><a href="#">Privecy Policy</a></li>
                                    <li><a href="#">Refund Policy</a></li>
                                    <li><a href="#">Billing System</a></li>
                                    <li><a href="#">Ticket System</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="single-widget">
                                <h2>About Shopper</h2>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="#">Company Information</a></li>
                                    <li><a href="#">Careers</a></li>
                                    <li><a href="#">Store Location</a></li>
                                    <li><a href="#">Affillate Program</a></li>
                                    <li><a href="#">Copyright</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-3 col-sm-offset-1">
                            <div class="single-widget">
                                <h2>About Shopper</h2>
                                <form action="#" class="searchform">
                                    <input type="text" placeholder="Your email address" />
                                    <button type="submit" class="btn btn-default"><i
                                            class="fa fa-arrow-circle-o-right"></i></button>
                                    <p>Get the most recent updates from <br />our site and be updated your self...</p>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <p class="pull-left">Copyright © 2023 TXB-Carworld Inc. All rights reserved.</p>
                        <p class="pull-right">Designed by <span><a target="_blank"
                                    href="https://www.facebook.com/bac.ta.1305?mibextid=ZbWKwL">TXB</a></span></p>
                    </div>
                </div>
            </div>

    </footer><!--/Footer-->



    <script src="{{ asset('../public/frontend/js/jquery.js') }}"></script>
    <script src="{{ asset('../public/frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('../public/frontend/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('../public/frontend/js/price-range.js') }}"></script>
    <script src="{{ asset('../public/frontend/js/jquery.prettyPhoto.js') }}"></script>
    <script src="{{ asset('../public/frontend/js/main.js') }}"></script>

    <script>
        $(document).ready(function () {
            $('.cart_quantity_input').on('keydown', function (event) {
                if (event.keyCode === 13) { // Kiểm tra nếu phím nhấn là Enter (keyCode 13)
                    event.preventDefault(); // Ngăn chặn hành vi mặc định (chuyển trang)
                    var quantity = $(this).val();
                    var productId = $(this).data('product-id');

                    // Gửi yêu cầu Ajax để cập nhật số lượng sản phẩm
                    var increaseUrl = "{{ route('cart.increase', ['id' => ':id']) }}";
                    var decreaseUrl = "{{ route('cart.decrease', ['id' => ':id']) }}";

                    // Thay thế :id trong URL bằng productId
                    var updatedIncreaseUrl = increaseUrl.replace(':id', productId);
                    var updatedDecreaseUrl = decreaseUrl.replace(':id', productId);

                    // Lấy số lượng hiện tại của sản phẩm
                    var currentQuantity = parseInt($(this).attr('value'));

                    // Kiểm tra giá trị quantity để xác định xem là yêu cầu tăng hay giảm số lượng
                    var requestUrl = (quantity > currentQuantity) ? updatedIncreaseUrl : updatedDecreaseUrl;

                    $.ajax({
                        url: requestUrl, // Đường dẫn đến route xử lý tăng/giảm số lượng
                        method: 'GET',
                        success: function (response) {
                            // Cập nhật lại tổng giá tiền và các thông tin liên quan trong giao diện
                            $('.cart_total_price').text(response.totalPrice);
                            // Cập nhật các thông tin khác tương ứng

                            // Thực hiện các thao tác khác sau khi cập nhật thành công
                        }
                    });
                }
            });
        });
    </script>

    <script>
        window.addEventListener('load', function () {
            var increaseBtns = document.querySelectorAll('.cart_quantity_up');
            var totalPriceElement = document.getElementById('totalPrice');

            increaseBtns.forEach(function (btn) {
                btn.addEventListener('click', function () {
                    fetch('/get_total_price')
                        .then(response => response.json())
                        .then(data => {
                            totalPriceElement.innerHTML = 'Tổng<span>' + data.totalPrice +
                                ' VND</span>';
                        })
                        .catch(error => {
                            console.error('Lỗi khi lấy giá trị của $totalPrice: ', error);
                        });
                });
            });
        });
    </script>





</body>

</html>