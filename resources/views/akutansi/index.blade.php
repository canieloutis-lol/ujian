<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data Akutansi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="text-center">
    <h1>Data Akutansi</h1>

    <a href="{{ route('akutansi.create') }}" class="inline-flex rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">+ Tambah</a>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table class="mx-auto border-collapse border border-gray-400">
        <thead>
            <tr>
                <th class="border border-gray-400 px-4 py-2">No</th>
                <th class="border border-gray-400 px-4 py-2">Nama</th>
                <th class="border border-gray-400 px-4 py-2">Kategori</th>
                <th class="border border-gray-400 px-4 py-2">Jumlah</th>
                <th class="border border-gray-400 px-4 py-2">Tanggal</th>
                <th class="border border-gray-400 px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php($no = 0)
            @forelse ($akutansis as $item)
                @forelse ($item->keuangans as $keuangan)
                    <tr>
                        <td class="border border-gray-400 px-4 py-2">{{ ++$no }}</td>
                        <td class="border border-gray-400 px-4 py-2">{{ $keuangan->nama }}</td>
                        <td class="border border-gray-400 px-4 py-2">{{ $item->nama }}</td>
                        <td class="border border-gray-400 px-4 py-2">Rp {{ number_format($keuangan->jumlah ?? 0, 0, ',', '.') }}</td>
                        <td class="border border-gray-400 px-4 py-2">{{ $keuangan->tanggal ?? $keuangan->created_at->format('Y-m-d') }}</td>
                        <td class="border border-gray-400 px-4 py-2">
                            <a href="{{ route('akutansi.show', $item->id) }}" class="inline-flex rounded-md bg-sky-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-sky-500">Detail</a>
                            <a href="{{ route('akutansi.edit', $item->id) }}" class="inline-flex rounded-md bg-amber-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-amber-400">Edit</a>
                            <form action="{{ route('keuangan.destroy', $keuangan->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500" onclick="return confirm('Hapus data ini saja?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="border border-gray-400 px-4 py-2">{{ ++$no }}</td>
                        <td class="border border-gray-400 px-4 py-2">-</td>
                        <td class="border border-gray-400 px-4 py-2">{{ $item->nama }}</td>
                        <td class="border border-gray-400 px-4 py-2">-</td>
                        <td class="border border-gray-400 px-4 py-2">-</td>
                        <td class="border border-gray-400 px-4 py-2">
                            <a href="{{ route('akutansi.show', $item->id) }}" class="inline-flex rounded-md bg-sky-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-sky-500">Detail</a>
                            <a href="{{ route('akutansi.edit', $item->id) }}" class="inline-flex rounded-md bg-amber-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-amber-400">Edit</a>
                            <form action="{{ route('akutansi.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500" onclick="return confirm('Yakin hapus data ini?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforelse
            @empty
                <tr>
                    <td class="border border-gray-400 px-4 py-2" colspan="6">Belum ada data.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
