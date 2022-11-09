<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules;
class DoctorResetPasswordController extends Controller
{
    public function resetPassword(Request $request) {
        return view('doctor.auth.reset-password', ['request' => $request]);
    }

    public function storeForgotPassword(Request $request) {

        $validator = Validator::make($request->all(), [
            'token'    => 'required',
            'email'    => 'required|email',
            'password' => 'required|confirmed|min:8', Rules\Password::defaults(),
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all())->withInput();
        }

        $password = DB::table('password_resets')->where('email', $request->email)->where('token', $request->token)->first();

        if (!$password) {
            return redirect()->back()->withToastInfo('Something went wrong, Invalid token or email!!');
        }

        $doctor = Doctor::where('email', $request->email)->first();

        if ($doctor && $password) {
            $doctor->update(['password' => bcrypt($request->password)]);

            $password = DB::table('password_resets')->where('email', $request->email)->delete();

            return redirect()->route('doctor.login')->withToastSuccess('New password reset successfully!!');
        } else {
            return redirect()->back()->withToastError('The email is no longer our record!!');
        }

    }
}
