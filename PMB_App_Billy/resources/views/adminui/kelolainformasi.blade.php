@extends('adminui.adminheader')
@section('pagetitle', 'header')

@section('Content')
<div class = "container">
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
                        @foreach($informasi as $data)
                        <tr>
                            <td>{{$data->id}}</td>
                            <td>{{$data->judul}}</td>
                            <td>{{$data->informasi}}</td>
                            <td>{{$data->user_id}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
    </div>
</div>
@endsection


