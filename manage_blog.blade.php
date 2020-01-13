@extends('admin.admin_master')
@section('admin_content')

<div class="box-header" data-original-title>
    <h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
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
              <th>Blog id</th>
              <th>Image</th>
              <th>Title</th>
              <th>Status</th>
              <th>Actions</th>
          </tr>
      </thead>   
      <tbody>
          @foreach ($all_blog_info as $v_blog)
              
          
        <tr>
            <td>{{ $v_blog->blog_id}}</td>
            <td><img src="{{ $v_blog->blog_image}}" height="50px" width="50px" alt=""></td>
            <td class="center">{{ $v_blog->blog_tittle}}</td>

            <td class="center">
                 @if($v_blog->publication_status == 1) 
                <span class="label label-success">Published</span>
                @else 
                <span class="label label-important">Unpublished</span>
                @endif
            </td>
            <td class="center">
                @if($v_blog->publication_status == 1)
                <a class="btn btn-danger" href="{{URL::to('/Unpulished_blog/'.$v_blog->blog_id)}}">
                    <i class="halflings-icon white thumbs-down"></i>  
                </a>
                @else
                <a class="btn btn-success" href="{{URL::to('/pulished_blog/'.$v_blog->blog_id)}}">
                    <i class="halflings-icon white thumbs-up"></i>  
                </a>
                @endif
                <a class="btn btn-info" href="{{URL::to('/delete_blog/'.$v_blog->blog_id)}}" onclick="return checkDelete();">
                    <i class="halflings-icon white trash"></i>  
                </a>
                <a class="btn btn-danger" href="{{URL::to('/edit_blog/'.$v_blog->blog_id)}}">
                    <i class="halflings-icon white edit"></i> 
                </a>
            </td>
        </tr>

        @endforeach
      </tbody>
  </table>            
</div>

@endsection