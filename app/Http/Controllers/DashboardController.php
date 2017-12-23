<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
//session_start();
class DashboardController extends Controller
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
//        if($admin_id==Null)
//        {
//            return Redirect::to('/admin')->send();
//        }
//    }
    
    public function index()
    {
        $admin_id = Session::get('admin_id');
//        echo $admin_id;
        if ($admin_id == null) {
            return Redirect::to('/admin')->send();
        }
        
        $admin_home_content=view('admin.admin_home_content');
        
        return view('admin.admin_master')
            ->with('admin_content',$admin_home_content);
    }
    
    public function logout()
    {
        Session::put('admin_id', null);
        Session::put('admin_name', null);

        Session::put('logout_message', 'Your are successfully logouted!');
        return Redirect::to('/admin');
    }
    
    public function add_category()
    {
        $add_catgory=view('admin.add_category');
        
        return view('admin.admin_master')
            ->with('admin_content',$add_catgory);
    }
    public function save_category(Request $request)
    {
        $data=array();
        $data['category_name']=$request->category_name;
        $data['category_description']=$request->category_description;
        $data['publication_status']=$request->publication_status;
        
//        echo"<pre>";
//        print_r($data);
//        exit();
        
        DB::table('tbl_category')->insert($data);
        
        
        Session::put('confirm_message', 'Save category successfully!');
        
        return Redirect::to('/add-category');
    }
    
    public function manage_category()
    {
        $category_info=DB::table('tbl_category')->get();
        
        $manage_catgory=view('admin.manage_category')
                ->with('category_info',$category_info);
        
        return view('admin.admin_master')
            ->with('admin_content',$manage_catgory);
    }
    public function unpublish_category($category_id)
    {
        DB::table('tbl_category')
                ->where('category_id',$category_id)
                ->update(['publication_status' => 0]);

        return Redirect::to('/manage-category');
    }
    public function publish_category($category_id)
    {
        DB::table('tbl_category')
                ->where('category_id',$category_id)
                ->update(['publication_status' => 1]);

        return Redirect::to('/manage-category');
    }
    public function edit_category($category_id)
    {
        $category_info_by_id=DB::table('tbl_category')
                ->where('category_id',$category_id)
                ->first();
        
        $edit_catgory=view('admin.edit_category')
                ->with('category_info',$category_info_by_id);
        
        return view('admin.admin_master')
            ->with('admin_content',$edit_catgory);
    }
    public function update_category(Request $request)
    {
        $category_id=$request->category_id;
        
        $data=array();
        $data['category_name']=$request->category_name;
        $data['category_description']=$request->category_description;
        $data['publication_status']=$request->publication_status;
        
        DB::table('tbl_category')
                ->where('category_id',$category_id)
                ->update($data);

        Session::put('message', 'Update Category Successfully !');

        return Redirect::to('/manage-category');
    }
    public function delete_category($category_id)
    {
        DB::table('tbl_category')
                ->where('category_id',$category_id)
                ->delete();
        
        return Redirect::to('/manage-category');
    }
    public function add_news()
    {
        $publish_category_info=DB::table('tbl_category')
                ->where('publication_status',1)
                ->get();
        
        $add_news=view('admin.add_news')
                ->with('category_info',$publish_category_info);
        
        return view('admin.admin_master')
            ->with('admin_content',$add_news);
    }
    public function save_news(Request $request)
    {
        $data=array();
        
        $data['news_title']=$request->news_title;
        $data['category_id']=$request->category_id;
        $data['reporter_name']=$request->reporter_name;
        $data['news_placement']=$request->news_placement;
        $data['news_short_description']=$request->news_short_description;
        $data['news_long_description']=$request->news_long_description;
        $data['publication_status']=$request->publication_status;
        
        
//        echo "<pre>";
//        print_r($data);
//        exit();

        $image = $request->file('news_image');
        if ($image) {
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'News_image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['news_image'] = $image_url;

                DB::table('tbl_news')->insert($data);



                Session::put('message', 'Save News Successfully !');

                return Redirect::to('/add-news');
            } else {
                DB::table('tbl_news')->insert($data);
                Session::put('message', 'Image Does not Save Successfully');

                return Redirect::to('/add-news');
            }
        }
        
    }
    public function manage_news()
    {
        $news_info=DB::table('tbl_news')
                ->join('tbl_category','tbl_news.category_id','=','tbl_category.category_id')
                ->select('tbl_news.*','tbl_category.category_name')
                ->get();
        
        $manage_news=view('admin.manage_news')
                ->with('news_info',$news_info);
        
        return view('admin.admin_master')
            ->with('admin_content',$manage_news);
    }
    public function unpublish_news($news_id)
    {
        DB::table('tbl_news')
                ->where('news_id',$news_id)
                ->update(['publication_status' =>0]);
        
        return Redirect::to('/manage-news');
    }
    public function publish_news($news_id)
    {
        DB::table('tbl_news')
                ->where('news_id',$news_id)
                ->update(['publication_status' =>1]);
        
        return Redirect::to('/manage-news');
    }
    public function unslider_news($news_id)
    {
        DB::table('tbl_news')
                ->where('news_id',$news_id)
                ->update(['slider_status' =>0]);
        
        return Redirect::to('/manage-news');
    }
    public function slider_news($news_id)
    {
        DB::table('tbl_news')
                ->where('news_id',$news_id)
                ->update(['slider_status' =>1]);
        
        return Redirect::to('/manage-news');
    }
    public function unfeatured_news($news_id)
    {
        DB::table('tbl_news')
                ->where('news_id',$news_id)
                ->update(['feature_status' =>0]);
        
        return Redirect::to('/manage-news');
    }
    public function featured_news($news_id)
    {
        DB::table('tbl_news')
                ->where('news_id',$news_id)
                ->update(['feature_status' =>1]);
        
        return Redirect::to('/manage-news');
    }
    public function unheadlined_news($news_id)
    {
        DB::table('tbl_news')
                ->where('news_id',$news_id)
                ->update(['headline_status' =>0]);
        
        return Redirect::to('/manage-news');
    }
    public function headlined_news($news_id)
    {
        DB::table('tbl_news')
                ->where('news_id',$news_id)
                ->update(['headline_status' =>1]);
        
        return Redirect::to('/manage-news');
    }
    public function delete_news($news_id)
    {
        DB::table('tbl_news')
                ->where('news_id',$news_id)
                ->delete();
        
        return Redirect::to('/manage-news');
    }
    public function edit_news($news_id)
    {
        $news_info_by_id=DB::table('tbl_news')
//                ->join('tbl_category','tbl_news.category_id','=','tbl_category.category_id')
                ->where('news_id',$news_id)
                ->first();
        
        $publish_category_info=DB::table('tbl_category')
                ->where('publication_status',1)
                ->get();
        
        $edit_news=view('admin.edit_news')
                ->with('news_info',$news_info_by_id)
                ->with('category_info',$publish_category_info);
        
        return view('admin.admin_master')
            ->with('admin_content',$edit_news);
    }
    public function update_news(Request $request)
    {
        $news_id=$request->news_id;
        
        $data=array();
        
        $data['news_title']=$request->news_title;
        $data['category_id']=$request->category_id;
        $data['reporter_name']=$request->reporter_name;
        $data['news_placement']=$request->news_placement;
        $data['news_short_description']=$request->news_short_description;
        $data['news_long_description']=$request->news_long_description;
        $data['publication_status']=$request->publication_status;
        
        //        echo"<pre>";
//        print_r($data);
//        exit();


         $image = $request->file('news_image');
        if ($image) {
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'News_image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $data['news_image'] = $image_url;

                DB::table('tbl_news')
                        ->where('news_id',$news_id)
                        ->update($data);
                @unlink($request->news_old_image);

                Session::put('message', 'Update News Successfully !');

                return Redirect::to('/manage-news');
            } else {
                DB::table('tbl_news')
                        ->where('news_id',$news_id)
                        ->update($data);
                Session::put('message', 'Image Does not Save Successfully');

                return Redirect::to('/manage-news');
            }
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
