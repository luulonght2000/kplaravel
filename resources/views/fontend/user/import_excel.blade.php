@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-centre" style="margin-top: 4%">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header bgsize-primary-4 white card-header">
          <h4 class="card-title" style="color: red;">Import Excel Data</h4>
        </div>
        <div class="card-body">
          @if ($message = Session::get('success'))
          <div class="alert alert-success alert-block">
            <strong>{{ $message }}</strong>
          </div>
          <br>
          @endif
          <form action="{{url("user/import")}}" method="post" enctype="multipart/form-data">
            @csrf
            <fieldset>
              <label>Select File to Upload <small class="warning text-muted">{{__('Please upload only Excel (.xlsx or .xls) files')}}</small></label>
              <div class="input-group">
                <input type="file" required class="form-control" name="uploaded_file" id="uploaded_file">
                <div class="input-group-append" id="button-addon2">
                  <button class="btn btn-primary square" type="submit"><i class="ft-upload mr-1"></i> Upload</button>
                </div>
              </div>
              @if ($errors->has('uploaded_file'))
              <p style="color: red;">
                <small>{{ $errors->first('uploaded_file') }}</small>
              </p>
              @endif
            </fieldset>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="row justify-content-left">
    <div class="col-md-12">
      <br />
      <div class="card">
        <div class="card-header bgsize-primary-4 white card-header">
          <div class="pull-left">
            <h4 class="card-title">User Data Table</h4>
          </div>
          <div class="pull-right">
            <a href="{{url("user/export")}}" class="btn btn-primary" style="margin-left:85%">Export Excel Data</a>
          </div>
        </div>
        <div class="card-body">
          <div class=" card-content table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <th>Name</th>
                <th>Email</th>
                <th>password</th>
                <th>Action</th>
              </thead>
              <tbody>
                @if(!empty($data) && $data->count())
                @foreach($data as $row)
                <tr>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->email }}</td>
                  <td>{{ $row->password }}</td>
                  <td>
                    <form action="{{url('user/destroy', ['row'=>$row->id])}}" method="POST" onsubmit="return(confirm('Bạn có thực sự muốn xóa?'))">
                      @method('DELETE')
                      @csrf
                      <input type="submit" value="Xóa">
                    </form>
                  </td>
                </tr>
                @endforeach
                @else
                <tr>
                  <td colspan="10">There are no data.</td>
                </tr>
                @endif
              </tbody>
            </table>
            {{$data->onEachSide(10)->links()}}
          </div>
        </div>
      </div>
    </div>
  </div>
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script>
    $(document).ready(function() {
      $('#example').DataTable();
    });
  </script>
  @endsection