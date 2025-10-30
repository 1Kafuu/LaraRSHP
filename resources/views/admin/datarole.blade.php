<table width="100%" border="1">
    <thead>
        <tr>
            <th>Id User</th>
            <th>Nama</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($result as $row)
            <tr>
                <td>{{ $row->idrole }}</td>
                <td>{{ $row->nama_role }}</td>
            </tr>
        @endforeach
    </tbody>
</table>