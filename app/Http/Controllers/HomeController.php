<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       $slider_news=DB::table('tbl_news')
               ->orderBy('news_id','DESC')
               ->where('news_placement','slide')
               ->take(10)
               ->get();
       $feature_news=DB::table('tbl_news')
               ->orderBy('news_id','DESC')
               ->where('news_placement','feature')
               ->take(2)
               ->get();
       
        $latest_news=DB::table('tbl_news')
               ->orderBy('news_id','DESC')
               ->where('news_placement','middle-top')
               ->take(4)
               ->get();
        
        $home_content=view('pages.home_content')
                ->with('slider_news',$slider_news)
                ->with('feature_news',$feature_news)
                ->with('latest_news',$latest_news);
//        $sidebar=view('pages.sidebar');
        
        return view('master')
                ->with('home_content',$home_content);
//                ->with('sidebar',$sidebar);
    }
    public function news_details($news_id)
    {
//        ............Hit Counts............
        $news_info=DB::table('tbl_news')
                ->where('news_id',$news_id)
                ->first();
        
        $data=array(); 
        $data['hit_count']=$news_info->hit_count+1;
        DB::table('tbl_news')
                ->where('news_id',$news_id)
                ->update($data);

//        ............Hit Counts............
        
        $news_details_by_id=DB::table('tbl_news')
                ->where('news_id',$news_id)
                ->first();

        
        $news_details=view('pages.details')
                ->with('news_info',$news_details_by_id);
        
        return view('master')
                ->with('home_content',$news_details);
    }
    public function category_news($category_id)
    {
        $catgory_info_by_id=DB::table('tbl_category')
                ->where('category_id',$category_id)
                ->first();
        
        
        
//        echo '<pre>';
//        print_r($news_info_by_cid);
//        exit();
        
        $category_news=  view('pages.category_news')
                ->with('category_info',$catgory_info_by_id);
        
        return view('master')
                ->with('home_content',$category_news);
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
