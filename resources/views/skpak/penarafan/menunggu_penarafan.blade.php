@extends('layouts.app')

@section('header')
    Skpak
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
    </li>

    <li class="breadcrumb-item">
        <a href="#"> Penarafan </a>
    </li>
@endsection

@section('content')
    <style>
        .legend-container {
            text-align: right;
            /* Align legend to the right */
            margin-bottom: 10px;
            /* Optional: Add some bottom margin */
        }

        .legend {
            display: inline-block;
            /* background-color: #f0f0f0; */
            padding: 5px 10px;
            /* border: 1px solid #ccc; */
            border-radius: 5px;
        }

        .legend-item {
            margin-right: 10px;
        }
    </style>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title fw-bolder"> Proses Penarafan </h4>

            <!--  <div class="d-flex justify-content-end align-items-center">
                                            <a href="{{ asset('template/BORANG DEMOGRAFI SKIPS.pdf') }}" class="btn btn-primary float-right" download>
                                                <i class="fa-solid fa-file"></i> Muat Turun Dokumen
                                            </a>
                                        </div> -->
        </div>

        <hr>

        <div class="card-body">
            <div class="legend-container">
                <div class="legend">
                    <span class="legend-item"><i class="fa fa-eye text-primary" style="font-size: 16px;"></i> : Lihat
                        Taska</span>
                    <span class="legend-item"><i class="fa fa-download text-success" style="font-size: 16px;"></i> : Muat
                        Turun </span>
                </div>
            </div>
            <div class="table-responsive">

                <table class="table header_uppercase table-bordered table-hovered" id="TableSenaraiInstrumenSkpak">
                    <thead>
                        <tr style="color:rgb(255, 255, 255); background-color: #6da0d3;">>
                            <th width="5%">No.</th>
                            <th>Nama Taska</th>
                            <th>Nama Pengguna</th>
                            <th>Tarikh Pengesahan</th>
                            <th>Tarikh Verifikasi Instrumen 1</th>
                            <th>Tarikh Verifikasi Instrumen 2</th>
                            <th>Status</th>
                            <th width="5%">Tindakan</th>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <div class="btn-group " role="group" aria-label="Action"><a
                                        href="{{ route('skpak.borang_penarafan') }}" class="btn btn-xs btn-default"
                                        title=""><i class="fas fa-eye text-primary"></i></a><a onclick=""
                                        class="btn btn-xs btn-default" title=""><i
                                            class="fas fa-download text-success"></i></a></div>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
