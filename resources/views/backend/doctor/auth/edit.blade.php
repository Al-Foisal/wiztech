@extends('backend.layouts.master')
@section('title', 'Update Admin')

@section('backend')
    <div class="">
        <div class="register-logo">
            <a href="{{ route('admin.dashboard') }}" class="h1">
                Update doctor information
            </a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Edit supportive doctor</p>

                <form action="{{ route('admin.manage_doctor.update', $doctor) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" value="{{ $doctor->name }}" name="name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" value="{{ $doctor->phone }}" name="phone" placeholder="Phone number">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-group mb-3">
                                <input type="email" class="form-control" value="{{ $doctor->email }}" name="email">
                            </div>
                        </div>
                        <div class="col-md-6">

                            <div class="input-group mb-3">
                                <input type="file" class="form-control" name="image">
                            </div>
                            @if ($doctor->image)
                                <img src="{{ asset($doctor->image) }}" height="100" width="100" alt="User logo">
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="">Available From</label>
                            <div class="input-group mb-3">
                                <input type="time" class="form-control" value="{{ $doctor->available_from }}" name="available_from">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Available To</label>
                            <div class="input-group mb-3">
                                <input type="time" class="form-control" value="{{ $doctor->available_to }}" name="available_to">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label for="">Password (if need to change)</label>
                            <div class="input-group mb-3">
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <textarea type="text" rows="2" class="form-control" name="education" placeholder="Education">{{ $doctor->education }}</textarea>
                    </div>
                    <div class="input-group mb-3">
                        <textarea type="text" rows="2" class="form-control" name="speciality" placeholder="Speciality">{{ $doctor->speciality }}</textarea>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-8">
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Update</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <br>
    <br>
@endsection
