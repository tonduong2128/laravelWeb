<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $category = DB::table('table_category')->where('status',1)->get();
        $brand = DB::table('table_brand')->where('status',1)->get();
        // $product = DB::table('table_product')
        // ->join("table_category","table_product.categoryId","=","table_category.id")
        // ->join("table_brand","table_product.brandId","=","table_brand.id")
        // ->select('table_product.*','table_category.name as categoryName', 'table_brand.name as brandName')
        // ->get();
        $product = DB::table('table_product')->where('status',1)->limit(8)->get();
        return view('pages.home')->with(["category"=>$category, "brand"=>$brand, "product"=>$product]);
    }
}
