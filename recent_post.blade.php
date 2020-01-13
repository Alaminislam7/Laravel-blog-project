@extends('template')
@section('recent_post')

    <?php
        $recent_blog = DB::table('tbl_blog')
        ->orderBy('blog_id','desc')
        ->where('publication_status',1)
        ->take(2)
        ->get()
    ?>

                

<h4>Recent Post</h4>
@foreach ($recent_blog as $v_blog)
    <ul class="templatemo_list">
        <li><a href="{{URL::to('/blog_details/'.$v_blog->blog_id)}}" target="_parent">{{$v_blog->blog_tittle}}</a></li>
    </ul>
@endforeach


@endsection