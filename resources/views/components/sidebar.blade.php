<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.admin') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin <sup>admin</sup></div>

    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.admin') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Управление</span></a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('news.index') }}">
            <i class="fas fa-tachometer-alt"></i>
            <span>К постам</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Новости
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Управление статьями</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Управление категориями:</h6>
                <a class="collapse-item" @if(request()->RouteIs('admin.categories.*')) style="color:red;" @endif href="{{ route('admin.categories.index') }}">Категории</a>
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Управление новостями:</h6>
                    <a class="collapse-item" @if(request()->RouteIs('admin.news.*')) style="color: red;" @endif href=" {{ route('admin.news.index') }} ">Новости</a>
                    <a class="collapse-item" @if(request()->RouteIs('admin.parser.*')) style="color: red;" @endif href=" {{ route('admin.parser.index') }} ">URL новости</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
