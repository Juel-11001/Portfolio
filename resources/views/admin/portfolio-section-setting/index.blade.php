@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Section Setting</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Update Section Setting</h4>
            </div>
            <div class="card-body">
                <form action="{{route('admin.portfolio-section-setting.update', 1)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                <div class="col-sm-12 col-md-7">
                  <input  type="text" name="title" class="form-control" value="{{$sectionSetting->title}}">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sub Title</label>
                <div class="col-sm-12 col-md-7">
                 <textarea name="sub_title" id="" class="form-control" style="height: 100px">{!! $sectionSetting->sub_title !!}</textarea>
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
