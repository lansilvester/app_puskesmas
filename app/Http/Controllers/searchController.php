<?php

namespace App\Http\Controllers;

use App\Models\Apotek;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pasien;
use App\Models\RekamMedis;

class searchController extends Controller
{
    public function search_user(Request $request){
        $search = $request->input('search');
        $searchBy = $request->input('search_by');
    
        // Query untuk mencari pengguna berdasarkan pilihan dropdown
        $data_users = User::when($search, function ($query) use ($search, $searchBy) {
            if ($searchBy === 'nik') {
                $query->where('nik', 'LIKE', "%{$search}%");
            } elseif ($searchBy === 'alamat') {
                $query->where('alamat', 'LIKE', "%{$search}%");
            } else {
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%");
            }
        })->paginate(5);
    
        return view('admin.users.index', compact('data_users'));
    }
    public function search_pasien(Request $request){
        $search = $request->input('search');
        $searchBy = $request->input('search_by');
    
        // Query untuk mencari pengguna berdasarkan pilihan dropdown
        $data_pasien = Pasien::when($search, function ($query) use ($search, $searchBy) {
            if ($searchBy === 'nik') {
                $query->where('nik', 'LIKE', "%{$search}%");
            } elseif ($searchBy === 'alamat') {
                $query->where('alamat', 'LIKE', "%{$search}%");
            } else {
                $query->where('nama', 'LIKE', "%{$search}%");
            }
        })->paginate(5);
    
        return view('admin.pasien.all', compact('data_pasien'));
    }
    public function search_apotek(Request $request){
        $search = $request->input('search');
        $searchBy = $request->input('search_by');
    
        // Query untuk mencari pengguna berdasarkan pilihan dropdown
        $data_obat = Apotek::when($search, function ($query) use ($search, $searchBy) {
            if ($searchBy === 'nama_obat') {
                $query->where('nama_obat', 'LIKE', "%{$search}%");
            }
            if ($searchBy === 'jenis') {
                $query->where('jenis', 'LIKE', "%{$search}%");
            }
        })->paginate(5);
    
        return view('admin.apotek.all', compact('data_obat'));
    }
    public function search_rekam_medis(Request $request){
        $search = $request->input('search');
        $searchBy = $request->input('search_by');
    
        $data_rekam_medis = RekamMedis::when($search, function ($query) use ($search, $searchBy) {
                if ($searchBy === 'pasien') {    
                    $query->whereHas('pasien', function ($q) use ($search) {
                    $q->where('nama', 'LIKE', "%{$search}%");
                    });
                }
                if ($searchBy === 'dokter') {    
                    $query->whereHas('dokter', function ($q) use ($search) {
                        $q->whereHas('user', function ($subq) use ($search) {
                            $subq->where('name', 'LIKE', "%{$search}%");
                        });
                    });
                }
                if ($searchBy === 'diagnosa') {
                    $query->where('diagnosa', 'LIKE', "%{$search}%");
                }
                if ($searchBy === 'nomor_rekam_medis') {    
                    $query->where('nomor_rekam_medis', 'LIKE', "%{$search}%");
                }
            
        })->paginate(5);
    
        return view('admin.rekam_medis.all', compact('data_rekam_medis'));
    }
}