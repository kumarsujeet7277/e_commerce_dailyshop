@extends('admin/layout')
@section('page_title','Manage Coupon')
@section('container')
<h1 style="margin: 10px;">Manage Coupon</h1>
<a href="{{url('admin/coupon')}}">
        <button type="button" class="btn btn-success">
            Back
        </button>
</a>
<div class="row m-t-30">
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-12">
                
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('coupon.insert')}}" method="post" >
                            @csrf
                            <div class="form-group">
                                <label for="title" class="control-label mb-1">Coupon Title</label>
                                <input id="title" name="title" value="{{$title}}" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                @error('title')
                                   <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="code" class="control-label mb-1">Coupon Code</label>
                                <input id="code" name="code" value="{{$code}}" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                            </div>
                            @error('code')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <label for="value" class="control-label mb-1">Coupon Value</label>
                                <input id="value" name="value" value="{{$value}}" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                            </div>
                            @error('value')
                                <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                    Submit
                                </button>
                            </div>
                            <input type="hidden" name="id" value="{{$id}}"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    
@endsection