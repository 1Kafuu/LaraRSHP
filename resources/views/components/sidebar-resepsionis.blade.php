<!-- Sidebar (Fixed) -->
<div class="bg-dark text-white p-3 d-flex flex-column sidebar">
    <h4 class="text-center">RSHP UNAIR</h4>
    <ul class="nav flex-column mt-5 flex-grow-1 overflow-auto">
        <li class="nav-item">
            <a href="{{ route('home') }}"
                class="nav-link text-white {{ request()->routeIs('home') ? 'active' : '' }}">Home</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('datapemilik') }}"
                class="nav-link text-white {{ request()->routeIs('datapemilik') ? 'active' : '' }}">Data Pemilik</a>
        </li>
        <li class="nav-item">
            <a href="{{ route('datapet') }}"
                class="nav-link text-white {{ request()->routeIs('datapet') ? 'active' : '' }}">Data Pet</a>
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