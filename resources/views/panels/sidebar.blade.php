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
                <span> Pengurusan Modul</span>
            </li>
            <li class="nav-item {{ request()->is('modul_instrumen*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i data-feather="folder"></i>
                    <span class="menu-title text-truncate"> Modul/ Instrumen </span>
                </a>
                <ul class="nav">
                    <li class="nav-item {{ request()->is('modul_instrumen*') ? 'menu-open' : '' }}">
                        <a href="{{ route('ikeps_baru') }}" class="nav-link">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate"> Instrument I-KePS </span>
                        </a>

                        <ul class="nav">
                            <li class="{{ in_array(request()->route()->getName(),['ikeps_baru'])? 'active': '' }}">
                                <a href="{{ route('ikeps_baru') }}" class="nav-link">
                                    <i data-feather="circle"></i>
                                    <span class="menu-title text-truncate"> Pengisian I-KePS </span>
                                </a>
                            </li>
                            <li class="{{ in_array(request()->route()->getName(),['ringkasan_ikeps'])? 'active': '' }}">
                                <a href="{{ route('ringkasan_ikeps') }}" class="nav-link">
                                    <i data-feather="circle"></i>
                                    <span class="menu-title text-truncate"> Ringkasan Maklumat </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li class="navigation-header">
                <span> Pengurusan Instrumen</span>
            </li>
            <li class="nav-item {{ request()->is('pengurusan_instrumen*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i data-feather="folder"></i>
                    <span class="menu-title text-truncate"> Instrumen </span>
                </a>
                <ul class="nav">

                    <li class="{{ in_array(request()->route()->getName(),['admin.instrumen.instrumenskpak-list'])? 'active': '' }}">
                        <a href="{{ route('admin.instrumen.instrumenskpak-list') }}" class="nav-link">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate"> List Instrumen New</span>
                        </a>
                    </li>

                    <!--  <li class="{{ in_array(request()->route()->getName(),['admin.instrumen.tetapan-aspek-list'])? 'active': '' }}">
                        <a href="{{ route('admin.instrumen.tetapan-aspek-list') }}" class="nav-link">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate"> Senarai Tetapan Aspek</span>
                        </a>
                    </li>

                    <li class="{{ in_array(request()->route()->getName(),['admin.instrumen.tetapan-aspek-ikeps-list'])? 'active': '' }}">
                        <a href="{{ route('admin.instrumen.tetapan-aspek-ikeps-list') }}" class="nav-link">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate"> Senarai Tetapan Aspek Ikeps</span>
                        </a>
                    </li> -->


                    <li class="{{ in_array(request()->route()->getName(),['admin.instrumen.tetapan-aspek-sub-list'])? 'active': '' }}">
                        <a href="{{ route('admin.instrumen.tetapan-aspek-sub-list') }}" class="nav-link">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate"> Senarai Tetapan Sub Aspek</span>
                        </a>
                    </li>

                    <li class="{{ in_array(request()->route()->getName(),['admin.instrumen.tetapan-item-list'])? 'active': '' }}">
                        <a href="{{ route('admin.instrumen.tetapan-item-list') }}" class="nav-link">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate"> Senarai Tetapan Item</span>
                        </a>
                    </li>

                    <li class="{{ in_array(request()->route()->getName(),['admin.instrumen.tetapan-item-sub-list'])? 'active': '' }}">
                        <a href="{{ route('admin.instrumen.tetapan-item-sub-list') }}" class="nav-link">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate"> Senarai Tetapan Item Spks</span>
                        </a>
                    </li>

                    <li class="{{ in_array(request()->route()->getName(),['instrumen_baru'])? 'active': '' }}">
                        <a href="{{ route('instrumen_baru') }}" class="nav-link">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate"> Tambah Instrumen </span>
                        </a>
                    </li>
                    <li class="{{ in_array(request()->route()->getName(),['show_all_forms'])? 'active': '' }}">
                        <a href="{{ route('show_all_forms') }}" class="nav-link">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate"> Senarai Instrumen </span>
                        </a>
                    </li>

                    <li class="{{ in_array(request()->route()->getName(),['senarai_instrumen_dijawab'])? 'active': '' }}">
                        <a href="{{ route('senarai_instrumen_dijawab') }}" class="nav-link">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate"> Instrumen Dijawab </span>
                        </a>
                    </li>
                    <li class="{{ in_array(request()->route()->getName(),['pilih_instrumen'])? 'active': '' }}">
                        <a href="{{ route('pilih_instrumen') }}" class="nav-link">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate"> Jawab Instrumen </span>
                        </a>
                    </li>
                </ul>
            </li>

            <!-- // new menu -->

