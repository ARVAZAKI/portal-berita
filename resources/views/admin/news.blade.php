@extends('admin.layouts')
@section('title','News Center')
@section('content')

<div class="container">
    @foreach ($news as $item)
    <div class="card mt-2">
      <div class="card-body">
        <h2>{{ $item->title }}</h2>
        <p>written by : {{$item->user->username}}</p>
        <p>upload date : {{ $item->upload_date }}</p>
        <p>{{$item->content}}</p>
      </div>
    </div>
    @endforeach
  </div>
@endsection