<form action="{{ route('alat.store') }}" method="POST">
@csrf

<input type="text" name="nama_alat" placeholder="Nama Alat">

<input type="text" name="kategori" placeholder="Kategori">

<select name="status">
  <option value="Tersedia">Tersedia</option>
  <option value="Dipinjam">Dipinjam</option>
</select>

<input type="number" name="waktu_sewa" placeholder="Waktu Sewa (hari)">

<input type="number" name="harga_sewa" placeholder="Harga Sewa">

<button type="submit">Simpan</button>
</form>
