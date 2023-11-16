@extends('layouts.site')
@section('content')
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">{{ $category_name }}</h2>
        @foreach ($product_category as $key => $item)
            <x-product-item :rowproduct="$item" />
        @endforeach
    </div><!--features_items-->
@endsection