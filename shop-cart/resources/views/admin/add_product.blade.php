@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">
                    @if (session('message'))
                        <div class="text-success">
                            {{session('message')}}
                            {{session()->forget('message')}}
                        </div>
                    @endif
                    <form role="form" action="{{URL::to('/add_product')}}" method="post" enctype="multipart/form-data">
                            @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên sản phẩm</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Tên sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Giá sản phẩm</label>
                            <input type="text" name="price" class="form-control" id="exampleInputEmail1" placeholder="Tên sản phẩm">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Hình ảnh sản phẩm</label>
                            <input type="file" name="image" id="exampleInputFile">
                            <p class="help-block">Chọn ảnh tại đây</p>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                            <textarea rows="4" name="description" class="form-control" id="exampleInputPassword1" placeholder="Mô tả sản phẩm">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tóm tắt sản phẩm</label>
                            <textarea rows="4" name="content" class="form-control" id="exampleInputPassword1" placeholder="Mô tả sản phẩm">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="status-id">Thương hiệu sản phẩm</label>
                            <select name="brandId" id="status-id" class="form-control input-lg m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                             </select>
                        </div>
                        <div class="form-group">
                            <label for="status-id">Danh mục sản phẩm</label>
                            <select name="categoryId" id="status-id" class="form-control input-lg m-bot15">
                                @foreach ($category as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                             </select>
                        </div>
                        <div class="form-group">
                            <label for="status-id">Trạng thái sản phẩm</label>
                            <select name="status" id="status-id" class="form-control input-lg m-bot15">
                                @foreach ($brand as $item)
                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                             </select>
                        </div>
                        <button type="submit" class="btn btn-info">Thêm</button>
                    </form>
                    </div>

                </div>
            </section>
    </div>
</div>
@endsection