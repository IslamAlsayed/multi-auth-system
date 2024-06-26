<?php

namespace Modules\Services\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Services\Models\Service;

class ServicesController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('services::index', compact('services'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'price' => 'required|numeric',
            ]);

            Service::create([
                'name' => $request->input('name'),
                'price' => $request->input('price'),
                'description' => $request->input('description')
            ]);

            session()->flash('add');
            return redirect()->route('services');
        } catch (\Exception $e) {
            session()->flash('error');
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(Request $request)
    {
        $service = Service::findOrFail($request->input('id'));

        try {
            if ($service) {
                $service->update([
                    'name' => $request->input('name'),
                    'price' => $request->input('price'),
                    'description' => $request->input('description')
                ]);
                session()->flash('update');
            }
            return redirect()->route('services');
        } catch (\Exception $e) {
            session()->flash('error');
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    //? Status
    public function updateStatus(Request $request)
    {
        $service = Service::findOrFail($request->input('id'));

        try {
            $request->validate(['status' => 'required|in:0,1']);
            $service->update(['status' => $request->input('status')]);

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
        $service = Service::findOrFail($request->input('id'));

        if ($service) {
            $service->delete();
            session()->flash('delete');
        }

        return redirect()->route('services');
    }
}
