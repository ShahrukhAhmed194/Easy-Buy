
@extends('admin/layout')
@section('page_title','Manage Brand')
@section('brand_select','active')
@section('container')
@if($id>0)
    {{$image_required = ""}}
@else
    {{$image_required = "required"}}
@endif

@error('image')
<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
    {{$message}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;x</span>
    </button>
</div>
@enderror

<div class="row col-12 py-2">
    <h1 class="col-6">Manage Brand</h1>
    <a href="{{url('admin/brand')}}" class="col-6">
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
                        <form action="{{route('brand.manage_brand_process')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="brand" class="control-label mb-1">Brand</label>
                                <input id="brand" value="{{$name}}" name="name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                                @error('name')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}								
                                </div>
                                @enderror 
                            </div>

                            <div class="form-group">
                                <label for="image" class="control-label mb-1">Image</label>
                                <input id="image" name="image" type="file" class="form-control" aria-required="true" aria-invalid="false" {{$image_required }}>
                                @error('image')
                                    <div class="alert alert-danger" role="alert">
                                        {{$message}}								
                                    </div> 
                                @enderror

                                @if($image!='')
                                    <img width="100px" src="{{asset('storage/media/brand')}}/{{$image}}" alt="Picture"/>  <!--must do storage:link -->
                                @endif  
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