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

        table td img {
            max-width: 100px;
            max-height: 100px;
            width: auto;
            height: auto;
            object-fit: contain;
        }

</style>

<div class="container">
    <div class="content-box">
        @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            <strong class="font-bold">Pesan Berhasil: </strong>
                            {{ session('success') }}
                        </div>
                    @endif
        <div class="d-flex">
             <div class="me-auto">
                  <h3 class="text-success">Daftar Pengumuman</h3>
        </div>
        <div class="p-2">
           <a href="{{ route('adminui.dashboard') }}" class="btn btn-danger">Kembali ke Dashboard</a>
        </div>
        <div class="p-2">
           <a href="{{ route('adminui.buatinformasi') }}" class="btn btn-success">Tambah Pengumuman</a>
        </div>
   </div>
   <br>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="display">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Judul</th>
                            <th>Isi Pengumuman</th>
                            <th>Lampiran Foto</th>
                            <th>Pencipta</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pengumuman as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->judul}}</td>
                            <td>
                                <textarea class="form-control" rows="3" style="width: 100%;" readonly>{{$data->informasi}}</textarea>
                            </td>
                            <td>
                                <img src="{{ asset('storage/' . $data->lampiran_foto) }}" alt="Lampiran Foto">
                            </td>
                            <td>{{$data->user->name ?? 'N/A'}}</td>
                            <td>
                                <button class="btn btn-success"><a href="{{route('adminui.editinformasi', $data->id) }}" style="color: white; text-decoration: none;">Edit</a></button>
                                <button class="btn btn-danger destroy-btn" data-id="{{ $data->id }}">Hapus</button>
                            </td>
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
        $('.destroy-btn').click(function() {
            let informasiId = $(this).data('id');
            if (confirm("Are you sure you want to delete this item?")) {
                $.ajax({
                    url: "{{route('adminui.deleteinformasi')}}",
                    type: 'DELETE',
                    data: {
                        id : informasiId,
                        _token: '{{ csrf_token() }}'  
                    },
                    success: function(response) {
                        $('#row-' + informasiId).fadeOut();
                        alert(response.success); 
                        location.reload();
                    },
                    error: function(error) {
                        alert('There was an error deleting the item.');
                    }
                });
            }
        });
    });
</script>



@endsection


