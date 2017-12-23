@extends('master')
@section('title')
{{$news_info->news_title}}
@endsection
@section('home_content')
<div id="breadcrumb">
    <div class="col-lg-12 breadcrumb">
        <li><a href="{{URL::to('/')}}"><i class="fa fa-home"></i></a></li>
        <li>details</li>
    </div>
</div>
<div class="col-lg-8 col-sm-8" style="background: #fff; padding: 0;">
    <div class="col-sm-12 single_news_adds">
        <img src="{{URL::to('/public/assets/images/10.gif')}}">
    </div>
    <div class="col-sm-12 news_full_wrapper">
        <div class="col-sm-12 single_news_top">
            <h3>{{$news_info->news_title}}</h3>
        </div>
        <div class="col-sm-12 single_news_top_2">
            <p><b>{{$news_info->reporter_name}}</b> | বাংলারকন্ঠ.কম</p>
            <p>প্রকাশ :<span> 22-Nov-2017</span></p>
        </div>
        <div class="col-sm-12 single-news">
            <img src="{{URL::to($news_info->news_image)}}" alt="img">
        </div>
        <div class="col-sm-12 single-news">
            <p><b><?php echo $news_info->news_short_description; ?></b></p>
            <p><?php echo $news_info->news_long_description; ?></p>
            <p>বাংলাদেশ সময়: ২০১৬ ঘণ্টা, ডিসেম্বর ০৪, ২০১৭ </p>
        </div>
    </div>
    <div class="col-sm-12 related_popular_news">
        <h3>এই বিভাগের সর্বোচ্চ পঠিত</h3>
        <div class="col-lg-12 col-sm-12 row popular_news">
            <?php
            $cid=$news_info->category_id;
            $related_popular_news = DB::table('tbl_news')
                    ->where('category_id',$cid)
                    ->orderBy('hit_count', 'DESC')
//                            ->orderBy(DB::raw('RAND()'))
//                            ->take(2)
                    ->get();
            foreach ($related_popular_news as $v_news) {
                ?>
            <div class="col-sm-4 related_popular_news_2">
                <a href="{{URL::to('/details/'.$v_news->news_id)}}">
                    <img src="{{URL::to($v_news->news_image)}}" width="120" alt="img">
                </a>
                <h4><a href="{{URL::to('/details/'.$v_news->news_id)}}">{{$v_news->news_title}}</a></h4>
                
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<aside class="col-lg-4 col-sm-4"  style="padding: 0px;">
    <div class="col-lg-12 col-sm-12 sidebar-wrapper" style="background: #fff;">
        <div class="col-sm-12 sidebar-top" style="padding: 0px;">
            <img src="{{URL::to('public/assets/images/19.gif')}}" alt="img">
        </div>
        <div class="col-sm-12 sidebar-top" style="padding: 0px;">
            <img src="{{URL::to('public/assets/images/2.gif')}}" alt="img">
        </div>
        <div class="col-lg-12 col-sm-12 related_news_wrap" style="">
            <h3>এই বিভাগের আরো খবর</h3>
            <?php
            $cid = $news_info->category_id;
            $related_news = DB::table('tbl_news')
                    ->where('category_id', $cid)
                    ->where('publication_status', 1)
                    ->orderBY('news_id', 'DESC')
//                        ->take(1)
                    ->get();
            foreach ($related_news as $v_news) {
                ?>
                <div class="col-sm-12 related_news">
                    <div class="col-sm-3 related_news_2">
                        <a href="{{URL::to('/details/'.$v_news->news_id)}}"><img src="{{URL::to($v_news->news_image)}}" width="" height="" alt=""></a>
                    </div>
                    <div class="col-sm-9 related_news_title">
                        <h4><a href="{{URL::to('/details/'.$v_news->news_id)}}"><?php echo $v_news->news_title; ?></a></h4>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="col-sm-12 adds" style="padding: 0;">
            <a href="#"><img src="{{URL::to('public/assets/images/6.gif')}}"></a>
            <a href="#"><img src="{{URL::to('public/assets/images/7.gif')}}"></a>
        </div>
        <div class="col-sm-12 poll" style="padding-bottom: 20px;">
            <div class="col-sm-8" style="padding: 0; padding-right: 10px;">
                <form action="" method="post">
                    <h3>আজকের প্রশ্ন</h3>
                    <p class="m_bottom_20 t_align_j">Lorem Ipsum is simply dummy text of the printing and typesetting industry?</p>
                    <input type="radio" name="poll" value="হ্যা" checked="checked"> হ্যা <br>
                    <input type="radio" name="poll" value="না "> না  <br>
                    <button type="submit" class="btn btn-primary">ভোট দিন</button>
                </form>
            </div>
            <div class="col-sm-4 poll-adds" style="padding: 0;">
                <img src="{{URL::to('public/assets/images/12.gif')}}" alt="">
            </div>
        </div>
        <div class="col-sm-12 adds">
            <a href="#"><img src="{{URL::to('public/assets/images/15.gif')}}" alt=""></a>
        </div>
    </div>
</aside>
<div class="col-sm-12 content-adds">
    <a href="#"><img src="{{URL::to('public/assets/images/22.gif')}}"></a>
</div>
@endsection
