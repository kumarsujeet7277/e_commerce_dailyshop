@extends('admin/layout')
@section('page_title','Category')
@section('category_select','active')
@section('container')
    @if (Session::has('danger'))
        <div class="alert alert-danger" role="alert">{{ Session::get('danger')}}</div>
    @endif
    @if (Session::has('message'))
        <div class="alert alert-primary" role="alert">{{ Session::get('message')}}</div>
    @endif
<h1 style="margin: 10px;">Category</h1>
<a href="category/manage_category">
    <h4>
        <button type="button" class="btn btn-success">
            Add Category
        </button>
    </h4>
    
</a>
<div class="row m-t-30">
    <div class="col-md-12">
        <!-- DATA TABLE-->
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Category Name</th>
                        <th>Category Slug</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->category_name }}</td>
                            <td>{{$item->category_slug}}</td>
                            <td>
                                <a href="{{url('admin/category/manage_category/')}}/{{$item->id}}"><button type="button" class="btn btn-success">Edit</button></a>
                                @if($item->status == 1)
                                    <a href="{{url('admin/category/status/0')}}/{{$item->id}}"><button type="button" class="btn btn-warning">Active</button></a>
                                @elseif($item->status == 0)
                                    <a href="{{url('admin/category/status/1')}}/{{$item->id}}"><button type="button" class="btn btn-warning">Deactive</button></a>
                                @endif
                                <a href="{{url('admin/category/delete/')}}/{{$item->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>    
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END DATA TABLE-->
    </div>
</div>

    
@endsection