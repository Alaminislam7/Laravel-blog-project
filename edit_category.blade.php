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
            {!! Form::open(['url' =>'/update_category','method'=>'post','name'=>'edit_category']) !!}
              <fieldset>
                <div class="control-group">
                  <label class="control-label" for="typeahead">Category Name </label>
                  <div class="controls">
                    <input type="text" class="span6 typeahead" id="typeahead" value="{{ $category_info->category_name }}" name="category_name"  data-provide="typeahead" data-items="4">
                    <input type="hidden" class="span6 typeahead" id="typeahead" value="{{ $category_info->category_id }}" name="category_id">
                  </div>
                </div>
        
                <div class="control-group hidden-phone">
                  <label class="control-label" for="textarea2">Category Description</label>
                  <div class="controls">
                    <textarea class="cleditor" id="textarea2" name="category_description" rows="3" ">{{ $category_info->category_description }}</textarea>
                  </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="typeahead">Publication Status </label>
                    <div class="controls">
                        <select name="publication_status" id="">
                            
                            <option>{{ $category_info->publication_status }}</option>
                            <option value="1">Publised</option>
                            <option value="0">Unpublised</option>
                        </select>
                    </div>
                </div>

                <div class="form-actions">
                  <button type="submit" class="btn btn-primary">Update</button>
                  <button type="reset" class="btn">Cancel</button>
                </div>
              </fieldset>
            {!! Form::close() !!}   

        </div>
    </div><!--/span-->

</div><!--/row-->

@endsection