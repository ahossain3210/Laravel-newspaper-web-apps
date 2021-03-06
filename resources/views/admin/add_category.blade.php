@extends('admin.admin_master')
@section('title','Add category')
@section('admin_content')
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="{{URL::to('/dashboard')}}">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li>Add Category</li>
</ul>
<div class="row-fluid sortable">
    
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Category</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            {!! Form::open(['url' => '/save-category','method'=>'post','class'=>'form-horizontal','role'=>'form']) !!}
                <fieldset>
                        <h3 style="color:green">
                            <?php
                            $confirm_message=Session::get('confirm_message');
                            if($confirm_message)
                            {
                                echo $confirm_message;
                                Session::put('confirm_message',NULL);
                            }
                            ?>
                        </h3>
                    <div class="control-group">
                        <label class="control-label" for="typeahead"> Category Name</label>
                        <div class="controls">
                            <input type="text" name="category_name" class="span6 typeahead" id="typeahead"  data-provide="typeahead" data-items="4" required="">
                        </div>
                    </div>
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Category Description</label>
                        <div class="controls">
                            <textarea class="cleditor" name="category_description" id="textarea2" rows="3"></textarea>
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label" for="selectError3">Publication Status</label>
                        <div class="controls">
                            <select id="selectError3" name="publication_status">
                                <option selected="">Select</option>
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