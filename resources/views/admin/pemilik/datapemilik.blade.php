<table width="100%" border="1">
    <thead>
        <tr>
            <th>Id Hewan</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No Telepon</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($result as $row)
            <tr>
                <td>{{ $row->idpemilik }}</td>
                <td>{{ $row->user->nama }}</td>
                <td>{{ $row->user->email }}</td>
                <td>{{ $row->no_wa }}</td>
                <td>{{ $row->alamat }}</td>
            </tr>
        @endforeach
    </tbody>
</table>