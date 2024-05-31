<!-- Navbar -->

<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        {{-- <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
        </li> --}}
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Kindergarten Management</a>
        </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-link nav-link" title="Logout" style="padding: 0; border: none; color: white;">
                        <i class="far fa-circle"></i> Logout
                    </button>
                </form>
        </li>
    </ul>
</nav>
</nav>

