<table width="100%" border="1">
    <thead>
        <tr>
            <th>Id Hewan</th>
            <th>Nama</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($result as $row)
            <tr>
                <td>{{ $row->idjenis_hewan }}</td>
                <td>{{ $row->nama_jenis_hewan }}</td>
            </tr>
        @endforeach
    </tbody>
</table>