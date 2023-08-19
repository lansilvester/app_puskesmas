<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class RegisterController extends Controller{
    public function index(){
        return view('register.index',[
            'title'=>'Register'
        ]);
    }

    // Input data registrasi ke database
    public function store(Request $request){
        // Tentukan rules data yang akan di validasi
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|max:255',
            'photo' => 'image|file|max:3024',
            'nik' => 'required|max:16',
            'role' => 'in:dokter,pegawai'
        ]);  
        
        if ($request->file('photo')) {
            $photoPath = $request->file('photo')->store('public/profile-images');
            // Ubah path foto dalam database menjadi path publik untuk akses melalui URL
            $validatedData['photo'] = Storage::url($photoPath);
        }
        $validatedData['password'] = Hash::make($validatedData['password']);
        $user = new User($validatedData);
        $user->save();

        if($validatedData['role'] == 'dokter'){
            $dokter = new Dokter([
                'id_user'=> $user->id
            ]);
            $dokter->save();
        }
        return redirect()->route('login')->with('success', 'Berhasil Registrasi');
    }
}