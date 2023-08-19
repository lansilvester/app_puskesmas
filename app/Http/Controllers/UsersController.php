<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        if(Auth::user()->role == 'admin'){
            $data_users = User::paginate(6);
            return view('admin.users.index', compact('data_users'));
        }else{
            return redirect('dashboard');
        }
    }

    public function create()
    {
        if(Auth::user()->role == 'admin'){
            return view('admin.users.create');
        }else{
            return redirect('dashboard');
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required|min:5|max:255',
            'photo' => 'image|file|max:3024',
            'nik' => 'max:16',
            'role' => 'in:admin,dokter,pegawai,apoteker',
            'jenis_kelamin'=>'max:10',
            'alamat'=>'max:255'
        ]);  
        
        if ($request->file('photo')) {
            $photoPath = $request->file('photo')->store('public/profile-images');
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
        return redirect()->route('users.index')->with('success', 'user berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        $dokter = User::with('dokter')->findOrFail($id);
        return view('admin.users.show', compact('user', 'dokter'));
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
        
    }
   
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'photo' => 'image|file|max:3024',
            'nik' => 'max:16',
            'alamat' => 'max:255',
            'jenis_kelamin' => 'in:pria,wanita',
            'role' => 'in:admin,dokter,pegawai'
        ]);

        $dokterValidatedData = $request->validate([
            'nip' => 'nullable|string|max:255',
            'spesialisasi' => 'nullable|string|max:255',
            'nomor_telepon' => 'nullable|string|max:15',
        ]);
    
        $user = User::findOrFail($id);
        if ($request->file('photo')) {
            $photoPath = $request->file('photo')->store('public/profile-images');
            $validatedData['photo'] = Storage::url($photoPath);
        }
        $user->update($validatedData);

        if($user->dokter){
            $dokter = $user->dokter;
            $dokter->update($dokterValidatedData);
        }else {
            $dokterValidatedData['id_user'] = $user->id;
            Dokter::create($dokterValidatedData);
        }
      
        return redirect()->route('users.show',['user'=>Auth::user()->id])->with('success', 'User updated successfully!');
    }
    public function destroy(string $id)
    {
        try {
            $user = User::findOrFail($id);
            if (auth()->user()->role !== 'admin') {
                return redirect()->back()->with('error', 'You are not authorized to delete users.');
            }

            // Delete the user
            $user->delete();

            // Redirect back to the index page with success message
            return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete user.');
        }
    }
}
