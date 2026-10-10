<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Detail Akutansi</title>
</head>
<body>
    <h1>Detail Akutansi</h1>

    <a href="{{ route('akutansi.index') }}">Kembali</a>

    <p><strong>ID:</strong> {{ $akutansi->id }}</p>
    <p><strong>Kategori:</strong> {{ $akutansi->nama }}</p>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($akutansi->keuangans as $keuangan)
                <tr>
                    <td>{{ $keuangan->nama }}</td>
                    <td>Rp {{ number_format($keuangan->jumlah ?? 0, 0, ',', '.') }}</td>
                    <td>{{ $keuangan->tanggal ?? $keuangan->created_at->format('Y-m-d') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">Belum ada data.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
