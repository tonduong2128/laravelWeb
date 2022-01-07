<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BrandController extends Controller
{
    public function all_brand()
    {
        $data = DB::table('table_brand')->get();
        return view('admin.all_brand')->with("data", $data);
    }
    public function add_brand()
    {
        return view('admin.add_brand');
    }
    public function insert_brand(Request $request)
    {
        $data =[];
        $data["name"]=trim($request->input('name'));
        $data["description"]= trim($request->input('description'));
        $data["status"]=trim($request->input('status'));
        DB::table('table_brand')->insert($data);
        $request->session()->put('message', "Thêm danh mục sản phẩm thành công");
        return redirect('/add-brand');
    }
    public function acctive_status($id)
    {
        DB::table('table_brand')->where('id',$id)->update(['status'=>0]);
        return redirect('/all-brand');
    }
    public function unacctive_status($id)
    {
        DB::table('table_brand')->where('id',$id)->update(['status'=>1]);
        return redirect('/all-brand');
    }

    public function edit_brand($id){
        $data = DB::table('table_brand')->where('id',$id)->first();
        return view('admin.edit_brand')->with("data", $data);
    }
    public function edit_save_brand(Request $request, $id)
    {
        $data =[];
        $data["name"]=trim($request->input('name'));
        $data["description"]=trim($request->input('description'));
        $data["status"]=trim($request->input('status'));
        DB::table('table_brand')->where('id',$id)->update($data);
        $request->session()->put('message', "Sửa danh mục sản phẩm thành công");
        return redirect('/all-brand');
    }
    public function delete_brand($id)
    {
        DB::table('table_brand')->where('id',$id)->delete();
        session()->put('message', "Xóa danh mục sản phẩm thành công");
        return redirect('/all-brand');
    }
}
