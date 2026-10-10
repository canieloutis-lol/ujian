<h1>Delete keuangan</h1>

<p>Are you sure you want to delete this keuangan?</p>

<form action="{{ route('keuangan.destroy', $keuangan->id) }}" method="POST">
    @csrf
    @method('DELETE')

    <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus ini?');">Delete</button>
    <a href="{{ route('keuangan.index') }}">Cancel</a>
</form>
