@extends('userui.userheader')

@section('Content')
<style>

    .content-box {
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        margin-top: 30px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-img-top {
        height: 200px;
        width: 100%;
        object-fit: cover;
        border-radius: 8px 8px 0 0;
    }

    .btn-primary, .btn-secondary {
        border-radius: 20px;
        padding: 12px 24px;
        font-weight: bold;
        text-transform: uppercase;
    }

    .btn-primary {
        background-color: #28a745;
        border: none;
    }

    .btn-secondary {
        background-color: #6c757d;
        border: none;
    }

    .alert {
        margin-bottom: 20px;
    }

    h3.text-black {
        font-size: 24px;
        font-weight: bold;
    }

    h2.text-success {
        font-size: 28px;
        font-weight: 700;
    }

    .card-body p {
        font-size: 14px;
        line-height: 1.6;
    }

    .row {
        margin-bottom: 30px;
    }

</style>
<div class="container">
    <div class="container-fluid mt-3">
        @if (Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif
        <div class="d-flex">
             <div class="me-auto">
                @if($mahasiswa)
                  <h2 class="text-success">Welcome, {{$mahasiswa->nama}}</h2>
                @else
                  <h2 class="text-success">Welcome, {{$user->name}}</h2>
                @endif
            </div>
        </div>

        <div class="p-0 mb-4">
            @if ($mahasiswa || $user->is_verified == 0)
                <button disabled class="btn btn-secondary">
                    <a href="{{ route('userui.create') }}" class="nav-link primary" style="pointer-events: none;">Daftar Sebagai Mahasiswa Baru</a>
                </button>
            @else
                <button class="btn btn-primary">
                    <a href="{{ route('userui.create') }}" class="nav-link primary text-white">Daftar Sebagai Mahasiswa Baru</a>
                </button>
            @endif
        </div>

        <div class="row">
            <div class="col-md-4">
                @if ($mahasiswa)
                    <h4>Status Pendaftaran: 
                        @if($mahasiswa->is_verified == 1) 
                            Verified
                        @else
                            Unverified
                        @endif
                    </h4>
                @else
                    <h4>Status Pendaftaran: Belum Mendaftar</h4>
                @endif
            </div>
        </div>

        <div class="content-box">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-black">Informasi Pengumuman</h3>
                </div>
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            @foreach ($pengumuman as $data)
                                <div class="col-md-4 mb-4"> 
                                    <div class="card">
                                        <img class="card-img-top" src="{{ asset('storage/' . $data->lampiran_foto) }}" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $data->judul }}</h5>
                                            <div class="card-body" style="max-height: 200px; overflow-y: auto;">
                                                <p class="card-text">{{ $data->informasi }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            @if ($pengumuman->count() < 3)
                                @for ($i = $pengumuman->count(); $i < 3; $i++)
                                    <div class="col-md-4 mb-4"> 
                                        <div class="card" style="visibility: hidden;"></div>
                                    </div>
                                @endfor
                            @endif
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