<!-- 
            <li class="navigation-header">
                <span> SKIPS</span>
            </li>
             <li class="nav-item {{ request()->is('admin/internal*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i data-feather="folder"></i>
                    <span class="menu-title text-truncate"> SKIPS </span>
                </a>
                <ul class="nav">


                </ul>
            </li> -->

            <li class="navigation-header">
                <span>  iKEPS</span>
            </li>
             <li class="nav-item {{ request()->is('admin/ikeps*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i data-feather="folder"></i>
                    <span class="menu-title text-truncate"> iKEPS </span>
                </a>
                <ul class="nav">
                       <li class="{{ in_array(request()->route()->getName(),['admin.instrumen.tetapan-aspek-list'])? 'active': '' }}">
                        <a href="{{ route('admin.instrumen.tetapan-aspek-list') }}" class="nav-link">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate"> Senarai Tetapan Aspek</span>
                        </a>
                    </li>

                    <li class="{{ in_array(request()->route()->getName(),['admin.instrumen.tetapan-aspek-ikeps-list'])? 'active': '' }}">
                        <a href="{{ route('admin.instrumen.tetapan-aspek-ikeps-list') }}" class="nav-link">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate"> Senarai Tetapan Aspek Ikeps</span>
                        </a>
                    </li>

                     <li class="{{ in_array(request()->route()->getName(),['admin.instrumen.tetapan-tarikh-list'])? 'active': '' }}">
                        <a href="{{ route('admin.instrumen.tetapan-tarikh-list') }}" class="nav-link">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate"> Senarai Tetapan Tarikh Instrumen</span>
                        </a>
                    </li>


                </ul>
            </li>

      <!--       <li class="navigation-header">
                <span> SKPAK</span>
            </li>
             <li class="nav-item {{ request()->is('admin/internal*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i data-feather="folder"></i>
                    <span class="menu-title text-truncate"> SKPAK </span>
                </a>
                <ul class="nav">


                </ul>
            </li>

            <li class="navigation-header">
                <span> SPKS</span>
            </li>
             <li class="nav-item {{ request()->is('admin/internal*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i data-feather="folder"></i>
                    <span class="menu-title text-truncate"> SPKS </span>
                </a>
                <ul class="nav">


                </ul>
            </li> -->

            <!-- --end new menu-->
            <!-- // pengguna menu // -->
            <li class="navigation-header">
                <span> Pengurusan Pengguna</span>
            </li>
            <li class="nav-item {{ request()->is('admin/internal*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i data-feather="folder"></i>
                    <span class="menu-title text-truncate"> Senarai Pengguna </span>
                </a>
                <ul class="nav">

                    <li class="{{ in_array(request()->route()->getName(),['admin.internal.jurulatihlist'])? 'active': '' }}">
                        <a href="{{ route('admin.internal.jurulatihlist') }}" class="nav-link">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate"> Jurulatih </span>
                        </a>
                    </li>
                    <li class="{{ in_array(request()->route()->getName(),['admin.internal.penggunalist'])? 'active': '' }}">
                        <a href="{{ route('admin.internal.penggunalist') }}" class="nav-link">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate"> Ketua Taska </span>
                        </a>
                    </li>

                    <li class="{{ in_array(request()->route()->getName(),['admin.internal.penilailist'])? 'active': '' }}">
                        <a href="{{ route('admin.internal.penilailist') }}" class="nav-link">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate"> Panel Penilai </span>
                        </a>
                    </li>

                    <li class="{{ in_array(request()->route()->getName(),['admin.internal.agensilist'])? 'active': '' }}">
                        <a href="{{ route('admin.internal.agensilist') }}" class="nav-link">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate"> Ketua Agensi </span>
                        </a>
                    </li>

                     <li class="{{ in_array(request()->route()->getName(),['admin.internal.jawatankuasalist'])? 'active': '' }}">
                        <a href="{{ route('admin.internal.jawatankuasalist') }}" class="nav-link">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate"> Ahli Jawatan Kerja </span>
                        </a>
                    </li>
                     <li class="{{ in_array(request()->route()->getName(),['admin.internal.jawatankuasatertinggilist'])? 'active': '' }}">
                        <a href="{{ route('admin.internal.jawatankuasatertinggilist') }}" class="nav-link">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate"> Ahli Jawatan Tertinggi </span>
                        </a>
                    </li>

                      <li class="{{ in_array(request()->route()->getName(),['admin.internal.pengetualist'])? 'active': '' }}">
                        <a href="{{ route('admin.internal.pengetualist') }}" class="nav-link">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate"> Pengerusi </span>
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
                    <li class="nav-user-internal {{ in_array(request()->route()->getName(),['admin.internalUser'])? 'active': '' }}">
                        <a href="{{ route('admin.internalUser') }}" class="d-flex align-items-center">
                            <i data-feather="circle"></i>
                            <span class="menu-title text-truncate">
                                {{ __('msg.userinternal') }}
                            </span>
                        </a>
                    </li>
                    <li class="nav-user-external {{ in_array(request()->route()->getName(),['admin.externalUser'])? 'active': '' }}">
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

          <!--    <li class="navigation-header">
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
 -->
            <li class="navigation-header">
                <span> System Settings </span>
            </li>
            <li class="nav-item nav-tour system-management {{ request()->is('admin/settings*') || request()->is('admin/log*') ? 'menu-open' : '' }}">
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
