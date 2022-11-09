@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')
    <div class="container mt-5 mb-5">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Doctor Name</th>
                    <th scope="col">Available</th>
                    <th scope="col">Reason</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Booking Stataus</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($booking as $key => $value)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $value->doctor->name }}</td>
                        <td>{{ date('h:i A', strtotime($value->doctor->available_from)) }} -
                            {{ date('h:i A', strtotime($value->doctor->available_to)) }}</td>
                        <td>{{ $value->reason }}</td>
                        <td>{{ $value->phone }}</td>
                        <td>
                            {{ $value->isCheck == 0 ? 'Pending Booking' : 'Checking OK' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
