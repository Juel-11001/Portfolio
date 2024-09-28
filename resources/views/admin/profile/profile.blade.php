@extends('admin.layouts.master')
@section('content')
 <!-- Main Content -->
    <section class="section">
      <div class="section-header">
        <h1>Profile</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item">Profile</div>
        </div>
      </div>
      <div class="section-body">
        <h2 class="section-title">{{old('name',$user->name)}}</h2>
            <p class="section-lead">
              Change information about yourself on this page.
            </p>
        <div class="row mt-sm-4">
          <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                  <h4>Edit Profile</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('profile.update') }}" method="post">
                        @csrf
                        @method('patch')
                    <div class="row">
                        <div class="form-group col-md-6 col-12">
                          <label>Name</label>
                          <input type="text" class="form-control" required="" name="name" value="{{old('name',$user->name)}}">
                         @if ($errors->has('name'))
                             <p class="text-danger">{{ $errors->first('name') }}</p>
                         @endif
                        </div>
                        <div class="form-group col-md-6 col-12">
                          <label>Email</label>
                          <input type="email" class="form-control"  required="" name="email" value="{{old('email',$user->email)}}">
                         @if ($errors->has('name'))
                             <p class="text-danger">{{ $errors->first('email') }}</p>
                         @endif
                        </div>

                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Save Changes</button>
                      </div>
                    </form>


                </div>

            </div>
            <div class="card">

                <div class="card-header">
                  <h4>Change Password</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('password.update') }}" method="post">
                        @csrf
                        @method('put')
                    <div class="row">
                        <div class="form-group col-md-12 col-12">
                          <label>Current Password</label>
                          <input type="password" class="form-control" required="" name="current_password" autocomplete="current-password">
                         @if ($errors->has("$errors->updatePassword->get('current_password')"))
                             <p class="text-danger">{{ $errors->first('current_password') }}</p>
                         @endif
                        </div>
                        <div class="form-group col-md-6 col-12">
                          <label>New Password</label>
                          <input type="password" class="form-control" required="" name="password" autocomplete="new-password">
                         @if ($errors->has("$errors->updatePassword->get('password')"))
                             <p class="text-danger">{{ $errors->first('password') }}</p>
                         @endif
                        </div>
                        <div class="form-group col-md-6 col-12">
                          <label>Confirm Password</label>
                          <input type="password" class="form-control" required="" name="password_confirmation" autocomplete="new-password">
                         @if ($errors->has("$errors->updatePassword->get('password_confirmation')"))
                             <p class="text-danger">{{ $errors->first('password_confirmation') }}</p>
                         @endif
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <button class="btn btn-primary">Update Password</button>
                      </div>
                    </form>
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection
