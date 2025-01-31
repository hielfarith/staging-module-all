<form id="staPenForm" action="{{ route('ikeps.store', 'status_penyertaan') }}" method="POST">
@csrf

<div class="row">

    <div class="col-md-2 mt-2 mb-2">
        <label class="form-label fw-bold">Kod Sekolah</label>
        <input type="text" class="form-control" id="" name="" value="" disabled>
    </div>

    <div class="col-md-10 mt-2 mb-2">
        <label class="form-label fw-bold">Nama Sekolah</label>
        <input type="text" class="form-control" id="" name="" value="" disabled>
    </div>
</div>

<hr>

<div class="table-responsive">
    <table class="table table-bordered table-hovered" id="table_sukan_mssm">
        <thead>
            <tr>
                <th colspan="8">Sukan MSSM</th>
            </tr>
            <tr>
                <th rowspan="2">#</th>
                <th rowspan="2">Nama Sukan</th>
                <th colspan="6">Bilangan Penyertaan Murid</th>
            </tr>

            <tr>
                <th>Zon</th>
                <th>Daerah</th>
                <th>Bahagian</th>
                <th>Negeri</th>
                <th>Kebangsaan</th>
                <th>Antarabangsa</th>
            </tr>
        </thead>
        <tbody>

            <?php
                $i = 1;
                $sukan_mssm = config('staticdata.ikeps.status_penyertaan.sukan_mssm');
            ?>

            @foreach($sukan_mssm as $id => $sukan)
                <tr>
                    <td> {{ $i++ }} </td>
                    <td> {{ $sukan }} </td>

                    <?php
                    $zon = $id.'_zon';
                    $daerah = $id.'_daerah';
                    $bahagian = $id.'_bahagian';
                    $negeri = $id.'_negeri';
                    $kebangsaan = $id.'_kebangsaan';
                    $antarabangsa = $id.'_antarabangsa';
                    ?>
                    <td>
                        <input type="text" class="form-control integerInput" value="{{ $statusPenyertaan?->$zon }}" name="{{ $id.'_zon' }}" id="{{ $id.'_zon' }}"  {{ $disabled }}>
                    </td>

                    <td>
                        <input type="text" class="form-control integerInput" value="{{ $statusPenyertaan?->$daerah }}" name="{{ $id.'_daerah' }}" id="{{ $id.'_daerah' }}"  {{ $disabled }}>
                    </td>

                    <td>
                        <input type="text" class="form-control integerInput" value="{{ $statusPenyertaan?->$bahagian }}" name="{{ $id.'_bahagian' }}" id="{{ $id.'_bahagian' }}"  {{ $disabled }}>
                    </td>

                    <td>
                        <input type="text" class="form-control integerInput" value="{{ $statusPenyertaan?->$negeri }}" name="{{ $id.'_negeri' }}" id="{{ $id.'_negeri' }}"  {{ $disabled }}>
                    </td>

                    <td>
                        <input type="text" class="form-control integerInput" value="{{ $statusPenyertaan?->$kebangsaan }}" name="{{ $id.'_kebangsaan' }}" id="{{ $id.'_kebangsaan' }}" onchange="showDetails(this, '{{ $id }}', 'kebangsaan')"  {{ $disabled }}>
                    </td>

                    <td>
                        <input type="text" class="form-control integerInput" value="{{ $statusPenyertaan?->$antarabangsa }}" name="{{ $id.'_antarabangsa' }}" id="{{ $id.'_antarabangsa' }}" onchange="showDetails(this, '{{ $id }}', 'antarabangsa')"  {{ $disabled }}>
                    </td>
                </tr>
                <tr id="tr_{{ $id }}" style="display:none">
                    <td colspan="4" id="td_{{ $id }}_kebangsaan"></td>
                    <td colspan="4" id="td_{{ $id }}_antarabangsa"></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<hr>

