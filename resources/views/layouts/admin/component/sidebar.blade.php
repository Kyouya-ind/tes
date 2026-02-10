<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.home') }}" class="brand-link">
        <span class="brand-text font-weight-light">Aspirasi</span>
    </a>

    <!-- User Panel -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
        <div class="image">

        </div>
        <div class="info">
            <span class="d-block text-white font-weight-bold">
                {{ auth()->user()->username }}
            </span>
            <small class="text-muted">Admin</small>
        </div>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Search -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar"
                       type="search"
                       placeholder="Search"
                       aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column"
                data-widget="treeview"
                role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('admin.home') }}"
                       class="nav-link {{ request()->routeIs('admin.home') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Home</p>
                    </a>
                </li>



                <li class="nav-item">
                    <a href="{{ route('admin.kategori.index') }}"
                       class="nav-link {{ request()->routeIs('admin.kategori.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>Data Kategori</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.aspirasi.index') }}"
                       class="nav-link {{ request()->routeIs('admin.aspirasi.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>Data Aspirasi</p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
