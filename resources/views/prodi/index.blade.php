@extends('layout.master')
@section('title','Halaman Prodi')

@section('content')
<div class = "row pt-4">
    <div class ="col">
</h2>Prodi</h2>
<div class = "d-md-flex justify-content-md-end">
    <a href="{{ route('prodi.route')}}" class= "btn btn-primary">Tambah</a>
</div>
<table class="table table-striped">
    <thead>
        <tr>
            <th>NPM</th><th>Nama Mahasiswa</th><th>Nama Prodi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($allmahasiswaprodi as $item)
            <tr>
                <td> {{$item->npm}}</td><td> {{$item->nama_mahasiswa}} </td><td> {{$item->nama_prodi}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
