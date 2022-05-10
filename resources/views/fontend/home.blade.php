@extends('layouts.app')

@section('content')
<style>
  .container a {
    text-decoration: none;
    color: black;

  }

  .container a:hover {
    color: #2fa1b3;
  }

  .container img {
    transition: transform .5s, filter 1.5s ease-in-out;
    /* filter: grayscale(100%); */
  }

  .container img:hover {
    /* filter: grayscale(0); */
    transform: scale(1.1);
  }

  .list1 {
    width: 35%;
  }

  .list2 {
    width: 65%;
  }
</style>
<div class="container" style="margin-top: 2em;">
  <div class="row">
    <div class="col-8">
      <div style="width: 100%;">
        <img src="{{"/images/h1.png"}}" alt="" style="width: 100%;">
        <h3><a href="">Báo Philippines coi trận hòa U23 Việt Nam là 'thành quả của sự kiên cường'</a></h3>
      </div>
      <hr style="width: 95%; ">
      <div class="row">
        <div class="col">
          <img src="{{"/images/h1.png"}}" alt="" style="width: 95%;">
          <p><a href="">Báo Philippines coi trận hòa U23 Việt Nam là 'thành quả của sự kiên cường'</a></p>
        </div>
        <div class="col">
          <img src="{{"/images/h1.png"}}" alt="" style="width: 95%;">
          <p><a href="">Báo Philippines coi trận hòa U23 Việt Nam là 'thành quả của sự kiên cường'</a></p>
        </div>
        <div class="col">
          <img src="{{"/images/h1.png"}}" alt="" style="width: 95%;">
          <p><a href="">Báo Philippines coi trận hòa U23 Việt Nam là 'thành quả của sự kiên cường'</a></p>
        </div>
      </div>
    </div>
    <div class="col-4">
      <table class="table" style="width: 100%; ">
        <tr>
          <td class="list1">
            <img src="{{"/images/h1.png"}}" style="width: 100%;" alt="">
          </td>
          <td class="list2">
            <p><a href="">Báo Philippines coi trận hòa U23 Việt Nam là 'thành quả của sự kiên cường'</a></p>
          </td>
        </tr>

        <tr>
          <td class="list1">
            <img src="{{"/images/h1.png"}}" style="width: 100%;" alt="">
          </td>
          <td class="list2">
            <p><a href="">Báo Philippines coi trận hòa U23 Việt Nam là 'thành quả của sự kiên cường'</a></p>
          </td>
        </tr>

        <tr>
          <td class="list1">
            <img src="{{"/images/h1.png"}}" style="width: 100%;" alt="">
          </td>
          <td class="list2">
            <p><a href="">Báo Philippines coi trận hòa U23 Việt Nam là 'thành quả của sự kiên cường'</a></p>
          </td>
        </tr>

        <tr>
          <td class="list1">
            <img src="{{"/images/h1.png"}}" style="width: 100%;" alt="">
          </td>
          <td class="list2">
            <p><a href="">Báo Philippines coi trận hòa U23 Việt Nam là 'thành quả của sự kiên cường'</a></p>
          </td>
        </tr>
      </table>
    </div>
  </div>
</div>
</div>


@endsection