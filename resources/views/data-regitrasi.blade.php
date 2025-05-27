<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Registrasi</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    <h1>Data Registrasi</h1>
    <div class="table-container">
        <table border="1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Alamat</th>
                    <th>Usia</th>
                    <th>Foto Profil</th>
                    <th>Remember Token</th>
                    <th>Versi</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Status Daftar</th>
                    <th>Device Name</th> 
                    <th>OS Version</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->no_hp }}</td>
                        {{-- <td>{{ $item->alamat }}</td> --}}
                        <td>
                            @php
                                $alamat = json_decode($item->alamat, true);
                            @endphp
                            {{ $alamat['negara'] ?? 'N/A' }}, {{ $alamat['provinsi'] ?? 'N/A' }}, {{ $alamat['kota'] ?? 'N/A' }}
                        </td>                        
                        <td>{{ $item->usia }}</td>
                        <td>{{ $item->foto_profil ?? 'Belum ada foto' }}</td> <!-- Tampilkan 'Belum ada foto' jika NULL -->
                        <td>{{ session('jwt_token') }}</td> 
                        <td>{{ $item->versi }}</td>
                        <td>{{ $item->created_at ? $item->created_at->format('d-m-Y H:i') : '-' }}</td>
                        <td>{{ $item->updated_at ? $item->updated_at->format('d-m-Y H:i') : '-' }}</td>
                        <td>{{ $item->status_daftar }}</td>
                        <td>{{ $item->device_name ?? 'Belum ada device' }}</td> <!-- Tampilkan 'Belum ada device' jika NULL -->
                        <td>{{ $item->os_version ?? 'Belum ada OS' }}</td> <!-- Tampilkan 'Belum ada OS' jika NULL -->
                    </tr>
                @endforeach
            </tbody>
            
        </table>
    </div>
</body>
</html>
