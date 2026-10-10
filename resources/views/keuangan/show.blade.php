<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Detail Keuangan</title>
</head>
<body>
    <h1>Detail Keuangan</h1>

    <a href="{{ route('keuangan.keuangan') }}">Kembali</a>

    <p><strong>Nama:</strong> {{ $keuangan->nama }}</p>
    <p><strong>Kategori:</strong> {{ $keuangan->akuntansi?->nama ?? '-' }}</p>
    <p><strong>Jumlah:</strong> Rp {{ number_format($keuangan->jumlah ?? 0, 0, ',', '.') }}</p>
    <p><strong>Tanggal:</strong> {{ $keuangan->created_at->format('Y-m-d') }}</p>
</body>
</html>
