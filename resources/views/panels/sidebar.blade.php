@php
$configData = Helper::applClasses();
@endphp

<div class="main-menu menu-fixed {{ $configData['theme'] === 'dark' || $configData['theme'] === 'semi-dark' ? 'menu-dark' : 'menu-light' }} menu-accordion menu-shadow"
    data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <span class="brand-logo">
                        <img src="{{ asset('images/logo/jata_negara.png') }}" class="brand-image img-circle elevation-3"
                            style="opacity: .8">
                    </span>
                    <h2 class="brand-text text-white">SPPIP</h2>
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

    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item {{ in_array(request()->route()->getName(),['home'])? 'active': '' }}">
                <a href="{{ route('home') }}" class="nav-link">
                    <i data-feather="home"></i>
                    <span class="menu-title text-truncate text-wrap">{{ __('msg.home') }} </span>
                </a>
            </li>
            <li class="nav-item {{ in_array(request()->route()->getName(),['#'])? 'active': '' }}">
                <a href="#" class="nav-link">
                    {{-- <i data-feather="home"></i> --}}
                    <span class="menu-title text-truncate text-wrap">Announcement</span>
                </a>
            </li>
            <li class="nav-item {{ in_array(request()->route()->getName(), ['ikeps.dashboard_ikeps']) ? 'active' : '' }}">
                <a href="{{ route('ikeps.dashboard_ikeps') }}" class="nav-link">
                    {{-- <i data-feather="home"></i> --}}
                    <span class="menu-title text-truncate text-wrap">Dashboard I-KePS</span>
                </a>
            </li>
            {{-- <li class="nav-item {{ in_array(request()->route()->getName(), ['skips.dashboard_skips']) ? 'active' : '' }}">
                <a href="{{ route('skips.dashboard_skips') }}" class="nav-link">
                    <span class="menu-title text-truncate text-wrap">Dashboard SKIPS</span>
                </a>
            </li> --}}

            @hasanyrole('superadmin|admin')
            <li class="navigation-header">
                <span> Pengurusan Modul </span>
            </li>
            <li class="nav-item {{ request()->is('modul_instrumen*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i data-feather="folder"></i>
                    <span class="menu-title text-truncate text-wrap"> Modul </span>
                </a>
                <ul class="nav">
                    <li class="nav-item {{ request()->is('modul_instrumen*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <span class="menu-title text-truncate text-wrap">
                                Instrument I-KePS
                            </span>
                        </a>

                        <ul class="nav">
                            <li class="nav-item {{ in_array(request()->route()->getName(), ['ikeps.ikeps_baru']) ? 'active' : '' }}">
                                <a href="{{ route('ikeps.ikeps_baru') }}" class="nav-link">
                                    <span class="menu-title text-truncate text-wrap">
                                        Pengisian I-KePS
                                    </span>
                                </a>
                            </li>

                            <li class="nav-item {{ in_array(request()->route()->getName(), ['ikeps.ringkasan_ikeps']) ? 'active' : '' }}">
                                <a href="{{ route('ikeps.ringkasan_ikeps') }}" class="nav-link">
                                    <span class="menu-title text-truncate text-wrap">
                                        Ringkasan Maklumat
                                    </span>
                                </a>
                            </li>

                            <li class="nav-item {{ in_array(request()->route()->getName(), ['ikeps.laporan_ikeps']) ? 'active' : '' }}">
                                <a href="{{ route('ikeps.laporan_ikeps') }}" class="nav-link">
                                    <span class="menu-title text-truncate text-wrap">
                                        Ringkasan Maklumat (BPSUKAN)
                                    </span>
                                </a>
                            </li>

                            <li class="nav-item {{ in_array(request()->route()->getName(), ['ikeps.pemantauan_ikeps']) ? 'active' : '' }}">
                                <a href="{{ route('ikeps.pemantauan_ikeps') }}" class="nav-link">
                                    <span class="menu-title text-truncate text-wrap">
                                        Pemantauan Pengisian
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item {{ request()->is('modul_instrumen*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <span class="menu-title text-truncate text-wrap">
                                Instrument SKIPS
                            </span>
                        </a>

                        <ul class="nav">
                           <!--  <li class="nav-item {{ in_array(request()->route()->getName(), ['skips.skips_baru']) ? 'active' : '' }}">
                                <a href="{{ route('skips.skips_baru') }}" class="nav-link">
                                    <span class="menu-title text-truncate text-wrap">
                                        Pengisian SKIPS
                                    </span>
                                </a>
                            </li> -->

                            <li class="nav-item {{ in_array(request()->route()->getName(), ['skips.ringkasan_skips']) ? 'active' : '' }}">
                                <a href="{{ route('skips.ringkasan_skips') }}" class="nav-link">
                                    <span class="menu-title text-truncate text-wrap">
                                        Ringkasan Maklumat
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>

            <!-- <li class="navigation-header">
                <span> Pengurusan Instrumen</span>
            </li>
            <li class="nav-item {{ request()->is('pengurusan_instrumen*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i data-feather="folder"></i>
                    <span class="menu-title text-truncate text-wrap"> Instrumen </span>
                </a>
                <ul class="nav"> -->

                    <!--  <li class="nav-item {{ in_array(request()->route()->getName(),['admin.instrumen.tetapan-aspek-list'])? 'active': '' }}">
                        <a href="{{ route('admin.instrumen.tetapan-aspek-list') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap"> Senarai Tetapan Aspek</span>
                        </a>
                    </li>

                    <li class="nav-item {{ in_array(request()->route()->getName(),['admin.instrumen.tetapan-aspek-ikeps-list'])? 'active': '' }}">
                        <a href="{{ route('admin.instrumen.tetapan-aspek-ikeps-list') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap"> Senarai Tetapan Aspek Ikeps</span>
                        </a>
                    </li> -->

<!--
                    <li class="nav-item {{ in_array(request()->route()->getName(),['admin.instrumen.tetapan-aspek-sub-list'])? 'active': '' }}">
                        <a href="{{ route('admin.instrumen.tetapan-aspek-sub-list') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap"> Senarai Tetapan Sub Aspek</span>
                        </a>
                    </li>

                    <li class="nav-item {{ in_array(request()->route()->getName(),['admin.instrumen.tetapan-item-list'])? 'active': '' }}">
                        <a href="{{ route('admin.instrumen.tetapan-item-list') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap"> Senarai Tetapan Item</span>
                        </a>
                    </li>

                    <li class="nav-item {{ in_array(request()->route()->getName(),['admin.instrumen.tetapan-item-sub-list'])? 'active': '' }}">
                        <a href="{{ route('admin.instrumen.tetapan-item-sub-list') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap"> Senarai Tetapan Item SKPS</span>
                        </a>
                    </li>

                    <li class="nav-item {{ in_array(request()->route()->getName(),['instrumen_baru'])? 'active': '' }}">
                        <a href="{{ route('instrumen_baru') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap"> Tambah Instrumen </span>
                        </a>
                    </li>


                    <li class="nav-item {{ in_array(request()->route()->getName(),['senarai_instrumen_dijawab'])? 'active': '' }}">
                        <a href="{{ route('senarai_instrumen_dijawab') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap"> Instrumen Dijawab </span>
                        </a>
                    </li>
                    <li class="nav-item {{ in_array(request()->route()->getName(),['pilih_instrumen'])? 'active': '' }}">
                        <a href="{{ route('pilih_instrumen') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap"> Jawab Instrumen </span>
                        </a>
                    </li>
                </ul>
            </li> -->

            <!-- <li class="navigation-header">
                <span> SKIPS</span>
            </li>
             <li class="nav-item {{ request()->is('admin/internal*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i data-feather="folder"></i>
                    <span class="menu-title text-truncate text-wrap"> SKIPS </span>
                </a>
                <ul class="nav">


                </ul>
            </li> -->

            <li class="navigation-header">
                <span>  Modul I-KePS </span>
            </li>
             <li class="nav-item">
                <a href="#" class="nav-link">
                    <i data-feather="folder"></i>
                    <span class="menu-title text-truncate text-wrap"> Pengurusan Instrumen I-keps </span>
                </a>
                <ul class="nav">

                    <li class="nav-item {{ in_array(request()->route()->getName(),['admin.instrumen.instrumenskpak-list'])? 'active': '' }}">
                        <a href="{{ route('admin.instrumen.instrumenskpak-list') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap">Instrumen Baru</span>
                        </a>
                    </li>

                     <li class="nav-item {{ in_array(request()->route()->getName(),['show_all_forms'])? 'active': '' }}">
                        <a href="{{ route('show_all_forms') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap"> Senarai Instrumen </span>
                        </a>
                    </li>

                    <li class="nav-item {{ in_array(request()->route()->getName(),['admin.instrumen.senarai-sedia-ada'])? 'active': '' }}">
                        <a href="{{ route('admin.instrumen.senarai-sedia-ada') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap"> Senarai Sedia Ada </span>
                        </a>
                    </li>

                    <!--    <li class="nav-item {{ in_array(request()->route()->getName(),['admin.instrumen.tetapan-aspek-list'])? 'active': '' }}">
                        <a href="{{ route('admin.instrumen.tetapan-aspek-list') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap"> Pengurusan Aspek </span>
                        </a>
                    </li>

                    <li class="nav-item {{ in_array(request()->route()->getName(),['admin.instrumen.tetapan-aspek-ikeps-list'])? 'active': '' }}">
                        <a href="{{ route('admin.instrumen.tetapan-aspek-ikeps-list') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap"> Pengurusan Aspek I-KePS </span>
                        </a>
                    </li>

                     <li class="nav-item {{ in_array(request()->route()->getName(),['admin.instrumen.tetapan-tarikh-list'])? 'active': '' }}">
                        <a href="{{ route('admin.instrumen.tetapan-tarikh-list') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap"> Pengurusan Tarikh Instrumen </span>
                        </a>
                    </li> -->


                </ul>
            </li>

            <li class="navigation-header">
                <span>  SKIPS </span>
            </li>
             <li class="nav-item ">
                <a href="#" class="nav-link">
                    <i data-feather="folder"></i>
                    <span class="menu-title text-truncate text-wrap"> SKIPS </span>
                </a>
                <ul class="nav">

                    <li class="nav-item ">
                        <a href="" class="nav-link">
                            <span class="menu-title text-truncate text-wrap">Pengumuman</span>
                        </a>
                    </li>


                    

                    <!-- <li class="nav-item ">
                        <a href="" class="nav-link">
                            <span class="menu-title text-truncate text-wrap">Modul Pengisian Data Instrumen</span>
                        </a>
                    </li> -->
                    <li class="nav-item {{ in_array(request()->route()->getName(), ['skips.skips_baru']) ? 'active' : '' }}">
                        <a href="{{ route('skips.skips_baru') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap">
                                Modul Pengisian Data Instrumen
                            </span>
                        </a>
                    </li>

                    <!--  -->

                    <li class="nav-item {{ in_array(request()->route()->getName(), ['skips.senarai-skips-institusi']) ? 'active' : '' }}">
                        <a href="{{ route('skips.senarai-skips-institusi') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap">
                                Senarai Skips
                            </span>
                        </a>
                    </li>


                    <!-- <li class="nav-item {{ in_array(request()->route()->getName(), ['skips.verfikasi-skips']) ? 'active' : '' }}">
                        <a href="{{ route('skips.verfikasi-skips') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap">
                                Modul Verifikasi Data Instrumen
                            </span>
                        </a>
                    </li>

                    <li class="nav-item {{ in_array(request()->route()->getName(), ['skips.validasi-skips']) ? 'active' : '' }}">
                        <a href="{{ route('skips.validasi-skips') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap">Modul Validasi Data Instrumen</span>
                        </a>
                    </li> -->

                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <span class="menu-title text-truncate text-wrap">Modul Pelaporan Penarafan</span>
                        </a>
                    </li>

 
                    <li class="nav-item {{ in_array(request()->route()->getName(), ['skips.dashboard_skips']) ? 'active' : '' }}">
                        <a href="{{ route('skips.dashboard_skips') }}" class="nav-link">
                            <!-- {{-- <i data-feather="home"></i> --}} -->
                            <span class="menu-title text-truncate text-wrap">Modul Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item {{ in_array(request()->route()->getName(),['admin.instrumen.senarai-skips'])? 'active': '' }}">
                        <a href="{{ route('admin.instrumen.senarai-skips') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap">Modul Konfigurasi Instrumen</span>
                        </a>
                    </li>

                    <li class="nav-item {{ in_array(request()->route()->getName(),['skips.senarai_institusi'])? 'active': '' }}">
                        <a href="{{ route('skips.senarai_institusi') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap">Modul Tambah/Kemaskini Institusi Pendidikan</span>
                        </a>
                    </li>


                    <li class="nav-item {{ in_array(request()->route()->getName(),['skips.kemaskini-profil'])? 'active': '' }}">
                        <a href="{{ route('skips.kemaskini-profil') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap">Modul Kemaskini Profil Pengguna</span>
                        </a>
                    </li>

                 <!--    {{-- <li class="nav-item">
                        <a href="" class="nav-link">
                            <span class="menu-title text-truncate text-wrap">Modul Notifikasi</span>
                        </a>
                    </li> --}} -->

                </ul>
            </li>

            <li class="navigation-header">
                <span>  SKPAK </span>
            </li>
             <li class="nav-item ">
                <a href="#" class="nav-link">
                    <i data-feather="folder"></i>
                    <span class="menu-title text-truncate text-wrap"> SKPAK </span>
                </a>
                <ul class="nav">
                    <li class="nav-item ">
                        <a href="" class="nav-link">
                            <span class="menu-title text-truncate text-wrap">Pengumuman</span>
                        </a>
                    </li>

                    <li class="nav-item {{ in_array(request()->route()->getName(), ['skpak.skpak_baru']) ? 'active' : '' }}">
                        <a href="{{ route('skpak.skpak_baru') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap">
                                Modul Pengisian Data Instrumen
                            </span>
                        </a>
                    </li>

                    <li class="nav-item {{ in_array(request()->route()->getName(), ['#']) ? 'active' : '' }}">
                        <a href="#" class="nav-link">
                            <span class="menu-title text-truncate text-wrap">
                                Modul Verifikasi Data Instrumen
                            </span>
                        </a>
                    </li>

                    <li class="nav-item {{ in_array(request()->route()->getName(), ['#']) ? 'active' : '' }}">
                        <a href="#" class="nav-link">
                            <span class="menu-title text-truncate text-wrap">Modul Validasi Data Instrumen</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <span class="menu-title text-truncate text-wrap">Modul Pelaporan Data Penilaian</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <span class="menu-title text-truncate text-wrap">Modul Pelaporan Penarafan</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <span class="menu-title text-truncate text-wrap">Modul Muat Turun Data Penilaian</span>
                        </a>
                    </li>

                    <li class="nav-item {{ in_array(request()->route()->getName(), ['#']) ? 'active' : '' }}">
                        <a href="#" class="nav-link">
                            <span class="menu-title text-truncate text-wrap">Modul Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item {{ in_array(request()->route()->getName(),['admin.instrumen.senarai-skips'])? 'active': '' }}">
                        <a href="{{ route('admin.instrumen.senarai-skips') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap">Modul Konfigurasi Instrumen</span>
                        </a>
                    </li>

                    <li class="nav-item {{ in_array(request()->route()->getName(),['#'])? 'active': '' }}">
                        <a href="#" class="nav-link">
                            <span class="menu-title text-truncate text-wrap">Modul Tambah/Kemaskini Institusi Pendidikan</span>
                        </a>
                    </li>


                    <li class="nav-item {{ in_array(request()->route()->getName(),['#'])? 'active': '' }}">
                        <a href="#" class="nav-link">
                            <span class="menu-title text-truncate text-wrap">Modul Kemaskini Profil Pengguna</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="" class="nav-link">
                            <span class="menu-title text-truncate text-wrap">Modul Notifikasi</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="navigation-header">
                <span> SPKS</span>
            </li>
             <li class="nav-item {{ request()->is('admin/internal*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i data-feather="folder"></i>
                    <span class="menu-title text-truncate text-wrap"> SPKS </span>
                </a>
                <ul class="nav">


                </ul>
            </li> 

            <!-- --end new menu-->
            <!-- // pengguna menu // -->
            <li class="navigation-header">
                <span> Pengurusan Pengguna</span>
            </li>
            <li class="nav-item {{ request()->is('admin/internal*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i data-feather="folder"></i>
                    <span class="menu-title text-truncate text-wrap"> Senarai Pengguna </span>
                </a>
                <ul class="nav">

                    <li class="nav-item {{ in_array(request()->route()->getName(),['admin.internal.jurulatihlist'])? 'active': '' }}">
                        <a href="{{ route('admin.internal.jurulatihlist') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap"> Jurulatih </span>
                        </a>
                    </li>
                    <li class="nav-item {{ in_array(request()->route()->getName(),['admin.internal.penggunalist'])? 'active': '' }}">
                        <a href="{{ route('admin.internal.penggunalist') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap"> Ketua Taska </span>
                        </a>
                    </li>

                    <li class="nav-item {{ in_array(request()->route()->getName(),['admin.internal.penilailist'])? 'active': '' }}">
                        <a href="{{ route('admin.internal.penilailist') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap"> Panel Penilai </span>
                        </a>
                    </li>

                    <li class="nav-item {{ in_array(request()->route()->getName(),['admin.internal.agensilist'])? 'active': '' }}">
                        <a href="{{ route('admin.internal.agensilist') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap"> Ketua Agensi </span>
                        </a>
                    </li>

                     <li class="nav-item {{ in_array(request()->route()->getName(),['admin.internal.jawatankuasalist'])? 'active': '' }}">
                        <a href="{{ route('admin.internal.jawatankuasalist') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap"> Ahli Jawatan Kerja </span>
                        </a>
                    </li>
                     <li class="nav-item {{ in_array(request()->route()->getName(),['admin.internal.jawatankuasatertinggilist'])? 'active': '' }}">
                        <a href="{{ route('admin.internal.jawatankuasatertinggilist') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap"> Ahli Jawatan Tertinggi </span>
                        </a>
                    </li>

                      <li class="nav-item {{ in_array(request()->route()->getName(),['admin.internal.pengetualist'])? 'active': '' }}">
                        <a href="{{ route('admin.internal.pengetualist') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap"> Pengerusi </span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="navigation-header">
                <span> User Settings </span>
            </li>
            <li class="nav-item {{ request()->is('admin/user*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i data-feather="user"></i>
                    <span class="menu-title text-truncate text-wrap">
                        {{ __('msg.user_management') }}
                    </span>
                </a>
                <ul class="nav">
                    <li class="nav-user-internal nav-item {{ in_array(request()->route()->getName(),['admin.internalUser'])? 'active': '' }}">
                        <a href="{{ route('admin.internalUser') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap">
                                {{ __('msg.userinternal') }}
                            </span>
                        </a>
                    </li>
                    <li class="nav-user-external nav-item {{ in_array(request()->route()->getName(),['admin.externalUser'])? 'active': '' }}">
                        <a href="{{ route('admin.externalUser') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap">
                                Institusi Pendidikan
                            </span>
                        </a>
                    </li>
                    <li class="nav-item {{ in_array(request()->route()->getName(),['role.index'])? 'active': '' }}">
                        <a href="{{ route('role.index') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap">
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
                    <span class="menu-title text-truncate text-wrap"> Dynamic Form </span>
                </a>
                <ul class="menu-content">
                    <li class="nav-item {{ in_array(request()->route()->getName(),['create-form'])? 'active': '' }}">
                        <a href="{{ route('create-form') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap"> Create Dynamic Form </span>
                        </a>
                    </li>
                    <li class="nav-item {{ in_array(request()->route()->getName(),['dynamic-form-list'])? 'active': '' }}">
                        <a href="{{ route('dynamic-form-list') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap"> List Dynamic Form </span>
                        </a>
                    </li>
                    <li class="nav-item {{ in_array(request()->route()->getName(),['listfillform'])? 'active': '' }}">
                        <a href="{{ route('listfillform') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap"> List Filled Form </span>
                        </a>
                    </li>
                </ul>

            </li>
 -->
            <li class="navigation-header">
                <span> Pengurusan Sistem</span>
            </li>
            <li class="nav-item {{ in_array(request()->route()->getName(),['module.index'])? 'active': '' }}">
                <a href="{{ route('module.index') }}" class="nav-link">
                    <span class="menu-title text-truncate text-wrap"> Module Configuration </span>
                </a>
            </li>
            @endhasanyrole

            @hasanyrole('jabatan_pendidikan_negeri')

                <li class="navigation-header">
                <span> Pengurusan Pengguna</span>
            </li>
            <li class="nav-item {{ request()->is('admin/internal*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i data-feather="folder"></i>
                    <span class="menu-title text-truncate text-wrap"> Senarai Pengguna </span>
                </a>
                <ul class="nav">

                    <li class="nav-item {{ in_array(request()->route()->getName(),['admin.internal.jurulatihlist'])? 'active': '' }}">
                        <a href="{{ route('admin.internal.jurulatihlist') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap"> Jurulatih </span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="navigation-header">
                <span>  Modul I-KePS </span>
            </li>
             <li class="nav-item {{ request()->is('admin/ikeps*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i data-feather="folder"></i>
                    <span class="menu-title text-truncate text-wrap"> Pengurusan Instrumen </span>
                </a>
                <ul class="nav">

                     <li class="nav-item {{ in_array(request()->route()->getName(),['show_all_forms'])? 'active': '' }}">
                        <a href="{{ route('show_all_forms') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap"> Senarai Instrumen </span>
                        </a>
                    </li>


                    <li class="nav-item {{ in_array(request()->route()->getName(),['admin.instrumen.senarai-sedia-ada'])? 'active': '' }}">
                        <a href="{{ route('admin.instrumen.senarai-sedia-ada') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap"> Konfigurasi Instrumen Sedia Ada </span>
                        </a>
                    </li>

                    <li class="nav-item {{ in_array(request()->route()->getName(),['admin.instrumen.instrumenskpak-list'])? 'active': '' }}">
                        <a href="{{ route('admin.instrumen.instrumenskpak-list') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap">Konfigurasi Instrumen Baru</span>
                        </a>
                    </li>


                    <li class="nav-item {{ in_array(request()->route()->getName(),['module.index'])? 'active': '' }}">
                        <a href="{{ route('module.index') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap"> Pengurusan Flow Instrumen </span>
                        </a>
                    </li>

                    <!--    <li class="nav-item {{ in_array(request()->route()->getName(),['admin.instrumen.tetapan-aspek-list'])? 'active': '' }}">
                        <a href="{{ route('admin.instrumen.tetapan-aspek-list') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap"> Pengurusan Aspek </span>
                        </a>
                    </li>

                    <li class="nav-item {{ in_array(request()->route()->getName(),['admin.instrumen.tetapan-aspek-ikeps-list'])? 'active': '' }}">
                        <a href="{{ route('admin.instrumen.tetapan-aspek-ikeps-list') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap"> Pengurusan Aspek I-KePS </span>
                        </a>
                    </li>

                     <li class="nav-item {{ in_array(request()->route()->getName(),['admin.instrumen.tetapan-tarikh-list'])? 'active': '' }}">
                        <a href="{{ route('admin.instrumen.tetapan-tarikh-list') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap"> Pengurusan Tarikh Instrumen </span>
                        </a>
                    </li> -->


                </ul>
            </li>
            @endhasanyrole
            <!-- pentadbir role start -->
            @hasanyrole('pentadbir_instrumen')
            <li class="navigation-header">
                <span>  Modul I-KePS </span>
            </li>
             <li class="nav-item {{ request()->is('admin/ikeps*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i data-feather="folder"></i>
                    <span class="menu-title text-truncate text-wrap"> Pengurusan Instrumen I-keps </span>
                </a>
                <ul class="nav">

                    <li class="nav-item {{ in_array(request()->route()->getName(),['admin.instrumen.instrumenskpak-list'])? 'active': '' }}">
                        <a href="{{ route('admin.instrumen.instrumenskpak-list') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap">Instrumen Baru</span>
                        </a>
                    </li>

                    <li class="nav-item {{ in_array(request()->route()->getName(),['show_all_forms'])? 'active': '' }}">
                        <a href="{{ route('show_all_forms') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap"> Senarai Instrumen </span>
                        </a>
                    </li>

                    <li class="nav-item {{ in_array(request()->route()->getName(),['admin.instrumen.senarai-sedia-ada'])? 'active': '' }}">
                        <a href="{{ route('admin.instrumen.senarai-sedia-ada') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap"> Senarai Sedia Ada </span>
                        </a>
                    </li>

                    <li class="nav-item {{ in_array(request()->route()->getName(),['admin.instrumen.senarai-skips'])? 'active': '' }}">
                        <a href="{{ route('admin.instrumen.senarai-skips') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap"> Senarai Skips </span>
                        </a>
                    </li>
                </ul>
            </li>
            @endhasanyrole

            @hasanyrole('setiausaha_sukan|guru_sekolah')
            <li class="navigation-header">
                <span> Pengurusan Instrumen</span>
            </li>
            <li class="nav-item {{ request()->is('pengurusan_instrumen*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i data-feather="folder"></i>
                    <span class="menu-title text-truncate text-wrap"> Instrumen </span>
                </a>
                <ul class="nav">

                    <li class="nav-item {{ in_array(request()->route()->getName(),['pilih_instrumen'])? 'active': '' }}">
                        <a href="{{ route('pilih_instrumen') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap"> Jawab Instrumen </span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="navigation-header">
                <span> Pengurusan Modul </span>
            </li>
            <li class="nav-item {{ request()->is('modul_instrumen*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i data-feather="folder"></i>
                    <span class="menu-title text-truncate text-wrap"> Modul </span>
                </a>
                <ul class="nav">
                    <li class="nav-item {{ request()->is('modul_instrumen*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <span class="menu-title text-truncate text-wrap">
                                Instrument I-KePS
                            </span>
                        </a>

                        <ul class="nav">
                            <li class="nav-item {{ in_array(request()->route()->getName(), ['ikeps.ikeps_baru']) ? 'active' : '' }}">
                                <a href="{{ route('ikeps.ikeps_baru') }}" class="nav-link">
                                    <span class="menu-title text-truncate text-wrap">
                                        Pengisian I-KePS
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                 <ul class="nav">
                    <li class="nav-item {{ request()->is('modul_instrumen*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <span class="menu-title text-truncate text-wrap">
                                Instrument I-SKIPS
                            </span>
                        </a>

                     <ul class="nav">
                        <li class="nav-item {{ in_array(request()->route()->getName(), ['skips.skips_baru']) ? 'active' : '' }}">
                            <a href="{{ route('skips.skips_baru') }}" class="nav-link">
                                <span class="menu-title text-truncate text-wrap">
                                    Pengisian SKIPS
                                </span>
                            </a>
                        </li>
                        </ul>
                    </li>
                </ul>
            </li>

            @endhasanyrole

            @hasanyrole('pengetua_guru_besar|penolong_kanan_kokurikulum|kpp_pp_ppp')
            <li class="navigation-header">
                <span> Pengurusan Instrumen</span>
            </li>
            <li class="nav-item {{ request()->is('pengurusan_instrumen*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i data-feather="folder"></i>
                    <span class="menu-title text-truncate text-wrap"> Instrumen </span>
                </a>
                <ul class="nav">
                    <li class="nav-item {{ in_array(request()->route()->getName(),['senarai_instrumen_dijawab'])? 'active': '' }}">
                        <a href="{{ route('senarai_instrumen_dijawab') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap"> Instrumen Dijawab </span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="navigation-header">
                <span> Pengurusan Modul </span>
            </li>
            <li class="nav-item {{ request()->is('modul_instrumen*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <i data-feather="folder"></i>
                    <span class="menu-title text-truncate text-wrap"> Modul </span>
                </a>
                <ul class="nav">
                    <li class="nav-item {{ request()->is('modul_instrumen*') ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <span class="menu-title text-truncate text-wrap">
                                Instrument I-KePS
                            </span>
                        </a>

                        <ul class="nav">
                            <li class="nav-item {{ in_array(request()->route()->getName(), ['ikeps.ringkasan_ikeps']) ? 'active' : '' }}">
                                <a href="{{ route('ikeps.ringkasan_ikeps_fmf') }}" class="nav-link">
                                    <span class="menu-title text-truncate text-wrap">
                                        Ringkasan Maklumat
                                    </span>
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ request()->is('modul_instrumen*') ? 'menu-open' : '' }}">
                <a href="#" class="nav-link">
                    <span class="menu-title text-truncate text-wrap">
                        Instrument SKIPS
                    </span>
                </a>

                <ul class="nav">
                    <li class="nav-item {{ in_array(request()->route()->getName(), ['skips.skips_baru']) ? 'active' : '' }}">
                        <a href="{{ route('skips.skips_baru') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap">
                                Pengisian SKIPS
                            </span>
                        </a>
                    </li>

                    <li class="nav-item {{ in_array(request()->route()->getName(), ['skips.ringkasan_skips']) ? 'active' : '' }}">
                        <a href="{{ route('skips.ringkasan_skips') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap">
                                Ringkasan Maklumat
                            </span>
                        </a>
                    </li>
                </ul>
            </li>
            @endhasanyrole
             <!-- pentadbir role start -->
            @hasanyrole('pengerusi_pengetua_guru_besar_pengurus')

            <li class="navigation-header">
                <span>  SKIPS </span>
            </li>
             <li class="nav-item ">
                <a href="#" class="nav-link">
                    <i data-feather="folder"></i>
                    <span class="menu-title text-truncate text-wrap"> SKIPS </span>
                </a>
                <ul class="nav">

                    <li class="nav-item ">
                        <a href="" class="nav-link">
                            <span class="menu-title text-truncate text-wrap">Pengumuman</span>
                        </a>
                    </li>

                    <li class="nav-item {{ in_array(request()->route()->getName(), ['skips.skips_baru']) ? 'active' : '' }}">
                        <a href="{{ route('skips.skips_baru') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap">
                                Modul Pengisian Data Instrumen
                            </span>
                        </a>
                    </li>

                     <li class="nav-item {{ in_array(request()->route()->getName(), ['skips.senarai-skips-institusi']) ? 'active' : '' }}">
                        <a href="{{ route('skips.senarai-skips-institusi') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap">
                                Senarai Skips
                            </span>
                        </a>
                    </li>
                </ul>
            </li>
            @endhasanyrole

            @hasanyrole('jabata_skips|bahagian_pendidikan_swasta')
            <li class="navigation-header">
                <span>  SKIPS </span>
            </li>
             <li class="nav-item ">
                <a href="#" class="nav-link">
                    <i data-feather="folder"></i>
                    <span class="menu-title text-truncate text-wrap"> SKIPS </span>
                </a>
                <ul class="nav">

                    <li class="nav-item ">
                        <a href="" class="nav-link">
                            <span class="menu-title text-truncate text-wrap">Pengumuman</span>
                        </a>
                    </li>


                    <li class="nav-item {{ in_array(request()->route()->getName(), ['skips.senarai-skips-institusi']) ? 'active' : '' }}">
                        <a href="{{ route('skips.senarai-skips-institusi') }}" class="nav-link">
                            <span class="menu-title text-truncate text-wrap">
                                Senarai Skips
                            </span>
                        </a>
                    </li>

                </ul>
            </li>
            @endhasanyrole
        </ul>
    </div>
</div>
