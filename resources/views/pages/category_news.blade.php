@extends('master')
@section('title')
{{$category_info->category_name}}
@endsection
@section('home_content')
<div id="breadcrumb">
    <div class="col-lg-12 breadcrumb">
        <li><a href="{{URL::to('/')}}"><i class="fa fa-home"></i></a></li>
        <li>{{$category_info->category_name}}</li>
    </div>
</div>
<div class="col-lg-8 col-sm-8" style="background: #fff; padding: 0;">
    <div class="col-lg-12 col-sm-12">
        <?php
        $category_id = $category_info->category_id;
        $headline_news_by_cid = DB::table('tbl_news')
                ->where('tbl_news.category_id', $category_id)
                ->join('tbl_category', 'tbl_news.category_id', '=', 'tbl_category.category_id')
                ->select('tbl_news.*', 'tbl_category.category_name')
                ->where('tbl_news.news_placement', 'headline')
                ->orderBy('tbl_news.news_id', 'DESC')
                ->take(1)
                ->get();
        foreach ($headline_news_by_cid as $v_news) 
            {
        ?>
        <div class="col-sm-12 category_headline">
            <a href="{{URL::to('/details/'.$v_news->news_id)}}"><img src="{{URL::to($v_news->news_image)}}" width="100%" height="300" alt="img"></a>
            <h3><a href="{{URL::to('/details/'.$v_news->news_id)}}">{{$v_news->news_title}}</a></h3>
            <p class="color_dark_2 t_align_j"><?php echo $v_news->news_short_description;?></p>
        </div>
            <?php } ?>
        <div class="col-sm-12 p_0" style="margin:0;">

            <div class="col-sm-6" style="padding: 0;">
                <?php
