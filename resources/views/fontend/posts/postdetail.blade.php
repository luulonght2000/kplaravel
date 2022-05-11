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

<div class="container" style="margin-top: 5em">
  <table class="table table-dark table-striped">
    <thead style="text-align: center;">
      <tr>
        <th scope="col">Title</th>
        <th scope="col">User</th>
        <th scope="col">Description</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>{{$post->title ?? 'None'}}</a></td>
        <td>{{$post->user->name ?? 'None'}}</td>
        <td>{{$post->description ?? 'None'}}</td>
      </tr>
      <tr>
        <td colspan="3">
          <h5 style="color: red;">Comment</h5>
        </td>
      </tr>
      <tr>
        <td colspan="3">
          <?php $i = 1; ?>
          @foreach($comments as $comment)
          <p><i style="color: red;">{{$i}}-</i> {{$comment->description}}</p>
          <?php $i++ ?>
          @endforeach
        </td>
      </tr>
    </tbody>
  </table>
</div>

@endsection