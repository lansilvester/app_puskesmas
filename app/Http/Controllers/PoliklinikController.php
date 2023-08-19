<?php

namespace App\Http\Controllers;

use App\Models\Poliklinik;
use Illuminate\Http\Request;

class PoliklinikController extends Controller{

    public function index()
    {
        $poliklinik = Poliklinik::all();
        return view('admin.poliklinik.all', compact('poliklinik'));
    }

    public function create()
    {
        return view('admin.poliklinik.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'deskripsi' => 'nullable',
        ]);

        Poliklinik::create($validatedData);
        return redirect()->route('poliklinik.index')->with('success', 'Data poliklinik berhasil ditambahkan!');
    }

    // Edit and Update methods (similar to ApotekController)

    public function destroy($id)
    {
        try {
            $poliklinik = Poliklinik::findOrFail($id);
            $poliklinik->delete();
            return redirect()->route('poliklinik.index')->with('success', 'Data poliklinik berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('poliklinik.index')->with('error', 'Gagal menghapus data poliklinik. Silakan coba lagi.');
        }
    }

    public function edit($id)
    {
        try {
            $poliklinik = Poliklinik::findOrFail($id);
            return view('admin.poliklinik.edit', compact('poliklinik'));
        } catch (\Exception $e) {
            return redirect()->route('poliklinik.index')->with('error', 'Poliklinik not found.');
        }
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'deskripsi' => 'nullable',
        ]);

        try {
            $poliklinik = Poliklinik::findOrFail($id);
            $poliklinik->update($validatedData);
            return redirect()->route('poliklinik.index')->with('success', 'Poliklinik telah diupdate!');
        } catch (\Exception $e) {
            return redirect()->route('poliklinik.edit', ['poliklinik' => $id])->with('error', 'Failed to update poliklinik.');
        }
    }
}