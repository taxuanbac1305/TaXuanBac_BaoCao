@extends('layouts.admin')
@section('content')

<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm thương hiệu sản phẩm
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
                            @foreach($edit_brand_product as $key => $edit_value)
                                <form role="form" action="{{URL::to('/admin/update-brand-product/'.$edit_value->id)}}" method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thương hiệu</label>
                                    <input type="text" name="brand_product_name" value="{{$edit_value->name}}" class="form-control" id="exampleInputEmail1" placeholder="Tên thương hiệu">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="brand_product_desc" id="exampleInputPassword1" placeholder="Mô tả thương hiệu">{{$edit_value->description}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Sắp xếp</label>
                                    <select name="brand_sort_order" class="form-control input-sm m-bot15">
                                        <option value="0">Trước:</option>
                                        <option value="1">Sau:</option>
                                    </select>
                                </div>

                                
                                
                                <button type="submit" name="update_brand_product" class="btn btn-info">Cập nhật thương hiệu</button>
                            </form>
                            @endforeach
                            </div>

                        </div>
                    </section>

            </div>

@endsection