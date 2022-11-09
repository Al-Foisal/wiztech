@extends('backend.layouts.master')
@section('title', 'dashboard')

@section('backend')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <h4>Patient status</h4>
            <div class="row">
                <div class="col-md-6">
                    <!-- small card -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $doctor }}</h3>

                            <p>Total Doctor</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <!-- small card -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>{{ $user }}</h3>

                            <p>Total User</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
