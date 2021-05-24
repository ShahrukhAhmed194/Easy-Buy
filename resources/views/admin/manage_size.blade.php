@extends('admin/layout')
@section('page_title','Manage Size')
@section('size_select','active')

@section('container')
<div class="row col-12 py-2">
    <h1 class="col-6">Manage Size</h1>
    <a href="{{url('admin/size')}}" class="col-6">
    <button type="button" class="btn btn-success float-right">
        Back
    </button>
    </a>
</div>
<div class="row mt-30">
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('size.manage_size_process')}}" method="post" >
                            @csrf
                            <div class="form-group">
                                <label for="size" class="control-label mb-1">Size Name</label>
                                <input id="size" value="{{$size}}"name="size" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                            @error('size')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}								
                            </div>
                            @enderror 
                            </div>
                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                    Submit
                                </button>
                            </div> 
                            <input type="hidden" name="id" value="{{$id}}">
                        </form>
                    </div>
                </div>
            </div>
        </div>                  
    </div>
</div>
    
@endsection