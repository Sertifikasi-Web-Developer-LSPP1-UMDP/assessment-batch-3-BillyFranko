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
            'informasi' => 'required',
            'lampiran_foto' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ],[
            'judul.required' => 'Judul harus diisi!',
            'informasi.required' => 'Isi Pengumuman harus diisi!'
        ]);

        $user = Auth::user();


        $informasi = new Informasi();
        $informasi->judul = $validate['judul'];
        $informasi->informasi = $validate['informasi'];
        $informasi->user_id = $user->id;
        if ($request->hasFile('lampiran_foto') && $request->file('lampiran_foto')->isValid()) {
            $imagePath = $validate['lampiran_foto']->store('lampiran_informasi', 'public');
            $informasi->lampiran_foto = $imagePath;
        }
        $informasi->save();
        return redirect()->route('adminui.kelolainformasi')->with('success','Informasi berhasil diumumkan!');
    }

    /**
     * Display the specified resource.
     */
    public function delete(Request $request)
    {
        $id = $request->id;
        $informasi = Informasi::findOrFail($id);
        $informasi->delete();
        return response()->json(['success' => 'Informasi berhasil dihapus!']);
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
    public function indexWelcome()
    {
        $pengumuman = Informasi::latest()->take(3)->get();

        return view('welcome', compact('pengumuman'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function postEdit(Request $request, $id)
    {
        $validate = $request->validate([
            'judul' => 'required',
            'informasi' => 'required',
            'lampiran_foto' => 'image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ],[
            'judul.required' => 'Judul harus diisi!',
            'informasi.required' => 'Isi Pengumuman harus diisi!'
        ]);

        $user = Auth::user();
    
        $informasi = Informasi::findOrFail($id);

        $informasi->judul = $validate['judul'];
        $informasi->informasi = $validate['informasi'];
        $informasi->user_id = $user->id;
        if ($request->hasFile('lampiran_foto') && $request->file('lampiran_foto')->isValid()) {
            $imagePath = $validate['lampiran_foto']->store('lampiran_informasi', 'public');
            $informasi->lampiran_foto = $imagePath;
        }
        $informasi->save();

        // $pengumuman = Informasi::with('user')->get();

        return redirect()->route('adminui.kelolainformasi')->with('success','Informasi berhasil diganti!');
    }
}
