@extends('layouts.app')

@section('content')
<style>
  .container a {
    text-decoration: none;
    color: white;
  }

  .container a:hover {
    color: red;
  }

  .error-message {
    color: red;
  }
</style>

<div class="container" style="margin-top: 2em">
  <h1 style="color: red;">{{$title_page}}</h1>

  <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="user_id">Người đăng bài</label>
      <select class="col-sm-10 form-control" id="user_id" placeholder="Người đăng bài" name="user_id" value="{{old('user_id')}}">
        @foreach($users as $user)
        <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
      </select>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="title">Tên bài viết</label>
      <input type="text" class="col-sm-10 form-control" id="title" placeholder="tên bài viết" name="title" value="{{old('title')}}">
      <span class="error-message">{{ $errors->first('title') }}</span>
    </div>

    <div class="form-group row">
      <label class="col-sm-2 col-form-label" for="description">Nội dung</label>
      <textarea class="col-sm-10 form-control" id="description" placeholder="Nội dung" name="description">{{old('description')}}</textarea>
      <span class="error-message">{{ $errors->first('description') }}</span>
    </div>


    <br>
    <div class="form-group row">
      <input type="submit" class="col-sm-2 form-control" value="Thêm">
      <input type="reset" class="col-sm-2 form-control" value="Nhập lại">
    </div>
    <br><br>
  </form>
</div>


@endsection