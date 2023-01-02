@extends('layouts.default')
@section('title', 'Add Categories')


@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">{{$title}}</h1>
  <a href="categories" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-back fa-sm text-white-50"></i> Back</a>
</div>

<!-- Content Row -->

<div class="row d-flex justify-content-center">

  
  <div class="col-sm-5">
    @if ($errors->any())
              
                <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                           {{ $error }}
                        @endforeach
                    
                </div>
            @endif
      <div class="card shadow-sm">
        <div class="card-body">
          
          <form action="category-add" method="POST">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control"  name="name" id="name" placeholder="Enter name category...">

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



@endsection