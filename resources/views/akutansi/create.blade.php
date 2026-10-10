<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tambah Akutansi</title>
</head>
<body>
    <h1>Tambah Akutansi</h1>

    <a href="{{ route('akutansi.index') }}">Kembali</a>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('akutansi.store') }}" method="POST">
        @csrf

        <div>
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required>
        </div>

        <div>
            <label for="kategori">Kategori</label>
            <select name="kategori" id="kategori" required>
                <option value="">Pilih Kategori</option>
                @foreach (['Pegawai', 'Akutansi', 'Manajer'] as $kategori)
                    <option value="{{ $kategori }}" {{ old('kategori') === $kategori ? 'selected' : '' }}>{{ $kategori }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" value="{{ old('jumlah') }}" step="0.01" min="0" required>
        </div>

        <div>
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}" required>
        </div>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
