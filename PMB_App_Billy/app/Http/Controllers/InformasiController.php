<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengumuman = Informasi::all();

        return view('adminui.kelolainformasi')
        ->with('informasi', $pengumuman);
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
        $validate = $request->validate([
            'title' => 'required',
            'informasi' => 'required'
        ],[
            'title.required' => 'Harus diisi!',
            'informasi.required' => 'Harus diisi!'
        ]);

        $user = Auth::user();


        $informasi = new Informasi();
        $informasi->judul = $validate['title'];
        $informasi->informasi = $validate['informasi'];
        $informasi->user_id = $user->id;
        $informasi->save();
        return redirect()->route('adminui.dashboard')->with('Informasi berhasil diumumkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Informasi $informasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Informasi $informasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Informasi $informasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Informasi $informasi)
    {
        //
    }
}
