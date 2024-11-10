<div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <a href="#" class="d-block"><b>User Name: </b>{{ ucfirst(Auth::user()->name) }}</a>
            <a href="#" class="d-block"><b>Position: </b>{{ Auth::user()->role->name }}</a>
        </div>
    </div>
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @if (checkPermission('backend.dasboard'))
                <li class="nav-item">
                    <a href="{{ route('backend.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p><b>Dashboard</b></p>
                    </a>
                </li>
            @endif
            @if (checkPermission('backend.banner.list'))
                <li class="nav-item">
                    <a href="{{ route('backend.banner.list') }}" class="nav-link">
                        <i class="nav-icon fa-regular fa-image"></i>
                        <p><b>Banner</b></p>
                    </a>
                </li>
            @endif
            @if (checkPermission('backend.customer.list'))
                <li class="nav-item">
                    <a href="{{ route('backend.customer.list') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-people-group"></i>
                        <p><b>Customer</b><span class="badge badge-danger right">New</span></p>
                    </a>
                </li>
            @endif
            @if (checkPermission('backend.category.list'))
                <li class="nav-item">
                    <a href="{{ route('backend.category.list') }}" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p><b>Category</b><span class="badge badge-info right">6</span></p>
                    </a>
                </li>
            @endif
            @if (checkPermission('backend.brand.list'))
                <li class="nav-item">
                    <a href="{{ route('backend.brand.list') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-flag"></i>
                        <p><b>Brand</b></p>
                    </a>
                </li>
            @endif
            @if (checkPermission('backend.product.list'))
                <li class="nav-item">
                    <a href="{{ route('backend.product.list') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-box"></i>
                        <p><b>Product</b></p>
                    </a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link">
                    <i class="nav-icon fa-solid fa-gear"></i>
                    <p>
                        <b>Settings</b>
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>SEO Setting</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('backend.website.list') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Website Setting</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('backend.page.list') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Page Create</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>SMTP Setting</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Payment Gateway</p>
                        </a>
                    </li>
                </ul>
            </li>
            @if (checkPermission('backend.role.list'))
                <li class="nav-item">
                    <a href="{{ route('backend.role.list') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-user"></i>
                        <p><b>Role</b></p>
                    </a>
                </li>
            @endif
            @if (checkPermission('backend.user.list'))
                <li class="nav-item">
                    <a href="{{ route('backend.user.list') }}" class="nav-link">
                        <i class="nav-icon fa-solid fa-users"></i>
                        <p><b>User</b></p>
                    </a>
                </li>
            @endif
        </ul>
    </nav>
</div>
