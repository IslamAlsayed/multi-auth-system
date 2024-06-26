<?php

namespace Modules\Doctors\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Traits\UploadImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Modules\Doctors\Models\Doctor;
use Modules\Sections\Models\Section;

class DoctorsController extends Controller
{
    use UploadImage;

    public function index()
    {
        $doctors = Doctor::all();
        return view('doctors::index', compact('doctors'));
    }

    public function create()
    {
        $sections = Section::all();
        $all_appointments = ['saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday'];
        return view('doctors::add', compact('sections', 'all_appointments'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'email' => 'required|email|unique:doctors',
                'password' => 'required|min:8',
                'phone' => 'required',
                'appointments' => 'required',
                'section_id' => 'required',
            ]);

            $doctor = Doctor::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'phone' => $request->input('phone'),
                'appointments' => json_encode($request->input('appointments')),
                'section_id' => $request->input('section_id'),
            ]);

            $this->storeImage($request, 'filename', 'doctors', 'uploads', $doctor->id, 'Modules\Doctors\Models\Doctor');

            DB::commit();
            session()->flash('add');
            return redirect()->route('doctors');
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error');
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $sections = Section::all();
        $doctor = Doctor::find($id);
        $all_appointments = ['saturday', 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday'];
        $appointments = json_decode($doctor->appointments);
        return view('doctors::edit', compact('doctor', 'all_appointments', 'appointments', 'sections'));
    }

    public function update(Request $request)
    {
        $doctor = Doctor::findOrFail($request->input('id'));

        try {
            $request->validate([
                'name' => 'required|string',
                'phone' => 'required',
                'appointments' => 'required',
                'section_id' => 'required',
            ]);

            $doctor->update([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'appointments' => json_encode($request->input('appointments')),
                'section_id' => $request->input('section_id'),
            ]);

            if ($request->hasFile('filename')) {
                $id = $request->input('id');
                $path = 'doctors\\' . $id . '\\' . $doctor->image->filename;

                if ($doctor->image) $this->deleteImage('uploads', $path, $id);

                $this->storeImage($request, 'filename', 'doctors', 'uploads', $id, 'Modules\Doctors\Models\Doctor');
            }

            DB::commit();
            session()->flash('update');
            return redirect()->route('doctors');
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error');
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    //? Email
    public function changeEmail($id)
    {
        $doctor = Doctor::find($id);
        return view('doctors::profile.changeEmail', compact('doctor'));
    }

    public function updateEmail(Request $request)
    {
        $doctor = Doctor::findOrFail($request->input('id'));

        try {
            $request->validate([
                'email' => 'required|email|unique:doctors',
                'password' => 'required|min:8',
            ]);

            if ($request->input('password') == $doctor->password) {
                $doctor->update([
                    'email' => $request->input('email'),
                    'password' => $request->input('password')
                ]);

                DB::commit();
                session()->flash('update');
                return redirect()->route('doctors');
            } else {

                DB::commit();
                session()->flash('error');
                return redirect()->back()->withErrors(['error' => 'The password is incorrect']);
            }
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error');
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    //? Password
    public function changePassword($id)
    {
        $doctor = Doctor::find($id);
        return view('doctors::profile.changePassword', compact('doctor'));
    }

    public function updatePassword(Request $request)
    {
        $doctor = Doctor::findOrFail($request->input('id'));

        try {
            $request->validate(['password' => 'required|min:8|confirmed']);

            if ($request->input('old_password') == $doctor->password) {
                $doctor->update(['password' => Hash::make($request->input('password'))]);

                DB::commit();
                session()->flash('update');
                return redirect()->route('doctors');
            } else {

                DB::commit();
                session()->flash('error');
                return redirect()->back()->withErrors(['error' => 'The old password is incorrect']);
            }
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error');
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    //? Status
    public function updateStatus(Request $request)
    {
        $doctor = Doctor::findOrFail($request->input('id'));

        try {
            $request->validate(['status' => 'required|in:0,1']);
            $doctor->update(['status' => $request->input('status')]);

            DB::commit();
            session()->flash('update');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error');
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        $doctor = Doctor::findOrFail($request->input('id'));

        $disk = 'uploads';
        $path = 'doctors/' . $request->input('filename');
        $id = $request->input('id');

        if ($request->input('single') == 1) {
            if ($request->input('filename')) $this->deleteImage($disk, $path, $id);

            if ($doctor->delete()) session()->flash('delete');
            else session()->flash('error');

            return redirect()->route('doctors');
        } else {
            $ids = explode(',', $request->input('ids'));

            foreach ($ids as $id) {
                $doctor = Doctor::findOrFail($id);

                if ($doctor->image) $this->deleteImage($disk, $path, $id);

                $doctor->delete();
            }

            session()->flash('delete');
            return redirect()->route('doctors');
        }
    }
}
