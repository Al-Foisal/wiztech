@extends('layouts.master')
@section('title', 'Doctor List')

@section('content')
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="alert alert-info">
                <h4 class="text-center">
                    Confirm Doctor Booking
                </h4>
            </div>
            <form method="POST" action="{{ route('doctorBooking') }}" style="width:40%;margin:auto;">
                @csrf
                <input type="hidden" name="doctor_id" value="{{ $doctor->id }}">
                <div class="mb-3">
                    <label for="reason" class="form-label">Reason</label>
                    <textarea type="reason" class="form-control" id="reason" aria-describedby="reasonHelp" name="reason" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="phone" class="form-control" id="phone" name="phone">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Submit</button>
            </form>
        </div>
    </div>
@endsection
