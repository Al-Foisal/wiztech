<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorDashboardController extends Controller
{
    public function dashboard() {
        $data                        = [];

        return view('doctor.dashboard', $data);
    }
}
