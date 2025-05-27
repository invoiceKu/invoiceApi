@extends('layout')

@section('konten')

<h4>Tambah Santri</h4>

<form action="{{ route('santri.submit') }}" method="post">
    @csrf
    <label>Nama</label>
    <input type="text" name="nama" class="form-control mb-2">
    <label>Email</label>
    <input type="text" name="email" class="form-control mb-2">
    <label>Usia</label>
    <input type="number" name="usia" class="form-control mb-2">
    <label>No.Telp/WA</label>
    <input type="number" name="no_telp" class="form-control mb-2">
    <label>Negara</label>
    <input type="text" name="negara" class="form-control mb-2">
    <label>Alamat</label>
    <input type="text" name="alamat" class="form-control mb-2">
    <label>Nilai</label>
    <input type="number" name="nilai" class="form-control mb-2">
    <label>Komentar</label>
    <input type="text" name="komentar" class="form-control mb-2">

    <button class="btn btn-primary">Tambah</button>
</form>

@endsection