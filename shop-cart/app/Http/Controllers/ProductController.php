<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function all_product()
    {
        $product = DB::table('table_product')
            ->join("table_category","table_product.categoryId","=","table_category.id")
            ->join("table_brand","table_product.brandId","=","table_brand.id")
            ->select('table_product.*','table_category.name as categoryName', 'table_brand.name as brandName')
            ->get();
        return view('admin.all_product')->with("product", $product);
    }
    public function add_product()
    {
        $category = DB::table('table_category')->get();
        $brand = DB::table('table_brand')->get();
        return view('admin.add_product')->with(['category'=>$category,'brand'=>$brand]);
    }
    public function insert_product(Request $request)
    {
        $data =[];
        $data["name"]=trim($request->input('name'));
        $data["categoryId"]=trim($request->input('categoryId'));
        $data["brandId"]= trim($request->input('brandId'));
        $data["description"]= trim($request->input('description'));
        $data["content"]=trim($request->input('content'));
        $data["price"]=trim($request->input('price'));
        $data["status"]=trim($request->input('status'));
        
        $file = $request->file('image');
        if ($file){
            $fileName = sha1(time()).".".$file->getClientOriginalExtension();
            $file->move('public/uploads/products',$fileName);
            $data['image']=$fileName;
            DB::table('table_product')->insert($data);
            $request->session()->put('message', "Thêm sản phẩm thành công");
            return redirect('/add-product');
        }
        $request->session()->put('message', "Tất cả các trường phải được điền");
        return redirect('/add-product');
    }
    public function acctive_status($id)
    {
        DB::table('table_product')->where('id',$id)->update(['status'=>0]);
        return redirect('/all-product');
    }
    public function unacctive_status($id)
    {
        DB::table('table_product')->where('id',$id)->update(['status'=>1]);
        return redirect('/all-product');
    }

    public function edit_product($id){
        $category = DB::table('table_category')->get();
        $brand = DB::table('table_brand')->get();
        $data = DB::table('table_product')->where('id',$id)->first();
        return view('admin.edit_product')->with(["data" => $data, "category"=>$category, "brand"=>$brand]);
    }
    public function edit_save_product(Request $request, $id)
    {
        $data =[];
        $data["name"]=trim($request->input('name'));
        $data["categoryId"]=trim($request->input('categoryId'));
        $data["brandId"]= trim($request->input('brandId'));
        $data["description"]= trim($request->input('description'));
        $data["content"]=trim($request->input('content'));
        $data["price"]=trim($request->input('price'));
        $data["status"]=trim($request->input('status'));
        $file = $request->file('image');
        $product = DB::table('table_product')->where("id",$id)->first();
        if ($file){
            $isFile = file_exists('public/uploads/products/'.$product->image);
            // $isFile = Storage::exists('public/uploads/products/'.$product->image); //??
            if ($isFile){
                // Storage::disk()->delete('./public/uploads/products/'.$product->image); //??
                unlink('./public/uploads/products/'.$product->image);
            }
            $fileName = sha1(time()).".".$file->getClientOriginalExtension();
            $file->move('public/uploads/products',$fileName);
            
            $data['image']=$fileName;
            var_dump($product);
            DB::table('table_product')->where("id",$id)->update($data);
            $request->session()->put('message', "Chỉnh sửa sản phẩm thành công");
            return redirect('/all-product');
        }
        DB::table('table_product')->where("id",$id)->update($data);
        $request->session()->put('message', "Chỉnh sửa sản phẩm thành công");
        return redirect('/all-product');
    }
    public function delete_product($id)
    {
        DB::table('table_product')->where('id',$id)->delete();
        session()->put('message', "Xóa danh mục sản phẩm thành công");
        return redirect('/all-product');
    }
}
