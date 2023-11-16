@extends('layouts.admin')
@section('content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm danh mục sản phẩm
                        </header>
                        <div class="panel-body">
                            <?php
                                $message = Session::get('message');
                                if($message){
                                    echo '<span class="text-alert">'.$message.'</span>';
                                    Session::put('message',null);
                                }
                            ?>
                            <div class="position-center">
                            @foreach($edit_category_product as $key => $edit_value)
                                <form role="form" action="{{URL::to('/admin/update-category-product/'.$edit_value->id)}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục</label>
                                    <input type="text" name="category_product_name" value="{{$edit_value->name}}" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="category_product_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục">{{$edit_value->description}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Sắp xếp</label>
                                    <select name="category_sort_order" class="form-control input-sm m-bot15">
                                        <option value="0">Trước:</option>
                                        <option value="1">Sau:</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Parent_id</label>
                                    <select name="category_parent_id" class="form-control input-sm m-bot15">
                                        <option value="0">Cha</option>
                                        <option value="1">Mẹ</option>
                                    </select>
                                </div>
                                
                                <button type="submit" name="update_brand_product" class="btn btn-info">Cập nhật danh mục</button>
                            </form>
                            @endforeach
                            </div>

                        </div>
                    </section>

            </div>
@endsection