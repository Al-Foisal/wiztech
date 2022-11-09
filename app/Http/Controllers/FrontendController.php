<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FrontendController extends Controller {
    public function doctorList() {
        $doctors = Doctor::where('status', 1)->get();

        return view('doctor-list', compact('doctors'));
    }

    public function booking(Doctor $doctor) {
        return view('booking', compact('doctor'));
    }

    public function doctorBooking(Request $request) {
        $validator = Validator::make($request->all(), [
            'reason' => 'required',
            'phone'  => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all())->withInput();
        }

        Booking::create([
            'doctor_id' => $request->doctor_id,
            'user_id'   => Auth::id(),
            'reason'    => $request->reason,
            'phone'     => $request->phone,
        ]);

        return redirect()->route('doctorList')->withToastSuccess('Your booking successful!');
    }

    public function dashboard() {
        $booking = Booking::where('user_id', Auth::id())->get();

        return view('dashboard', compact('booking'));
    }

}
