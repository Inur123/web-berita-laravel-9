@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Post Categories</h1>
    </div>

    @if(session()->has('success'))
    <div class="alert alert-success col-lg-6" role="alert">
      {{ session('success') }}
    </div>
    @endif

    <div class="col-lg-8">
        <form method="post" action="/dashboard/categories/">
            @csrf
            <div class="mb-3">
              <label for="categories" class="form-label">Category</label>
              <input type="text" class="form-control" id="title" name="nam_category"required >
            </div>
            <button type="submit" class="btn btn-primary">Create Category</button>
        </form>
    </div>
 

@endsection

