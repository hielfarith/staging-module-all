@extends('layouts.app')

@section('header')
Helpdesk ePromis
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('msg.home') }}</a></li>
    <li class="breadcrumb-item"><a href="#"> Helpdesk</a></li>
    <li class="breadcrumb-item"><a href="{{ route('helpdesk.index') }}"> Senarai Isu</a></li>
    <li class="breadcrumb-item"><a href="#"> Isu </a></li>
@endsection

@section('content')
    <div class="row match-height">
        @hasanyrole('admin')
        <div class="col-12 col-md-7">
            <div class="card">
                <div class="card-header">
                    <strong class="text-uppercase">Isu :
                        <span class="text-capitalize">
                            Tidak dapat membuat permohonan baru
                        </span>
                    </strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        <table class="table">
                            <tbody align="middle">
                                <tr class="fw-bolder">
                                    <td>Track ID</td>
                                    <td>Kategori</td>
                                    <td>Sub Kategori</td>
                                    <td>Status</td>
                                </tr>

                                <tr>
                                    <td>7J52558071</td>
                                    <td>e-Kuarters</td>
                                    <td>Permohonan Kuarters</td>
                                    <td><span class="badge pill-badge-glow bg-primary">Permohonan Baru</span></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="col-sm-12 col-md-12 col-lg-12 mt-2 mb-1">
                            <label for="" class="form-label fw-bolder">Komen/ Ulasan</label>
                            <textarea rows="4" readonly class="form-control" name="" id="">
                                Terdapat bugs pada laporan seperti lampiran. (white spacing)
                            </textarea>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-12 mb-1">
                            <label for="" class="form-label fw-bolder">Lampiran</label>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-12 mb-1">
                             <a class="fa fa-file-pdf text-primary" style="font-size: 35px"></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <strong class="text-uppercase">Isu :
                        <span class="text-capitalize">
                            Tidak dapat membuat permohonan baru
                        </span>
                    </strong>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 mb-1">
                            <label for="" class="form-label fw-bolder">Komen/ Ulasan</label>
                            <textarea rows="4" class="form-control" name="" id="">
                            </textarea>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-12 mb-1">
                            <label for="" class="form-label fw-bolder">Lampiran</label>
                            <input type="file" class="form-control">
                        </div>

                    </div>
                    <button class="btn btn-sm btn-primary">Hantar</button>
                </div>
            </div>
        </div>
        @endhasanyrole

        @hasanyrole('pengguna_luar')
        <div class="col-12 col-md-7">
            <div class="card">
                <div class="card-header">
                    <strong class="text-uppercase">
                        Laporkan Masalah Baru
                    </strong>
                </div>
                <div class="card-body">
                    <div class="row">

                        <table class="table">
                            <tbody align="middle">
                                <tr class="fw-bolder">
                                    <td>Kategori</td>
                                    <td>Sub Kategori</td>
                                </tr>

                                <tr>
                                    <td><input type="text" class="form-control"></td>
                                    <td><input type="text" class="form-control"></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="col-sm-12 col-md-12 col-lg-12 mt-2 mb-1">
                            <label for="" class="form-label fw-bolder">Subjek/ Isu</label>
                            <input type="text" class="form-control">
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-12 mb-1">
                            <label for="" class="form-label fw-bolder">Komen/ Ulasan</label>
                            <textarea rows="4" class="form-control" name="" id="">
                            </textarea>
                        </div>

                        <div class="col-sm-12 col-md-12 col-lg-12 mb-1">
                            <label for="" class="form-label fw-bolder">Lampiran</label>
                            <input type="file" class="form-control">
                        </div>

                    </div>
                    <button class="btn btn-sm btn-primary">Hantar</button>
                </div>
            </div>
        </div>
        @endhasanyrole

        <div class="col-12 col-md-5">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Garis Masa Pelaporan Isu</h4>
                    </div>
                    <div class="card-body">
                        <ul class="timeline">
                            <li class="timeline-item">
                                <span class="timeline-point timeline-point-indicator"></span>
                                <div class="timeline-event">
                                    <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                        <h6>Isu Dilaporkan</h6>
                                        <span class="timeline-event-time">12 jam yang lalu</span>
                                    </div>
                                    <p>Oleh: Adli</p>
                                    <div class="d-flex flex-row align-items-center">
                                        <img class="me-1" src="{{asset('images/icons/file-icons/pdf.png')}}" alt="invoice"
                                            height="23" />
                                        <span>attachment.pdf</span>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <span class="timeline-point timeline-point-secondary timeline-point-indicator"></span>
                                <div class="timeline-event">
                                    <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                        <h6>Isu Disahkan</h6>
                                        <span class="timeline-event-time">10 jam yang lalu</span>
                                    </div>
                                    <p>Oleh: Admin</p>
                                    <div class="d-flex flex-row align-items-center">
                                        <div class="ms-50">
                                            <h6 class="mb-0">Pegawai Bertugas:</h6>
                                            <span>Fatinatul</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <span class="timeline-point timeline-point-success timeline-point-indicator"></span>
                                <div class="timeline-event">
                                    <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                        <h6>Pembetulan</h6>
                                        <span class="timeline-event-time">2 Jam yang lalu</span>
                                    </div>
                                    <p>Oleh: Admin</p>
                                    <div class="d-flex flex-row align-items-center">
                                        <div class="ms-50">
                                            <h6 class="mb-0">Pegawai Bertugas:</h6>
                                            <span>Fatinatul</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
    <script></script>
@endsection
