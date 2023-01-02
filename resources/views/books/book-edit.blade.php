@extends('layouts.default')
@section('title', 'Edit Book')


@section('content')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">{{$title}}</h1>
  <a href="/books" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-back fa-sm text-white-50"></i> Back</a>
</div>

<!-- Content Row -->

<div class="row d-flex justify-content-center">


  <div class="col-sm-6">

    <div class="card shadow-sm">
      <div class="card-body">

        <form action="/book-edit/{{ $book->slug }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-3">
            <label for="book_code" class="form-label">Code</label>
            <input type="text" class="form-control" name="book_code" id="book_code" value="{{ $book->book_code }}" placeholder="Enter book's code...">
            <span class="text-danger mt-2">{{ $errors->first('book_code') }}</span>
          </div>
          <div class="mb-3">
            <label for="title" class="form-label">Titile</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ $book->title }}" placeholder="Enter book's tilte...">
            <span class="text-danger mt-2">{{ $errors->first('title') }}</span>
          </div>
          <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-control select-multiple" name="category[]" id="category" multiple>
              @foreach ($categories as $item)
              <option value="{{ $item->id }}">{{ $item->name }}</option>
              @endforeach
            </select>
            <span class="text-danger mt-2">{{ $errors->first('title') }}</span>
          </div>
          <div class="mb-3">
            <label for="curentcategory" class="form-label">Current Category</label>
            <ul>
              @foreach ($book->categories as $category)
              <li>{{ $category->name }}</li>
              @endforeach

            </ul>
          </div>
          <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input class="form-control" name="image" type="file" id="image">
          </div>
          <div class="mb-3">
            <label for="image" class="form-label" style="display: block">Currnet Image</label>
            @if ($book->cover != '')
            <img src="{{ asset('storage/cover/'.$book->cover) }}" alt="" width="300px">
            @else
            <div class="alert alert-danger" role="alert">
              Image is not found.
            </div>
            @endif
          </div>

          <div class="">
            <button class="btn btn-primary form-control" type="submit">Save</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

<!-- Content Row -->
<script src="https://code.jquery.com/jquery-3.6.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
  // In your Javascript (external .js resource or <script> tag)
  $(document).ready(function() {
    $('.select-multiple').select2();
  });
</script>
@endsection