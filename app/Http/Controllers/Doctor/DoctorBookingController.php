<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorBookingController extends Controller {
    public function doctorBooking() {
        $booking = Booking::where('doctor_id', auth()->guard('doctor')->user()->id)->orderBy('id', 'ASC')->paginate(20);

        return view('doctor.patient-booking', compact('booking'));
    }

    public function isPatientChecked(Request $request, Booking $booking) {
        $booking->isCheck = 1;
        $booking->save();

        return redirect()->back()->withToastSuccess('Patient checking successfull.');
    }
}
