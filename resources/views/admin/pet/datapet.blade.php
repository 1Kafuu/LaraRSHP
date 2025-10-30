<table width="100%" border="1">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Tanggal Lahir</th>
            <th>Warna Tanda</th>
            <th>Jenis Kelamin</th>
            <th>Pemilik</th>
            <th>Ras</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($result as $row)
            <tr>
                <td>{{ $row->nama }}</td>
                <td>{{ $row->tanggal_lahir }}</td>
                <td>{{ $row->warna_tanda }}</td>
                <td>{{ $row->jenis_kelamin }}</td>
                <td>{{ $row->pemilik->user->nama }}</td>
                <td>{{ $row->rashewan->nama_ras }}</td>
            </tr>
        @endforeach
    </tbody>
</table>