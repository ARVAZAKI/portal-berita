@extends('admin.layouts')
@section('title','dashboard')
@section('content')
     @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif
     <div class="card">
        
        <h5 class="card-header">News Table</h5>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Title</th>
                <th>upload date</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($news as $item)
              <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->upload_date }}</td>
                <td>
                    <a href="{{ route('delete',$item->id) }}" class="btn btn-danger btn-sm">Delete</a>
                </td>
              </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <!--/ Basic Bootstrap Table -->
@endsection