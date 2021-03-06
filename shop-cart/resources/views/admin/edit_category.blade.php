@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Basic Forms
                </header>
                <div class="panel-body">
                    <div class="position-center">
                    @if (session('message'))
                        <div class="text-success">
                            {{session('message')}}
                            {{session()->forget('message')}}
                        </div>
                    @endif
                    <form role="form" action="{{URL::to('/edit-category/'.$data->id)}}" method="post">
                            @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" name="name" value="{{$data->name}}" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục</label>
                            <textarea name="description" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục">{{$data->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <select name="status" class="form-control input-sm m-bot15">
                                <option {{$data->status==0?"selected":"";}} value="0">Ẩn</option>
                                <option {{$data->status==1?"selected":"";}} value="1">Hiển thị</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info">Lưu</button>
                    </form>
                    </div>
                </div>
            </section>
    </div>
</div>
@endsection