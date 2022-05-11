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
</style>

<div class="container" style="margin-top: 2em">
    <h1 style="color: red;">{{$title_page}}</h1>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Title</th>
                <th scope="col">User</th>
                <th scope="col">Count</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach($posts as $post)
            <tr>
                <td>{{$i}}</td>
                <td><a href="/post/postDetail/{{$post->id}}">{{$post->title ?? 'None'}}</a></td>
                <td>{{$post->user->name ?? 'None'}}</td>
                <td>{{$post->comment_count}}</td>
            </tr>
            <?php $i++ ?>
            @endforeach

        </tbody>
    </table>
</div>
@include('layouts.navigation')

@endsection