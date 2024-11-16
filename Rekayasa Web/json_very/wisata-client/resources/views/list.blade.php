<h1>Daftar Wisata</h1>
<p><a href="{{ route('home') }}">Home</a> | <a href="{{ route('wisata.create') }}">Tambah Wisata</a></p>
<table border="1">
  <tr>
    <th>Id Wisata</th>
    <th>Kota</th>
    <th>Landmark</th>
    <th>Tarif</th>
    <th>Aksi</th>
  </tr>
  @foreach ($query as $row)
    <tr>
      <td>{{ $row['id_wisata'] }}</td>
      <td>{{ $row['kota'] }}</td>
      <td>{{ $row['landmark'] }}</td>
      <td>{{ $row['tarif'] }}</td>
      <td>
        <a href="{{ route('wisata.detail', [$row['id_wisata']]) }}">Lihat</a> |
        <a href="{{ route('wisata.edit', [$row['id_wisata']]) }}">Edit</a> |
        <a onclick="return confirm('Anda yakin ingin menghapus data ini?')"
          href="{{ route('wisata.delete', [$row['id_wisata']]) }}">Hapus</a>
      </td>
    </tr>
  @endforeach
</table>
