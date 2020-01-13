<?php

namespace App\Http\Controllers;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use DB;
session_start();

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $user_id = Session::get('id');
        if($user_id==NULL){
            return Redirect::to('/admin-panel')->send();
        }


        $dashboard_content = view('admin.pages.dashboard_content');
        return view('admin.admin_master')
            ->with('admin_content',$dashboard_content);
    }

    public function logout()
    {
        Session::put('name',null);
        Session::put('id',null);
        Session::put('messege','You are logout');
        return Redirect::to('admin-panel');
    }

    public function add_category()
    {
        $category_content = view('admin.pages.add_category');
        
        return view('admin.admin_master')
            ->with('admin_content',$category_content);
    }

    public function save_category(Request $request)
    {
        $data = array();
        $data['category_name']=$request->category_name;
        $data['category_description']=$request->category_description;
        $data['publication_status']=$request->publication_status;

        DB::table('tbl_category')->insert($data);
        Session::put('Messege','Sate category information');
        return Redirect::to('/add_category');
    }

    public function manage_category()
    {
        
        $category_info = DB::table('tbl_category')->get();

        $manage_category = view('admin.pages.manage_category')->with('all_category_info',$category_info);
        return view('admin.admin_master')
            ->with('admin_content',$manage_category);
            
    }

    public function Unpulished_category($category_id)
    {
        DB::table('tbl_category')
            ->where('category_id', $category_id)
            ->update(['publication_status' => 0]);
            return Redirect::to('/manage_category');
    }

    public function pulished_category($category_id)
    {
        DB::table('tbl_category')
            ->where('category_id', $category_id)
            ->update(['publication_status' => 1]);
            return Redirect::to('/manage_category');
    }

    public function delete_category($category_id)
    {
        DB::table('tbl_category')
            ->where('category_id', $category_id)
            ->delete();
            return Redirect::to('/manage_category');
    }

    public function edit_category($category_id)
    {
       
        $category_info = DB::table('tbl_category')->get();
        $category_info = DB::table('tbl_category')
            ->where('category_id', $category_id)
            ->first();

        $edit_category = view('admin.pages.edit_category')
            ->with('category_info',$category_info);

        return view('admin.admin_master')
            ->with('admin_content',$edit_category); 
      
    }

    public function update_category(Request $request)
    {
        $data = array();
        $category_id = $request->category_id;
        $data['category_name']=$request->category_name;
        $data['category_description']=$request->category_description;
        $data['publication_status']=$request->publication_status;

        DB::table('tbl_category')
            ->where('category_id',$category_id)
            ->update($data);
        Session::put('Messege','Update category information');
        return Redirect::to('/edit_category/'.$category_id);
    }

    public function add_blog()
    {
        $categori_info = DB::table('tbl_category')
            ->where('publication_status',1)
            ->get();

            

        $add_blog = view('admin.pages.add_blog')
                    ->with('category_info',$categori_info);
        
        
        return view('admin.admin_master')
            ->with('admin_content',$add_blog);
    }

    public function save_blog(Request $request)
    {
        $category_info = DB::table('tbl_category')->get();
        $data = array();
        $data['blog_tittle']=$request->blog_tittle;
        $data['category_id']=$request->category_id;
        $data['blog_short_description']=$request->blog_short_description;
        $data['blog_long_description']=$request->blog_long_description;
        $data['publication_status']=$request->publication_status;
        $image = $request->file('blog_image');
        if($image){
            $image_name = Str::random(40);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'blog_image/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);
            if($success){
                $data['blog_image'] = $image_url;
                DB::table('tbl_blog')->insert($data);
                Session::put('Messege','Update blog information');
                return Redirect::to('add_blog');
            }else{
                Session::put('Messege','Update blog information');
                return Redirect::to('add_blog');
            }
        }

        DB::table('tbl_blog')->insert($data);
        Session::put('Messege','Save blog information');
        return Redirect::to('/add_blog');
    }


    public function manage_blog(){
        $blog_info = DB::table('tbl_blog')->get();

        $manage_blog = view('admin.pages.manage_blog')->with('all_blog_info',$blog_info);
        return view('admin.admin_master')
            ->with('admin_content',$manage_blog);
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
