@extends('admin.admin_master')
@section('title','Manage News')
@section('admin_content')
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="{{URL::to('/dashboard')}}">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li>Manage News</li>
</ul>
<div class="row-fluid sortable">		
    <div class="box span12">
        <h3 style="color:green;">
            <?php
            $message = Session::get('message');
            if ($message) {
                echo $message;
                Session::put('message', null);
            }
            ?>
        </h3>
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Manage News</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Reporter Name</th>
                        <th>Publication Status</th>
                        <th>Publish Locaton</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    @foreach($news_info as $v_news)
                    <tr>

                        <td>{{$v_news->news_id}}</td>
                        <td class="center"><img src="{{URL::to($v_news->news_image)}}" width="80" height="60"></td>
                        <td class="center">{{$v_news->news_title}}</td>
                        <td class="center">{{$v_news->category_name}}</td>
                        <td class="center">{{$v_news->reporter_name}}</td>
                        <td class="center">
                            @if($v_news->publication_status==1)
                            <span class="label label-success">Published</span>
                            @else
                            <span class="label label-important">Unpublished</span>
                            @endif
                        </td>
                        <td class="center">
                            @if($v_news->news_placement=='headline')
                            <span class="btn" style="background: #ed8507;">Headline</span>
                            @elseif($v_news->news_placement=='slide')
                            <span class="btn" style="background: red;">Slide</span>
                            @elseif($v_news->news_placement=='feature')
                            <span class="btn" style="background: #003399;">Featured</span>
                            @elseif($v_news->news_placement=='middle-top')
                            <span class="btn" style="background: #e4e802;">Middle Top</span>
                            @elseif($v_news->news_placement=='left')
                            <span class="btn" style="background: #0a562a;">Left</span>
                            @elseif($v_news->news_placement=='middle')
                            <span class="btn" style="background: orange;">Middle</span>
                            @elseif($v_news->news_placement=='right')
                            <span class="btn" style="background: #07edca;">Right Sidebar</span>
                            @endif
                        </td>
                        <td class="center">
                            @if($v_news->publication_status==1)
                            <a class="btn btn-danger" href="{{URL::to('/unpublish-news/'.$v_news->news_id)}}" title="Click to Unpublish">
                                <i class="halflings-icon white thumbs-down"></i>  
                            </a>
                            @else
                            <a class="btn btn-success" href="{{URL::to('/publish-news/'.$v_news->news_id)}}" title="Click to Publish">
                                <i class="halflings-icon white thumbs-up"></i>  
                            </a>
                            @endif

                            <a class="btn btn-info" href="{{URL::to('/edit-news/'.$v_news->news_id)}}" title="Edit">
                                <i class="halflings-icon white edit"></i>  
                            </a>
                            <a class="btn btn-danger" href="{{URL::to('/delete-news/'.$v_news->news_id)}}" title="Delete" onclick="return checkDelete();">
                                <i class="halflings-icon white trash"></i> 
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>            
        </div>
    </div><!--/span-->

</div>
@endsection