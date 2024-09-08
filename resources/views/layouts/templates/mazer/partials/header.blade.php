<header id="header" class="bg-white px-4 py-3">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <a href="#" class="burger-btn d-block">
            <i class="bi bi-justify fs-3"></i>
        </a>
        <div class="dropdown">
            <a class="d-flex align-items-center text-decoration-none" href="#" id="adminProfileDropdown"
                data-bs-toggle="dropdown" aria-expanded="false">
                <div class="me-3 text-end">
                    <h6 class="m-0 font-bold">{{ Auth::user()->name }}</h6>
                </div>
                <div class="avatar avatar-lg bg-warning me-2">
                    <span class="avatar-content">{{ substr(Auth::user()->name, 0, 1) }}</span>
                    {{-- <img src="{{ asset('templates/mazer/assets/compiled/jpg/2.jpg') }}" /> --}}
                </div>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-chevron-down">
                    <polyline points="6 9 12 15 18 9" style="fill: none; stroke-width: 2"></polyline>
                </svg>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="adminProfileDropdown">
                <li>
                    <a class="dropdown-item" href="{{ route('profile.edit') }}">Profile</a>
                </li>
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</header>
