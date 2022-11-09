<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class DoctorManageController extends Controller {
    public function index() {
        $doctors = Doctor::paginate();

        return view('backend.doctor.auth.index', compact('doctors'));
    }

    public function create() {
        return view('backend.doctor.auth.create');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'name'           => 'required',
            'email'          => 'required|unique:doctors',
            'password'       => 'required|min:8',
            'phone'          => 'required',
            'education'      => 'required',
            'speciality'     => 'required',
            'available_from' => 'required',
            'available_to'   => 'required',
            'tea_party_from' => 'required',
            'tea_party_to'   => 'required',
            'image'          => 'required|image|mimes:jpeg,png,jpg,gif,webp',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all())->withInput();
        }

        if ($request->hasFile('image')) {

            $image_file = $request->file('image');

            if ($image_file) {

                $img_gen   = hexdec(uniqid());
                $image_url = 'images/doctor/';
                $image_ext = strtolower($image_file->getClientOriginalExtension());

                $img_name    = $img_gen . '.' . $image_ext;
                $final_name1 = $image_url . $img_gen . '.' . $image_ext;

                $image_file->move($image_url, $img_name);
            }

        }

        $category                 = new Doctor();
        $category->name           = $request->name;
        $category->email          = $request->email;
        $category->password       = bcrypt($request->password);
        $category->phone          = $request->phone;
        $category->education      = $request->education;
        $category->speciality     = $request->speciality;
        $category->available_from = $request->available_from;
        $category->available_to   = $request->available_to;
        $category->tea_party_from = $request->tea_party_from;
        $category->tea_party_to   = $request->tea_party_to;
        $category->image          = $final_name1;
        $category->status         = 1;
        $category->save();

        return redirect()->route('admin.manage_doctor.index')->withToastSuccess('Doctor added successfully!!');
    }

    public function edit($id) {
        $doctor = Doctor::where('id', $id)->first();

        return view('backend.doctor.auth.edit', compact('doctor'));
    }

    public function update(Request $request, Doctor $doctor) {
        $validator = Validator::make($request->all(), [
            'name'           => 'required',
            'email'          => 'required|unique:doctors,email,' . $doctor->id,
            'password'       => 'nullable|min:8',
            'phone'          => 'required',
            'education'      => 'required',
            'speciality'     => 'required',
            'available_from' => 'required',
            'available_to'   => 'required',
            'tea_party_from' => 'required',
            'tea_party_to'   => 'required',
            'image'          => 'nullable|image|mimes:jpeg,png,jpg,gif,webp',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all())->withInput();
        }

        if ($request->hasFile('image')) {

            $image_file = $request->file('image');

            if ($image_file) {

                $image_path = public_path($doctor->image);

                if (File::exists($image_path)) {
                    File::delete($image_path);
                }

                $img_gen   = hexdec(uniqid());
                $image_url = 'images/doctor/';
                $image_ext = strtolower($image_file->getClientOriginalExtension());

                $img_name    = $img_gen . '.' . $image_ext;
                $final_name1 = $image_url . $img_gen . '.' . $image_ext;

                $image_file->move($image_url, $img_name);
                $doctor->image = $final_name1;
                $doctor->save();

            }

        }

        if ($request->password) {
            $doctor->password = bcrypt($request->password);
            $doctor->save();
        }

        $doctor->update([
            'name'           => $request->name,
            'phone'          => $request->phone,
            'email'          => $request->email,
            'education'      => $request->education,
            'speciality'     => $request->speciality,
            'available_from' => $request->available_from,
            'available_to'   => $request->available_to,
            'tea_party_from' => $request->tea_party_from,
            'tea_party_to'   => $request->tea_party_to,
        ]);

        return redirect()->route('admin.manage_doctor.index')->withToastSuccess('Doctor updated successfully!!');
    }

    public function active(Request $request, $id) {
        $doctor = Doctor::findOrFail($id);

        $doctor->status = 1;
        $doctor->save();

        return redirect()->route('admin.manage_doctor.index')->withToastSuccess('Doctor activated successfully!!');
    }

    public function inactive(Request $request, $id) {
        $doctor = Doctor::findOrFail($id);

        $doctor->status = 0;
        $doctor->save();

        return redirect()->route('admin.manage_doctor.index')->withToastSuccess('Doctor inactivated successfully!!');
    }

}
