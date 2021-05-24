@extends('admin/layout')
@section('page_title','Product')
@section('product_select','active')
@section('container')

@if(session()->has('message'))
<div class="sufee-alert alert with-close alert-primary alert-dismissible fade show">
{{session('message')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="row py-2">
    <h1 class="col-6">Product</h1>
    <a href="{{url('admin/product/manage_product')}}" class="col-6 ">
    <button type="button" class="btn btn-success float-right">
        Add Product
    </button>
    </a>
</div>
<div class="row mt-30">
    <div class="col-md-12">
        <div class="table-responsive m-b-40">
            <table class="table table-borderless table-data3">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data as $list)
                    <tr>
                        <td>{{$list->id}}</td>
                        <td>{{$list->name}}</td>
                        <td>{{$list->slug}}</td>  
                        <td>
                        @if($list->image!='')
                            <img width="100px" src="{{asset('storage/media/'.$list->image)}}"
                              alt="Picture">  <!--must do storage:link -->
                        @endif
                        </td>  
                        <td>
                            <a href="{{url('admin/product/manage_product/')}}/{{$list->id}}">
                            <button type="button" class="btn btn-success">Edit
                            </button></a>

                            @if($list->status==1)
                                <a href="{{url('admin/product/status/0')}}/{{$list->id}}">
                                <button type="button" class="btn btn-primary">Active
                                </button></a>
                              @elseif($list->status==0)
                                <a href="{{url('admin/product/status/1')}}/{{$list->id}}">
                                <button type="button" class="btn btn-warning">Deactive
                                </button></a>
                            @endif
                            
                            <a href="{{url('admin/product/delete/')}}/{{$list->id}}">
                            <button type="button" class="btn btn-danger">Delete
                            </button></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
    
@endsection