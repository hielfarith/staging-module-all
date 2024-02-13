@extends('layouts.app')

@section('header')
SPKS
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
</li>

<li class="breadcrumb-item">
    <a href="#"> SPKS </a>
</li>

@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title fw-bolder"> Senarai SPKS </h4>
    </div>

    <hr>

    <div class="card-body">
        <hr>
        <div class="table-responsive">
            <table class="table header_uppercase table-bordered table-hovered" id="TableSenaraiInstrumenSpks">
                <thead>
                    <tr>
                        <th width="5%">No.</th>
                        <th>Nama Sekolah</th>
                        <th>Nama Pengguna</th>
                        <th>Tarikh Penghantaran</th>
                        <th>Tarikh Validasi</th>
                        <th>Status</th>
                        <th width="5%">Tindakan</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
