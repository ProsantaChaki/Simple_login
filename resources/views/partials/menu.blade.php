<div class="sidebar">
    <nav class="sidebar-nav ps ps--active-y">

        <ul class="nav">
            <li class="nav-item">
                <a href="{{-- route("admin.home") --}}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt">

                    </i>
                    {{ trans('global.dashboard') }}
                </a>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle">
                    <i class="fas fa-users nav-icon">

                    </i>
                    {{ trans('global.admin-management') }}
                </a>
                <ul class="nav-dropdown-items" style="margin-left: 10px">
                    <li class="nav-item">
                        <a href="{{-- route("admin.permissions.index") --}}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                            <i class="fas fa-unlock-alt nav-icon">

                            </i>
                            {{ trans('global.permission.title') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{-- route("admin.roles.index") --}}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                            <i class="fas fa-briefcase nav-icon">

                            </i>
                            {{ trans('global.role.title') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.admin.index") }}" class="nav-link {{ request()->is('admin/admins') || request()->is('admin/admins/*') ? 'active' : '' }}">
                            <i class="fas fa-user nav-icon">

                            </i>
                            {{ trans('global.admins') }}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle">
                    <i class="fas fa-users nav-icon">

                    </i>
                    {{ trans('global.userManagement.title') }}
                </a>
                <ul class="nav-dropdown-items" style="margin-left: 10px">

                    <li class="nav-item">
                        <a href="{{ route("admin.user.index") }}" class="nav-link {{ request()->is('admin/users') || request()->is('admin/users/*') ? 'active' : '' }}">
                            <i class="fas fa-user nav-icon">

                            </i>
                            {{ trans('global.user.title') }}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link  nav-dropdown-toggle">
                    <i class="fas fa-users nav-icon">

                    </i>
                    {{ trans('global.postManagement.post') }}
                </a>
                <ul class="nav-dropdown-items" style="margin-left: 10px">
                    <li class="nav-item">
                        <a href="{{ route("admin.post.index") }}" class="nav-link {{ request()->is('admin/permissions') || request()->is('admin/permissions/*') ? 'active' : '' }}">
                            <i class="fas fa-unlock-alt nav-icon">

                            </i>
                            {{ trans('global.postManagement.all_post') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{-- route("admin.roles.index") --}}" class="nav-link {{ request()->is('admin/roles') || request()->is('admin/roles/*') ? 'active' : '' }}">
                            <i class="fas fa-briefcase nav-icon">

                            </i>
                            {{ trans('global.postManagement.new_post') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route("admin.admin.index") }}" class="nav-link {{ request()->is('admin/admins') || request()->is('admin/admins/*') ? 'active' : '' }}">
                            <i class="fas fa-user nav-icon">

                            </i>
                            {{ trans('global.postManagement.archive_post') }}
                        </a>
                    </li>
                </ul>
            </li>


            <li class="nav-item">
                <a href="{{-- route("admin.products.index") --}}" class="nav-link {{ request()->is('admin/products') || request()->is('admin/products/*') ? 'active' : '' }}">
                    <i class="fas fa-cogs nav-icon">

                    </i>
                    {{ trans('global.product.title') }}
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("logout.admin") }}" class="nav-link" >
                    <i class="nav-icon fas fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
        </ul>

        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; height: 869px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 415px;"></div>
        </div>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
