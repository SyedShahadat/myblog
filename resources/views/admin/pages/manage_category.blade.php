@extends('admin.admin_master')
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
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>Category</h2>
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
                        <th>Category ID</th>
                        <th>Category Name</th>
                        <th>Category Description</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php foreach ($all_category_info as $v_category){?>
                    <tr>
                        <td>{{$v_category->category_id}}</td>
                        <td class="center">{{$v_category->category_name}}</td>
                        <td class="center">{{$v_category->category_description}}</td>
                        <td class="center">
                            <?php if($v_category->publication_status==1){?>
                            <span class="label label-success">Published</span>
                            <?php }else{?>
                            <span class="label label-important">Unpublished</span>
                            <?php }?>
                        </td>
                        <td class="center">
                            <?php if($v_category->publication_status==1){?>
                            <a class="btn btn-danger" href="{{URL::to('/unpublished/'.$v_category->category_id)}}" title="Unpublish">
                                <i class="halflings-icon white download"></i>  
                            </a>
                            <?php }else{?>
                            <a class="btn btn-success" href="#" title="Publish">
                                <i class="halflings-icon white zoom-in"></i>  
                            </a>
                             <?php }?>
                            <a class="btn btn-info" href="#">
                                <i class="halflings-icon white edit"></i>  
                            </a>
                            <a class="btn btn-danger" href="#">
                                <i class="halflings-icon white trash"></i> 
                            </a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>            
        </div>
    </div><!--/span-->
</div><!--/row-->

@endsection