@extends('layouts.app')

@section('content')

<div class="container">
  <table class="table table-dark table-striped">
    <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">user</th>
        <th scope="col">Title Post</th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1; ?>
      @foreach($comments as $comment)
      <tr>
        <th scope="row">{{$i}}</th>
        <td>{{$comment->user->name ?? 'none'}}</td>
        <td>{{$comment->post->title ?? 'None'}}</td>
      </tr>
      <?php $i++ ?>
      @endforeach

    </tbody>
  </table>
</div>

@endsection