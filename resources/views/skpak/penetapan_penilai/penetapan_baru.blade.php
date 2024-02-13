@extends('layouts.app')

@section('header')
Pengurusan Panel Penilai
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Penetapan Penilai </a>
</li>

{{-- <li class="breadcrumb-item">
    <a href="#"> Pengurusan Panel Penilai </a>
</li> --}}
@endsection

@section('content')
<div class="card">
    <div class="card-header">
        <h4 class="card-title fw-bolder"> Penetapan Penilai </h4>


    </div>



    <div class="card-body">



        <hr>

        <div class="table-responsive">
            <table class="table header_uppercase table-bordered table-hovered" id="TableSenaraiPenilai">
                <thead>
                    <tr>

                        <th>Maklumat Panel 1</th>
                        <th>Panel Penilai 1</th>
                        <th>Tarikh Lawatan</th>
                        <th>Panel Penilai 2</th>
                        <th>Tarikh Lawatan</th>
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

<div class="modal fade" id="modal-senarai-penetapan" tabindex="-1" aria-labelledby="modal-senarai-penetapan" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Maklumat Panel Penilai/ Pengguna</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body" id="modal-body-penilia">
            </div>
        </div>
    </div>
</div>
@endsection
