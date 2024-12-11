@extends('adminheader')

@section('Content')
    <form>
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Judul Pengumuman</label>
            <input type="text" name = "judul" class="form-control" id="exampleFormControlInput1" placeholder="Penerimaan siswa baru">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Isi Pengumuman</label>
            <input type="text" name = "informasi" class="form-control" id="exampleFormControlInput1" placeholder="Isi jadwal">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection