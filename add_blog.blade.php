@extends('admin.admin_master')
@section('admin_content')

<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="index.html">Home</a>
        <i class="icon-angle-right"></i> 
    </li>
    <li>
        <i class="icon-edit"></i>
        <a href="#">Forms</a>
    </li>
</ul>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Form Elements</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        
        <h3 style="color:green">
          <?php
            $Messege = Session::get('Messege');
            if($Messege)
            {
              echo $Messege;
              Session::put('Messege', null);
            }
          ?>
        </h3>
        <div class="box-content">
            {!! Form::open(['url' =>'/save_blog','method'=>'post','enctype'=>'multipart/form-data'])!!}
              <fieldset>
                <div class="control-group">
                  <label class="control-label" for="typeahead">Blog Title </label>
                  <div class="controls">
                    <input type="text" class="span6 typeahead" id="typeahead" name="blog_tittle"  data-provide="typeahead" data-items="4">
                  </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="typeahead"> Category </label>
                    <div class="controls">
                        <select id="selectEror3" name="category_id">
                            <option>Select Category</option>
                            @foreach ($category_info as $c_info)
                                <option value="{{$c_info->category_id}}">{{$c_info->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
        
                <div class="control-group hidden-phone">
                  <label class="control-label" for="textarea2">Blog Short Description</label>
                  <div class="controls">
                    <textarea class="cleditor" id="textarea2" name="blog_short_description" rows="3"></textarea>
                  </div>
                </div>

                <div class="control-group hidden-phone">
                    <label class="control-label" for="textarea2">Blog Long Description</label>
                    <div class="controls">
                      <textarea class="cleditor" id="textarea2" name="blog_long_description" rows="3"></textarea>
                    </div>
                </div>

                <div class="control-group">
                  <label class="control-label" for="typeahead">Publication Status </label>
                  <div class="controls">
                      <select name="publication_status" id="">
                          <option value=" ">Select Status</option>
                          <option value="1">Publised</option>
                          <option value="0">Unpublised</option>
                      </select>
                  </div>
                </div>

                <div class="controls">
                    <div class="uploader" id="uniform-fileInput"><input class="input-file uniform_on" id="fileInput" type="file" name="blog_image" pan class="filename" style="user-select: none;">No file selected</span><span class="action" style="user-select: none;">Choose File</span></div>
                </div>

                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Save changes</button>
                  <button type="reset" class="btn">Cancel</button>
                </div>
              </fieldset>
            {!! Form::close() !!}   

        </div>
    </div><!--/span-->

</div><!--/row-->

@endsection