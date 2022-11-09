@extends('layouts.master')
@section('title', 'Doctor List')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="alert alert-info">
                <h4 class="text-center">
                    Login to start your session
                </h4>
            </div>
            <form method="POST" action="{{ route('login') }}" style="width:40%;margin:auto;">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
