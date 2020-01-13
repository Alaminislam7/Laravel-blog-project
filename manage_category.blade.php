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
              <th>Category id</th>
              <th>Category Name</th>
              <th>Status</th>
              <th>Actions</th>
          </tr>
      </thead>   
      <tbody>
          @foreach ($all_category_info as $v_category)
              
          
        <tr>
            <td>{{ $v_category->category_id}}</td>
            <td class="center">{{ $v_category->category_name}}</td>
            <td class="center">
                 @if($v_category->publication_status == 1) 
                <span class="label label-success">Published</span>
                @else 
                <span class="label label-important">Unpublished</span>
                @endif
            </td>
            <td class="center">
                @if($v_category->publication_status == 1)
                <a class="btn btn-danger" href="{{URL::to('/Unpulished_category/'.$v_category->category_id)}}">
                    <i class="halflings-icon white thumbs-down"></i>  
                </a>
                @else
                <a class="btn btn-success" href="{{URL::to('/pulished_category/'.$v_category->category_id)}}">
                    <i class="halflings-icon white thumbs-up"></i>  
                </a>
                @endif
                <a class="btn btn-info" href="{{URL::to('/delete_category/'.$v_category->category_id)}}" onclick="return checkDelete();">
                    <i class="halflings-icon white trash"></i>  
                </a>
                <a class="btn btn-danger" href="{{URL::to('/edit_category/'.$v_category->category_id)}}">
                    <i class="halflings-icon white edit"></i> 
                </a>
            </td>
        </tr>

        @endforeach
      </tbody>
  </table>            
</div>

@endsection