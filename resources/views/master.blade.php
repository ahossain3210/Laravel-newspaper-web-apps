<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>@yield('title') | বাংলার কন্ঠ</title>
        <link href="{{URL::to('public/assets/css/bootstrap.min.css')}}" rel="stylesheet">
        <!--<link href="{{URL::to('public/assets/css/animate.min.css')}}" rel="stylesheet">--> 
        <link rel="icon" href="{{URL::to('public/assets/images/favicon.ico')}}" type="image/x-icon">
        <link href="{{URL::to('public/assets/css/font-awesome.min.css')}}" rel="stylesheet">
        <!--<link href="{{URL::to('public/assets/css/lightbox.css')}}" rel="stylesheet">-->
        <link href="{{URL::to('public/assets/css/style.css')}}" rel="stylesheet">

        <!--...........Nivo Theme.............-->

        <link rel="stylesheet" href="{{URL::to('public/assets/themes/default/default.css')}}" type="text/css" media="screen" />
        <link rel="stylesheet" href="{{URL::to('public/assets/themes/light/light.css')}}" type="text/css" media="screen" />
        <link rel="stylesheet" href="{{URL::to('public/assets/themes/dark/dark.css')}}" type="text/css" media="screen" />
        <link rel="stylesheet" href="{{URL::to('public/assets/themes/bar/bar.css')}}" type="text/css" media="screen" />

        <!--...........Nivo CSS...........-->
        <link rel="stylesheet" href="{{URL::to('public/assets/css/nivo-slider.css')}}" type="text/css" media="screen" />


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" href="{{URL::to('public/assets/images/fav.ico')}}">

        <script>
$(document).ready(function () {

    //Check to see if the window is top if not then display button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.scrollToTop').fadeIn();
        } else {
            $('.scrollToTop').fadeOut();
        }
    });

    //Click event to scroll to top
    $('.scrollToTop').click(function () {
        $('html, body').animate({scrollTop: 0}, 800);
        return false;
    });

});
        </script>
        <!--..............Dropdown Js.............-->

        <script src="{{URL::to('public/assets/js/dropdown.js')}}"></script>
        <script>
$(document).ready(function () {
    $('.dropdown').hover(function () {
        $(this).children('.dropdown-menu').stop(true, false, true).slideDown();
    },
            function () {
                $(this).children('.dropdown-menu').slideUp();
            }
    );
});
        </script>
        
        <script>
            $(document).ready(function () {

                //Check to see if the window is top if not then display button
                $(window).scroll(function () {
                    if ($(this).scrollTop() > 100) {
                        $('.scrollToTop').fadeIn();
                    } else {
                        $('.scrollToTop').fadeOut();
                    }
                });

                //Click event to scroll to top
                $('.scrollToTop').click(function () {
                    $('html, body').animate({scrollTop: 0}, 800);
                    return false;
                });

            });
        </script>
    </head><!--/head-->
    <body style="background: #e8e8e8;">
        <section>
            <div class="col-lg-12 col-sm-12 header_wrap" style="padding: 0;">
                <div class="container">
                    <header class="col-sm-12 header_top" style="background: #fff; padding: 0;">
                        <nav class="navbar navbar-default">
                            <ul class="nav navbar-nav navbar-left" style="padding: 0;">
                                <li>
                                    <h3 class="navbar-btn"><span><?php
                                            $date = date('D-M-Y');
                                            echo $date;
                                            ?></span> | <span><?php echo date("h:i:sa") ?></span></h3>
                                </li>
                                <li><a href="#" class="color_facebook" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" class="color_twitter" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" class="color_youtube" title="Youtube"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="#" class="color_google_plus" title="Google plus"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#" class="color_linkin" title="Linkin"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="#">Sign Up</a></li>
                                <li><a href="#">Login</a></li>
                            </ul>
                        </nav>
                    </header>
                    <div class="col-lg-12 col-sm-12 banner_wrapper" style="background: #fff;">
                        <div class="col-sm-4 logo">
                            <a href="{{URL::to('/')}}"><img src="{{URL::to('public/assets/images/logo3.jpg')}}" alt="img"></a>
                        </div>
                        <div class="col-sm-8 banner">
                            <img src="{{URL::to('public/assets/images/1.gif')}}" alt="img">
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12 main-menu" style="padding: 0;">
                        <nav class="navbar navbar-inverse">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse" id="myNavbar" style="padding: 0 10px;">
                                <ul class="nav navbar-nav" style="border-top: 2px solid #e74c3c;">
                                    <li class="active" style="background: #e74c3c;"><a href="{{URL::to('/')}}" style="background: #e74c3c;"><i class="fa fa-home" style="background: #e74c3c;"></i></a></li>
                                    <?php
                                    $category_info = DB::table('tbl_category')
                                            ->where('publication_status', 1)
                                            ->get();
                                    foreach ($category_info as $v_category) {
                                        ?>
                                        <li><a href="{{URL::to('/category-news/'.$v_category->category_id)}}">{{$v_category->category_name}}</a></li>
                                    <?php } ?>
                                    <li><a href="#">ক্যারিয়ার</a></li>
                                    <!--                                <li class="dropdown">
                                                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Others<span class="caret"></span></a>
                                                                        <ul class="dropdown-menu">
                                                                            <li><a href="#">dropdown 1</a></li>
                                                                            <li><a href="#">dropdown 1</a></li>
                                                                            <li><a href="#">dropdown 1</a></li>
                                                                            <li><a href="#">dropdown 1</a></li>
                                                                            <li><a href="#">dropdown 1</a></li>
                                                                        </ul>
                                                                    </li>
                                                                </ul>-->
                            </div>
                        </nav>
                    </div>
                    <div class="col-lg-12 col-sm-12" style="padding: 0; margin: 0;">
                        <div id="marquee_head" class="col-lg-2 col-sm-2">ব্রেকিং নিউজ</div>
                        <div class="marquee col-lg-10 col-sm-10" style="padding: 0; margin: 0; width: 90%;">
                            <marquee onmouseover="stop();" onmouseout="start();" scrollamount="4">
                                <ul class="">
                                    <?php
                                    $headline_news = DB::table('tbl_news')
                                            ->orderBy('news_id', 'DESC')
                                            ->where('news_placement', 'headline')
                                            ->take(5)
                                            ->get();
                                    foreach ($headline_news as $v_news) {
                                        ?>
                                        <li><a href="{{URL::to('/details/'.$v_news->news_id)}}" style="color: #003399; font-size: 18px;">{{$v_news->news_title}}</a></li>
                                    <?php } ?>
                                </ul>
                            </marquee>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="col-lg-12 col-sm-12 content-wrapper" style="background: #fff; padding: 0;">
                    @yield('home_content')
                </div>
            </div>
        </section>
        <footer>
            <div class="container">
                <div class="col-sm-12 footer-wrapper" style="padding: 30px 0 30px 0">
                    <div class="col-sm-12 footer_part_1">
                        <div class="col-sm-4" style="padding: 0;">
                            <img src="{{URL::to('/public/assets/images/brand.png')}}">
                            <p style="padding:0 15px;">২১/৩, সিএ ভবন, কাওরান বাজার <br> ঢাকা-১২১৫, বাংলাদেশ</p>
                            <!--<p>নিলুফা- স্বপন ফাউন্ডেশনের একটি প্রতিষ্ঠান </p>-->
                        </div>
                        <div class="col-sm-8 footer_title">
                            <h3><b>সম্পাদক:</b></h3>
                            <p>মোহাম্মদ আনোয়ার হোসাইন</p>
