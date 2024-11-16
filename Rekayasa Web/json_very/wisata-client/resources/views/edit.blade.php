<h1>Tambah Wisata</h1>
<p><a href="{{ route('wisata.index') }}">Kembali</a>

<form action="{{ route('wisata.update', [$data['id_wisata']]) }}" method="post" accept-charset="utf-8">
  @csrf
  Kota: <input type="text" name="kota" value="{{ $data['kota'] }}" /><br />
  Landmark: <input type="text" name="landmark" value="{{ $data['landmark'] }}" /><br />
  Tarif: <input type="text" name="tarif" value="{{ $data['tarif'] }}" /><br />
  <br>
  <br>
  <input type="submit" name="btn_simpan" value="Simpan" />
</form>
