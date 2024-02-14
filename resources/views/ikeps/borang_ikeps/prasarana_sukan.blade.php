<style>
    #prasarana_sukan_ikeps thead th {
        vertical-align: middle;
        text-align: center;
    }

    #prasarana_sukan_ikeps tbody {
        vertical-align: middle;
        text-align: center;
    }

    #prasarana_sukan_ikeps table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

<form id="praSukForm" action="{{ route('ikeps.store', 'prasarana_sukan') }}" method="POST">
@csrf

<div class="row">

    <div class="col-md-12 mt-2 mb-2">
        <label class="form-label fw-bold">Nama Sekolah</label>
        <input type="text" class="form-control" id="" name="" value="" disabled>
    </div>

    <div class="col-md-4">
        <h5 class="mb-1 fw-bold mb-1">
            <span class="badge rounded-pill badge-light-primary">
                1. Pemeriksaan Keselamatan
            </span>
        </h5>
        <label class="form-label fw-bold">
            Adakah pihak sekolah telah membuat pemeriksaan keselamatan ke atas peralatan dan kemudahan sukan sekolah?
        </label>
        <select name="pemeriksaan_keselamatan" id="pemeriksaan_keselamatan" class="form-control select2" onchange="HandlePemeriksaanKeselamatan()" {{ $disabled }}>
            <option value="" hidden>Pemeriksaan Keselamatan</option>
            <option value="1" @if($prasaranaSukan && $prasaranaSukan->pemeriksaan_keselamatan == 1) selected @endif>Ya</option>
            <option value="0" @if($prasaranaSukan && $prasaranaSukan->pemeriksaan_keselamatan == 0) selected @endif>Tidak</option>
        </select>
    </div>

    <div class="col-md-4 mt-4" id="div_tarikh_pemeriksaan" style="display: none;">
        <label class="form-label fw-bold">
            Tarikh Pemeriksaan
        </label>
        <input type="text" id="tarikh_pemeriksaan" name="tarikh_pemeriksaan" class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" value="{{ $prasaranaSukan?->tarikh_pemeriksaan }}">
    </div>
</div>

<hr>

