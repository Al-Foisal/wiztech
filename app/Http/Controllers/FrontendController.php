<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Doctor;
use DateTime;
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
        $now       = new Datetime("now");
        $begintime = new DateTime('10:30');
        $endtime   = new DateTime('17:00');

        if ($now >= $begintime && $now <= $endtime) {
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
        } else {
            return redirect()->route('doctorList')->withToastError('Your booking within 10 am to 5pm!');
        }

    }

    public function dashboard() {
        $booking = Booking::where('user_id', Auth::id())->get();

        return view('dashboard', compact('booking'));
    }

}
