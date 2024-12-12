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
                  <h3 class="text-success">Daftar Pengumuman</h3>
        </div>
        @if (Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success')}}
        </div>
        @endif
        <div class="p-2">
           <button><a href="{{ route('adminui.dashboard') }}" class="nav-link primary">Kembali ke Dashboard</a></button>
        </div>
        <div class="p-2">
           <button><a href="{{ route('adminui.buatinformasi') }}" class="nav-link primary">Tambah Pengumuman</a></button>
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


