@extends('admin/layout')
@section('page_title','Coupon')
@section('container')
    @if (Session::has('danger'))
        <div class="alert alert-danger" role="alert">{{ Session::get('danger')}}</div>
    @endif
    @if (Session::has('message'))
        <div class="alert alert-primary" role="alert">{{ Session::get('message')}}</div>
    @endif
<h1 style="margin: 10px;">Coupon</h1>
<a href="coupon/manage_coupon">
    <h4>
        <button type="button" class="btn btn-success">
            Add Coupon
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
                        <th>Title</th>
                        <th>Coupon Code</th>
                        <th>Coupon Value</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->title}}</td>
                            <td>{{$item->code}}</td>
                            <td>{{$item->value}}</td>
                            <td>
                                <a href="{{url('admin/coupon/delete/')}}/{{$item->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                                <a href="{{url('admin/coupon/manage_category/')}}/{{$item->id}}"><button type="button" class="btn btn-success">Edit</button></a>
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