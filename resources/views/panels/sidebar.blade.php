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
                    <i class="d-none d-xl-block collapse-toggle-icon font-medium-4 text-primary" data-feather="disc"
                        data-ticon="disc"></i>
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

            @hasanyrole('superadmin')
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
            <!-- ---------------- -->
             <li class="navigation-header">
                <span> Dynamic Form </span>
            </li>
            <li
                class="nav-item nav-tour system-management {{ request()->is('dynamic*')  ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i data-feather="settings"></i>
                    <span class="menu-title text-truncate"> Dynamic Form </span>
                </a>
                <ul class="menu-content">
                    <li class="{{ in_array(request()->route()->getName(),['create-form'])? 'active': '' }}">
                        <a href="{{ route('create-form') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate"> Create Dynamic Form </span>
                        </a>
                    </li>
                    <li class="{{ in_array(request()->route()->getName(),['dynamic-form-list'])? 'active': '' }}">
                        <a href="{{ route('dynamic-form-list') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate"> List Dynamic Form </span>
                        </a>
                    </li>
                    <li class="{{ in_array(request()->route()->getName(),['listfillform'])? 'active': '' }}">
                        <a href="{{ route('listfillform') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate"> List Filled Form </span>
                        </a>
                    </li>
                </ul>

            </li>
            <!-- ---------------- -->
            <li class="navigation-header">
                <span> System Settings </span>
            </li>
            <li
                class="nav-item nav-tour system-management {{ request()->is('admin/settings*') || request()->is('admin/log*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i data-feather="settings"></i>
                    <span class="menu-title text-truncate"> Pengurusan Sistem </span>
                </a>
                <ul class="menu-content">
                    <li class="{{ in_array(request()->route()->getName(),['module.index'])? 'active': '' }}">
                        <a href="{{ route('module.index') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate"> Module Configuration </span>
                        </a>
                    </li>
                    <li class="{{ in_array(request()->route()->getName(),['settings.index'])? 'active': '' }}">
                        <a href="{{ route('settings.index') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate"> {{ __('msg.system_config') }} </span>
                        </a>
                    </li>
                    <li
                        class="{{ in_array(request()->route()->getName(),['admin.database_view.index'])? 'active': '' }}">
                        <a href="{{ route('admin.database_view.index') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate"> Database View </span>
                        </a>
                    </li>
                    <li
                        class="{{ in_array(request()->route()->getName(),['admin.cron_view.CronView'])? 'active': '' }}">
                        <a href="{{ route('admin.cron_view.CronView') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate"> Cron View </span>
                        </a>
                    </li>
                    <li class="{{ in_array(request()->route()->getName(),['admin.master*'])? 'active': '' }}">
                        <a href="#" class="d-flex align-items-center">
                            <i data-feather="folder"></i>
                            <span class="menu-title text-truncate"> Master Data </span>
                        </a>
                        <ul class="menu-content">
                            <li
                                class="{{ in_array(request()->route()->getName(),['admin.master_data.parameter'])? 'active': '' }}">
                                <a href="{{ route('admin.master_data.parameter') }}" class="d-flex align-items-center">
                                    <i data-feather="circle"></i>
                                    <span class="menu-title text-truncate">Parameter</span>
                                </a>
                            </li>
                            <li
                                class="{{ in_array(request()->route()->getName(),['admin.master_data.Runningnumber'])? 'active': '' }}">
                                <a href="{{ route('admin.master_data.Runningnumber') }}"
                                    class="d-flex align-items-center">
                                    <i data-feather="circle"></i>
                                    <span class="menu-title text-truncate">List of Running Number</span>
                                </a>
                            </li>
                        </ul>
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

            @hasanyrole('admin')
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
                <span> Dynamic Form </span>
            </li>
            <li
                class="nav-item nav-tour system-management {{ request()->is('dynamic*')  ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i data-feather="settings"></i>
                    <span class="menu-title text-truncate"> Dynamic Form </span>
                </a>
                <ul class="menu-content">
                    <li class="{{ in_array(request()->route()->getName(),['create-form'])? 'active': '' }}">
                        <a href="{{ route('create-form') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate"> Create Dynamic Form </span>
                        </a>
                    </li>
                    <li class="{{ in_array(request()->route()->getName(),['dynamic-form-list'])? 'active': '' }}">
                        <a href="{{ route('dynamic-form-list') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate"> List Dynamic Form </span>
                        </a>
                    </li>
                    <li class="{{ in_array(request()->route()->getName(),['listfillform'])? 'active': '' }}">
                        <a href="{{ route('listfillform') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate"> List Filled Form </span>
                        </a>
                    </li>
                </ul>

            </li>
            @endhasanyrole

            @hasanyrole('pengguna_luar')
            <li class="navigation-header">
                <span> Dynamic Form </span>
            </li>
            <li class="nav-item {{ request()->is('dynamic*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i data-feather="folder"></i>
                    <span class="menu-title text-truncate"> Dynamic Form </span>
                </a>
             
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('fillform') }}" class="nav-link">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate"> Fill Form </span>
                        </a>
                    </li>
                    <li class="{{ in_array(request()->route()->getName(),['listfillform'])? 'active': '' }}">
                        <a href="{{ route('listfillform') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate"> List Filled Form </span>
                        </a>
                    </li>
                </ul>
            </li>
            @endhasanyrole

            @hasanyrole('')
            @if (!in_array(env('APP_ENV'), ['production', 'staging']))
            <hr>
            <li class="navigation-header">
                <span>Documentation Side</span>
                <i data-feather="more-horizontal"></i>
            </li>
            @if (isset($menuData[0]))
            @foreach ($menuData[0]->menu as $menu)
            @if (isset($menu->navheader))
            <li class="navigation-header">
                <span>{{ __('locale.' . $menu->navheader) }}</span>
                <i data-feather="more-horizontal"></i>
            </li>
            @else
            {{-- Add Custom Class with nav-item --}}
            @php
            $custom_classes = '';
            if (isset($menu->classlist)) {
            $custom_classes = $menu->classlist;
            }
            @endphp
            <li class="nav-item {{ $custom_classes }} {{ Route::currentRouteName() === $menu->slug ? 'active' : '' }}">
                <a href="{{ isset($menu->url) ? url($menu->url) : 'javascript:void(0)' }}"
                    class="d-flex align-items-center" target="{{ isset($menu->newTab) ? '_blank' : '_self' }}">
                    <i data-feather="{{ $menu->icon }}"></i>
                    <span class="menu-title text-truncate">{{ __('locale.' . $menu->name) }}</span>
                    @if (isset($menu->badge))
                    <?php $badgeClasses = 'badge rounded-pill badge-light-primary ms-auto me-1'; ?>
                    <span class="{{ isset($menu->badgeClass) ? $menu->badgeClass : $badgeClasses }}">{{ $menu->badge
                        }}</span>
                    @endif
            </li>
            @endif
            @endforeach
            @endif
            @endif
            @endhasanyrole
        </ul>
    </div>
</div>
