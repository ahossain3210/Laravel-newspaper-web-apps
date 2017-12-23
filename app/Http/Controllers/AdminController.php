<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
//session_start();
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function __construct() {
//        $admin_id=Session::get('admin_id');
//        echo $admin_id;
//        
//        if($admin_id!=NULL)
//        {
//            return Redirect::to('/dashboard')->send();
//        }
//    }
    
    public function index()
    {
        $admin_id=Session::get('admin_id');
//        echo $admin_id;
        
        if($admin_id!=NULL)
        {
            return Redirect::to('/dashboard')->send();
        }
        
        return view('admin.admin_login');
    }
    
    public function admin_login_check(Request $request)
    {
        $admin_email=$request->admin_email;
        $admin_password=  md5($request->admin_password);
        
        $result=DB::table('tbl_admin')
                    ->where('admin_email', $admin_email)
                    ->where('admin_password', $admin_password)
                    ->first();
        if($result)
        {
            Session::put('admin_id',$result->admin_id);
            Session::put('admin_name',$result->admin_name);
            
            return Redirect::to('/dashboard');
        }else{
            
            
            Session::put('message','Your Email & password not match!');
            
            return Redirect::to('/admin');
        }
        
    }

    



















    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
