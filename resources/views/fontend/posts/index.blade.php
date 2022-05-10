@extends('layouts.app')

@section('content')

<div class="container">
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">id</th>
                <th scope="col">Title</th>
                <th scope="col">User</th>
                <th scope="col">Comment</th>
                <th scope="col">Count</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach($posts as $post)
            <tr>
                <th scope="row">{{$i}}</th>
                <td>{{$post->id}}</td>
                <td>{{$post->title ?? 'None'}}</td>
                <td>{{$post->user->name ?? 'None'}}</td>
                <td>{{$post->description ?? 'None'}}</td>
                <td>{{$post->comment_count}}</td>
            </tr>
            <?php $i++ ?>
            @endforeach

        </tbody>
    </table>
</div>

@endsection