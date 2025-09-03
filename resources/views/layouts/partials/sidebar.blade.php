<nav class="pc-sidebar">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="{{ route('inicio') }}" class="b-brand text-primary">
                <!-- ========   Change your logo from here   ============ -->
                <img src="../assets/images/logo.png" class="img-fluid ms-3 mt-2" width="175px">
            </a>
        </div>
        <div class="navbar-content">
            <ul class="pc-navbar">
                @if (Auth::guard('web')->check())
                <li class="pc-item">
                    <a href="{{ route('inicio') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-home"></i></span>
                        <span class="pc-mtext">Inicio</span>
                    </a>
                </li>
                @endif
                <li class="pc-item pc-caption">
                    <label>Gestión</label>
                    <i class="ti ti-dashboard"></i>
                </li>
                <li class="pc-item">
                    <a href="{{ route('tickets') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-ticket"></i></span>
                        <span class="pc-mtext">Tickets</span>
                    </a>
                </li>
                @if (Auth::guard('web')->check())
                <li class="pc-item">
                    <a href="{{ route('usuarios') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-color-swatch"></i></span>
                        <span class="pc-mtext">Usuarios</span>
                    </a>
                </li>
                <li class="pc-item">
                    <a href="{{ route('clientes') }}" class="pc-link">
                        <span class="pc-micon"><i class="ti ti-plant-2"></i></span>
                        <span class="pc-mtext">Clientes</span>
                    </a>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
