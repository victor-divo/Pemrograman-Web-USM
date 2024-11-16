<h1>Tambah Wisata</h1>
<p><a href="{{ route('wisata.index') }}">Kembali</a>

<form action="{{ route('wisata.store') }}" method="post" accept-charset="utf-8">
  @csrf
  Kota: <input type="text" name="kota" value="" /><br />
  Landmark: <input type="text" name="landmark" value="" /><br />
  Tarif: <input type="text" name="tarif" value="" /><br />
  <br>
  <br>
  <input type="submit" name="btn_simpan" value="Tambah" />
</form>
