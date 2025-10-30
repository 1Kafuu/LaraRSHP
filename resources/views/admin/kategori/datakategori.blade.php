<table width="100%" border="1">
    <thead>
        <tr>
            <th>Id Kategori</th>
            <th>Nama Kategori</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($result as $row)
            <tr>
                <td>{{ $row->idkategori }}</td>
                <td>{{ $row->nama_kategori }}</td>
            </tr>
        @endforeach
    </tbody>
</table>