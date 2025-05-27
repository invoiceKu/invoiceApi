@extends('layout')

@section('konten')

<div class="d-flex">
    <h4>List Santri</h4>
    <div class="ms-auto">
        <a class="btn btn-success" href="{{ route('santri.tambah') }}">Tambah Santri</a>
    </div>
</div>

<table class="table">
    <tr>
        {{-- <th>Id</th> --}}
        <th>Nama</th>
        <th>Email</th>
        <th>Usia</th>
        <th>No.Telp/WA</th>
        <th>Negara</th>
        <th>Alamat</th>
        <th>Nilai</th>
        <th>Komentar</th>
        <th>Aksi</th>
        {{-- <th>Remember_token</th>
        <th>Versi</th>
        <th>Create_at</th>
        <th>Update_at</th>
        <th>Status_daftar</th> --}}
    </tr>
    @foreach ($santri as $no=>$data)
    <tr>
        {{-- <th>{{ $Id+1 }}</th> --}}
        <td>{{ $data->nama }}</td>
        <td>{{ $data->email }}</td>
        <td>{{ $data->usia }}</td>
        <td>{{ $data->no_telp }}</td>
        <td>{{ $data->negara }}</td>
        <td>{{ $data->alamat }}</td>
        <td>{{ $data->nilai }}</td>
        <td>{{ $data->komentar }}</td>
        <td>
            <a href="{{ route('santri.edit', $data->id)}}" class="btn btn-sm btn-warning">Edit</a>
            <form action="{{ route('santri.delete', $data->id) }}" method="post">
                @csrf
                <button class="btn btn-sm btn-danger">Hapus</button>
            </form>
        </td>
        {{-- <th>Remember_token</th>
        <th>Versi</th>
        <th>Create_at</th>
        <th>Update_at</th>
        <th>Status_daftar</th> --}}
    </tr>
        
    @endforeach
</table>

@endsection