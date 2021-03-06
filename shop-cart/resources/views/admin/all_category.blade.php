@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
      <div class="panel-heading">
        Liệt kê danh mục sản phẩm
      </div>
      <div class="row w3-res-tb">
        <div class="col-sm-5 m-b-xs">
          <select class="input-sm form-control w-sm inline v-middle">
            <option value="0">Bulk action</option>
            <option value="1">Delete selected</option>
            <option value="2">Bulk edit</option>
            <option value="3">Export</option>
          </select>
          <button class="btn btn-sm btn-default">Apply</button>                
        </div>
        <div class="col-sm-4">
        </div>
        <div class="col-sm-3">
          <div class="input-group">
            <input type="text" class="input-sm form-control" placeholder="Search">
            <span class="input-group-btn">
              <button class="btn btn-sm btn-default" type="button">Go!</button>
            </span>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-striped b-t b-light">
          <thead>
            <tr>
              <th style="width:20px;">
                <label class="i-checks m-b-none">
                  <input type="checkbox" class="check-items"><i></i>
                </label>
              </th>
              <th>Tên danh mục</th>
              <th>Mô tả</th>
              <th>Hiện thị</th>
              <th>Ngày thêm</th>
              <th style="width:30px;">Acction</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($data as $result)
              <tr>
                <td>
                  <label class="i-checks m-b-none">
                    <input type="checkbox" class="check-item" name="post[]">
                  </label>
                </td>
                <td>{{$result->name}}</td>
                <td>{{$result->description}}</td>
                <td>
                  <span class="text-ellipsis">
                  @if ($result->status == 1)
                    <a href="{{URL::to('/unactive-status-category/'.$result->id)}}">
                      <i class="fa fa-check-circle " style="font-size: 26px" aria-hidden="true"></i> 
                    </a>
                    @else
                    <a href="{{URL::to('/active-status-category/'.$result->id)}}" >
                      <i class="fa fa-circle-thin " style="font-size: 26px" aria-hidden="true"></i>
                    </a>
                  @endif  
                  </span>
                </td>
                <td><span class="text-ellipsis">{{$result->updated_at}}</span></td>
                <td>
                  <a href="{{URL::to('/edit-category/'.$result->id)}}" class="active" ui-toggle-class="">
                    <i class="fa fa-pencil-square-o text-success text-active"></i>
                  </a>
                  <a href="{{URL::to('/delete-category/'.$result->id)}}" class="active" ui-toggle-class="">
                    <i class="fa fa-times text-danger text"></i>
                  </a>
                </td>
              </tr>
            @empty
            <tr>
              <td colspan="6">
                <p class="text-danger">Không có danh mục sản phầm nào</p>
              </td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
      <footer class="panel-footer">
        <div class="row">
          
          <div class="col-sm-5 text-center">
            <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
          </div>
          <div class="col-sm-7 text-right text-center-xs">                
            <ul class="pagination pagination-sm m-t-none m-b-none">
              <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
              <li><a href="">1</a></li>
              <li><a href="">2</a></li>
              <li><a href="">3</a></li>
              <li><a href="">4</a></li>
              <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
    @if (session('message'))
    <div class="text-success">
        {{session('message')}}
        {{session()->forget('message')}}
    </div>
    @endif
</div>
@endsection