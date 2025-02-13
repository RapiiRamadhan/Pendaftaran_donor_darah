<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pendonor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Daftar Pendonor Darah</h1>
        <a href="{{ route('pendaftarans.create') }}" class="btn btn-primary mb-3">Tambah Pendonor</a>

        <form method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan nama atau golongan darah">
                <button type="submit" class="btn btn-secondary">Cari</button>
            </div>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Golongan Darah</th>
                    <th>Nomor HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pendaftarans as $pendaftaran)
                    <tr>
                        <td>{{ $pendaftaran->name }}</td>
                        <td>{{ $pendaftaran->alamat }}</td>
                        <td>{{ $pendaftaran->tempat_lahir }}</td>
                        <td>{{ $pendaftaran->tanggal_lahir}}</td>
                        <td>{{ $pendaftaran->golongan_darah }}</td>
                        <td>{{ $pendaftaran->no_hp }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
