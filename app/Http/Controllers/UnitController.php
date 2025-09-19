<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Component;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function index()
    {
        $units = Unit::all(); // ambil semua data Unit
        return view('unit', compact('units'));
    }
    public function show($id)
    {
        $unit = Unit::with('components')->findOrFail($id);
        return view('detail', compact('unit'));
    }

    // Simpan unit baru
    public function store(Request $request)
    {
        $request->validate([
            'code_number' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required',
        ]);

        $photoName = null;
        if ($request->hasFile('photo')) {
            $photoName = time() . '.' . $request->photo->extension();
            $request->photo->storeAs('public/photos', $photoName);
        }

        Unit::create([
            'code_number' => $request->code_number,
            'category' => $request->category,
            'name' => $request->name,
            'photo' => $photoName,
            'status' => $request->status,
        ]);

        return redirect()->route('units.index')->with('success', 'Unit berhasil ditambahkan');
    }

    public function edit($id)
    {
        $unit = Unit::findOrFail($id);
        $units = Unit::all();
        return view('unit', compact('unit', 'units'));
    }

    // Update user
    public function update(Request $request, $id)
    {
        $unit = Unit::findOrFail($id);

        $request->validate([
            'code_number' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required',
        ]);

        $photoName = null;
        if ($request->hasFile('photo')) {
            $photoName = time() . '.' . $request->photo->extension();
            $request->photo->storeAs('public/photos', $photoName);
        }

        $unit->update([
            'code_number' => $request->code_number,
            'category' => $request->category,
            'name' => $request->name,
            'photo' => $photoName,
            'status' => $request->status,
        ]);

        return redirect()->route('units.index')->with('success', 'Unit berhasil diperbarui');
    }
    // Hapus unit
    public function destroy($id)
    {
        $unit = Unit::findOrFail($id);
        $unit->delete();

        return redirect()->route('units.index')->with('success', 'Unit berhasil dihapus');
    }

    // Simpan unit baru
    public function componentstore(Request $request)
    {
        $request->validate([
            'unit_id' => 'required|integer|min:0',
            'part_number' => 'required|string|max:255',     // nullable karena schema nullable
            'part_name' => 'required|string|max:255',
            'nilai_standar' => 'required|numeric|min:0',      // decimal(8,2) → numeric
            'nilai_limit' => 'required|numeric|min:0',      // decimal(8,2) → numeric
            'hm_new' => 'required|integer|min:0',      // integer & nullable
            'hm_current' => 'required|integer|min:0',
            'status' => 'required|in:aktif,diganti,rusak',
        ]);

        // $photoName = null;
        // if ($request->hasFile('photo')) {
        //     $photoName = time().'.'.$request->photo->extension();
        //     $request->photo->storeAs('public/photos', $photoName);
        // }

        Component::create([
            'unit_id' => $request->unit_id,
            'part_number' => $request->part_number,
            'part_name' => $request->part_name,
            'nilai_standar' => $request->nilai_standar,
            'nilai_limit' => $request->nilai_limit,
            'hm_new' => $request->hm_new,
            'hm_current' => $request->hm_current,
            'status' => $request->status,
        ]);

        //     return redirect()->route('units.index')->with('success', 'Unit berhasil ditambahkan');
        // }
        return redirect()->back()->with('success', 'Unit berhasil dihapus');
    }

    public function componentedit($id)
    {
        $component = Component::findOrFail($id);
        return response()->json($component);
    }


    // Update user
    public function componentupdate(Request $request, $id)
    {
        $unit = Component::findOrFail($id);

        $request->validate([
            'unit_id' => 'required|integer|min:0',
            'part_number' => 'required|string|max:255',
            'part_name' => 'required|string|max:255',
            'nilai_standar' => 'required|numeric|min:0',
            'nilai_limit' => 'required|numeric|min:0',
            'hm_new' => 'required|integer|min:0',
            'hm_current' => 'required|integer|min:0',
            'status' => 'required|in:aktif,diganti,rusak',
        ]);

        $photoName = null;
        if ($request->hasFile('photo')) {
            $photoName = time() . '.' . $request->photo->extension();
            $request->photo->storeAs('public/photos', $photoName);
        }

        $unit->update([
            'unit_id' => $request->unit_id,
            'part_number' => $request->part_number,
            'part_name' => $request->part_name,
            'nilai_standar' => $request->nilai_standar,
            'nilai_limit' => $request->nilai_limit,
            'hm_new' => $request->hm_new,
            'hm_current' => $request->hm_current,
            'status' => $request->status,
        ]);

        return redirect()->back()->with('success', 'Unit berhasil dihapus');
    }

    public function componentdestroy($id)
    {
        $unit = Component::findOrFail($id);
        $unit->delete();

        return redirect()->back()->with('success', 'Unit berhasil dihapus');
    }
}

