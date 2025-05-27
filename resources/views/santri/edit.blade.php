@extends('layout')

@section('konten')

<h4>Edit Santri</h4>

<form action="{{ route('santri.update', $santri->id) }}" method="post">
    @csrf
    <label>Nama</label>
    <input type="text" name="nama" value="{{ $santri->nama }}" class="form-control mb-2">
    <label>Email</label>
    <input type="text" name="email" value="{{ $santri->email }}" class="form-control mb-2">
    <label>Usia</label>
    <input type="number" name="usia" value="{{ $santri->usia }}" class="form-control mb-2">
    <label>No.Telp/WA</label>
    <input type="number" name="no_telp" value="{{ $santri->no_telp }}" class="form-control mb-2">
    <label>Negara</label>
    <input type="text" name="negara" value="{{ $santri->negara }}" class="form-control mb-2">
    <label>Alamat</label>
    <input type="text" name="alamat" value="{{ $santri->alamat }}" class="form-control mb-2">
    <label>Nilai</label>
    <input type="number" name="nilai" value="{{ $santri->nilai }}" class="form-control mb-2">
    <label>Komentar</label>
    <input type="text" name="komentar" value="{{ $santri->komentar }}" class="form-control mb-2">

    <button class="btn btn-primary">Edit</button>
</form>

@endsection