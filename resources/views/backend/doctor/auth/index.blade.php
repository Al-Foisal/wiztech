@extends('backend.layouts.master')
@section('title', 'Doctor List')

@section('backend')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Doctor List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Doctor</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Education</th>
                                        <th>Speciality</th>
                                        <th>Available From</th>
                                        <th>Available To</th>
                                        <th>Status</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($doctors as $key => $doctor)
                                        <tr>
                                            <td>
                                                <!-- Example single danger button -->
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-danger dropdown-toggle"
                                                        data-toggle="dropdown" aria-expanded="false">
                                                        Action
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        @if ($doctor->status == 0)
                                                            <form
                                                                action="{{ route('admin.manage_doctor.active', $doctor) }}"
                                                                method="post">
                                                                @csrf
                                                                <button class="dropdown-item" type="submit">Active
                                                                    Doctor</button>
                                                            </form>
                                                        @else
                                                            <form
                                                                action="{{ route('admin.manage_doctor.inactive', $doctor) }}"
                                                                method="post">
                                                                @csrf
                                                                <button class="dropdown-item" type="submit">Inactive
                                                                    Doctor</button>
                                                            </form>
                                                        @endif
                                                        <a class="dropdown-item"
                                                            href="{{ route('admin.manage_doctor.edit', $doctor) }}">Edit</a>
                                                        {{-- <form action="{{ route('doctor.deletedoctor', $doctor) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button class="dropdown-item" type="submit"
                                                                onclick="return(confirm('Are you sure want to delete this item?'))">Delete</button>
                                                        </form> --}}
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $doctor->name }}</td>
                                            <td>{{ $doctor->email }}</td>
                                            <td>{{ $doctor->phone }}</td>
                                            <td>{{ $doctor->education }}</td>
                                            <td>{{ $doctor->speciality }}</td>
                                            <td>{{ date('h:i A', strtotime($doctor->available_from)) }}</td>
                                            <td>{{ date('h:i A', strtotime($doctor->available_to)) }}</td>
                                            <td>{{ $doctor->status == 1 ? 'Active' : 'Inactive' }}</td>
                                            <td><img src="{{ asset($doctor->image) }}" height="50" width="50"
                                                    alt=""></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
