<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\HTTP\Requests;
use DB;


class BossConroller extends Controller
{
    public function index()
    {
        $published_blog = DB::table('tbl_blog')
                        ->join('tbl_category', 'tbl_blog.category_id','=', 'tbl_category.category_id')
                        ->where('tbl_blog.publication_status',1)
                        ->select('tbl_blog.*','tbl_category.category_name')
                        ->get();


                        
        $home_contant = view('pages.home')
                        ->with('publised_blog',$published_blog);
                        
        $category = view('pages.category');
        $recent_post = view('pages.recent_post');
        return view('template')
        ->with('content',$home_contant)
        ->with('category',$category)
        ->with('friends',$recent_post);
    }

    public function portfolio()
    {
        

        $portfolio_contant = view('pages.portfolio');
        $category = view('pages.category');
        return view('template')
        ->with('content',$portfolio_contant)
        ->with('category',$category);
    }

    public function services()
    {
        $services_content = view('pages.service');
        $recent_post = view('pages.recent_post');
        return view('template')
        ->with('content',$services_content)
        ->with('friends',$recent_post);
    }
    public function blog_details($blog_id)
    {
        $blog_info = DB::table('tbl_blog')
                ->where('blog_id',$blog_id)
                ->first();

                $data = array();
                $data['hit_count'] = $blog_info->hit_count+1;
                DB::table('tbl_blog')
                ->where('blog_id',$blog_id)
                ->update($data);
                

        $blog_info_by_id = DB::table('tbl_blog')
            ->join('tbl_category','tbl_blog.category_id','=','tbl_category.category_id')
            ->where('tbl_blog.blog_id',$blog_id)
            ->Select('tbl_blog.*','tbl_category.category_name')
            ->first();


        /* $blog_details = view('pages.blog_details')
                        ->with('blog_info'.$blog_info_by_id); */

        $blog_details = view('pages.blog_details')
                    ->with('blog_info',$blog_info_by_id);

        $category = view('pages.category');
        $recent_post = view('pages.recent_post');

                return view('template')
                    ->with('content',$blog_details)
                    ->with('category',$category)
                    ->with('friends',$recent_post);
                
    }

    
}
