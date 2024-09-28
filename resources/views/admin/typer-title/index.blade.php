@extends('admin.layouts.master')
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Typer Title</h1>
    </div>

    <div class="section-body">
      {{-- <h2 class="section-title">Create New Post</h2>
      <p class="section-lead">
        On this page you can create a new post and fill in all fields.
      </p> --}}

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>All Typer Title</h4>
              <div class="card-header-action">
                  <a href="{{route('admin.typer-title.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i>Create New</a>
              </div>
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
        </div>
      </div>
    </div>
  </section>
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
