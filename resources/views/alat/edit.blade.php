<form action="{{ route('alat.update', $alat->id) }}" method="POST">
@csrf
@method('PUT')

<input type="text" name="nama_alat" value="{{ $alat->nama_alat }}">

<input type="text" name="kategori" value="{{ $alat->kategori }}">

<select name="status">
  <option value="Tersedia" {{ $alat->status == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
  <option value="Dipinjam" {{ $alat->status == 'Dipinjam' ? 'selected' : '' }}>Dipinjam</option>
</select>

<input type="number" name="waktu_sewa" value="{{ $alat->waktu_sewa }}">

<input type="number" name="harga_sewa" value="{{ $alat->harga_sewa }}">

<button type="submit">Update</button>
</form>