<!--                            <h3><b>সহকারি সম্পাদক:</b></h3>
                            <p>মোঃ শাহিন রানা</p>-->
                        </div>
                    </div>
                    <div class="col-sm-12 footer_part_2" style="text-align: center;">
                        <p><b>ফোন:</b> +৮৮- ৪৩২১ ৯৮৭৩, +২৪৭-৪৫৮৬২৫৭১ | <b>মোবাইল: </b> +৮৮-০১৫-৭১৭৪৩২১১, +৮৮-০১৬৭২-৫০৫৮৫৬ | <b>নিউজ:</b> +৮৮-২৪৫৮-৫৮৭২, +৮৮-৫৩১৯ ৯৯৯৭ | <b>বিজ্ঞাপন:</b> +৮৮-০১৬৭২-৫০৫৮৫৬</p>
                        <p><b>ই-মেইল:</b> <a href="#">news@banglarkontho.com</a> | ই-মেইল: <a href="#">editor@banglarkontho.com</a></p>
                    </div>
                </div>
            </div>
        </footer>
        <div class="col-sm-12 footer_bottom">
            <h4>এই ওয়েবসাইটের কোনো লেখা বা ছবি অনুমতি ছাড়া নকল করা বা অন্য কোথাও প্রকাশ করা সম্পূর্ণ বেআইনি।</h4>
            <a href="#" class="scrollToTop"><i class="fa fa-angle-double-up"></i></a>
        </div>



















        <!--..............Fancy box JS............-->

        <!-- Add fancyBox -->
        <link rel="stylesheet" href="{{URL::to('public/assets/source/jquery.fancybox.css?v=2.1.7')}}" type="text/css" media="screen" />
        <script type="text/javascript" src="{{URL::to('public/assets/source/jquery.fancybox.pack.js?v=2.1.7')}}"></script>
        <script type="text/javascript">
                                $(document).ready(function () {
                                    $(".fancybox").fancybox();
                                });
        </script>


        <!--.............Current Timer............-->
        <script>
            function clock() {
                var date = new Date();
                var hour = date.getHours();
                var minute = date.getMinutes();
                var second = date.getSeconds();

                document.getElementById('hour').innerHTML = hour;
                document.getElementById('minute').innerHTML = minute;
                document.getElementById('second').innerHTML = second;
            }
            setInterval(clock, 1000);

        </script>
        <!--.................Fixed Navbar...........-->
        <script type="text/javascript">
            $(window).on('scroll', function () {
                if ($(window).scrollTop() > 170) {
                    $('.navbar-inverse').addClass('fixed-nav');
                } else {
                    $('.navbar-inverse').removeClass('fixed-nav');
                }
            });

        </script>




        <!--.............Nivo slider Js..........-->

        <script type="text/javascript" src="{{URL::to('public/assets/js/jquery-1.7.1.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::to('public/assets/js/jquery.nivo.slider.js')}}"></script>
        <script type="text/javascript">
            $(window).load(function () {
                $('#slider').nivoSlider();
            });
        </script> 
    </body>
</html>
