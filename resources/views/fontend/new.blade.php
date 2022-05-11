@extends('layouts.app')

@section('content')
<style type="text/css">
    .error-message {
        color: red;
    }
</style>


<div class="content-wrapper">

    <div class="container">
        <form action="{{route('home.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="name">Slug</label>
                <input type="text" class="col-sm-10 form-control" id="slug" placeholder="slug" name="slug" value="{{old('slug')}}">
                <span class="error-message">{{ $errors->first('slug') }}</span>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="name">Title</label>
                <input type="text" class="col-sm-10 form-control" id="title" placeholder="Tên " name="title" value="{{old('title')}}">
                <span class="error-message">{{ $errors->first('title') }}</span>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="content">Mô tả</label>
                <textarea class="col-sm-10 form-control" id="content" placeholder="Mô tả" name="content">{{old('content')}}</textarea>
                <span class="error-message">{{ $errors->first('content') }}</span>
            </div>


            <div class="form-group row">
                <input type="submit" class="col-sm-2 form-control" value="Thêm">
                <input type="reset" class="col-sm-2 form-control" value="Nhập lại">
            </div>
        </form>
    </div>
</div>

@endsection