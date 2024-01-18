@extends('layouts.app')

@section('header')
MEDAN DATA TAMBAH / KEMASKINI INSTRUMEN SKPAK, SPKS, IKEPS
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Instrumen </a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Maklumat MEDAN DATA TAMBAH / KEMASKINI INSTRUMEN SKPAK, SPKS, IKEPS </a>
</li>
@endsection

@section('content')

<div class="card">
    <div class="card-body">
    <ul class="nav nav-pills nav-justified" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder active" id="simple-tab-0" data-bs-toggle="tab" href="#simple-tabpanel-0" role="tab" aria-controls="simple-tabpanel-0" aria-selected="true">Instrumen</a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="simple-tab-1" data-bs-toggle="tab" href="#simple-tabpanel-1" role="tab" aria-controls="simple-tabpanel-1" aria-selected="false">Borang</a>
    </li>
   
</ul>
<div class="tab-content pt-5" id="tab-content">
    <div class="tab-pane active" id="simple-tabpanel-0" role="tabpanel" aria-labelledby="simple-tab-0">
      @include('instrumen_update.sedia-ada.tab1')
    </div>
    <div class="tab-pane" id="simple-tabpanel-1" role="tabpanel" aria-labelledby="simple-tab-1">
      @include('ikeps.borang_ikeps.prasarana_sekolah')
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
