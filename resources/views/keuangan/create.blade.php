<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tambah Keuangan</title>
</head>
<body>
    <h1>Tambah Keuangan</h1>

    <a href="{{ route('keuangan.keuangan') }}">Kembali</a>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('keuangan.store') }}" method="POST">
        @csrf

        <div>
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required>
        </div>

        <div>
            <label for="akuntansi_id">Kategori</label>
            <select name="akuntansi_id" id="akuntansi_id" required>
                <option value="">Pilih Kategori</option>
                @foreach ($akutansis as $kategori)
                    <option value="{{ $kategori->id }}" {{ old('akuntansi_id') == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" value="{{ old('jumlah') }}" step="0.01">
        </div>

        <div>
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}">
        </div>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
