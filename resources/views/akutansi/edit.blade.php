<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Akutansi</title>
</head>
<body>
    <h1>Edit Akutansi</h1>

    <a href="{{ route('akutansi.index') }}">Kembali</a>

    <form action="{{ route('akutansi.update', $akutansi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" value="{{ old('jumlah', $akutansi->jumlah) }}" step="0.01" min="0" required>
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', $akutansi->tanggal) }}" required>
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama', $akutansi->nama) }}" required>
        </div>

        <button type="submit">Update</button>
    </form>
</body>
</html>
