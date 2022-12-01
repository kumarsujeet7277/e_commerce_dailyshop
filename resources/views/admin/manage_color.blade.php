@extends('admin/layout')
@section('page_title','Color Manage')
@section('color_select','active')
@section('container')
<h1 style="margin: 10px;">Manage Color</h1>
<a href="{{url('admin/color')}}">
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
                        <form action="{{route('color.insert')}}" method="post" >
                            @csrf
                            <div class="form-group">
                                <label for="color" class="control-label mb-1">Color</label>
                                <input id="color" name="color" value="{{$color}}" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                @error('color')
                                   <div class="alert alert-danger" role="alert">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- <div class="form-group">
                                <label for="status" class="control-label mb-1">Status</label>
                                <input id="status" name="status" value="" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                            </div>
                            @error('status')
                            <div class="alert alert-danger" role="alert">{{ $message }}</div>
                            @enderror --}}
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