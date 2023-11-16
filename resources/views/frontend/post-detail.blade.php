@extends('layouts.site')
@section('content')
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">{{ $meta_title }}</h2>
        <div class="product-image-wrapper" style="border: none;">
            @foreach ($post as $key => $p)
                <div class="single-products" style="margin: 10px 0; padding: 2px;">
                    {!! $p->content !!}
                </div>
                <div class="clearfix"></div>
            @endforeach
        </div>
    </div><!--features_items-->
@endsection
