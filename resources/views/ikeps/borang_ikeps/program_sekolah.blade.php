<form id="proSekForm" action="{{ route('ikeps.store', 'program_sekolah') }}" method="POST">
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
    <table class="table table-bordered table-hovered">
        <thead>
            <tr>
                <th colspan="2" rowspan="2">&nbsp;</th>
                <th colspan="2">Dilaksanakan</th>
                <th rowspan="2">Setiap Tahun</th>
                <th rowspan="2">Dua Tahun Sekali</th>
                <th rowspan="2">Bulan Perlaksanaan</th>
            </tr>
            <tr>
                <th>Ya</th>
                <th>Tidak</th>
            </tr>
        </thead>
        <tbody>

            <?php
                $i = 1;
                $programs = config('staticdata.ikeps.program_sekolah');
                $dilaksanakans = [
                    1 => 'ya',
                    0 => 'tidak',
                ];
            ?>

            @foreach($programs as $idProgram => $program)
                <tr>
                    <td> {{ $i++ }} </td>
                    <?php
                    $butiran = $idProgram.'_butiran';
                    ?>
                    <td> {{ $program }} @if($idProgram == 'lain') <input class="form-control" value="{{ $programSekolah?->$butiran }}" name="{{ $idProgram.'_butiran' }}" id="{{ $idProgram.'_butiran' }}"> @endif</td>

                    @foreach ($dilaksanakans as $id => $dilaksanakan)
                        <td>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" @if($programSekolah && $programSekolah->$idProgram == $id) checked @endif name="{{ $idProgram }}" id="{{ $idProgram.'_'.$id }}" value="{{ $dilaksanakan }}">
                            </div>
                        </td>
                    @endforeach

                    <?php
                    $kekerapan = $idProgram.'_kekerapan';
                    ?>
                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" @if($programSekolah && $programSekolah->$kekerapan == 1) checked @endif name="{{ $idProgram.'_kekerapan' }}" id="{{ $idProgram.'_kekerapan_1' }}" value="1">
                        </div>
                    </td>

                    <td>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" @if($programSekolah && $programSekolah->$kekerapan == 2) checked @endif name="{{ $idProgram.'_kekerapan' }}" id="{{ $idProgram.'_kekerapan_2' }}" value="2">
                        </div>
                    </td>

                    <?php
                    $perlaksanaan = $idProgram.'_perlaksanaan';
                    ?>
                    <td>
                        <select name="{{ $idProgram.'_perlaksanaan' }}" id="{{ $idProgram.'_perlaksanaan' }}" class="form-control select2">
                            <option value="" hidden>Bulan</option>
                            <option value="1" @if($programSekolah && $programSekolah->$perlaksanaan == 1) selected @endif>Januari</option>
                            <option value="2" @if($programSekolah && $programSekolah->$perlaksanaan == 2) selected @endif>Februari</option>
                            <option value="3" @if($programSekolah && $programSekolah->$perlaksanaan == 3) selected @endif>Mac</option>
                            <option value="4" @if($programSekolah && $programSekolah->$perlaksanaan == 4) selected @endif>April</option>
                            <option value="5" @if($programSekolah && $programSekolah->$perlaksanaan == 5) selected @endif>Mei</option>
                            <option value="6" @if($programSekolah && $programSekolah->$perlaksanaan == 6) selected @endif>Jun</option>
                            <option value="7" @if($programSekolah && $programSekolah->$perlaksanaan == 7) selected @endif>Julai</option>
                            <option value="8" @if($programSekolah && $programSekolah->$perlaksanaan == 8) selected @endif>Ogos</option>
                            <option value="9" @if($programSekolah && $programSekolah->$perlaksanaan == 9) selected @endif>September</option>
                            <option value="10" @if($programSekolah && $programSekolah->$perlaksanaan == 10) selected @endif>Oktober</option>
                            <option value="11" @if($programSekolah && $programSekolah->$perlaksanaan == 11) selected @endif>November</option>
                            <option value="12" @if($programSekolah && $programSekolah->$perlaksanaan == 12) selected @endif>Disember</option>
                        </select>
                    </td>
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
    <button type="button" class="btn btn-primary" onclick="submitTab('#proSekForm')">Simpan</button>
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
