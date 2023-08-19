<?php

namespace App\Http\Controllers;

use App\Models\Apotek;
use Illuminate\Http\Request;

class ApotekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_obat = Apotek::all();
        return view('admin.apotek.all', compact('data_obat'));
    }

    public function create()
    {
        return view('admin.apotek.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_obat' => 'required|max:255',
            'jenis' => 'required|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
        ]);

        Apotek::create($validatedData);
        return redirect()->route('apotek.index')->with('success', 'Obat berhasil ditambahkan');
    }

    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $obat = Apotek::findOrFail($id);
            return view('admin.apotek.edit', compact('obat'));
        } catch (\Exception $e) {
            return redirect()->route('admin.apotek.index')->with('error', 'Data obat tidak ditemukan.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nama_obat' => 'required|max:255',
            'jenis' => 'required|max:255',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
        ]);
    
        try {
            $obat = Apotek::findOrFail($id);
            $obat->update($validatedData);
            return redirect()->route('apotek.index')->with('success', 'Data obat berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->route('apotek.edit', ['obat' => $id])->with('error', 'Gagal memperbarui data obat. Silakan coba lagi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $obat = Apotek::findOrFail($id);
            $obat->delete();
            return redirect()->route('apotek.index')->with('success', 'Data obat berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('apotek.index')->with('error', 'Failed to delete obat.');
        }
    }
}
