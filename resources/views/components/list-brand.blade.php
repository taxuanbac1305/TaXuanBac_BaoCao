<div class="brands_products"><!--brands_products--> <h2>Thương hiệu sản phẩm</h2> <div class="brands-name">
    <ul class="nav nav-pills nav-stacked">
    @foreach($brands as $brand)
    <li>
        <a href="{{URL::to('/thuong-hieu-san-pham/'.$brand->id)}}">
        <span class="pull-right"></span>{{$brand->name}}
    </a>
    </li>
    @endforeach
    </ul>
</div>
</div><!--/brands_products-->