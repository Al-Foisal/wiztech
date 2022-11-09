@extends('doctor.layouts.master')
@section('title', 'Your Patient')

@section('doctor')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Your Patient</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Patient Booking</li>
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
                            <table id="" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>##</th>
                                        <th>Name</th>
                                        <th>Reason</th>
                                        <th>Phone</th>
                                        <th>Booking Time</th>
                                        <th>Booking Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($booking as $key => $value)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $value->user->name }}</td>
                                            <td>{{ $value->reason }}</td>
                                            <td>{{ $value->phone }}</td>
                                            <td>{{ $value->created_at }}</td>
                                            <td>
                                                @if($value->isCheck == 0)
                                                    <form action="{{ route('doctor.isPatientChecked',$value) }}" method="post">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm">Check as OK</button>
                                                    </form>
                                                @else
                                                <div class="alert alert-success">
                                                    Patient Checked.
                                                </div>
                                                @endif
                                            </td>
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
