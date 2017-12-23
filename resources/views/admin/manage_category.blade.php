@extends('admin.admin_master')
@section('title','Manage Category')
@section('admin_content')
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="{{URL::to('/dashboard')}}">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Manage Category</a></li>
</ul>
<div class="row-fluid sortable">		
    <div class="box span12">
        <h3 style="color:green">
            <?php
            $message=Session::get('message');
            if($message)
            {
                echo $message;
                Session::put('message',null);
            }
            ?>
        </h3>
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Manage Category</h2>
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
                        <th>Category Name</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    @foreach($category_info as $v_category)
                    <tr>
                        <td>{{$v_category->category_id}}</td>
                        <td class="center">{{$v_category->category_name}}</td>
                        <td class="center">
                            @if($v_category->publication_status==1)
                            <span class="label label-success">Published</span>
                            @else
                            <span class="label label-important">Unpublished</span>
                            @endif
                        </td>
                        <td class="center">
                            @if($v_category->publication_status==1)
                            <a class="btn btn-danger" href="{{URL::to('/unpublish-category/'.$v_category->category_id)}}" title="Click to Unpublish">
                                <i class="halflings-icon white thumbs-down"></i>  
                            </a>
                            @else
                            <a class="btn btn-success" href="{{URL::to('/publish-category/'.$v_category->category_id)}}" title="Click to Publish">
                                <i class="halflings-icon white thumbs-up"></i>  
                            </a>
                            @endif
                            <a class="btn btn-info" href="{{URL::to('/edit-category/'.$v_category->category_id)}}" title="Edit">
                                <i class="halflings-icon white edit"></i>  
                            </a>
                            <a class="btn btn-danger" href="{{URL::to('/delete-category/'.$v_category->category_id)}}" title="Delete" onclick="return checkDelete();">
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