@extends('admin.layouts')
@section('title','Add News')
@section('content')
@if (session('message'))
<div class="alert alert-success" role="alert">
    {{ session('message') }}
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif
<div class="col-md-12">
    <div class="card mb-4">
      <h5 class="card-header">Add News</h5>
      <div class="card-body">
        <form action="/upload-news" method="POST">
            @csrf
            <div>
                <label for="exampleFormControlTextarea1" class="form-label">Title</label>
                <textarea class="form-control"  rows="2" name="title"></textarea>
              </div>
              <div>
                <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                <textarea class="form-control" rows="12" name="content"></textarea>
              </div>
              <div>
                <input type="submit" class="btn btn-success btn-sm mt-3" value="Add">
              </div>
        </form>
      </div>
    </div>
  </div>
  @endsection