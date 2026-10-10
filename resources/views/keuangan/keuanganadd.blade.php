<h2>Add Keuangan</h2>

<form action="{{ route('keuangan.store') }}" method="POST">
    @csrf

    <div>
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required>
    </div>

    <div>
        <label for="jenis">Jenis</label>
        <select name="jenis" id="jenis" required>
            <option value="">-- Pilih Jenis --</option>
            <option value="pemasukan" {{ old('jenis') == 'pemasukan' ? 'selected' : '' }}>Pemasukan</option>
            <option value="pengeluaran" {{ old('jenis') == 'pengeluaran' ? 'selected' : '' }}>Pengeluaran</option>
        </select>
    </div>

    <div>
        <label for="nominal">Nominal</label>
        <input type="number" name="nominal" id="nominal" value="{{ old('nominal') }}" min="0" required>
    </div>

    <div>
        <label for="tanggal">Tanggal</label>
        <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal') ?? date('Y-m-d') }}" required>
    </div>

    <div>
        <label for="keterangan">Keterangan</label>
        <textarea name="keterangan" id="keterangan" rows="3">{{ old('keterangan') }}</textarea>
    </div>

    <button type="submit">Simpan</button>
</form>
