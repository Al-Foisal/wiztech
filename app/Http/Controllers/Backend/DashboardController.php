<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\User;

class DashboardController extends Controller {
    public function dashboard() {
        $data           = [];
        $data['doctor'] = Doctor::count();
        $data['user']   = User::count();

        return view('backend.dashboard', $data);
    }

}
