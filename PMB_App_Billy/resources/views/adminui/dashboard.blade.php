@extends('adminui.adminheader')
@section('pagetitle', 'header')

@section('Content')

<style>
        
        body {
            background-color: #f0f0f0; /* Light gray background */
            font-family: Arial, sans-serif;
            margin: 0;
        }
        .content-box {
            background-color: #ffffff; 
            padding: 20px; 
            border: 4px solid #ddd; 
            margin: 20px auto; 
            max-width: 1750px; 
            border-radius: 8px; 
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
        }
</style>

<div class="container">
    <div class="content-box">
        <div class="d-flex">
             <div class="me-auto">
                  <h3 class="text-success">Daftar Akun</h3>
        </div>
        @if (Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success')}}
        </div>
        @endif
        <div class="p-2">
           <button><a href="{{ route('adminui.kelolainformasi') }}" class="nav-link primary">Kelola Pengumuman</a></button>
        </div>
   </div>
   <br>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="display">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Status Verifikasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->email}}</td>
                            <td>@if($data->is_verified == 1) 
                                    Verified
                                @else
                                    Unverified
                                @endif
                            <td>
                                <button class="btn btn-success validate-btn" data-id="{{ $data->id }}"
                                @if($data->is_verified == 1) 
                                    disabled 
                                @endif>Validasi</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
    </div>
</div>
<div class="content-box">
        <div class="d-flex">
             <div class="me-auto">
                  <h3 class="text-success">Daftar Mahasiswa Baru</h3>
        </div>
        @if (Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success')}}
        </div>
        @endif
   </div>
   <br>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example2" class="display">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Kewarganegaraan</th>
                            <th>Asal Sekolah</th>
                            <th>Alamat</th>
                            <th>Nomor Telepon</th>
                            <th>Email</th>
                            <th>Program Studi</th>
                            <th>Waktu Kuliah</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mahasiswa as $data_mhs)
                        <tr>
                            <td>{{$data_mhs->id}}</td>
                            <td>{{$data_mhs->nama}}</td>>
                            <td>{{$data_mhs->jenis_kelamin}}</td>
                            <td>{{$data_mhs->tempat_lahir}}</td>
                            <td>{{$data_mhs->tanggal_lahir}}</td>
                            <td>{{$data_mhs->kewarganegaraan}}</td>
                            <td>{{$data_mhs->sekolah_asal}}</td>
                            <td>{{$data_mhs->alamat}}</td>
                            <td>{{$data_mhs->nomor_telp}}</td>
                            <td>{{$data_mhs->email}}</td>
                            <td>{{$data_mhs->pilihan_program_studi}}</td>
                            <td>{{$data_mhs->waktu_kuliah_pilihan}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
    </div>
</div>
</div>

<script>
    $(document).ready(function() {
        $('.validate-btn').click(function() {
            let studentId = $(this).data('id');
            let studentName = $(this).closest('tr').find('td:eq(1)').text();

            if (confirm("Apakah Anda yakin ingin memvalidasi mahasiswa dengan ID " + studentId + " (" + studentName + ")?")) {
                $.ajax({
                    url: "{{ route('adminui.validate') }}",
                    type: 'POST',
                    data: {
                        id: studentId,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // Handle success response, e.g., update the table row, show a success message
                        alert(response.message);
                        location.reload(); // Reload the page to reflect changes
                    },
                    error: function(error) {
                        // Handle error response, e.g., show an error message
                        alert('Error: ' + error.responseText);
                    }
                });
            }
        });
    });
</script>
@endsection


