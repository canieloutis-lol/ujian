<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Keuangan</title>
</head>
<body>
    <h1>Edit Keuangan</h1>

    <a href="{{ route('keuangan.keuangan') }}">Kembali</a>

    <form action="{{ route('keuangan.update', $keuangan->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama', $keuangan->nama) }}" required>
        </div>

        <div>
            <label for="akuntansi_id">Kategori</label>
            <select name="akuntansi_id" id="akuntansi_id" required>
                <option value="">Pilih Kategori</option>
                @foreach ($akutansis as $kategori)
                    <option value="{{ $kategori->id }}" {{ $kategori->id == old('akuntansi_id', $keuangan->akuntansi_id) ? 'selected' : '' }}>
                        {{ $kategori->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" value="{{ old('jumlah', $keuangan->jumlah) }}" step="0.01">
        </div>

        <div>
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', $keuangan->tanggal ?? '') }}">
        </div>

        <button type="submit">Update</button>
    </form>
</body>
</html>
