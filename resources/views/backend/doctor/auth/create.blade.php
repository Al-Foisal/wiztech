@extends('backend.layouts.master')
@section('title', 'Create Doctor')
@section('cssLink')
@endsection
@section('cssStyle')
@endsection

@section('backend')
    <div class="">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="{{ route('admin.dashboard') }}" class="h1">
                    Create new doctor
                </a>
            </div>
            <div class="card-body" style="width: 80%;margin:auto;">
                <p class="login-box-msg">Register a new membership</p>

                <form action="{{ route('admin.manage_doctor.store') }}" method="post"  enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Full name" name="name" value="{{ old('name') }}">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Phone Number" name="phone" value="{{ old('phone') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" name="image" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Available From</label>
                            <div class="input-group mb-3">
                                <input type="time" class="form-control"  name="available_from"  value="{{ old('available_from') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="">Available To</label>
                            <div class="input-group mb-3">
                                <input type="time" class="form-control"  name="available_to" value="{{ old('available_to') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Tea Party From</label>
                            <div class="input-group mb-3">
                                <input type="time" class="form-control"  name="tea_party_from"  value="{{ old('tea_party_from') }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="">Tea Party To</label>
                            <div class="input-group mb-3">
                                <input type="time" class="form-control"  name="tea_party_to" value="{{ old('tea_party_to') }}">
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <textarea type="text" class="form-control" placeholder="Education" name="education" value="{{ old('education') }}"></textarea>
                    </div>
                    <div class="input-group mb-3">
                        <textarea type="text" class="form-control" placeholder="Speciality" name="speciality" value="{{ old('speciality') }}"></textarea>
                    </div>


                    <div class="row">
                        <div class="col-8">
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
@endsection

@section('jsSource')
@endsection
@section('jsScript')
@endsection
