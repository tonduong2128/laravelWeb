<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function all_category()
    {
        $data = DB::table('table_category')->get();
        return view('admin.all_category')->with("data", $data);
    }
    public function add_category()
    {
        return view('admin.add_category');
    }
    public function insert_category(Request $request)
    {
        $request->validate([
            'name'=>"required",
            'description'=>"required",
            'status'=>"required",
        ]);
        $data =[];
        $data["name"]=trim($request->input('name'));
        $data["description"]= trim($request->input('description'));
        $data["status"]=trim($request->input('status'));
        DB::table('table_category')->insert($data);
        $request->session()->put('message', "Thêm danh mục sản phẩm thành công");
        return redirect('/add-category');
    }
    public function acctive_status($id)
    {
        DB::table('table_category')->where('id',$id)->update(['status'=>0]);
        return redirect('/all-category');
    }
    public function unacctive_status($id)
    {
        DB::table('table_category')->where('id',$id)->update(['status'=>1]);
        return redirect('/all-category');
    }

    public function edit_category($id){
        $data = DB::table('table_category')->where('id',$id)->first();
        return view('admin.edit_category')->with("data", $data);
    }
    public function edit_save_category(Request $request, $id)
    {
        $request->validate([
            'name'=>"required",
            'description'=>"required",
            'status'=>"required",
        ]);
        $data =[];
        $data["name"]=trim($request->input('name'));
        $data["description"]=trim($request->input('description'));
        $data["status"]=trim($request->input('status'));
        DB::table('table_category')->where('id',$id)->update($data);
        $request->session()->put('message', "Sửa danh mục sản phẩm thành công");
        return redirect('/all-category');
    }
    public function delete_category($id)
    {
        DB::table('table_category')->where('id',$id)->delete();
        session()->put('message', "Xóa danh mục sản phẩm thành công");
        return redirect('/all-category');
    }
}
