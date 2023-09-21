<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\RekamMedis;
use PDF;
use Illuminate\Support\Facades\Auth;

class PasienController extends Controller{
    public function index()
    {
        $data_pasien = Pasien::paginate(10);
        return view('admin.pasien.all', compact('data_pasien'));
    }
    public function create()
    {
        if(Auth::user()->role == 'admin' || Auth::user()->role == 'pegawai'){
            return view('admin.pasien.create');
        }else{
            $data_pasien = Pasien::paginate(10);
            return view('admin.pasien.all',compact('data_pasien'));

        }
    }
    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => 'required|max:255',
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'nomor_telepon' => 'required|max:20',
            'keluhan'=> 'required|max:255',
            'tinggi' => 'nullable|numeric',
            'berat_badan' => 'nullable|numeric',
            'alamat_koordinat' => 'nullable',
        ]);

        Pasien::create($validatedData);

        return redirect()->route('pasien.index')->with('success', 'Pasien berhasil ditambahkan!');
    }

    public function show(string $id)
    {
        try {
            $pasien = Pasien::findOrFail($id);
            $data_rekam_medis = RekamMedis::where('id_pasien', $id)->get();
            
            return view('admin.pasien.show', compact('pasien','data_rekam_medis'));
        } catch (\Exception $e) {
            return redirect()->route('pasien.index')->with('error', 'Pasien not found.');
        }
    }

    public function edit(string $id)
    {
        try {
            $pasien = Pasien::findOrFail($id);
            return view('admin.pasien.edit', compact('pasien'));
        } catch (\Exception $e) {
            return redirect()->route('admin.pasien.index')->with('error', 'Data pasien tidak ditemukan.');
        }
    }
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nik' => 'required|max:255',
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'nomor_telepon' => 'required|max:15',
            'keluhan' => 'required|max:255',
            'tinggi' => 'nullable|numeric',
            'berat_badan' => 'nullable|numeric',
            'alamat_koordinat' => 'nullable',
        ]);
    
        try {
            $pasien = Pasien::findOrFail($id);
            $pasien->update($validatedData);
            return redirect()->route('pasien.show',['pasien'=>$id])->with('success', 'Pasien berhasil diupdate!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update pasien. Please try again.');
        }
    }
    public function destroy(string $id)
    {
        try {
            $pasien = Pasien::findOrFail($id);
            $pasien->delete();
    
            return redirect()->route('pasien.index')->with('success', 'Data Pasien telah dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('pasien.index')->with('error', 'Failed to delete pasien.');
        }
    }
    
    public function downloadPDF($id)
    {
        try {
            $pasien = Pasien::findOrFail($id);
            $data_rekam_medis = RekamMedis::where('id_pasien', $id)->get();
            
            $pdf = PDF::loadView('admin.pasien.pdf_pasien', compact('pasien', 'data_rekam_medis'));
            // Jika ingin langsung tampilkan PDF di browser, gunakan kode berikut:
            return $pdf->stream('laporan_pasien.pdf');
    
            // Jika ingin download PDF, gunakan kode berikut:
            // return $pdf->download('laporan_pasien.pdf');
        } catch (\Exception $e) {
            return redirect()->route('pasien.index')->with('error', 'Pasien not found.');
        }
    }

}
