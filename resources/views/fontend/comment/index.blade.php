@extends('layouts.app')

@section('content')

<div class="container">
  <table class="table table-dark table-striped">
    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Title</th>
        <th scope="col">User</th>
        <th scope="col">Comment</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; ?>
      @foreach($comments as $comment)
      <tr>
        <th scope="row">{{$i}}</th>
        <td>{{$comment->id}}</td>
        <td>{{$comment->post->title ?? 'None'}}</td>
      </tr>
      <?php $i++ ?>
      @endforeach

    </tbody>
  </table>
</div>

@endsection