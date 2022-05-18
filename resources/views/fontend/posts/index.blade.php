@extends('layouts.app')

@section('content')
<style>
    .table a {
        text-decoration: none;
        color: white;
    }

    .table a:hover {
        color: red;
    }

    .title_page {
        display: inline;
    }

    .button_add {
        color: black;
        display: inline;
        float: right;
        width: 8em;
        height: 2.5em;
        border: 0.5px solid black;
        border-radius: 5%;
    }

    .button_add a {
        text-decoration: none;
        color: black;
    }

    .button_add:hover {
        text-decoration: none;
        background-color: #FF4500;
        transition: 0.5s;
    }
</style>
@if(session()->has('message'))
<div class="container">
    <div class="alert alert-success">
        <p>{{ session()->get('message') }}</p>
    </div>
</div>
@endif
<div class="container" style="margin-top: 2em">
    <h1 class="title_page" style="color: red;">{{$title_page}}</h1>

    <form action="" class="form-inline">
        <div class="input-group">
            <input type="search" class="form-control rounded" name="key" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
            <button type="submit" class="btn btn-outline-primary">search</button>
        </div>
    </form>

    <button class="button_add"><a href="{{route('post.create')}}">
            Add Post
        </a></button>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Title</th>
                <th scope="col">User</th>
                <th scope="col">Count</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach($posts as $post)
            <tr>
                <td>{{$i}}</td>
                <td><a href="post/postDetail/{{$post->id}}">{{$post->title ?? 'None'}}</a></td>
                <td>{{$post->user->name ?? 'None'}}</td>
                <td>{{$post->comment_count}}</td>
                <td>
                    <form action="{{route('post.destroy', ['post'=>$post->id])}}" method="POST" onsubmit="return(confirm('Bạn có thực sự muốn xóa?'))">
                        @method('DELETE')
                        @csrf
                        <input type="submit" value="Xóa">
                    </form>
                </td>
            </tr>
            <?php $i++ ?>
            @endforeach

        </tbody>
    </table>
</div>
@include('layouts.navigation')

@endsection