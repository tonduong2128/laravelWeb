@extends('admin_layout')
@section('add_category')
<div class="row">
    <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Basic Forms
                </header>
                <div class="panel-body">
                    <div class="position-center">
                        <form role="form">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục</label>
                            <textarea name="description" class="form-control" id="exampleInputPassword1" placeholder="Mô tả danh mục">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <select class="form-control input-sm m-bot15">
                                <option>Option 1</option>
                                <option>Option 2</option>
                                <option>Option 3</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>
                    </div>

                </div>
            </section>
    </div>
</div>
@endsection