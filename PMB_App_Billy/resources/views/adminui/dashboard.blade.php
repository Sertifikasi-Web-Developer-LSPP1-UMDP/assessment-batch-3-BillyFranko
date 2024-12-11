@extends('adminui.adminheader')
@section('pagetitle', 'header')

@section('Content')

<div class="container">
    <div class="container-fluid mt-3">
        <div class="d-flex">
             <div class="me-auto">
                  <h3 class="text-success">Calon Mahasiswa Baru</h3>
        </div>
        @if (Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success')}}
        </div>
        @endif
        <div class="p-2">
           <button><a href="{{ route('adminui.kelolainformasi') }}" class="nav-link primary">Kelola Pengumuman</a></button>
        </div>
        <div class="p-2">
           <button><a href="{{ route('adminui.kelolainformasi') }}" class="nav-link primary">Verifikasi Mahasiswa</a></button>
        </div>
   </div>
   <br>
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="display">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                        </tr>
                    </tbody>
                </table>
                </div>
    </div>
</div>
</div>
@endsection


