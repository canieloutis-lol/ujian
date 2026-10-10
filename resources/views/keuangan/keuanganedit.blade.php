<h2>edit keuangan</h2>
<form action="{{ route('keuangan.update', $keuangan->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" value="{{ old('nama', $keuangan->nama) }}" required>
    </div>

    <div>
        <label for="jenis">Jenis</label>
        <select name="jenis" id="jenis" required>
            <option value="">-- Pilih Jenis --</option>
            <option value="pemasukan" {{ old('jenis', $keuangan->jenis) == 'pemasukan' ? 'selected' : '' }}>Pemasukan</option>
            <option value="pengeluaran" {{ old('jenis', $keuangan->jenis) == 'pengeluaran' ? 'selected' : '' }}>Pengeluaran</option>
        </select>
    </div>

    <div>
        <label for="nominal">Nominal</label>
        <input type="number" name="nominal" id="nominal" value="{{ old('nominal', $keuangan->nominal) }}" min="0" required>
    </div>

    <div>
        <label for="tanggal">Tanggal</label>
        <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', $keuangan->tanggal) }}" required>
    </div>

    <div>
        <label for="keterangan">Keterangan</label>
        <textarea name="keterangan" id="keterangan" rows="3">{{ old('keterangan', $keuangan->keterangan) }}</textarea>
    </div>

    <button type="submit">Update</button>