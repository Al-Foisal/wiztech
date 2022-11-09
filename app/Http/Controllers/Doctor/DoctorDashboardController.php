<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Doctor;

class DoctorDashboardController extends Controller {
    public function dashboard() {
        $data                    = [];
        $data['checked_patient']   = Booking::where('doctor_id', auth()->guard('doctor')->user()->id)->where('isCheck', 1)->count();
        $data['unchecked_patient'] = Booking::where('doctor_id', auth()->guard('doctor')->user()->id)->where('isCheck', 0)->count();

        return view('doctor.dashboard', $data);
    }

    public function teaParty() {
        $doctors = Doctor::where('status', 1)->select(['name', 'tea_party_from', 'tea_party_to', 'image'])->get();

        return view('doctor.tea-slot', compact('doctors'));
    }
}
