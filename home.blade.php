	@extends('template')
    @section('content')

    <div class="post_section">
    
        <div class="post_date">
            30<span>Nov</span>
        </div>
        @foreach ($publised_blog as $v_blog)
            <div class="post_content">
            
                <h2><a href="{{URL::to('/blog_details/'.$v_blog->blog_id)}}">{{$v_blog->blog_tittle}}</a></h2>

                <strong>Author:</strong> Steven | <strong>Category:</strong> <a href="#"></a> {{$v_blog->category_name}} <a href="#">
                
                <a href="http://www.templatemo.com/page/1" target="_parent"><img src="{{$v_blog->blog_image}}" width="400px" height="400px" alt="image" /></a>
                
                <p><a href="{{URL::to('/blog_details/'.$v_blog->blog_id)}}" target="_parent"><?php echo $v_blog->blog_short_description ?></a></p>
                
                <p><a href="blog_post.html">24 Comments</a> | <a href="{{URL::to('/blog_details/'.$v_blog->blog_id)}}">Continue reading...</a>             </p>
            </div>
        @endforeach
        
    </div>

    @endsection