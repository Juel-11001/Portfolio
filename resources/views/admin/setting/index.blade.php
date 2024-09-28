@extends('admin.layouts.master')
@section('content')
 <!-- Main Content -->
    <section class="section">
      <div class="section-header">
        <h1>Settings</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item">Settings</div>
        </div>
      </div>

      <div class="section-body">
        <div class="row">
          <div class="col-lg-6">
            <div class="card card-large-icons">
              <div class="card-icon bg-primary text-white">
                <i class="fas fa-cog"></i>
              </div>
              <div class="card-body">
                <h4>General</h4>
                <p>General settings such as, site logo, site favicon, footer logo and so on.</p>
                <a href="{{route('admin.general-setting.index')}}" class="card-cta">Change Setting <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card card-large-icons">
              <div class="card-icon bg-primary text-white">
                <i class="fas fa-search"></i>
              </div>
              <div class="card-body">
                <h4>SEO</h4>
                <p>Search engine optimization settings, such as meta tags and social media.</p>
                <a href="{{route('admin.seo-settings.index')}}" class="card-cta">Change Setting <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection

