@extends('userui.userheader')

@section('Content')
<div class="container">
    <div class="container-fluid mt-3">
        <div class="d-flex">
             <div class="me-auto">
                  <h3 class="text-success">Welcome, {{$user->name}}</h3>
        </div>
        @if (Session::get('success'))
        <div class="alert alert-success">
            {{ Session::get('success')}}
        </div>
        @endif
        <div class="p-2">
           <button><a href="{{ route('userui.create') }}" class="nav-link primary">Daftar Sebagai Mahasiswa Baru</a></button>
        </div>
   </div>
   <br>
</div>
</div>
@endsection