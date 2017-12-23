@extends('master')
@section('title','হোম')
@section('home_content')
<div class="col-lg-8 col-sm-8" style="background: #fff; padding: 0;">
    <div class="col-sm-12" style="padding: 0;">
        <div class="slider-area wow fadeInDown" style="padding: 0;">
            <div class="slider-wrapper theme-light">
                <div class="nivoSlider" id="slider">
                    @foreach($slider_news as $v_news)
                    <a href="{{URL::to('/details/'.$v_news->news_id)}}"><img src="{{URL::to($v_news->news_image)}}" alt="" title="{{$v_news->news_title}}"></a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 col-sm-12">
        <div class="col-sm-12 p_0" style="padding: 0; margin: 20px 0;">
            <div class="col-sm-6 p_0" style="padding: 0;">
                @foreach($feature_news as $v_news)
                <div class="col-sm-12 con_part_1" style="padding: 0;">
                    <a href="{{URL::to('/details/'.$v_news->news_id)}}"><img src="{{URL::to($v_news->news_image)}}"></a>
                    <h3><a href="{{URL::to('/details/'.$v_news->news_id)}}">{{$v_news->news_title}}</a></h3>
                    <p><?php echo $v_news->news_short_description; ?></p>
                </div>
                @endforeach
                <embed src="{{URL::to('public/assets/images/bio.swf')}}" alt="" style="width: 100%;">
            </div>
            <div class="col-sm-6" style="padding-right: 0;">
                @foreach($latest_news as $v_news)
                <div class="col-sm-12 con_part_2" style="padding: 0;">
                    <h3><a href="{{URL::to('/details/'.$v_news->news_id)}}">{{$v_news->news_title}}</a></h3>
                    <a href="{{URL::to('/details/'.$v_news->news_id)}}"><img src="{{URL::to($v_news->news_image)}}"></a>
                    <p><?php echo $v_news->news_short_description; ?></p>
                </div>
                @endforeach
            </div>
            <?php
            $publish_category_info = DB::table('tbl_category')
                    ->where('publication_status', 1)
                    ->take(6)
                    ->get();
            foreach ($publish_category_info as $v_category) {
                ?>
                <div class="col-sm-12 con_part_3" style="padding: 0; margin: 20px 0;">
                    <h4><a href="#">{{$v_category->category_name}}</a></h4>
                    <?php
                    $cid = $v_category->category_id;
                    $news_info_by_cid = DB::table('tbl_news')
                            ->where('category_id', $cid)
                            ->where('news_placement', 'left')
                            ->orderBy('news_id', 'DESC')
                            ->take(1)
                            ->get();
                    foreach ($news_info_by_cid as $v_news) {
                        ?>
                        <div class="col-sm-6 bd_content" style="padding-left: 0;">
                            <a href="{{URL::to('/details/'.$v_news->news_id)}}"><img src="{{URL::to($v_news->news_image)}}" alt="img"></a>
                            <h3><a href="{{URL::to('/details/'.$v_news->news_id)}}">{{$v_news->news_title}}</a></h3>
                            <p><?php echo $v_news->news_short_description; ?></p>
                        </div>
                    <?php } ?>
                    <div class="col-sm-1" ></div>

                    <div class="col-sm-5" style="padding: 0;">
                        <div class="bd_content_nav">
                            <h3>এই পাতার আরো খবর</h3>
                            <ul class="nav">
                                <?php
                                $cid = $v_category->category_id;
                                $news_info_by_id = DB::table('tbl_news')
                                        ->where('category_id', $cid)
                                        ->where('news_placement', 'middle')
                                        ->orderBy('news_id', 'DESC')
                                        ->take(7)
                                        ->get();
                                foreach ($news_info_by_id as $v_news) {
                                    ?>
                                    <li><a href="{{URL::to('/details/'.$v_news->news_id)}}"><i class="fa fa-angle-double-right"></i> {{$v_news->news_title}}</a></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="all_news">
                            <a href="#">আরো পড়ুন <i class="fa fa-angle-double-right"></i></a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>


    </div>
</div>
<aside class="col-lg-4 col-sm-4"  style="padding: 0px;">
    <div class="col-lg-12 col-sm-12 sidebar-wrapper" style="background: #fff;">
        <div class="col-sm-12 sidebar-top" style="padding: 0px;">
            <img src="{{URL::to('public/assets/images/2.gif')}}" alt="img">
        </div>
        <div class="col-sm-12 sidebar-nav" style="padding: 0;">
            <ul class="nav nav-tabs" role="tablist">
                <li><a href="#latest" data-toggle="tab" aria-expanded="true">সর্বশেষ</a></li>
                <li><a href="#popular" data-toggle="tab" aria-expanded="false">সর্বাধিক পঠিত</a></li>
            </ul>
        </div>
        <div class="col-sm-12 tab-content" style="padding: 0;">
            <div role="tabpanel" class="col-sm-12 tab-pane fade in active" id="latest">
                <ul class="nav">
                    <?php
                    $latest_news = DB::table('tbl_news')
                            ->orderBy('news_id', 'DESC')
                            ->where('news_placement', 'right')
//                            ->orderBy(DB::raw('RAND()'))
//                            ->take(2)
                            ->get();
                    foreach ($latest_news as $v_news) {
                        ?>
                        <li><a href="{{URL::to('/details/'.$v_news->news_id)}}"><i class="fa fa-angle-double-right"></i> {{$v_news->news_title}}</a></li>
                    <?php } ?>
                </ul>
            </div>
            <div role="tabpanel" class="col-sm-12 tab-pane fade in" id="popular">
                <ul class="nav">
                    <?php
                    $popular_news = DB::table('tbl_news')
                            ->orderBy('hit_count', 'DESC')
//                            ->orderBy(DB::raw('RAND()'))
                            ->take(10)
                            ->get();
                    foreach ($popular_news as $v_news) {
                        ?>
                        <li><a href="{{URL::to('/details/'.$v_news->news_id)}}"><i class="fa fa-angle-double-right"></i> {{$v_news->news_title}}</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="col-sm-12 adds" style="padding: 0;">
            <a href="#"><img src="{{URL::to('public/assets/images/5.gif')}}"></a>
            <a href="#"><img src="{{URL::to('public/assets/images/6.gif')}}"></a>
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
        <div class="col-sm-12 sidebar-nav" style="padding: 0;">
            <ul class="nav nav-tabs" role="tablist">
                <li><a href="#photos" data-toggle="tab" aria-expanded="true">Photos</a></li>
                <li><a href="#videos" data-toggle="tab" aria-expanded="false">Videos</a></li>
            </ul>
        </div>
        <div class="col-sm-12 tab-content m_bottom_20">
            <div role="tabpanel" class="col-sm-12 tab-pane fade in active" id="photos" style="padding: 0;">
                <div class="row wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms">
                    <div class="col-sm-4" style="padding: 0;" >
                        <div class="thumbnail">
                            <a href="{{URL::to('public/assets/images/s.jpg')}}" class="fancybox" rel="group">
                                <img src="{{URL::to('public/assets/images/s.jpg')}}" alt="img">
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4" style="padding: 0;" >
                        <div class="thumbnail">
                            <a href="{{URL::to('public/assets/images/s.jpg')}}" class="fancybox" rel="group">
                                <img src="{{URL::to('public/assets/images/s.jpg')}}" alt="img">
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4" style="padding: 0;" >
                        <div class="thumbnail">
                            <a href="{{URL::to('public/assets/images/s.jpg')}}" class="fancybox" rel="group">
                                <img src="{{URL::to('public/assets/images/s.jpg')}}" alt="img">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="1200ms">
                    <div class="col-sm-4" style="padding: 0;" >
                        <div class="thumbnail">
                            <a href="{{URL::to('public/assets/images/s.jpg')}}" class="fancybox" rel="group">
                                <img src="{{URL::to('public/assets/images/s.jpg')}}" alt="img">
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4" style="padding: 0;" >
                        <div class="thumbnail">
                            <a href="{{URL::to('public/assets/images/s.jpg')}}" class="fancybox" rel="group">
                                <img src="{{URL::to('public/assets/images/s.jpg')}}" alt="img">
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-4" style="padding: 0;" >
                        <div class="thumbnail">
                            <a href="{{URL::to('public/assets/images/s.jpg')}}" class="fancybox" rel="group">
                                <img src="{{URL::to('public/assets/images/s.jpg')}}" alt="img">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="col-sm-12 tab-pane fade in" id="videos">
                <ul class="nav">
                    <li><a href="#"><i class="fa fa-angle-right"></i> Lorem Ipsum is simply dummy text 2</a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i> Lorem Ipsum is simply dummy text 2</a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i> Lorem Ipsum is simply dummy text 2</a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i> Lorem Ipsum is simply dummy text 2</a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i> Lorem Ipsum is simply dummy text 2</a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i> Lorem Ipsum is simply dummy text 2</a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i> Lorem Ipsum is simply dummy text 2</a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i> Lorem Ipsum is simply dummy text 2</a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i> Lorem Ipsum is simply dummy text 2</a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i> Lorem Ipsum is simply dummy text 2</a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i> Lorem Ipsum is simply dummy text 2</a></li>
                    <li><a href="#"><i class="fa fa-angle-right"></i> Lorem Ipsum is simply dummy text 2</a></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-12 adds_2">
            <a href="#"><img src="{{URL::to('public/assets/images/18.png')}}" alt=""></a>
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
