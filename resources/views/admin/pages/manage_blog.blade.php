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
            <h2><i class="halflings-icon user"></i><span class="break"></span>Manage News</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <h2 style="color:green"><?php echo Session::get('message'); Session::put('message','');?></h2>
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr >
                        <th style="text-align: center">Blog ID</th>
                        <th style="text-align: center">Blog Image</th>
                        <th style="text-align: center">Category Name</th>
                        <th style="text-align: center">Blog Title</th>
                        <th style="text-align: center">Publication Status</th>
                        <th style="text-align: center">Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php foreach ($all_blog_data as $blog_data){?>
                    <tr>
                        <td style="text-align: center">{{$blog_data->blog_id}}</td>
                        <td style="text-align: center"><img src="{{$blog_data->blog_image}}" width="50px" height="30px" alt="{{$blog_data->blog_id}}"></td>
                        <td style="text-align: center" class="center">{{$blog_data->category_name}}</td>
                        <td style="text-align: center" class="center">{{$blog_data->blog_title}}</td>
                        <td style="text-align: center" class="center">
                            <?php if($blog_data->publication_status==1){?>
                            <span class="label label-success">Published</span>
                            <?php }else{?>
                            <span class="label label-important">Unpublished</span>
                            <?php }?>
                        </td>
                        <td style="text-align: center" class="center">
                            <?php if($blog_data->publication_status==1){?>
                            <a class="btn btn-danger" href="{{URL::to('/unpublished-blog/'.$blog_data->blog_id)}}" title="Unpublish">
                                <i class="halflings-icon white remove"></i>  
                            </a>
                            <?php }else{?>
                            <a class="btn btn-success" href="{{URL::to('/published-blog/'.$blog_data->blog_id)}}" title="Publish">
                                <i class="halflings-icon white ok"></i>  
                            </a>
                            <?php }?>
                            <a class="btn btn-info" href="{{URL::to('/edit-blog/'.$blog_data->blog_id)}}">
                                <i class="halflings-icon white edit"></i>  
                            </a>
                            <a class="btn btn-danger" href="{{URL::to('/delete-blog/'.$blog_data->blog_id)}}" onclick="return confirmDelete()" title="Delete">
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