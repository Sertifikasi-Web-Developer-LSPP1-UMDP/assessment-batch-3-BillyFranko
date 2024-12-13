@extends('adminui.adminheader')
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
        @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <div class="card-body">
            <form method ="POST" class="row g-3 needs-validation" enctype="multipart/form-data" class="d-flex flex-column align-items-center" action="{{route('adminui.postinformasi')}}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Judul Pengumuman</label>
                    <input type="text" name="judul" class="form-control" id="exampleFormControlInput1" placeholder="Penerimaan siswa baru">
                </div><br>
                <div class="form-group">
                    <label for="exampleInputEmail1">Isi Pengumuman</label>
                    <textarea name="informasi" class="form-control" id="exampleFormControlInput1" rows="4" placeholder="Isi jadwal"></textarea>
                </div><br>
                <div class="form-group">
                    <label for="image">Foto Lampiran Pengumuman (Jika Ada)</label><br>
                    <input type="file" name="lampiran_foto" id="lampiran_foto">
                </div><br>
                <div class="col-md-12">
                        <div class="d-md-flex d-grid align-items-center gap-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('adminui.kelolainformasi') }}" class="btn btn-danger" style="color: white; text-decoration: none;">Back</a>
                        </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection