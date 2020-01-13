@extends('template')
@section('category')
<h4>Categories</h4>

<?php
    $c_info = DB::table('tbl_category')
    ->where('publication_status',1)
    ->get()
?>

@foreach ($c_info as $v_category)
    <ul class="templatemo_list">
        <li><a href="index.html">{{$v_category->category_name}}</a></li>
    </ul>
@endforeach




@endsection