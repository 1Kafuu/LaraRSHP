<table width="100%" border="1">
    <thead>
        <tr>
            <th>Jenis Hewan</th>
            <th>Ras</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($groupRas as $row)
            <tr>
                <td>{{ $row['nama_jenis_hewan'] }}</td>
                <td>
                    @foreach ($row['ras_hewan'] as $ras)
                        {{ $ras['nama_ras'] }}<br>
                    @endforeach
                </td>
            </tr>
        @endforeach
    </tbody>
</table>