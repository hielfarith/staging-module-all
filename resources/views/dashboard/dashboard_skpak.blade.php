@extends('layouts/contentLayoutMaster')

@section('header')
    Dashboard SKPAK
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('msg.home') }}</a></li>
    <li class="breadcrumb-item">
        <a>Dashboard SKPAK</a>
    </li>
@endsection

@section('content')
    <style>
        #indikasi_bintang thead th {
            vertical-align: middle;
            text-align: center;
        }

        #indikasi_bintang tbody {
            vertical-align: middle;
        }

        #indikasi_bintang table {
            width: 100% !important;
            /* word-wrap: break-word; */
        }
    </style>

    <div class="row">
        {{-- [VIEW: Panel Penilai, Pentadbir Bahagian PERMATA] --}}
        <h6>VIEW: Panel Penilai, Pentadbir Bahagian PERMATA</h6>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title fw-bolder">
                        Indikasi Bintang Yang Diperolehi Taska
                    </h4>
                </div>

                <hr>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 mb-1">
                            <label class="fw-bold form-label">Negeri</label>
                            <select class="form-control select2" name="negeri" id="negeri" required
                                onchange="handleNegeri(this)">
                                <option value="" hidden>Negeri</option>
                                @foreach ($states as $state)
                                    <option value="{{ $state->name }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 mb-1">
                            <label class="fw-bold form-label">Daerah</label>
                            <select class="form-control select2" name="daerah" required id="daerah">
                                <!-- add -->
                            </select>
                        </div>

                        <div class="col-md-6 mb-1">
                            <label class="fw-bold form-label">Nama Taska</label>
                            <select name="" id="" class="form-control select2">
                                <option value="" hidden>Nama Taska</option>
                                <option value="0">Semua Taska</option>
                                <option value="1">Taska Permata 1</option>
                                <option value="2">Taska Permata 2</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end align-items-center mt-1">
                        <a class="me-3 text-danger" type="button" id="reset" href="#">
                            Setkan Semula
                        </a>
                        <button type="button" class="btn btn-success float-right">
                            <i class="fa fa-search me-1"></i> Cari
                        </button>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-end">
                        <div class="btn-group" role="group" aria-label="Role Action">
                            <a href="#" class="btn btn-outline-success waves-effect">
                                <i class="fa fa-file-excel text-success"></i> Excel
                            </a>
                            <a href="#" class="btn btn-outline-danger waves-effect">
                                <i class="fa fa-file-pdf text-danger"></i> PDF
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive mt-2">
                        <table class="table table-bordered table-hovered text-wrap" id="indikasi_bintang">
                            <thead style="color:rgb(255, 255, 255); background-color: #6da0d3;">
                                <tr>
                                    <th width="2%">No.</th>
                                    <th>Nama Taska</th>
                                    <th width="25%">Bintang Diperolehi</th>
                                    <th width="15%">Tarikh Luput</th>
                                    <th width="15%">Status Penilaian Taska</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <p class="fw-bold">Taska Permata 1</p>
                                        <p>Taman Megah Jaya, Persiaran Persint 8</p>
                                        <p>Jalan Megah Jaya</p>
                                        <p>55300, Kulim, Kedah</p>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            {{-- Loop the star here --}}
                                            <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                            <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                            <i class="fa fa-star text-warning" aria-hidden="true"></i>
                                            {{-- Until Here --}}
                                        </div>
                                    </td>
                                    <td class="text-center">12-07-2024</td>
                                    <td class="align-items-center">
                                        <span class="badge rounded-pill badge-light-success">
                                            Selesai Dinilai
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- [VIEW: User Tadika] --}}
        <h6>VIEW USER TADIKA</h6>
        <div class="card card-congratulations">
            <div class="card-body text-center">
                <img src="{{ asset('images/elements/decore-left.png') }}" class="congratulations-img-left"
                    alt="card-img-left" />
                <img src="{{ asset('images/elements/decore-right.png') }}" class="congratulations-img-right"
                    alt="card-img-right" />
                <div class="avatar avatar-xl bg-primary shadow">
                    <div class="avatar-content">
                        <i data-feather="award" class="font-large-1"></i>
                    </div>
                </div>
                <div class="text-center">
                    <h3 class="text-white text-uppercase">Taska Permata 1</h3>
                    <p class="mb-1" style="font-style: italic;">Taman Megah Jaya, Persiaran Persint 8, Jalan Megah Jaya,
                        55300, Kulim, Kedah</p>

                    <hr class="text-primary">

                    <div class="d-flex justify-content-center align-items-center mb-1 mt-2">
                        {{-- Loop the star here --}}
                        <i class="fa fa-star font-medium-5 text-white" aria-hidden="true"></i>
                        <i class="fa fa-star font-medium-5 text-white" aria-hidden="true"></i>
                        <i class="fa fa-star font-medium-5 text-white" aria-hidden="true"></i>
                        {{-- Until Here --}}
                    </div>

                    <p class="card-text m-auto w-75">
                        <span class="fw-bolder">Tarikh Luput pada:</span>
                        <span style="font-style: italic;">12-07-2024</span>
                    </p>
                </div>
            </div>
        </div>

        {{-- VIEW USER PARENTS --}}
        <h6>VIEW USER PARENTS</h6>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title fw-bolder">
                        Indikasi Bintang Yang Diperolehi Taska
                    </h4>
                </div>

                <hr>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 mb-1">
                            <label class="fw-bold form-label">Negeri</label>
                            <select class="form-control select2" name="negeri" id="negeri" required
                                onchange="handleNegeri(this)">
                                <option value="" hidden>Negeri</option>
                                @foreach ($states as $state)
                                    <option value="{{ $state->name }}">{{ $state->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-3 mb-1">
                            <label class="fw-bold form-label">Daerah</label>
                            <select class="form-control select2" name="daerah" required id="daerah">
                                <!-- add -->
                            </select>
                        </div>

                        <div class="col-md-6 mb-1">
                            <label class="fw-bold form-label">Nama Taska</label>
                            <select name="" id="" class="form-control select2" multiple>
                                <option value="" hidden>Nama Taska</option>
                                <option value="0">Semua Taska</option>
                                <option value="1">Taska Permata 1</option>
                                <option value="2">Taska Permata 2</option>
                            </select>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end align-items-center mt-1">
                        <a class="me-3 text-danger" type="button" id="reset" href="#">
                            Setkan Semula
                        </a>
                        <button type="button" class="btn btn-success float-right" id="cariTadika">
                            <i class="fa fa-search me-1"></i> Cari
                        </button>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-end">
                        <div class="btn-group" role="group" aria-label="Role Action">
                            <a href="#" class="btn btn-outline-success waves-effect">
                                <i class="fa fa-file-excel text-success"></i> Excel
                            </a>
                            <a href="#" class="btn btn-outline-danger waves-effect">
                                <i class="fa fa-file-pdf text-danger"></i> PDF
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive mt-2" style="display: none;" id="table-indikasi-bintang">
                        <table class="table table-bordered table-hovered text-wrap" id="indikasi_bintang">
                            <thead>
                                <tr>
                                    <th width="2%">No.</th>
                                    <th>Nama Taska</th>
                                    <th width="25%">Bintang Diperolehi</th>
                                    <th width="15%">Tarikh Luput</th>
                                    <th width="15%">Status Penilaian Taska</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <p class="fw-bold">Taska Permata 1</p>
                                        <p>Taman Megah Jaya, Persiaran Persint 8</p>
                                        <p>Jalan Megah Jaya</p>
                                        <p>55300, Kulim, Kedah</p>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center align-items-center">
                                            {{-- Loop the star here --}}
                                            <i class="fa fa-star text-primary" aria-hidden="true"></i>
                                            <i class="fa fa-star text-primary" aria-hidden="true"></i>
                                            <i class="fa fa-star text-primary" aria-hidden="true"></i>
                                            {{-- Until Here --}}
                                        </div>
                                    </td>
                                    <td class="text-center">12-07-2024</td>
                                    <td class="align-items-center">
                                        <span class="badge rounded-pill badge-light-primary">
                                            Selesai Dinilai
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function handleNegeri(negeri) {
            var negerivalue = negeri.value;
            var url = "{{ route('admin.internal.checkdaerah') }}"
            $.ajax({
                url: url,
                type: 'POST',
                data: {
                    negeri: negerivalue
                },
                success: function(response) {
                    $('#daerah').empty();
                    $('#daerah').append('<option value="" selected>Sila Pilih:-</option>');
                    $.each(response.daerahs, function(key, value) {
                        $('#daerah').append('<option value="' + value + '">' + value + '</option>');
                    });
                }
            });
        }

        $(document).ready(function() {
            $('#cariTadika').click(function() {
                $('#table-indikasi-bintang').toggle();
            });
        });

        // $(document).ready(function () {
        //     $(function() {
        //         var table = $('#indikasi_bintang').DataTable({
        //             orderCellsTop: true,
        //             colReorder: false,
        //             pageLength: 10,
        //             processing: true,
        //             searching: false,
        //             serverSide: true, //enable if data is large (more than 50,000)
        //             ajax: {
        //                 url: "{{ fullUrl() }}",
        //                 cache: false,
        //             },
        //             columns: [
        //                 {
        //                     data: "nama_institusi",
        //                     name: "nama_institusi",
        //                     searchable: true,
        //                     render: function(data, type, row) {
        //                         return $("<div/>").html(data).text();
        //                     }
        //                 },
        //                 {
        //                     data: "star_rating",
        //                     name: "star_rating",
        //                     searchable: true,
        //                     render: function(data, type, row) {
        //                         return $("<div/>").html(data).text();
        //                     }
        //                 },
        //                 {
        //                     data: "tarikh_luput",
        //                     name: "tarikh_luput",
        //                     searchable: true,
        //                     render: function(data, type, row) {
        //                         return $("<div/>").html(data).text();
        //                     }
        //                 },
        //                 {
        //                     data: 'action',
        //                     name: 'action',
        //                     orderable: false,
        //                     searchable: false
        //                 },
        //             ],
        //         });
        //     });
        // });
    </script>
@endsection
