@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="{{route('admin.blog-category.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Blog Categories</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Create Blog Category</h4>
              {{-- <div class="card-header-action">
                  <a href="{{route('admin.category.index')}}" class="btn btn-primary"><i class="fas fa-arrow-left"></i> Back</a>
              </div> --}}
            </div>
            <div class="card-body">
                <form action="{{route('admin.blog-category.store')}}" method="post">
                    @csrf
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                <div class="col-sm-12 col-md-7">
                  <input  type="text" name="name" class="form-control" value="">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7">
                  <button class="btn btn-primary">Create</button>
                </div>
              </div>

                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
