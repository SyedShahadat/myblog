@extends('master')
@section('category')
<h4>Categories</h4>
<ul class="templatemo_list">
    <?php foreach ($category_data as $c_data){?>
    <li><a href="#">{{$c_data->category_name}}</a></li>
    <?php }?>
</ul>
<div class="cleaner_h40"></div>
@endsection