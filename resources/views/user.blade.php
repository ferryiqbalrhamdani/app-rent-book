@extends('layouts.default')
@section('title', 'User List')


@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">User</h1>
    
  <a href="/users-inactive" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-back fa-sm text-white-50"></i> User In Active</a>
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
        <table class="table table-hover table-bordered">
          <thead>
            <tr class="text-center">
              <th scope="col">No</th>
              <th scope="col">Username</th>
              <th scope="col">Phone</th>
              <th scope="col">Address</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody style="text-transform: capitalize">
            @if ($usercount == 0)
                            <tr>
                                <td colspan="7" class="text-center"><div class="alert alert-danger">No data yet.</div> </td>
                            </tr>
                        @else
            @foreach ($users as $u)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{$u->username}}</td>
              <td>{{$u->phone}}</td>
              <td>{{$u->address}}</td>
              <td class="text-center">
                <a href="/user-inactive/{{ $u->slug }}" class=" btn btn-sm  btn-success ">{{$u->status}}</a>
                
              </td>
              <td class="text-center">
                <form method="POST" action="user-delete/{{ $u->slug }}" style="display: inline-block;">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete account {{ $u->username }}?')"> Delete Account</button>
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