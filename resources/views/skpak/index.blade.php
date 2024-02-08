@extends('layouts.app')

@section('header')
SKPAK
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('msg.home') }}</a></li>
<li class="breadcrumb-item"><a href="#"> Instumen/ Modul </a></li>
<li class="breadcrumb-item"><a href="#"> Jaminan Kualiti Pendidikan Awal Kanak-Kanak </a></li>
@endsection
<input type="hidden" name="skpak_id" id="skpak_id" value="{{$skpak?->id}}">
@section('content')
<ul class="nav nav-pills nav-justified" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder active" id="item-1-tab" data-bs-toggle="tab" href="#item-1" aria-controls="item-1" role="tab" aria-selected="true">
            STANDARD <br> PENILAIAN 1
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="item-2-tab" data-bs-toggle="tab" href="#item-2" aria-controls="item-2" role="tab" aria-selected="false">
            STANDARD <br> PENILAIAN 2
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="item-3-tab" data-bs-toggle="tab" href="#item-3" aria-controls="item-3" role="tab" aria-selected="false">
            STANDARD <br> PENILAIAN 3
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="item-4-tab" data-bs-toggle="tab" href="#item-4" aria-controls="item-4" role="tab" aria-selected="false">
            STANDARD <br> PENILAIAN 4
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="item-5-tab" data-bs-toggle="tab" href="#item-5" aria-controls="item-5" role="tab" aria-selected="false">
            STANDARD <br> PENILAIAN 5
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="item-6-tab" data-bs-toggle="tab" href="#item-6" aria-controls="item-6" role="tab" aria-selected="false">
            STANDARD <br> PENILAIAN 6
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="jumlah-tab" data-bs-toggle="tab" href="#jumlah" aria-controls="jumlah" role="tab" aria-selected="false" onclick="jumlah()">
            JUMLAH
        </a>
    </li>
</ul>

<div class="card">
    <div class="card-body">
        <div class="tab-content">
            <div class="tab-pane active" id="item-1" role="tabpanel" aria-labelledby="item-1-tab">
                @include('skpak.borang_skpak.item_1')
            </div>
            <div class="tab-pane fade" id="item-2" role="tabpanel" aria-labelledby="item-2-tab">
                @include('skpak.borang_skpak.item_2')
            </div>
            <div class="tab-pane fade" id="item-3" role="tabpanel" aria-labelledby="item-3-tab">
                @include('skpak.borang_skpak.item_3')
            </div>
            <div class="tab-pane fade" id="item-4" role="tabpanel" aria-labelledby="item-4-tab">
                @include('skpak.borang_skpak.item_4')
            </div>
            <div class="tab-pane fade" id="item-5" role="tabpanel" aria-labelledby="item-5-tab">
                @include('skpak.borang_skpak.item_5')
            </div>
            <div class="tab-pane fade" id="item-6" role="tabpanel" aria-labelledby="item-6-tab">
                @include('skpak.borang_skpak.item_6')
            </div>
            <div class="tab-pane fade" id="jumlah" role="tabpanel" aria-labelledby="jumlah-tab">
                
            </div>
        </div>
    </div>
</div>
@endsection

<script type="text/javascript">
var fragmentIdentifier = window.location.hash;
function tabclicked(argument) {
    console.log(argument)
}
function jumlah() {
    var id = $('#skpak_id').val();
    var url = "{{ route('skpak.get-jumlah') }}"
    $.ajax({
        url: url,
        method: 'POST',
        data: {
            id:id
        },
        success: function(response) {
            $('#jumlah').empty();
            $('#jumlah').append(response)
        }
    });
}
</script>
