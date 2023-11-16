@extends('layouts.site')
@section('content')
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Tìm kiếm sản phẩm</h2>
        @foreach ($search_product as $key => $item)
            <x-product-item :rowproduct="$item" />
        @endforeach
        
    </div><!--features_items-->
@endsection
