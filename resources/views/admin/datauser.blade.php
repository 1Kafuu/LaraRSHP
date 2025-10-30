<table width="100%" border="1">
    <thead>
        <tr>
            <th>Id User</th>
            <th>Nama</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($result as $row)
            <tr>
                <td>{{ $row->iduser }}</td>
                <td>{{ $row->nama }}</td>
                <td>{{ $row->email }}</td>
            </tr>
        @endforeach
    </tbody>
</table>