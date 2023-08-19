<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = Dokter::all();
        if(Auth::user()->role == 'admin'){
            return view('admin.dokter.all', compact('users'));
        }else{
            return redirect('dashboard');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dokter = User::with('dokter')->findOrFail($id);
        if(Auth::user()->role == 'admin' || Auth::user()->id == $id){
            return view('admin.dokter.show', compact('dokter'));
        }else{
        return redirect('dashboard.dokter');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
