@extends('master')
@section('content')
<?php foreach($blog_data as $blog){?>
<div class="post_section">

    <div class="post_date">
        30<span>Nov</span>
    </div>
    <div class="post_content">

        <h2><a href="blog_post.html">{{$blog->blog_title}}</a></h2>

        <strong>Author:</strong> Steven | <strong>Category:</strong> <a href="#">PSD</a>, <a href="#">Templates</a>

        <a href="http://www.templatemo.com/page/1" target="_parent"><img src="{{asset('/frontend_asset/images/templatemo_image_01.jpg')}}" alt="image" /></a>

        
        <!--{{$blog->blog_short_description}}-->
        <p><?php echo $blog->blog_short_description;?></p>
        <p><a href="blog_post.html">24 Comments</a> | <a href="blog_post.html">Continue reading...</a>                </p>
    </div>
    <div class="cleaner"></div>
</div>
<?php }?>

@endsection