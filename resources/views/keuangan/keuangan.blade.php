<div>
    <div>
        <h1>Keuangan</h1>
        <a href="{{ route('keuangan.create') }}">
            + Tambah
        </a>
    </div>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <div>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($keuangans as $index => $item)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>
                                <span>{{ $item->akuntansi?->nama ?? '-' }}</span>
                            </td>
                            <td>Rp {{ number_format($item->jumlah ?? 0, 0, ',', '.') }}</td>
                            <td>{{ $item->tanggal ?? $item->created_at->format('Y-m-d') }}</td>
                            <td>
                                <div>
                                    <a href="{{ route('keuangan.edit', $item->id) }}">Edit</a>
                                    <form action="{{ route('keuangan.destroy', $item->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">Belum ada data keuangan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        gagal
    </div>
</div>
