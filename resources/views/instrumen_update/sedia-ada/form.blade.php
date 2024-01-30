@extends('layouts.app')

@section('header')
Medan Data Tambah / Kemaskini Instrumen SKPAK, SPKS, IKEPS
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Instrumen </a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Maklumat Medan Data Tambah / Kemaskini Instrumen </a>
</li>
@endsection

@section('content')

<ul class="nav nav-pills nav-justified" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder active" id="simple-tab-0" data-bs-toggle="tab"
            href="#simple-tabpanel-0" role="tab" aria-controls="simple-tabpanel-0" aria-selected="true">Instrumen</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="simple-tab-1" data-bs-toggle="tab"
            href="#simple-tabpanel-1" role="tab" aria-controls="simple-tabpanel-1" aria-selected="false">Borang</a>
    </li>

</ul>
<div class="tab-content" id="tab-content">
    <div class="tab-pane active" id="simple-tabpanel-0" role="tabpanel" aria-labelledby="simple-tab-0">
        <div class="card">
            <div class="card-body">
                @include('instrumen_update.sedia-ada.tab1')
            </div>
        </div>
    </div>
    <div class="tab-pane" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">
        <div class="card">
            <div class="card-body">
                @include('instrumen_update.sedia-ada.tab2')
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $('.select2').select2({
      placeholder: 'Sila Pilih'
    });
</script>
@endsection
