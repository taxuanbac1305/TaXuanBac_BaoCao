<h2>Danh mục sản phẩm</h2>
    <div class="panel-group category-products" id="accordian"><!--category-productsr-->
    @foreach($categorys as $cate)
    <div class="panel panel-default">
    <div class="panel-heading">
    <h4 class="panel-title">
        <a href="{{URL::to('/danh-muc-san-pham/'.$cate->id)}}">{{$cate->name}}</a>
    </h4>
    </div>
    </div>
    @endforeach
    </div><!--/category-products-->