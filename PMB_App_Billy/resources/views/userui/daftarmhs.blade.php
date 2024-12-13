@extends('userui.userheader')
<style>
    .card {
    border-radius: 10px;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    padding: 20px;
}

.form-control {
    border-radius: 5px;
}
    </style>

@section('Content')
<div class="container">
    <div class="card">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method ="POST" class="row g-3 needs-validation" enctype="multipart/form-data" class="d-flex flex-column align-items-center" action="{{route('userui.post')}}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" placeholder="Nama Lengkap">
                </div><br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                    </select>
                </div><br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="form-control" id="exampleFormControlInput1" placeholder="Kota Kelahiran">
                </div><br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="form-control" id="exampleFormControlInput1" placeholder="">
                </div><br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Kewarganegaraan</label>
                    <input type="text" name="kewarganegaraan" class="form-control" id="exampleFormControlInput1" placeholder="Indonesia/Lainnya">
                </div><br>
                <div class="form-group">
                    <label for="exampleInputEmail1">SMA Asal</label>
                    <input type="text" name="sekolah_asal" class="form-control" id="exampleFormControlInput1" placeholder="Pendidikan Terakhir">
                </div><br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Alamat Saat Ini</label>
                    <input type="text" name="alamat" class="form-control" id="exampleFormControlInput1" placeholder="Tempat Tinggal Saat Ini">
                </div><br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nomor Telpon/WA</label>
                    <input type="text" name="nomor_telp" class="form-control" id="exampleFormControlInput1" placeholder="Nomor Telepon yang Dapat Dihubungi">
                </div><br>
                <div class="form-group">
                    <label for="exampleInputEmail1">E-mail</label>
                    <input type="text" name="email" class="form-control" id="exampleFormControlInput1" placeholder="E-mail">
                </div><br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Pilihan Program Studi</label>
                    <select name="pilihan_program_studi" class="form-control">
                            <option value="informatika">Informatika(S1)</option>
                            <option value="sistem_informasi">Sistem Informasi(S1)</option>
                    </select>
                </div><br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Waktu kuliah</label>
                    <select name="waktu_kuliah_pilihan" class="form-control">
                            <option value="Pagi">Pagi</option>
                            <option value="Sore">Sore</option>
                    </select>
                </div><br>
                <div class="col-md-12">
                        <div class="d-md-flex d-grid align-items-center gap-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('userui.dashboard') }}" class="btn btn-danger" style="color: white; text-decoration: none;">Back</a>
                        </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection