<form id="kemSukForm" action="{{ route('ikeps.store', 'kemudahan_sukan') }}" method="POST">
@csrf

<div class="row">

    <div class="col-md-12 mt-2 mb-2">
        <label class="form-label fw-bold">Nama Sekolah</label>
        <input type="text" class="form-control" id="" name="" value="" disabled>
    </div>
</div>

<hr>

<div class="table-responsive">
    <table class="table table-bordered table-hovered">
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
                $kemudahan_sukan = config('staticdata.ikeps.kemudahan_sukan');
                $ada_tiadas = config('staticdata.ikeps.ada_tiada');
                $gunasamas = config('staticdata.ikeps.gunasama');
                $masih_digunakans = config('staticdata.ikeps.masih_digunakan');
                $status_fizikals = config('staticdata.ikeps.status_fizikal');
            ?>

            @foreach ($kemudahan_sukan as $sukanKey => $sukan)
            <tr>
                <td colspan="13" class="bg-light-primary">
                    <h5 class="fw-bold text-uppercase text-primary">
                        {{ $sukan['title'] }}
                    </h5>
                </td>
            </tr>

            <tr>
                <td> {{ $sukan['main'] }}</td>
                @foreach ($ada_tiadas as $id => $ada_tiada)
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="{{ $sukanKey }}" id="{{ $sukanKey.'_'.$id }}" value="{{ $id }}" onclick="checkInputKemudahan('{{ $sukanKey }}', '{{ $id }}', true)" {{ $disabled }}>
                        </div>
                    </td>
                @endforeach

                <td colspan="2" class="text-danger">
                    Maklumat Tidak Berkenaan
                </td>

                <td>
                    <input type="text" class="form-control" id="{{ $sukanKey.'_bilangan' }}" name="{{ $sukanKey.'_bilangan' }}" disabled>
                </td>

                <td colspan="7" class="text-danger">
                    Maklumat Tidak Berkenaan
                </td>
            </tr>

                @foreach($sukan['sub'] as $subKey => $sub)
            <tr>
                <td> {{ $sub }} @if($subKey == 'bt_lain' || $subKey == 'lain_kemudahan' ) <input class="form-control" name="{{ $subKey.'_butiran' }}" id="{{ $subKey.'_butiran' }}" disabled> @endif</td>
                        @foreach ($ada_tiadas as $id => $ada_tiada)
                <td>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="{{ $subKey }}" id="{{ $subKey.'_'.$id }}" value="{{ $id }}" disabled onclick="checkInputKemudahan('{{ $subKey }}', '{{ $id }}', false)">
                    </div>
                </td>
                        @endforeach

                        @foreach ($gunasamas as $id => $gunasama)
                <td>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="{{ $subKey.'_gunasama' }}" id="{{ $subKey.'_gunasama_'.$id }}" value="{{ $id }}" disabled>
                    </div>
                </td>
                        @endforeach

                <td>
                    <input type="text" class="form-control" id="{{ $subKey.'_bilangan' }}" name="{{ $subKey.'_bilangan' }}" disabled>
                </td>

                        @foreach ($masih_digunakans as $id => $masih_digunakan)
                <td>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="{{ $subKey.'_masih_digunakan' }}" id="{{ $subKey.'_masih_digunakan_'.$id }}" value="{{ $id }}" disabled>
                    </div>
                </td>
                        @endforeach

                        @foreach ($status_fizikals as $id => $status_fizikal)
                <td>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="{{ $subKey.'_status_fizikal' }}" id="{{ $subKey.'_status_fizikal_'.$id }}" value="{{ $id }}" disabled>
                    </div>
                </td>
                        @endforeach
            </tr>
                @endforeach
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
    <button type="button" class="btn btn-primary" onclick="submitTab('#kemSukForm')">Simpan</button>
</div>
@endif
<br>

</form>

<div class="card-footer">
    <div class="d-flex justify-content-between">
        <button class="btn btn-outline-secondary prev-tab">
            <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
            <span class="align-middle d-sm-inline-block d-none">Kembali</span>
        </button>
        <button class="btn btn-primary next-tab">
            <span class="align-middle d-sm-inline-block d-none">Seterusnya</span>
            <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
        </button>
    </div>
</div>

<script>
    function checkInputKemudahan(inputID, value, parent){
        
        var inputBilangan = '#'+inputID+'_bilangan';
        
        if(value == 1){
            $(inputBilangan).prop('disabled', false);
        } else {
            $(inputBilangan).prop('disabled', true);
            $(inputBilangan).val('');
        }
        if(parent){

            var url = "{{ route('ikeps.get_sub_details', ['tab' => 'kemudahan_sukan','type' => ':replaceThis']) }}";
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

                        if(key == 'bt_lain' || key == 'lain_kemudahan'){
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
                    if(inputID == 'bt_lain' || inputID == 'lain_kemudahan'){
                        var inputButiran = '#'+inputID+'_butiran';

                        $(inputButiran).prop('disabled', false);
                        $(inputButiran).val('');
                    }
                } else {
                    $(input).prop('disabled', true);

                    if(inputID == 'bt_lain' || inputID == 'lain_kemudahan'){
                        var inputButiran = '#'+inputID+'_butiran';

                        $(inputButiran).prop('disabled', true);
                        $(inputButiran).val('');
                    }
                }
                
            }
        }
    }
</script>