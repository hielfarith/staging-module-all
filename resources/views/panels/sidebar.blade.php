@php
$configData = Helper::applClasses();
@endphp
<div class="main-menu menu-fixed {{ $configData['theme'] === 'dark' || $configData['theme'] === 'semi-dark' ? 'menu-dark' : 'menu-light' }} menu-accordion menu-shadow"
    data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <h2 class="brand-text">SPPIP</h2>
                </a>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pe-0" data-toggle="collapse">
                    <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                    <i class="d-none d-xl-block collapse-toggle-icon font-medium-4 text-primary" data-feather="disc" data-ticon="disc"></i>
                </a>
            </li>
        </ul>
    </div>

    <div class="shadow-bottom"></div>

    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item {{ in_array(request()->route()->getName(),['home'])? 'menu-open': '' }}">
                <a href="{{ route('home') }}" class="d-flex align-items-center">
                    <i data-feather="home"></i>
                    <span class="menu-title text-truncate">{{ __('msg.home') }} </span>
                </a>
            </li>

            @hasanyrole('superadmin|admin')
            <li class="navigation-header">
                <span> Pengurusan Instrumen </span>
            </li>
            <li class="nav-item {{ request()->is('pengurusan_instrumen*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i data-feather="folder"></i>
                    <span class="menu-title text-truncate"> Instrumen </span>
                </a>
                <ul class="nav">
                    <li class="nav-item">
                        <a href="{{ route('create-form') }}" class="nav-link">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate"> Tambah Instrumen </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('fillform') }}" class="nav-link">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate"> Senarai Instrumen </span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('listfillform') }}" class="nav-link">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate"> Jawab Instrumen </span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="navigation-header">
                <span> User Settings </span>
            </li>
            <li class="nav-item nav-tour user-settings {{ request()->is('admin/user*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i data-feather="user"></i>
                    <span class="menu-title text-truncate">
                        {{ __('msg.user_management') }}
                    </span>
                </a>
                <ul class="menu-content">
                    <li
                        class="nav-user-internal {{ in_array(request()->route()->getName(),['admin.internalUser'])? 'active': '' }}">
                        <a href="{{ route('admin.internalUser') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">
                                {{ __('msg.userinternal') }}
                            </span>
                        </a>
                    </li>
                    <li
                        class="nav-user-external {{ in_array(request()->route()->getName(),['admin.externalUser'])? 'active': '' }}">
                        <a href="{{ route('admin.externalUser') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">
                                Institusi Pendidikan
                            </span>
                        </a>
                    </li>
                    <li class="{{ in_array(request()->route()->getName(),['role.index'])? 'active': '' }}">
                        <a href="{{ route('role.index') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">
                                Pengurusan Peranan
                            </span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="navigation-header">
                <span> System Settings </span>
            </li>
            <li class="nav-item nav-tour system-management {{ request()->is('admin/settings*') || request()->is('admin/log*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i data-feather="settings"></i>
                    <span class="menu-title text-truncate"> Pengurusan Sistem </span>
                </a>
                <ul class="menu-content">
                    @if (\Composer\InstalledVersions::isInstalled('developer-unijaya/flow-management-function'))
                    <li class="{{ in_array(request()->route()->getName(),['module.index'])? 'active': '' }}">
                        <a href="{{ route('module.index') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate"> Module Configuration </span>
                        </a>
                    </li>
                    @endif
                    <li class="{{ in_array(request()->route()->getName(),['settings.index'])? 'active': '' }}">
                        <a href="{{ route('settings.index') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate"> {{ __('msg.system_config') }} </span>
                        </a>
                    </li>
                    <li class="{{ in_array(request()->route()->getName(),['admin-log-index'])? 'active': '' }}">
                        <a href="{{ route('admin-log-index') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate"> Audit Log </span>
                        </a>
                    </li>
                </ul>
            </li>
            @endhasanyrole
        </ul>
    </div>
</div>
