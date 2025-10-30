<table width="100%" border="1">
    <thead>
        <tr>
            <th>Kode Tindakan</th>
            <th>Deskripsi Tindakan</th>
            <th>Kategori</th>
            <th>Kategori Klinis</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($result as $row)
            <tr>
                <td>{{ $row->kode }}</td>
                <td>{{ $row->deskripsi_tindakan_terapi }}</td>
                <td>{{ $row->kategori->nama_kategori }}</td>
                <td>{{ $row->kategori_klinis->nama_kategori_klinis }}</td>
            </tr>
        @endforeach
    </tbody>
</table>