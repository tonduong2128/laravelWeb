<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    public function index()
    {
        if (session()->get('admin_id')){
            return redirect('dashboard');
        };
        return view('admin_login');
    }
    public function show_dashboard()
    {
        return view('admin.dashboard');
    }
    public function dashboard(Request $request)
    {
        $email = trim($request->input('email')."1");
        $password = md5(trim($request->input('password')));
        $result = DB::table('table_admin')->where([['password',$password],['password',$password]])->get()->first();
        if ($result){
            $request->session()->put('admin_name', $result->name);
            $request->session()->put('admin_id', $result->id);
            return redirect('/dashboard');
        } 
        $request->session()->put('message', "Email or Password not match");
        return redirect('/admin');
    }
    public function logout(Request $request)
    {
        $request->session()->forget('admin_name');
        $request->session()->forget('admin_id');
        return redirect('/admin');
    }

}
