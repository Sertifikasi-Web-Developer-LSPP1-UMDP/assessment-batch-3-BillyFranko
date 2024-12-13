<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa_baru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaBaruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('userui.daftarmhs');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'kewarganegaraan' => 'required',
            'sekolah_asal' => 'required',
            'alamat' => 'required',
            'nomor_telp' => 'required',
            'email' => 'required',
            'pilihan_program_studi' => 'required',
            'waktu_kuliah_pilihan' => 'required',

        ],[
            'nama.required' => 'Nama Harus diisi!',
            'jenis_kelamin.required' => 'Jenis Kelamin Harus diisi!',
            'tempat_lahir.required' => 'Tempat Lahir Harus diisi!',
            'tanggal_lahir.required' => 'Tanggal Lahir Harus diisi!',
            'kewarganegaraan.required' => 'Kewarganegaraan Harus diisi!',
            'sekolah_asal.required' => 'Sekolah Asal Harus diisi!',
            'alamat.required' => 'Alamat Harus diisi!',
            'nomor_telp.required' => 'Nomor Telepon Harus diisi!',
            'email.required' => 'Email Harus diisi!',
            'pilihan_program_studi.required' => 'Program Studi Harus diisi!',
            'waktu_kuliah_pilihan.required' => 'Waktu Kuliah Harus diisi!',
        ]);

        $user = Auth::user();

        $mahasiswa = new mahasiswa_baru();
        $mahasiswa->nama = $validate['nama'];
        $mahasiswa->jenis_kelamin = $validate['jenis_kelamin'];
        $mahasiswa->tempat_lahir = $validate['tempat_lahir'];
        $mahasiswa->tanggal_lahir = $validate['tanggal_lahir'];
        $mahasiswa->kewarganegaraan = $validate['kewarganegaraan'];
        $mahasiswa->sekolah_asal = $validate['sekolah_asal'];
        $mahasiswa->alamat = $validate['alamat'];
        $mahasiswa->nomor_telp = $validate['nomor_telp'];
        $mahasiswa->email = $validate['email'];
        $mahasiswa->pilihan_program_studi = $validate['pilihan_program_studi'];
        $mahasiswa->waktu_kuliah_pilihan = $validate['waktu_kuliah_pilihan'];
        $mahasiswa->user_id = $user->id;
        $mahasiswa->save();

        return redirect()->route('userui.dashboard')->with('success','Mahasiswa baru berhasil didaftarkan!');
    }

    /**
     * Display the specified resource.
     */
    public function validateMhs(Request $request) 
    {
        $id = $request->id;

        $akun = mahasiswa_baru::findOrFail($id);

        if($akun->is_verified == 0){
            $akun->is_verified = 1;
            $akun->save();
            return response()->json(['message' => 'Mahasiswa Baru berhasil diverifikasi!']);
        }else{
            return response()->json(['message' => 'Mahasiswa Baru tidak berhasil diverifikasi!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(mahasiswa_baru $mahasiswa_baru)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, mahasiswa_baru $mahasiswa_baru)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(mahasiswa_baru $mahasiswa_baru)
    {
        //
    }
}
