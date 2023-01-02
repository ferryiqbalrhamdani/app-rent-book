@extends('layouts.default')
@section('title', 'Categories')


@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Category List</h1>
  <a href="category-add" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add Category</a>
</div>

<!-- Content Row -->

<div class="row">

  <div class="col">
    @if (session('status'))
    <div class="alert alert-success shadow-md">
      {{session('status')}}
    </div>
    @endif
    <div class="card shadow">
      <div class="card-body">
        <table class="table table-bordered">
          <thead>
            <tr class="text-center">
              <th scope="col">No</th>
              <th scope="col">Name</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody style="text-transform: capitalize">
            @if ($categorycount == 0)
                            <tr>
                                <td colspan="7" class="text-center"><div class="alert alert-danger">No data yet.</div> </td>
                            </tr>
                        @else
            @foreach ($categories as $c)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{$c->name}}</td>
              <td>
                <a href="category-edit/{{ $c->slug }}" class=" btn btn-sm btn-success"><i class="fas fa-edit fa-sm"></i> Edit</a>
                <form method="POST" action="category-delete/{{ $c->slug }}" style="display: inline-block;">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete data {{ $c->name }}?')"><i class="fas fa-trash fa-sm text-white-50 show_confirm"></i> Hapus Data</button>
                </form>
              </td>
            </tr>
            @endforeach
          @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Content Row -->



@endsection