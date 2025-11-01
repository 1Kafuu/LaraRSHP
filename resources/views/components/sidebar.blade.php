<!-- Sidebar (Fixed) -->
<div class="bg-dark text-white p-3 d-flex flex-column sidebar">
    <h4 class="text-center">RSHP UNAIR</h4>
    <ul class="nav flex-column mt-5 flex-grow-1 overflow-auto">
        <li class="nav-item">
            <a href="{{ route('home') }}"
                class="nav-link text-white {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('datauser') }}"
                class="nav-link text-white {{ request()->routeIs('datauser') ? 'active' : '' }}">Datauser</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('dataroleuser') }}"
                class="nav-link text-white {{ request()->routeIs('dataroleuser') ? 'active' : '' }}">Data Role
                User</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('datarole') }}"
                class="nav-link text-white {{ request()->routeIs('datarole') ? 'active' : '' }}">Data Role</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('datajenishewan') }}"
                class="nav-link text-white {{ request()->routeIs('datajenishewan') ? 'active' : '' }}">Data
                Jenis Hewan</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('datakategori') }}"
                class="nav-link text-white {{ request()->routeIs('datakategori') ? 'active' : '' }}">Data
                Kategori</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('datakategoriklinis') }}"
                class="nav-link text-white {{ request()->routeIs('datakategoriklinis') ? 'active' : '' }}">Data
                Kategori Klinis</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('datakodetindakan') }}"
                class="nav-link text-white {{ request()->routeIs('datakodetindakan') ? 'active' : '' }}">Data
                Kode Tindakan</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('datarashewan') }}"
                class="nav-link text-white {{ request()->routeIs('datarashewan') ? 'active' : '' }}">Data Ras
                Hewan</a>
        </li>
    </ul>

    <!-- Logout Button -->
    <div class="mt-auto pb-3">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-outline-light w-100">Logout</button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>