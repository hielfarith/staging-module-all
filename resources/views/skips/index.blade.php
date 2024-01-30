@extends('layouts.app')

@section('header')
SKIPS
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('msg.home') }}</a></li>
<li class="breadcrumb-item"><a href="#"> Instumen/ Modul </a></li>
<li class="breadcrumb-item"><a href="#"> Standard Kualiti Institusi Pendidikan Swasta </a></li>
@endsection

@section('content')

<input type="hidden" name="butiran_id" id="butiran_id" value="{{$butiran_id}}">
<ul class="nav nav-pills nav-justified" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder active" id="butiran-institusi-tab" data-bs-toggle="tab" href="#butiran-institusi" aria-controls="butiran-institusi" role="tab" aria-selected="true">
            BUTIRAN INSTITUSI
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="item-tab" data-bs-toggle="tab" href="#item" aria-controls="item" role="tab" aria-selected="true">
            ITEM STANDARD KUALITI
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="skor-item-tab" data-bs-toggle="tab" href="#skor-item" aria-controls="skor-item" role="tab" aria-selected="true">
            SKOR ITEM STANDARD KUALITI
        </a>
    </li>
    @if($type == 'verfikasi')
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="item-verifikasi-tab" data-bs-toggle="tab" href="#item-verifikasi" aria-controls="item-verifikasi" role="tab" aria-selected="true">
            ITEM STANDARD KUALITI (Verfikasi)
        </a>
    </li>

    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="pencapaian-tab" data-bs-toggle="tab" href="#pencapaian" aria-controls="pencapaian" role="tab" aria-selected="true">
            PENCAPAIAN KESELURUHAN
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="butiran-pemeriksaan-tab" data-bs-toggle="tab" href="#butiran-pemeriksaan" aria-controls="butiran-pemeriksaan" role="tab" aria-selected="true">
            BUTIRAN PEMERIKSAAN
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="ulasan-tab" data-bs-toggle="tab" href="#ulasan" aria-controls="ulasan" role="tab" aria-selected="true">
            ULASAN KESELURUHAN PEMERIKSAAN
        </a>
    </li>
    @endif
</ul>

<div class="card">
    <div class="card-body">
        <div class="tab-content">

            <div class="tab-pane active" id="butiran-institusi" role="tabpanel" aria-labelledby="butiran-institusi-tab">
                @include('skips.borang_skips.butiran_institusi')
            </div>
            <div class="tab-pane fade" id="item" role="tabpanel" aria-labelledby="item-tab">
                @include('skips.index_item',['type' => $type, 'tab_name' => 'item_tab'])
            </div>
            <div class="tab-pane fade" id="skor-item" role="tabpanel" aria-labelledby="skor-item-tab">
                @include('skips.index_penilaian')
            </div>
            <div class="tab-pane fade" id="item-verifikasi" role="tabpanel" aria-labelledby="item-verifikasi-tab">
                @include('skips.index_item_verfikasi',['type' => 'verfikasi', 'tab_name' => 'item_verfikasi'])
            </div>
            <div class="tab-pane fade" id="pencapaian" role="tabpanel" aria-labelledby="pencapaian-tab">
                @include('skips.borang_skips.pencapaian')
            </div>
            <div class="tab-pane fade" id="butiran-pemeriksaan" role="tabpanel" aria-labelledby="butiran-pemeriksaan-tab">
                @include('skips.borang_skips.butiran_pemeriksaan')
            </div>
            <div class="tab-pane fade" id="ulasan" role="tabpanel" aria-labelledby="ulasan-tab">
                @include('skips.borang_skips.ulasan')
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">

</script>
@endsection
