{{-- {{ dd($result) }} --}}

<table width="100%" border="1">
    <thead>
        <tr>
            <th>Id User</th>
            <th>Nama</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
        @if(count($result) > 0)
            @foreach ($result as $user )
                <tr>
                    <td> {{ $user['iduser'] }} </td>
                    <td>{{ $user['nama'] }}</td>
                    <td>
                        @if (count($user['roles']) > 0)
                        <ul class="role-list">
                            @foreach ($user['roles'] as $role)
                                <li class=" {{ $role['status'] ? 'aktif' : 'nonaktif' }}">
                                    {{ $role['nama_role'] }} ({{ $role['status'] ? 'Aktif' : 'Non-Aktif' }})
                                </li>
                            @endforeach
                        </ul>
                        @else
                            <span>Tidak ada role</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>