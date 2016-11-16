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
        <a href="#">Forms</a>
    </li>
</ul>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Form Elements</h2>
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
                {!! Form::open(['url' => '/update-category','method'=>'post','class'=>'form-horizontal','name'=>'edit_category_form']) !!}
                <fieldset>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Category Name </label>
                        <div class="controls">
                            <input type="text" name="category_name" value="{{$category_data->category_name}}" class="span6 typeahead" id="typeahead">
                            <input type="hidden" name="category_id" value="{{$category_data->category_id}}">
                        </div>
                    </div>
                           
                    <div class="control-group hidden-phone">
                        <label class="control-label" for="textarea2">Category Description</label>
                        <div class="controls">
                            <textarea name="category_description" class="cleditor" id="textarea2" rows="3">
                                {{$category_data->category_description}}
                            </textarea>
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
                        <button type="submit" class="btn btn-primary">Update Category</button>
                        <button type="reset" class="btn">Cancel</button>
                    </div>
                    
                </fieldset>
            {!! Form::close() !!} 

        </div>
    </div><!--/span-->

</div><!--/row-->
<script>
    document.forms['edit_category_form'].elements['publication_status'].value={{$category_data->publication_status}};
</script>
@endsection
t>-->