<table width="100%" border="1">
    <thead>
        <tr>
            <th>Id Kategori Klinis</th>
            <th>Nama Kategori Klinis</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($result as $row)
            <tr>
                <td>{{ $row->idkategori_klinis }}</td>
                <td>{{ $row->nama_kategori_klinis }}</td>
            </tr>
        @endforeach
    </tbody>
</table>