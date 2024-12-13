<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\mahasiswa_baru;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function indexAdmin()
    {
        $user = User::where('role', '=', 'mahasiswa')
                ->orderBy('is_verified', 'asc')  // Use 'asc' for unverified first
                ->get();

        $mahasiswa = mahasiswa_baru::all();

        return view('adminui.dashboard', compact('user', 'mahasiswa'));
    }

    public function indexUser()
    {
        $user = Auth::user();
        $mahasiswa = mahasiswa_baru::where('user_id', $user->id)->first();

        $pengumuman = Informasi::latest()->get();

        return view('userui.dashboard', compact('user', 'mahasiswa', 'pengumuman'));
    }

    public function validateAkun(Request $request) 
    {
        $id = $request->id;

        $akun = User::findOrFail($id);

        if($akun->is_verified == 0){
            $akun->is_verified = 1;
            $akun->save();
            return response()->json(['message' => 'Akun berhasil diverifikasi!']);
        }else{
            return response()->json(['message' => 'Akun tidak berhasil diverifikasi!']);
        }
    }
}
