@extends('admin.admin_master')
@section('admin_content')
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="{{URL::to('/dashboard')}}">Home</a>
        <i class="icon-angle-right"></i> 
    </li>
    <li>
        <i class="icon-edit"></i>
        <a href="#">Add Blog Forms</a>
    </li>
</ul>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Blog</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <h3 style="color: green;">
                <?php
                $message=Session::get('message');
                if($message){
                    echo $message;
                    Session::put('message',Null);
                }
                ?>
            </h3>
                {!! Form::open(['url' => '/save-blog','method'=>'post','class'=>'form-horizontal','files'=>'true']) !!}
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Blog Title </label>
                        <div class="controls">
                            <input type="text" name="blog_title" class="span6 typeahead" id="typeahead">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="selectCategory">Category</label>
                        <div class="controls">
                            <select id="selectCategory" data-rel="chosen" name="category_id">
                                <option>----Select One----</option>
                                <?php foreach ($category_data as $c_data){?>
                                <option value="{{$c_data->category_id}}">{{$c_data->category_name}}</option>
                                <?php }?>
                                </select>
                        </div>
                    </div>
                           
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="shortDescription">Blog Short Description</label>
                        <div class="controls">
                            <textarea name="blog_short_description" class="cleditor" id="shortDescription" rows="3"></textarea>
                        </div>
                    </div>
                    
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="longDescription">Blog Long Description</label>
                        <div class="controls">
                            <textarea name="blog_long_description" class="cleditor" id="longDescription" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="control-group">
                    <label class="control-label">Image</label>
                    <div class="controls">
                        <input type="file" name="image">
                    </div>
                </div>
                    <div class="control-group">
                        <label class="control-label" for="selectError">Publication Status</label>
                        <div class="controls">
                            <select id="selectError" data-rel="chosen" name="publication_status">
                                <option>----Select One----</option>
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Add Blog</button>
                        <button type="reset" class="btn">Cancel</button>
                    </div>
                    
                </fieldset>
            {!! Form::close() !!} 

        </div>
    </div><!--/span-->

</div><!--/row-->
@endsection
