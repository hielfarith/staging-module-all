@extends('layouts.app')

@section('header')
I-KePS
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('msg.home') }}</a></li>
<li class="breadcrumb-item"><a href="#"> Instumen/ Modul </a></li>
<li class="breadcrumb-item"><a href="#"> Instrumen Bancian Kemudahan Prasasarana dan Program Sukan Sekolah</a></li>
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title fw-bolder"> Instrumen Bancian Kemudahan Prasasarana dan Program Sukan Sekolah </h4>

        <div class="d-flex justify-content-end align-items-center">
            <a type="button" class="btn btn-primary float-right" href="{{ route('ikeps_baru') }}">
                Pengisian Baru
            </a>
        </div>
    </div>
    <hr>

    <div class="card-body">
        <style>
            #ringkasan_ikeps thead th {
                vertical-align: middle;
                text-align: center;
            }

            #ringkasan_ikeps tbody{
                vertical-align: middle;
            }
        </style>

        <div class="table-responsive">
            <table class="table header_uppercase table-bordered table-responsive table-hovered" id="ringkasan_ikeps" style="">
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

                <tbody></tbody>
            </table>
        </div>

    </div>
</div>
@endsection
