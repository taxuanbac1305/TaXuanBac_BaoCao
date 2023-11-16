@extends('layouts.site')
@section('content')
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">{{ $brand_name }}</h2>
        @foreach ($product_brand as $key => $item)
            <x-product-item :rowproduct="$item" />
        @endforeach
    </div><!--features_items-->
@endsection