@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm thương hiệu sản phẩm
                </header>
                <div class="panel-body">
                    <div class="position-center">
                    @if (session('message'))
                        <div class="text-success">
                            {{session('message')}}
                            {{session()->forget('message')}}
                        </div>
                    @endif
                    <form role="form" action="{{URL::to('/add_brand')}}" method="post">
                            @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên thương hiệu</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Tên thương hiệu">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                            <textarea name="description" class="form-control" id="exampleInputPassword1" placeholder="Mô tả thương hiệu"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="status-id">Trạng thái thương hiệu</label>
                            <select name="status" id="status-id"class="form-control input-sm m-bot15">
                                <option value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
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