//                $category_id = $category_info->category_id;
                $feature_news_by_cid = DB::table('tbl_news')
                        ->where('tbl_news.category_id', $category_id)
                        ->join('tbl_category', 'tbl_news.category_id', '=', 'tbl_category.category_id')
                        ->select('tbl_news.*', 'tbl_category.category_name')
                        ->where('tbl_news.news_placement', 'feature')
                        ->orderBy('tbl_news.news_id', 'DESC')
                        ->take(3)
                        ->get();
                foreach ($feature_news_by_cid as $v_news) 
                    {
                ?>
                    <div class="col-sm-12 con_part_2" style="padding: 0;">
                        <h3><a href="{{URL::to('/details/'.$v_news->news_id)}}">{{$v_news->news_title}}</a></h3>
                        <a href="{{URL::to('/details/'.$v_news->news_id)}}"><img src="{{URL::to($v_news->news_image)}}"></a>
                        <p class="color_dark_2 t_align_j"><?php echo $v_news->news_short_description; ?></p>
                    </div>
                <?php } ?>
            </div>
            <div class="col-sm-6" style="padding-right: 0;">
                <?php
                $latest_news_by_cid = DB::table('tbl_news')
                        ->where('tbl_news.category_id', $category_id)
                        ->join('tbl_category', 'tbl_news.category_id', '=', 'tbl_category.category_id')
                        ->select('tbl_news.*', 'tbl_category.category_name')
                        ->where('tbl_news.news_placement', 'middle-top')
                        ->orderBy('tbl_news.news_id', 'DESC')
                        ->take(5)
                        ->get();
                foreach ($latest_news_by_cid as $v_news) {
                    ?>
                    <div class="col-sm-12 con_part_2" style="padding: 0;">
                        <h3><a href="{{URL::to('/details/'.$v_news->news_id)}}">{{$v_news->news_title}}</a></h3>
                        <a href="{{URL::to('/details/'.$v_news->news_id)}}"><img src="{{URL::to($v_news->news_image)}}"></a>
                        <p class="color_dark_2 t_align_j"><?php echo $v_news->news_short_description; ?></p>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="col-sm-12" style="margin: 30px 0 50px 0;">
            <img src="{{URL::to('public/assets/images/22.gif')}}" alt="" style="width: 100%;" height="">
        </div>

        <div class="col-lg-12 col-sm-12 category_wrap">
            <div class="col-sm-12" style="padding: 0;">
                <div class="col-sm-8">
                    <?php
                    $left_news_by_cid = DB::table('tbl_news')
                            ->where('tbl_news.category_id', $category_id)
                            ->join('tbl_category', 'tbl_news.category_id', '=', 'tbl_category.category_id')
                            ->select('tbl_news.*', 'tbl_category.category_name')
                            ->where('tbl_news.news_placement', 'left')
                            ->orderBy('tbl_news.news_id', 'DESC')
                            ->take(7)
                            ->get();
                    foreach ($left_news_by_cid as $v_news) 
                        {

                    ?>
                    <div class="col-lg-12 col-sm-12 category_items">
                        <h3><a href="{{URL::to('/details/'.$v_news->news_id)}}">{{$v_news->news_title}}</a></h3>
                        <div class="col-sm-4 category_items_img">
                            <a href="{{URL::to('/details/'.$v_news->news_id)}}"><img src="{{URL::to($v_news->news_image)}}"></a>
                        </div>
                        <div class="col-sm-8 category_items_title">
                            <p class="color_dark_2 t_align_j"><?php echo $v_news->news_short_description;?></p>
                        </div>
                    </div>
                        <?php } ?>
                </div>
                <div class="col-sm-4" style="padding: 0;">
                    <div class="category_items_nav">
                        <h3>আরো পড়ুন</h3>
                        <ul class="nav">
                            <?php
                            $middle_news_by_cid = DB::table('tbl_news')
                                    ->where('tbl_news.category_id', $category_id)
                                    ->join('tbl_category', 'tbl_news.category_id', '=', 'tbl_category.category_id')
                                    ->select('tbl_news.*', 'tbl_category.category_name')
                                    ->where('tbl_news.news_placement', 'middle')
                                    ->orderBy('tbl_news.news_id', 'DESC')
                                    ->take(15)
                                    ->get();
                            foreach ($middle_news_by_cid as $v_news) {
                                ?>
                            <li><a href="{{URL::to('/details/'.$v_news->news_id)}}">{{$v_news->news_title}}</a></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="all_news">
                        <a href="#">সব খবর পড়ুন এখানে <i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 category_slider" style="">
            <h3>ছবিতে খবর</h3>
            <div class="slider-area wow fadeInDown" style="">
                <div class="slider-wrapper theme-default">
                    <div class="nivoSlider" id="slider">
                        <?php
                        $slider_news_by_cid = DB::table('tbl_news')
                                ->where('tbl_news.category_id', $category_id)
                                ->join('tbl_category', 'tbl_news.category_id', '=', 'tbl_category.category_id')
                                ->select('tbl_news.*', 'tbl_category.category_name')
                                ->where('tbl_news.news_placement', 'slide')
                                ->orderBy('tbl_news.news_id', 'DESC')
//                                ->take(10)
                                ->get();
                        foreach ($slider_news_by_cid as $v_news) {
                            ?>
                        <a href="{{URL::to('/details/'.$v_news->news_id)}}"><img src="{{URL::to($v_news->news_image)}}" alt="" title="{{$v_news->news_title}}"></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<aside class="col-lg-4 col-sm-4"  style="padding: 0px;">
    <div class="col-lg-12 col-sm-12 sidebar-wrapper" style="background: #fff;">
        <div class="col-sm-12 sidebar-top" style="padding: 0px;">
            <img src="{{URL::to('public/assets/images/19.gif')}}" alt="img">
        </div>
        <div class="col-lg-12 col-sm-12 related_news_wrap" style="">
            <h3>এই বিভাগের আরো খবর</h3>
            <?php
            $cid = $category_info->category_id;
            $related_news = DB::table('tbl_news')
                    ->where('category_id', $cid)
                    ->where('publication_status', 1)
                    ->where('news_placement', 'right')
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
                        <h4><a href="{{URL::to('/details/'.$v_news->news_id)}}">{{$v_news->news_title}}</a></h4>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="col-sm-12 adds" style="padding: 0;">
            <a href="#"><img src="{{URL::to('public/assets/images/6.gif')}}"></a>
        </div>
        <div class="col-lg-12 col-sm-12 related_news_wrap" style="">
            <h3>এই বিভাগের জনপ্রিয় খবর</h3>
            <?php
            $cat_id = $category_info->category_id;
            $related_popular_news = DB::table('tbl_news')
                    ->where('category_id', $cat_id)
                    ->where('publication_status', 1)
                    ->orderBY('hit_count', 'DESC')
//                        ->take(1)
                    ->get();
            foreach ($related_popular_news as $v_news) {
                ?>
                <div class="col-sm-12 related_news">
                    <div class="col-sm-3 related_news_2">
                        <a href="{{URL::to('/details/'.$v_news->news_id)}}"><img src="{{URL::to($v_news->news_image)}}" width="" height="" alt=""></a>
                    </div>
                    <div class="col-sm-9 related_news_title">
                        <h4><a href="{{URL::to('/details/'.$v_news->news_id)}}">{{$v_news->news_title}}</a></h4>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="col-sm-12 adds" style="padding: 0;">
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
    <a href="#"><img src="{{URL::to('public/assets/images/4.gif')}}" alt="img"></a>
</div>
@endsection