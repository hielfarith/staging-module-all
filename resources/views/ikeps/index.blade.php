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

<?php
if($checkReadOnly){
    $disabled = 'disabled';
} else {
    $disabled = '';
}
?>

<style>
    .flatpickr-basic:disabled {
        background-color: #efefef;
    }
</style>

<div class="card">
    <div class="card-header">
        <h4 class="card-title fw-bolder"> Instrumen Bancian Kemudahan Prasasarana dan Program Sukan Sekolah </h4>

        <div class="justify-content-end align-items-center" style="width: 10%">
            <label class="form-label fw-bold">Tahun Kutipan</label>
            <select name="tahun" id="tahun" class="form-select select2" onchange="this.options[this.selectedIndex].value && (window.location = '/ikeps/borang-pengisian/'+this.options[this.selectedIndex].value);">
                @for ($year = date('Y') - 5; $year <= date('Y'); $year++)
                    <option value="{{ $year }}" @if($year == $tahun) selected @endif>{{ $year }}</option>
                @endfor
            </select>
        </div>

        <input type="hidden" name="ikeps_id" id="ikeps_id" value="{{ $ikeps->id }}">
    </div>
    <hr>

    <div class="card-body">
        <ul class="nav nav-pills nav-justified" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="text-uppercase text-wrap nav-link fw-bolder active" id="tab-prasarana-kemudahan" data-bs-toggle="tab" href="#prasarana-kemudahan" aria-controls="prasarana-kemudahan" role="tab" aria-selected="true">
                    Prasarana & Kemudahan Sukan
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="text-uppercase text-wrap nav-link fw-bolder" id="tab-program-koku-seni" data-bs-toggle="tab" href="#program-koku-seni" aria-controls="program-koku-seni" role="tab" aria-selected="true">
                    Program Sukan, Kokurikulum & Kesenian
                </a>
            </li>
        </ul>
        <hr>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="prasarana-kemudahan" role="tabpanel" aria-labelledby="tab-prasarana-kemudahan">
                <ul class="nav nav-pills nav-justified" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="text-uppercase text-wrap nav-link fw-bolder active" id="prasarana-sukan-tab" data-bs-toggle="tab" href="#prasarana-sukan" aria-controls="prasarana-sukan" role="tab" aria-selected="true">
                            Prasarana Sukan
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="text-uppercase text-wrap nav-link fw-bolder" id="kemudahan-sukan-tab" data-bs-toggle="tab" href="#kemudahan-sukan" aria-controls="kemudahan-sukan" role="tab" aria-selected="true">
                            Kemudahan Sukan
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="prasarana-sukan" role="tabpanel" aria-labelledby="prasarana-sukan-tab">
                        @include('ikeps.borang_ikeps.prasarana_sukan')
                    </div>
                    <div class="tab-pane fade" id="kemudahan-sukan" role="tabpanel" aria-labelledby="kemudahan-sukan-tab">
                        @include('ikeps.borang_ikeps.kemudahan_sukan')
                    </div>
                </div>
            </div>
            <div class="tab-pane fade show" id="program-koku-seni" role="tabpanel" aria-labelledby="tab-program-koku-seni">
                <ul class="nav nav-pills nav-justified" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="text-uppercase text-wrap nav-link fw-bolder active" id="perancangan-sukan-tab" data-bs-toggle="tab" href="#perancangan-sukan" aria-controls="perancangan-sukan" role="tab" aria-selected="true">
                            Perancangan Sukan
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="text-uppercase text-wrap nav-link fw-bolder" id="status-penyertaan-tab" data-bs-toggle="tab" href="#status-penyertaan" aria-controls="status-penyertaan" role="tab" aria-selected="true">
                            Status Penyertaan
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="text-uppercase text-wrap nav-link fw-bolder" id="program-sekolah-tab" data-bs-toggle="tab" href="#program-sekolah" aria-controls="program-sekolah" role="tab" aria-selected="true">
                            Program Sekolah Sukan
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="text-uppercase text-wrap nav-link fw-bolder" id="pengesahan-tab" data-bs-toggle="tab" href="#pengesahan" aria-controls="pengesahan" role="tab" aria-selected="true">
                            Pengesahan
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="perancangan-sukan" role="tabpanel" aria-labelledby="perancangan-sukan-tab">
                        @include('ikeps.borang_ikeps.perancangan_sukan')
                    </div>
                    <div class="tab-pane fade" id="status-penyertaan" role="tabpanel" aria-labelledby="status-penyertaan-tab">
                        @include('ikeps.borang_ikeps.status_penyertaan')
                    </div>
                    <div class="tab-pane fade" id="program-sekolah" role="tabpanel" aria-labelledby="program-sekolah-tab">
                        @include('ikeps.borang_ikeps.program_sekolah')
                    </div>
                    <div class="tab-pane fade" id="pengesahan" role="tabpanel" aria-labelledby="pengesahan-tab">
                        @include('ikeps.borang_ikeps.pengesahan')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function HandlePemeriksaanKeselamatan() {
        var pemeriksaanKeselamatan = $('#pemeriksaan_keselamatan').val();
            if (pemeriksaanKeselamatan == '1') {
                $('#div_tarikh_pemeriksaan').show();
            } else if (pemeriksaanKeselamatan == '2') {
                $('#div_tarikh_pemeriksaan').hide();
            } else {
                $('#div_tarikh_pemeriksaan').hide();
            }
    }

    $('.next-tab').on('click', function() {
        var currentTab = $(this).closest('.tab-pane');
        var nextTab = currentTab.next('.tab-pane');
        $('a[href="#' + nextTab.attr('id') + '"]').tab('show');
    });

    $('.prev-tab').on('click', function() {
        var currentTab = $(this).closest('.tab-pane');
        var prevTab = currentTab.prev('.tab-pane');
        $('a[href="#' + prevTab.attr('id') + '"]').tab('show');
    });

    $('.integerInput').on('input', function() {
        this.value = this.value
        .replace(/[^\d]/g, '');// numbers and decimals only
    });

    function submitTab(form){
        var tahun = $('#tahun').val();
        var ikeps_id = $('#ikeps_id').val();
        var formData = new FormData($(form)[0]);
        formData.append('tahun', tahun);
        formData.append('ikeps_id', ikeps_id);
        $.ajax({
            url: $(form).attr('action'),
            method: $(form).attr('method'),
            data: formData,
            async: true,
            contentType: false,
            processData: false,
            success: function(data) {
                toastr.success(data.title ?? "Berjaya Disimpan");
                console.log(form);
                if(form == '#sediaOlehForm' || form == '#sahOlehForm'){
                    window.location.href="{{ route('ikeps.ringkasan_ikeps') }}";
                }
            },
            error: function(data) {
                var data = data.responseJSON;
                var message = data.detail.replace(/\(and \d+ more error(?:s)?\)/, '');
                Swal.fire(data.title, message, 'error');
            }
        });
    }

    function showDetails(input, inputName, inputType){
        var trName = '#tr_'+inputName;
        if(input.value > 0){
            $.ajax({
                url: "{{ route('ikeps.get_status_penyertaan') }}",
                method: "GET",
                data: {
                    value: input.value,
                    name: inputName,
                    type: inputType,
                },
                async: true,
                success: function(data) {
                    if(inputType == 'kebangsaan'){
                        var tdName = '#td_'+inputName+'_kebangsaan';
                        $(trName).show();
                        $(tdName).html(data);
                        
                    }

                    if(inputType == 'antarabangsa'){
                        var tdName = '#td_'+inputName+'_antarabangsa';
                        $(trName).show();
                        $(tdName).html(data);
                    }
                },
                error: function(data) {
                    //
                }
            });
        } else {
            if(inputType == 'kebangsaan'){
                var tdName = '#td_'+inputName+'_kebangsaan';
                $(trName).show();
                $(tdName).html('');
                
            }

            if(inputType == 'antarabangsa'){
                var tdName = '#td_'+inputName+'_antarabangsa';
                $(trName).show();
                $(tdName).html('');
            }
        }
    }
</script>
@endsection
