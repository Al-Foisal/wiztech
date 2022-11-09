@extends('layouts.master')
@section('title', 'Doctor List')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="alert alert-info">
                <h4 class="text-center">
                    Create your account
                </h4>
            </div>
            <form method="POST" action="{{ route('register') }}" style="width: 40%;margin:auto;">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" aria-describedby="nameHelp" name="name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password Confirm</label>
                    <input type="password" class="form-control" id="password" name="password_confirmation">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
