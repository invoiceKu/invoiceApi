<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
</head>
<body>
    <div class="text-center">
        <h2>Registrasi</h2>

        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                        <form action="{{ route('registrasi.submit') }}" method="post">
                            @csrf
                            <label></label>
                            <label>Username:</label>
                            <input type="text" name="username" class="form-control mb-2" value="{{ old('username') }}" required><br>

                            <label>Email:</label>
                            <input type="email" name="email" class="form-control mb-2" value="{{ old('email') }}" required><br>

                            <label>Password:</label>
                            <input type="password" name="password" class="form-control mb-2" autocomplete="off" required><br>

                            <label>Konfirmasi Password:</label>
                            <input type="password" name="password_confirmation" class="form-control mb-2" autocomplete="off" required><br>

                            <label>No HP:</label>
                            <input type="text" name="no_hp" class="form-control mb-2" value="{{ old('no_hp') }}" required><br>

                            {{-- <label>Alamat:</label>
                            <textarea name="alamat" class="form-control mb-2" required>{{ old('alamat') }}</textarea><br> --}}

                            <label>Negara:</label>
                            <input type="text" name="alamat[negara]" class="form-control mb-2" value="{{ old('alamat.negara') }}" required><br>

                            <label>Provinsi:</label>
                            <input type="text" name="alamat[provinsi]" class="form-control mb-2" value="{{ old('alamat.provinsi') }}" required><br>

                            <label>Kota:</label>
                            <input type="text" name="alamat[kota]" class="form-control mb-2" value="{{ old('alamat.kota') }}" required><br>


                            <label>Usia:</label>
                            <input type="number" name="usia" class="form-control mb-2" value="{{ old('usia') }}" required><br>

                            <button type="submit">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <script>
        // Menangani form submission menggunakan AJAX
        $(document).ready(function() {
            $('#registrasi-form').on('submit', function(e) {
                e.preventDefault(); // Mencegah reload halaman

                // Ambil data form
                let formData = new FormData(this);
                
                // Kirim data menggunakan AJAX
                $.ajax({
                    url: '/registrasi/submit', // URL tujuan
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        alert("Registrasi berhasil!"); // Berhasil
                        // Redirect atau tampilkan data lebih lanjut jika perlu
                    },
                    error: function(xhr) {
                        // Tangkap error dari backend dan tampilkan dalam bentuk alert
                        let errorMessage = xhr.responseJSON.message || "Terjadi kesalahan. Silakan coba lagi.";
                        alert("Error: " + errorMessage); // Tampilkan alert error
                    }
                });
            });
        });
    </script> --}}
</body>
</html>