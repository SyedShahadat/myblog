<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
use DB;

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        //
        $admin_id=Session::get('admin_id');
        if($admin_id==Null){
            return Redirect::to('/admin-area');
        }
        $dashboard_content=  view('admin.pages.dashboard_content');
        return view('admin.admin_master')
        ->with('admin_content',$dashboard_content);
    }
    
    public function logout(){
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        Session::put('message','You have successfully logout!');
        return Redirect::to('/admin-area');
    }
    
    /*
     * Category Portion
     */
    public function add_category(){
        self::login_check();
        $add_category=  view('admin.pages.add_category');
        return view('admin.admin_master')
        ->with('admin_content',$add_category);
    }
    public function save_category(Request $request){
        $data=array();
        $data['category_name']=$request->category_name;
        $data['category_description']=$request->category_description;
        $data['publication_status']=$request->publication_status;
        $data['created_at'] =new \DateTime();
        DB::table('tbl_category')->insert($data);
        Session::put('message','Category added successfully!');
        return Redirect::to('/add-category');
    }

    public function manage_category() {
        $result = DB::table('tbl_category')->get();
        $manage_category=  view('admin.pages.manage_category')->with('all_category_info',$result);
        return view('admin.admin_master')
        ->with('admin_content',$manage_category);
    }
    public function unpublished_category($id){
        DB::table('tbl_category')
                ->where('category_id',$id)
                ->update(['publication_status'=>0]);
        return Redirect::to('/manage-category');
    }
    public function published_category($id){
        DB::table('tbl_category')
                ->where('category_id',$id)
                ->update(['publication_status'=>1]);
        return Redirect::to('/manage-category');
    }
    public function delete_category($id){
        DB::table('tbl_category')
                ->where('category_id',$id)
                ->delete();
        return Redirect::to('/manage-category');
    }
    public function edit_category($id){
        $result=DB::table('tbl_category')
                ->where('category_id',$id)
                ->first();
        $pages=view('admin.pages.edit_category')->with('category_data',$result);
        return view('admin.admin_master')
        ->with('admin_content',$pages);
    }
    
    public function update_category(Request $request){
        $data=array();
        $category_id=$request->category_id;
        $data['category_name']=$request->category_name;
        $data['category_description']=$request->category_description;
        $data['publication_status']=$request->publication_status;
        $data['updated_at'] =new \DateTime();
//        print_r($data);
        DB::table('tbl_category')
                ->where('category_id',$category_id)
                ->update($data);
        Session::put('message','Category info update successfully!');
        return Redirect::to('/manage-category');
        
    }
    
    /*
     * Blog Portion
     */
    
    public function add_blog(){
        $data=DB::table('tbl_category')
                ->where('publication_status',1)
                ->select('category_id','category_name')
                ->get();
        $pages=  view('admin.pages.add_blog')->with('category_data',$data);
        return view('admin.admin_master')
        ->with('admin_content',$pages);
    }
    
    public function save_blog(Request $request) {

        $image = $request->file('image');
        if ($image) {
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'blog_images/';
            $image_url = $upload_path . $image_full_name;
            $image_size = $image->getClientSize();
            if ($ext == 'jpg' || $ext == 'jpeg' || $ext == 'png' || $ext == 'gif') {
                if ($image_size < 2097152) {
                    $success = $image->move($upload_path, $image_full_name);
                } else {
                    Session::put('message', 'Maximum file size is 2MB !');
                    return Redirect::to('/add-blog');
                }
            } else {
                Session::put('message', 'File type is not supported ! (Ex:jpg,jpeg,png,gif)');
                return Redirect::to('/add-blog');
            }
        }
        if ($success) {
            $data = array();
            $data['blog_title'] = $request->blog_title;
            $data['category_id'] = $request->category_id;
            $data['blog_short_description'] = $request->blog_short_description;
            $data['blog_long_description'] = $request->blog_long_description;
            $data['blog_image'] = $image_url;
            $data['publication_status'] = $request->publication_status;
            $data['created_at'] =new \DateTime();
            DB::table('tbl_blog')->insert($data);
            Session::put('message', 'Blog information added successfully !');
            return Redirect::to('/add-blog');
        }
    }
    
    public function manage_blog(){
        $all_blog_data=DB::table('tbl_blog')
                ->leftJoin('tbl_category','tbl_blog.category_id','=','tbl_category.category_id')
                ->select('tbl_blog.*','tbl_category.category_name')
                ->get();
        $pages=view('admin.pages.manage_blog')->with('all_blog_data',$all_blog_data);
        return view('admin.admin_master')
        ->with('admin_content',$pages);
    }
    public function unpublished_blog($id){
        DB::table('tbl_blog')
                ->where('blog_id',$id)
                ->update(['publication_status'=>0]);
        return Redirect::to('/manage-blog');
    }
    public function published_blog($id){
        DB::table('tbl_blog')
                ->where('blog_id',$id)
                ->update(['publication_status'=>1]);
        return Redirect::to('/manage-blog');
    }
    public function delete_blog($id){
        DB::table('tbl_blog')
                ->where('blog_id',$id)
                ->delete();
        return Redirect::to('/manage-blog');
    }

    

    //Admin security 
    public function login_check(){
        $admin_id=Session::get('admin_id');
        if($admin_id==Null){
            return Redirect::to('/admin-area')->send();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
