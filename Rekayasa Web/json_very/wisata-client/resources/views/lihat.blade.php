<h1>Detail Wisata</h1>
<p><a href="{{ route('wisata.index') }}">Kembali</a></p>

<h2>{{ $data['landmark'] }}</h2>
<h3>Terletak di kota {{ $data['kota'] }} dengan tarif
  {{ is_numeric($data['tarif']) ? $data['tarif'] . ' rupiah' : $data['tarif'] }}</h3>