<div class="table-responsive">
    <table class="table table-bordered table-hovered" id="table_sukan_lain">
        <thead>
            <tr>
                <th colspan="8">Sukan Lain</th>
            </tr>
            <tr>
                <th rowspan="2">#</th>
                <th rowspan="2">Nama Sukan</th>
                <th colspan="6">Bilangan Penyertaan Murid</th>
            </tr>

            <tr>
                <th>Zon</th>
                <th>Daerah</th>
                <th>Bahagian</th>
                <th>Negeri</th>
                <th>Kebangsaan</th>
                <th>Antarabangsa</th>
            </tr>
        </thead>
        <tbody>

            <?php
                $j = 1;
                $sukan_lain = config('staticdata.ikeps.status_penyertaan.sukan_lain');
            ?>

            @foreach($sukan_lain as $id => $sukan)
                <tr>
                    <td> {{ $j++ }} </td>
                    <td>
                        @if ($id == 'lain_1' || $id == 'lain_2' || $id == 'lain_3')
                        <?php
                        $butiran = $id.'_butiran';
                        ?>
                        <select class="form-control select2" name="{{ $id.'_butiran' }}" id="{{ $id.'_butiran' }}"  {{ $disabled }}>
                            <option value="" hidden>{{ $sukan }}</option>
                            <option value="1" @if($statusPenyertaan && $statusPenyertaan->$butiran == 1) selected @endif>Dart</option>
                            <option value="2" @if($statusPenyertaan && $statusPenyertaan->$butiran == 2) selected @endif>Dodgeball</option>
                            <option value="3" @if($statusPenyertaan && $statusPenyertaan->$butiran == 3) selected @endif>Frisbee</option>
                        </select>
                        @else
                        {{ $sukan }} 
                        @endif
                    </td>

                    <?php
                    $zon = $id.'_zon';
                    $daerah = $id.'_daerah';
                    $bahagian = $id.'_bahagian';
                    $negeri = $id.'_negeri';
                    $kebangsaan = $id.'_kebangsaan';
                    $antarabangsa = $id.'_antarabangsa';
                    ?>
                    <td>
                        <input type="text" class="form-control integerInput" value="{{ $statusPenyertaan?->$zon }}" name="{{ $id.'_zon' }}" id="{{ $id.'_zon' }}"  {{ $disabled }}>
                    </td>

                    <td>
                        <input type="text" class="form-control integerInput" value="{{ $statusPenyertaan?->$daerah }}" name="{{ $id.'_daerah' }}" id="{{ $id.'_daerah' }}"  {{ $disabled }}>
                    </td>

                    <td>
                        <input type="text" class="form-control integerInput" value="{{ $statusPenyertaan?->$bahagian }}" name="{{ $id.'_bahagian' }}" id="{{ $id.'_bahagian' }}"  {{ $disabled }}>
                    </td>

                    <td>
                        <input type="text" class="form-control integerInput" value="{{ $statusPenyertaan?->$negeri }}" name="{{ $id.'_negeri' }}" id="{{ $id.'_negeri' }}"  {{ $disabled }}>
                    </td>

                    <td>
                        <input type="text" class="form-control integerInput" value="{{ $statusPenyertaan?->$kebangsaan }}" name="{{ $id.'_kebangsaan' }}" id="{{ $id.'_kebangsaan' }}" onchange="addDetails(this, '{{ $id }}', 'kebangsaan')"  {{ $disabled }}>
                    </td>

                    <td>
                        <input type="text" class="form-control integerInput" value="{{ $statusPenyertaan?->$antarabangsa }}" name="{{ $id.'_antarabangsa' }}" id="{{ $id.'_antarabangsa' }}" onchange="addDetails(this, '{{ $id }}', 'antarabangsa')"  {{ $disabled }}>
                    </td>
                </tr>
                <tr id="tr_{{ $id }}" style="display:none">
                    <td colspan="4" id="td_{{ $id }}_kebangsaan"></td>
                    <td colspan="4" id="td_{{ $id }}_antarabangsa"></td>
                </tr>
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
    <button type="button" class="btn btn-primary" onclick="submitTab('#staPenForm')">Simpan</button>
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
