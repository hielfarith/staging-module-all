@extends('layouts.app')

@section('header')
    Instrumen
@endsection

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('msg.home') }}</a></li>
    <li class="breadcrumb-item"><a href="#"> Instrumen</a></li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title fw-bolder"> Senarai Instrumen </h4>
        </div>
        <hr>

        <div class="card-body">
            <div class="row ">
                <div class="col-md-4">
                    <label class="form-label fw-bolder">ID Instrumen </label>
                    <input type="text" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-bolder">Nama Instrumen</label>
                    <input type="text" class="form-control">
                </div>

                <div class="col-md-4">
                    <label class="form-label fw-bolder">Tarikh Didaftarkan</label>
                    <input type="date" class="form-control">
                </div>

                <div class="d-flex justify-content-end align-items-center my-1 ">
                    <a class="me-3" type="button" id="reset" href="#">
                        <span class="text-danger"> Reset </span>
                    </a>
                    <button type="submit" class="btn btn-success float-right">
                        <i class="fa fa-search"></i> Search
                    </button>
                </div>
            </div>

            <div class="btn-group" role="group" aria-label="Role Action">
                <a href="#" class="btn btn-outline-success waves-effect">
                    <i class="fa fa-file-excel text-success"></i> Excel
                </a>
                <a href="#" class="btn btn-outline-danger waves-effect">
                    <i class="fa fa-file-pdf text-danger"></i> PDF
                </a>
            </div>

            <hr>

            <style>
                #senarai_permohonan thead th {
                    vertical-align: middle;
                    text-align: center;
                }

                #senarai_permohonan tbody {
                    vertical-align: middle;
                }
            </style>
            @php $count = 1; @endphp

            <div class="table-responsive">
                <table class="table header_uppercase table-bordered table-responsive table-hovered" id="senarai_permohonan"
                    style="">
                    <thead>
                        <tr>
                            <th> No. </th>
                            <th> ID Instrumen </th>
                            <th> Nama Instrumen </th>
                            <th> Keterangan Instrumen </th>
                            <th> Tarikh Didaftarkan </th>
                            <th> Tindakan </th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td> 1. </td>
                            <td> 24678 </td>
                            <td> Pemeriksaan Persediaan Sesi Persekolahan 2023/2024 Jabatan Pendidikan Negeri Perak </td>
                            <td> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                                galley of type and scrambled it to make a type specimen book. It has survived not only five
                                centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                            </td>
                            <td> 18/07/2023 </td>
                            <td>
                                <div class="btn-group btn-group-sm d-flex justify-content-center" role="group"
                                    aria-label="Action">
                                    <a data-bs-toggle="modal" data-bs-target="#send_instrumen"
                                        aria-controls="send_instrumen" class="btn btn-xs btn-default"> <i class="text-info"
                                            data-feather="send"></i>
                                        <a data-bs-toggle="modal" data-bs-target="#edit_instrumen"
                                            aria-controls="edit_instrumen" class="btn btn-xs btn-default"> <i
                                                class="fas fa-pencil text-primary"></i>
                                            <a href="#" class="btn btn-xs btn-default"> <i
                                                    class="fas fa-trash text-danger"></i> </a>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td> 2 </td>
                            <td> 20987 </td>
                            <td> Instrumen Penilaian Implementasi Teknologi dalam Proses Pembelajaran Instrumen Evaluasi
                                Kualiti Sarana dan Prasarana di Sekolah</td>
                            <td> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                                been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                                galley of type and scrambled it to make a type specimen book. It has survived not only five
                                centuries, but also the leap into electronic typesetting, remaining essentially unchanged.
                            </td>
                            <td> 18/07/2023 </td>
                            <td>
                                <div class="btn-group btn-group-sm d-flex justify-content-center" role="group"
                                    aria-label="Action">
                                    <a data-bs-toggle="modal" data-bs-target="#send_instrumen"
                                        aria-controls="send_instrumen" class="btn btn-xs btn-default"> <i class="text-info"
                                            data-feather="send"></i>
                                        <a data-bs-toggle="modal" data-bs-target="#edit_instrumen"
                                            aria-controls="edit_instrumen" class="btn btn-xs btn-default"> <i
                                                class="fas fa-pencil text-primary"></i>
                                            <a href="#" class="btn btn-xs btn-default"> <i
                                                    class="fas fa-trash text-danger"></i> </a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <div class="modal fade" id="edit_instrumen" tabindex="-1" aria-labelledby="edit_instrumen" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-light-primary">
                    <h4 class="card-title">
                        Kemaskini Maklumat Instrumen
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-1">
                            <label class="form-label fw-bolder">Nama Instrumen </label>
                            <textarea type="text" class="form-control"> </textarea>
                        </div>

                        <div class="col-md-12 mb-1">
                            <label class="form-label fw-bolder">Keterangan Instrumen </label>
                            <textarea type="text" class="form-control"> </textarea>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="d-flex justify-content-center">
                        <a href="#" class="btn btn-primary me-1" onclick="fakeSuccess()">
                            Kemaskini
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="send_instrumen" tabindex="-1" aria-labelledby="send_instrumen" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-light-primary">
                    <h4 class="card-title">
                        Hantar Instrumen Ke Pihak Institusi
                    </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12 mb-1">
                            <label class="form-label fw-bolder">Senarai Penerima </label>
                            <select class="select2 form-select" id="select2-multiple" multiple>
                                <optgroup label="Institusi Awam">
                                    <option value="Awam 1">Awam 1</option>
                                    <option value="Awam 2">Awam 2</option>
                                    <option value="Awam 3">Awam 3</option>
                                </optgroup>
                                <optgroup label="Institusi Swasta">
                                    <option value="Swasta 1">Swasta 1</option>
                                    <option value="Swasta 2">Swasta 2</option>
                                    <option value="Swasta 3">Swasta 3</option>
                                </optgroup>
                            </select>
                        </div>

                        <div class="col-md-12 mb-1">
                            <label class="form-label fw-bolder">Subjek Emel </label>
                            <input type="text" class="form-control">
                        </div>

                        <div class="col-md-12 mb-1">
                            <label class="form-label fw-bolder">Isi Kandungan Emel</label>
                            <textarea type="text" class="form-control" rows="8"></textarea>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="d-flex justify-content-center">
                        <a href="#" class="btn btn-primary me-1" onclick="fakeSuccess()">
                            <i data-feather="send"></i>
                            Hantar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('vendor-script')
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset(mix('js/scripts/forms/form-select2.js')) }}"></script>
    <script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>
@endsection