<div class="table-responsive">
    <table class="table table-bordered table-hovered" id="prasarana_sukan_ikeps">
        <thead>
            <tr>
                <th rowspan="2">&nbsp;</th>
                <th rowspan="2">Ada</th>
                <th rowspan="2">Tiada</th>
                <th colspan="2">Gunasama</th>
                <th rowspan="2">Bilangan</th>
                <th colspan="2">Masih Digunakan</th>
                <th colspan="5">Status Fizikal</th>
            </tr>
            <tr>
                <th>Ya</th>
                <th>Tidak</th>
                <th>Ya</th>
                <th>Tidak</th>
                <th class="bg-light-success">Selesa</th>
                <th class="bg-light-secondary">Tidak Selesa</th>
                <th class="bg-light-warning">Kefungsian</th>
                <th class="bg-light-info">Sekuriti</th>
                <th class="bg-light-danger">Keselamatan</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $prasarana = config('staticdata.ikeps.prasarana_sukan');
            $ada_tiadas = config('staticdata.ikeps.ada_tiada');
            $gunasamas = config('staticdata.ikeps.gunasama');
            $masih_digunakans = config('staticdata.ikeps.masih_digunakan');
            $status_fizikals = config('staticdata.ikeps.status_fizikal');
            ?>

            @foreach($prasarana as $sukanKey => $sukan)
            <tr>
                <td colspan="13" class="bg-light-primary">
                    <h5 class="fw-bold text-uppercase text-primary">
                        {{ $sukan['title']}}
                    </h5>
                </td>
            </tr>

            <tr>
                <td> {{ $sukan['main'] }}</td>
                @foreach ($ada_tiadas as $id => $ada_tiada)
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" value="{{ $prasaranaSukan?->$sukanKey }}" name="{{ $sukanKey }}" id="{{ $sukanKey.'_'.$id }}" value="{{ $id }}" onclick="checkInputPrasarana('{{ $sukanKey }}', '{{ $id }}', true)" {{ $disabled }}>
                        </div>
                    </td>
                @endforeach

                @if(array_key_exists('sub', $sukan))
                    @if($sukanKey == 'padang_sekolah')
                        @foreach ($gunasamas as $id => $gunasama)
                            <?php
                            $guna_sama = $sukanKey.'_gunasama';
                            ?>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" value="{{ $prasaranaSukan?->$guna_sama }}" name="{{ $sukanKey.'_gunasama' }}" id="{{ $sukanKey.'_gunasama_'.$id }}" value="{{ $id }}" disabled>
                                </div>
                            </td>
                        @endforeach
                    @else
                <td colspan="2" class="text-danger">
                    Maklumat Tidak Berkenaan
                </td>
                    @endif

                <?php
                $bilangan = $sukanKey.'_bilangan';
                ?>
                <td>
                    <input type="text" class="form-control integerInput" value="{{ $prasaranaSukan?->$bilangan }}" id="{{ $sukanKey.'_bilangan' }}" name="{{ $sukanKey.'_bilangan' }}" disabled>
                </td>

                <td colspan="7" class="text-danger">
                    Maklumat Tidak Berkenaan
                </td>
                @else
                    @foreach ($gunasamas as $id => $gunasama)
                        <?php
                            $guna_sama = $sukanKey.'_gunasama';
                            ?>
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" value="{{ $prasaranaSukan?->$guna_sama }}" name="{{ $sukanKey.'_gunasama' }}" id="{{ $sukanKey.'_gunasama_'.$id }}" value="{{ $id }}" disabled>
                            </div>
                        </td>
                    @endforeach

                    <?php
                    $bilangan = $sukanKey.'_bilangan';
                    ?>
                    <td>
                        <input type="text" class="form-control integerInput" value="{{ $prasaranaSukan?->$bilangan }}" id="{{ $sukanKey.'_bilangan' }}" name="{{ $sukanKey.'_bilangan' }}" disabled>
                    </td>

                    @foreach ($masih_digunakans as $id => $masih_digunakan)
                        <?php
                        $masihDigunakan = $sukanKey.'_masih_digunakan';
                        ?>
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" value="{{ $prasaranaSukan?->$masihDigunakan }}" name="{{ $sukanKey.'_masih_digunakan' }}" id="{{ $sukanKey.'_masih_digunakan_'.$id }}" value="{{ $id }}" disabled>
                            </div>
                        </td>
                    @endforeach

                    @foreach ($status_fizikals as $id => $status_fizikal)
                        <?php
                        $statusFizikal = $sukanKey.'_status_fizikal';
                        ?>
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" value="{{ $prasaranaSukan?->$statusFizikal }} name="{{ $sukanKey.'_status_fizikal' }}" id="{{ $sukanKey.'_status_fizikal_'.$id }}" value="{{ $id }}" disabled>
                            </div>
                        </td>
                    @endforeach
                @endif
            </tr>

            
            @if($sukanKey == 'padang_sekolah')
            <tr>
                <td> Status Hak Milik Padang</td>
                <td colspan="2">
                    <select name="status_padang" id="status_padang" class="form-control select2" disabled onchange="statusHakMilik(this.value)">
                        <option value="" hidden>- Pilih -</option>
                        <?php
                        $status_padang = config('staticdata.ikeps.prasarana_sukan.padang_sekolah.sub.status_padang');
                        foreach($status_padang as $statusKey => $status){
                        ?>
                        <option value="{{ $statusKey }}" @if($prasaranaSukan && $prasaranaSukan->status_padang == $statusKey) selected @endif>{{ $status }}</option>
                        <?php 
                        }
                        ?>
                    </select>
                </td>
                <td colspan="10">
                    <select name="status_padang_butiran" id="status_padang_butiran" class="form-control select2" disabled>
                        <option value="" hidden>- Pilih -</option>
                        <option value="1" @if($prasaranaSukan && $prasaranaSukan->status_padang_butiran == 1) selected @endif>Sekolah A</option>
                    </select>
                </td>
            </tr>
            @endif

            @if(array_key_exists('sub', $sukan))
                @foreach($sukan['sub'] as $subKey => $sub)
                    @if($subKey != 'status_padang' && $subKey != 'gred_padang')
                    <tr>
                        <?php
                        $butiran = $subKey.'_butiran';
                        ?>
                        <td> {{ $sub }} @if($subKey == 'trek_lain') <input class="form-control" value="{{ $prasaranaSukan?->$butiran }}" name="{{ $subKey.'_butiran' }}" id="{{ $subKey.'_butiran' }}" disabled> @endif</td>
                        @foreach ($ada_tiadas as $id => $ada_tiada)
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" value="{{ $prasaranaSukan?->$subKey }}" name="{{ $subKey }}" id="{{ $subKey.'_'.$id }}" value="{{ $id }}" disabled onclick="checkInputPrasarana('{{ $subKey }}', '{{ $id }}', false)">
                                </div>
                            </td>
                        @endforeach

                        @foreach ($gunasamas as $id => $gunasama)
                            <?php
                            $guna_sama = $subKey.'_gunasama';
                            ?>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" value="{{ $prasaranaSukan?->$guna_sama }}" name="{{ $subKey.'_gunasama' }}" id="{{ $subKey.'_gunasama_'.$id }}" value="{{ $id }}" disabled>
                                </div>
                            </td>
                        @endforeach

                        <?php
                        $bilangan = $subKey.'_bilangan';
                        ?>
                        <td>
                            <input type="text" class="form-control integerInput" value="{{ $prasaranaSukan?->$bilangan }}" id="{{ $subKey.'_bilangan' }}" name="{{ $subKey.'_bilangan' }}" disabled>
                        </td>

                        @foreach ($masih_digunakans as $id => $masih_digunakan)
                            <?php
                            $masihDigunakan = $subKey.'_masih_digunakan';
                            ?>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" value="{{ $prasaranaSukan?->$masihDigunakan }}" name="{{ $subKey.'_masih_digunakan' }}" id="{{ $subKey.'_masih_digunakan_'.$id }}" value="{{ $id }}" disabled>
                                </div>
                            </td>
                        @endforeach

                        @foreach ($status_fizikals as $id => $status_fizikal)
                            <?php
                            $statusFizikal = $subKey.'_status_fizikal';
                            ?>
                            <td>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" value="{{ $prasaranaSukan?->$statusFizikal }}" name="{{ $subKey.'_status_fizikal' }}" id="{{ $subKey.'_status_fizikal_'.$id }}" value="{{ $id }}" disabled>
                                </div>
                            </td>
                        @endforeach
                    </tr>
                    @elseif($subKey == 'gred_padang')
                    <tr>
                        <td>Gred Padang</td>
                        <td colspan="12">
                            <select name="gred_padang" id="gred_padang" class="form-control select2" style="width:100px" disabled>
                                <option value="" hidden>- Pilih -</option>
                                <?php
                                $gred_padang = config('staticdata.ikeps.prasarana_sukan.padang_sekolah.sub.gred_padang');
                                foreach($gred_padang as $gredKey => $gred){
                                ?>
                                <option value="{{ $gredKey }}" @if($prasaranaSukan && $prasaranaSukan->gred_padang == $gredKey) selected @endif>{{ $gred }}</option>
                                <?php 
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    @endif
                @endforeach
            @endif

            @endforeach
        </tbody>
    </table>
</div>

<br>
<?php
    //$segment = Request::segment(3);
?>
{{-- @if($segment != 'sedia-ada') --}}
@if(!$checkReadOnly)
<div class="d-flex justify-content-center">
    <button type="button" class="btn btn-primary" onclick="submitTab('#praSukForm')">Simpan</button>
</div>
@endif
<br>

</form>

<div class="card-footer">
    {{-- <div class="d-flex justify-content-between"> --}}
    <div class="d-flex justify-content-end">
        {{-- <button class="btn btn-outline-secondary prev-tab">
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Kembali</span>
        </button> --}}
        <button class="btn btn-primary next-tab">
            <span class="align-middle d-sm-inline-block d-none">Seterusnya</span>
            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
        </button>
    </div>
</div>

<script>
    function checkInputPrasarana(inputID, value, parent){
        
        var inputBilangan = '#'+inputID+'_bilangan';
        
        if(value == 1){
            $(inputBilangan).prop('disabled', false);
        } else {
            $(inputBilangan).prop('disabled', true);
            $(inputBilangan).val('');
        }
        if((inputID != 'bilik_kecergasan' && inputID != 'makmal_sains' && inputID != 'kolam_renang') && parent){

            if(inputID == 'padang_sekolah'){
                var inputGunaSama1 = '#'+inputID+'_gunasama_1';
                var inputGunaSama2 = '#'+inputID+'_gunasama_0';
                var inputGred = '#gred_padang';
                var inputHakMilik = '#status_padang';
                var inputHakMilikButiran = '#status_padang_butiran';

                if(value == 1){
                    $(inputGunaSama1).prop('disabled', false);
                    $(inputGunaSama2).prop('disabled', false);
                    $(inputGred).prop('disabled', false);
                    $(inputHakMilik).prop('disabled', false);
                } else {
                    $(inputGunaSama1).prop('disabled', true);
                    $(inputGunaSama2).prop('disabled', true);
                    $(inputGred).prop('disabled', true);
                    $(inputHakMilik).prop('disabled', true);
                    $(inputHakMilikButiran).prop('disabled', true);
                    $(inputGunaSama1).prop('checked', false);
                    $(inputGunaSama2).prop('checked', false);
                    $(inputGred).val('');
                    $(inputHakMilik).val('');
                    $(inputHakMilikButiran).val('');
                }
            }

            var url = "{{ route('ikeps.get_sub_details', ['tab' => 'prasarana_sukan','type' => ':replaceThis']) }}";
            url = url.replace(':replaceThis', inputID);
            $.ajax({
                url: url,
                method: 'GET',
                async: true,
                success: function(data) {

                    const menu_list = [
                        '1', '0', 
                        'gunasama_1', 'gunasama_0',
                        'bilangan', 
                        'masih_digunakan_1', 'masih_digunakan_0',
                        'status_fizikal_1', 'status_fizikal_2', 'status_fizikal_3', 'status_fizikal_4', 'status_fizikal_5',
                    ];
                    // Loop through the detail object
                    for (var key in data.detail) {
                        for (var menu in menu_list){
                            var inputSub = '#'+key+'_'+menu_list[menu];
                            
                            if(value == 1){
                                if(menu_list[menu] == '0' || menu_list[menu] == '1'){
                                    $(inputSub).prop('disabled', false);
                                } else {
                                    if(menu_list[menu] == 'bilangan'){
                                        $(inputSub).val('');   
                                    }
                                    $(inputSub).prop('disabled', true);
                                }

                                $(inputSub).prop('checked', false);
                            } else {
                                $(inputSub).prop('disabled', true);

                                if(menu_list[menu] == '0'){
                                    $(inputSub).prop('checked', true);
                                } else {
                                    if(menu_list[menu] == 'bilangan'){
                                        $(inputSub).val('');   
                                    }
                                    $(inputSub).prop('checked', false);
                                }
                            }
                        }

                        if(key == 'trek_lain'){
                            var inputButiran = '#'+key+'_butiran';

                            $(inputButiran).prop('disabled', true);
                            $(inputButiran).val('');
                            
                        }
                    }
                },
                error: function(data) {
                    //
                }
            });

        } else if(inputID == 'bilik_kecergasan' || inputID == 'makmal_sains' || inputID == 'kolam_renang'){
            const menu_list = [
                'gunasama_1', 'gunasama_0',
                'masih_digunakan_1', 'masih_digunakan_0',
                'status_fizikal_1', 'status_fizikal_2', 'status_fizikal_3', 'status_fizikal_4', 'status_fizikal_5',
            ];

            for (var menu in menu_list){
                var input = '#'+inputID+'_'+menu_list[menu];

                if(value == 1){
                    $(input).prop('disabled', false);
                } else {
                    $(input).prop('disabled', true);
                }
                
            }
        } else if(!parent) {
            const menu_list = [
                'gunasama_1', 'gunasama_0',
                'masih_digunakan_1', 'masih_digunakan_0',
                'status_fizikal_1', 'status_fizikal_2', 'status_fizikal_3', 'status_fizikal_4', 'status_fizikal_5',
            ];

            for (var menu in menu_list){
                var input = '#'+inputID+'_'+menu_list[menu];

                $(input).prop('checked', false);

                if(value == 1){
                    $(input).prop('disabled', false);
                    if(inputID == 'trek_lain'){
                        var inputButiran = '#'+inputID+'_butiran';

                        $(inputButiran).prop('disabled', false);
                        $(inputButiran).val('');
                    }
                } else {
                    $(input).prop('disabled', true);

                    if(inputID == 'trek_lain'){
                        var inputButiran = '#'+inputID+'_butiran';

                        $(inputButiran).prop('disabled', true);
                        $(inputButiran).val('');
                    }
                }
                
            }
        }
    }

    function statusHakMilik(value){
        var butiran = $('#status_padang_butiran');

        if(value == 1){
            butiran.prop('disabled', true);
            butiran.val('');
        } else {
            butiran.prop('disabled', false);
        }
    }
</script>
