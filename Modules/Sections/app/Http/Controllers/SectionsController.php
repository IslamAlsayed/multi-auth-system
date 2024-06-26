<?php

namespace Modules\Sections\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Sections\Models\Section;

class SectionsController extends Controller
{
    public function index()
    {
        $sections = Section::all();
        return view('sections::index', compact('sections'));
    }

    public function show($id)
    {
        $doctors = Section::findOrFail($id)->doctors;
        return view('sections::show', compact('doctors'));
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|unique:sections']);

        Section::create(['name' => $request->input('name')]);
        session()->flash('add');
        return redirect()->route('sections');
    }

    public function update(Request $request)
    {
        $section = Section::findOrFail($request->input('id'));

        if ($section) {
            $section->update(['name' => $request->input('name')]);
            session()->flash('update');
        } else {
            session()->flash('error');
        }

        return redirect()->route('sections');
    }

    public function destroy(Request $request)
    {
        $section = Section::findOrFail($request->input('id'));

        if ($section) {
            $section->delete();
            session()->flash('delete');
        }

        return redirect()->route('sections');
    }
}
