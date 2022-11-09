@extends('layouts.master')
@section('title', 'Doctor List')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            @foreach ($doctors as $doctor)
                <div class="col-md-3">
                    <div class="card">
                        <img src="{{ asset($doctor->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $doctor->name }}</h5>
                            <p class="card-text">
                                <b>Speciality:</b> <br>
                                {{ $doctor->speciality }}
                            </p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Available {{ date('h:i A', strtotime($doctor->available_from)) }}
                                - {{ date('h:i A', strtotime($doctor->available_to)) }}</li>
                        </ul>
                        <div class="card-body">
                            <a href="{{ route('booking',$doctor) }}" class="card-link">Booking now</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
