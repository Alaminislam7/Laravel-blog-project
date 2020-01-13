@extends('template')
@section('content')

<div class="post_section">

    <div class="post_date">
        30<span>Nov</span>
    </div>
        <div class="post_content">
        
            <h2><a href="{{URL::to('/blog_details/'.$blog_info->blog_id)}}">{{$blog_info->blog_tittle}}</a></h2>

            <strong>Author:</strong> Steven | <strong>Category:</strong> <a href="#"></a> {{$blog_info->category_name}} <a href="#">
            
            <a href="http://www.templatemo.com/page/1" target="_parent"><img src="{{URL::to($blog_info->blog_image)}}" width="400px" height="400px" alt="image" /></a>
            
            <p><?php echo $blog_info->blog_short_description ?></p>

            <p><?php echo $blog_info->blog_long_description ?></p>
            
            <p><a href="blog_post.html">24 Comments</a> | <a href="blog_post.html">Continue reading...</a>             </p>
        </div>
    
</div>

@endsection