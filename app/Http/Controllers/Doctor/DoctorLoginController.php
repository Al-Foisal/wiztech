<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DoctorLoginController extends Controller
{
    public function login() {
        return view('doctor.auth.login');
    }

    public function storeLogin(Request $request) {
        $validator = Validator::make($request->all(), [
            'email'    => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all())->withInput();
        }

        if (Auth::guard('doctor')->attempt(['email' => $request->email, 'password' => $request->password, 'status' => 1])) {
            return redirect()->route('doctor.dashboard');
        }

        return redirect()->route('doctor.login')->withToastError('Invalid Credentitials!!');

    }

    public function logout(Request $request) {
        Auth::guard('doctor')->logout();

        return redirect()->route('doctor.login')
            ->withToastSuccess('Logout Successful!!');
    }
}
