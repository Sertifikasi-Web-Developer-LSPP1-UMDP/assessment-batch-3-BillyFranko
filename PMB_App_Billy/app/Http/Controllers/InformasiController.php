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
        $pengumuman = Informasi::with('user')->get();

        return view('adminui.kelolainformasi', compact('pengumuman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adminui.buatinformasi');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'judul' => 'required',
            'informasi' => 'required'
        ],[
            'judul.required' => 'Harus diisi!',
            'informasi.required' => 'Harus diisi!'
        ]);

        $user = Auth::user();


        $informasi = new Informasi();
        $informasi->judul = $validate['judul'];
        $informasi->informasi = $validate['informasi'];
        $informasi->user_id = $user->id;
        $informasi->save();
        return redirect()->route('adminui.kelolainformasi')->with('Informasi berhasil diumumkan!');
    }

    /**
     * Display the specified resource.
     */
    public function delete(Request $request)
    {
        $id = $request->id;
        $informasi = Informasi::findOrFail($id);
        $informasi->delete();
        return response()->json(['success' => 'Informasi deleted successfully']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
    
        $informasi = Informasi::findOrFail($id);

        return view('adminui.editinformasi', compact('informasi'));
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
