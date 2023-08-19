<?php

namespace App\Http\Controllers;
use PDF;

use App\Models\User;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Poliklinik;
use App\Models\RekamMedis;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class RekamMedisController extends Controller{

    public function index(){
        $data_rekam_medis = RekamMedis::with(['pasien', 'dokter','poliklinik'])->paginate(10);
        return view('admin.rekam_medis.all', compact('data_rekam_medis'));
    }
    
    public function create()
    {
        if(Auth::user()->role == 'admin' ||Auth::user()->role == 'dokter'){
            $data_users = User::where('role','dokter')->get();
            $data_pasien = Pasien::all();
            $data_dokter = Dokter::all();
            $data_poliklinik = Poliklinik::all();
            return view('admin.rekam_medis.create', compact('data_pasien','data_users','data_dokter','data_poliklinik'));
        }else{
            $data_rekam_medis = RekamMedis::with(['pasien', 'dokter','poliklinik'])->paginate(10);
            return view('admin.rekam_medis.all', compact('data_rekam_medis'));
        }
    }

    public function store(Request $request){
            $request->validate([
                'id_pasien' => 'required|exists:pasien,id',
                'id_poliklinik' => 'required|exists:poliklinik,id',
                'id_dokter' => 'required|exists:dokter,id',
                'diagnosa' => 'required|max:255',
                'resep_obat' => 'required|max:255'
                ]);
            $uniqueId = rand(10, 99);
            $now = Carbon::now();
            $nomorRekamMedis = 'RM-' . $now->format('YmdHis') . '-' . $uniqueId . '-' . $request->id_dokter;
            
            $rekamMedis = new RekamMedis([
                'id_pasien' => $request->id_pasien,
                'id_poliklinik' => $request->id_poliklinik,
                'id_dokter' => $request->id_dokter,
                'diagnosa' => $request->diagnosa,
                'resep_obat' => $request->resep_obat,
                'nomor_rekam_medis' => $nomorRekamMedis,
            ]);
            // dd($rekamMedis);
            $rekamMedis->save();
            return redirect()->route('rekam_medis.index')->with('success', 'Data rekam medis berhasil ditambahkan.');
      
    }

    public function show(string $id)
    {
        try {
            $data_rekam_medis = RekamMedis::findOrFail($id);
            return view('admin.rekam_medis.show', compact('data_rekam_medis'));
        } catch (\Exception $e) {
            return redirect()->route('rekam_medis.index')->with('error', 'Rekam medis not found.');
        }
    }

    public function edit(string $id)
    {
        try {
            if(Auth::user()->role == 'admin' ||Auth::user()->role == 'dokter'){
                $rekam_medis = RekamMedis::findOrFail($id);            
                $data_pasien = Pasien::all();
                $data_dokter = Dokter::all();
                $data_poliklinik = Poliklinik::all();
                return view('admin.rekam_medis.edit', compact('rekam_medis','data_pasien','data_poliklinik','data_dokter'));
            }else{
                $data_rekam_medis = RekamMedis::with(['pasien', 'dokter','poliklinik'])->paginate(10);
                return view('admin.rekam_medis.all', compact('data_rekam_medis')); 
            }
        } catch (\Exception $e) {
            return redirect()->route('admin.rekam.index')->with('error', 'Data rekam tidak ditemukan.');
        }
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pasien' => 'required',
            'id_dokter' => 'required',
            'id_poliklinik' => 'required',
            'diagnosa' => 'required',
            'resep_obat' => 'required',
        ]);
    
        try {
            $rekam_medis = RekamMedis::findOrFail($id);
    
            $rekam_medis->id_pasien = $request->input('id_pasien');
            $rekam_medis->id_dokter = $request->input('id_dokter');
            $rekam_medis->id_poliklinik = $request->input('id_poliklinik');
            $rekam_medis->diagnosa = $request->input('diagnosa');
            $rekam_medis->resep_obat = $request->input('resep_obat');
    
            $rekam_medis->save();
    
            return redirect()->route('rekam_medis.index')->with('success', 'Data rekam medis berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors('Terjadi kesalahan. Silakan coba lagi.');
        }
    }
    
    public function destroy(string $id)
    {
        try {
            if(Auth::user()->role == 'admin' ||Auth::user()->role == 'dokter'){
                $obat = RekamMedis::findOrFail($id);
                $obat->delete();
                return redirect()->route('rekam_medis.index')->with('success', 'Data rekam medis telah dihapus!');
            }else{
                $data_rekam_medis = RekamMedis::with(['pasien', 'dokter','poliklinik'])->paginate(10);
                return view('admin.rekam_medis.all', compact('data_rekam_medis')); 
            }
        } catch (\Exception $e) {
            return redirect()->route('rekam_medis.index')->with('error', 'Failed to delete obat.');
        }
    }
    
    public function downloadPDF()
    {
        $data_rekam_medis = RekamMedis::all();
        $pdf = PDF::loadView('admin.rekam_medis.pdf', compact('data_rekam_medis'));
        return $pdf->download('report.pdf');
    }

    public function downloadPDFPasien()
    {
        $data_rekam_medis_pasien = RekamMedis::all();
        $pdf = PDF::loadView('admin.rekam_medis.pdf_pasien', compact('data_rekam_medis_pasien'));
        return $pdf->download('report.pdf');
    }

}
