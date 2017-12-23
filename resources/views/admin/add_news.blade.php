@extends('admin.admin_master')
@section('title','Add News')
@section('admin_content')
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="{{URL::to('/dashboard')}}">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li>Add News</li>
</ul>
<div class="row-fluid sortable">
    
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add News</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            {!! Form::open(['url' => '/save-news','method'=>'post','class'=>'form-horizontal','role'=>'form','enctype'=>'multipart/form-data']) !!}
                <fieldset>
                        <h3 style="color:green">
                            <?php
                            $message=Session::get('message');
                            if($message)
                            {
                                echo $message;
                                Session::put('message',NULL);
                            }
                            ?>
                        </h3>
                    <div class="control-group">
                        <label class="control-label" for="typeahead"> News Title</label>
                        <div class="controls">
                            <input type="text" name="news_title" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" required="">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="selectError3">Category Name</label>
                        <div class="controls">
                            <select id="selectError3" name="category_id">
                                <option selected="">---Select---</option>
                                @foreach($category_info as $v_category)
                                <option value="{{$v_category->category_id}}">{{$v_category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> 
                    <div class="control-group">
                        <label class="control-label" for="typeahead"> Reporter Name</label>
                        <div class="controls">
                            <input type="text" name="reporter_name" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" required="">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead"> Image</label>
                        <div class="controls">
                            <input type="file" name="news_image" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" required="">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead"> Publish Location</label>
                        <div class="controls">
                            <input type="radio" name="news_placement" value="headline" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">Headline
                            <input type="radio" name="news_placement" value="slide" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">Slide
                            <input type="radio" name="news_placement" value="feature" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">Feature
                            <input type="radio" name="news_placement" value="left" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">Left
                            <input type="radio" name="news_placement" value="middle-top" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">Middle top
                            <input type="radio" name="news_placement" value="middle" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">Middle
                            <input type="radio" name="news_placement" value="right" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4">Right
                        </div>
                    </div>
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Short Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="news_short_description" id="textarea2" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Long Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="news_long_description" id="textarea2" rows="3"></textarea>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="selectError3">Publication Status</label>
                        <div class="controls">
                            <select id="selectError3" name="publication_status">
                                <option selected="">--Select--</option>
                                <option value="1">Publish</option>
                                <option value="0">Unpublish</option>
                            </select>
                        </div>
                    </div> 
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Save Category</button>
                        <button type="reset" class="btn">Cancel</button>
                    </div>
                </fieldset>
            {!! Form::close() !!}  

        </div>
    </div><!--/span-->

</div>
@endsection