@extends('layouts.default')
@section('title', 'Books')


@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
    <a href="book-add" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i> Add book</a>
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
                            <th scope="col">Cover</th>
                            <th scope="col">Code</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody style="text-transform: capitalize">
                        @if ($bookCount == 0)
                        <tr>
                            <td colspan="7" class="text-center">
                                <div class="alert alert-danger">No data yet.</div>
                            </td>
                        </tr>
                        @else
                        @foreach ($books as $c)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ asset('storage/cover/'.$c->cover) }}" alt="" width="100px"></td>
                            <td>{{$c->book_code}}</td>
                            <td>{{$c->title}}</td>
                            <td>
                                @foreach ($c->categories as $item)
                                <span class="badge bg-primary text-white">{{$item->name}}</span> <br>
                                @endforeach
                            </td>
                            <td>{{$c->status}}</td>
                            <td>
                                <a href="book-edit/{{ $c->slug }}" class=" btn btn-sm btn-success"><i class="fas fa-edit fa-sm"></i> Edit</a>
                                <form method="POST" action="book-delete/{{ $c->slug }}" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete data {{ $c->title }}?')"><i class="fas fa-trash fa-sm text-white-50 show_confirm"></i> Hapus Data</button>
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