<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">PA Amuntai</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">PA Amt</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item dropdown {{ $type_menu === 'dashboard' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>REALISASI</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('forms-validation') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('forms-validation') }}">Tambah Data Realisasi</a>
                    </li>
                    <li class="{{ Request::is('realisasi/*/edit') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ url('realisasi/1/edit') }}">Edit Data Realisasi</a>
                    </li>
                </ul>
            </li>

            <li class="{{ Request::is('credits') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('credits') }}"><i class="fas fa-pencil-ruler">
                    </i> <span>Credits</span>
                </a>
            </li>
        </ul>

        <div class="hide-sidebar-mini mt-4 mb-4 p-3">
            <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div>
    </aside>
</div>
