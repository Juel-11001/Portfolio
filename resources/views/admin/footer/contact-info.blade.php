@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Footer Info</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Update Footer Info</h4>
            </div>
            <div class="card-body">
                <form action="{{route('admin.contact-info.update', 1)}}" method="post">
                    @csrf
                    @method('put')
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Phone</label>
                <div class="col-sm-12 col-md-7">
                  <input  type="text" name="phone" class="form-control" value="{{$contact_info->phone}}">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                <div class="col-sm-12 col-md-7">
                  <input  type="text" name="email" class="form-control" value="{{$contact_info->email}}">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Address</label>
                <div class="col-sm-12 col-md-7">
                 <textarea name="address" id="" class="form-control" style="height: 100px">{!!$contact_info->address!!}</textarea>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7">
                  <button class="btn btn-primary">Update</button>
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
