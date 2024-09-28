@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{route('admin.settings.index')}}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
          </div>
      <h1>SEO Setting</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Update SEO Setting</h4>
            </div>
            <div class="card-body">
                <form action="{{route('admin.seo-settings.update', 1)}}" method="post">
                    @csrf
                    @method('put')
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Seo Title</label>
                <div class="col-sm-12 col-md-7">
                  <input  type="text" name="title" class="form-control" value="{{$seo->title}}">
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Seo Description</label>
                <div class="col-sm-12 col-md-7">
                 <textarea name="description" id="" class="form-control" style="height: 100px">{!!@$seo->description!!}</textarea>
                </div>
              </div>
              <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Seo Keyword</label>
                <div class="col-sm-12 col-md-7">
                  <input  type="text" name="keywords" class="form-control" value="{!!@$seo->keyword!!}">
                  <code>Keyword Seperate by comma</code>
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
