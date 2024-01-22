<form id="staPenForm" action="{{ route('ikeps.store', 'status_pertanyaan') }}" method="POST">
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

                    <td>
                        <input type="text" class="form-control integerInput" name="{{ $id.'_zon' }}" id="{{ $id.'_zon' }}">
                    </td>

                    <td>
                        <input type="text" class="form-control integerInput" name="{{ $id.'_daerah' }}" id="{{ $id.'_daerah' }}">
                    </td>

                    <td>
                        <input type="text" class="form-control integerInput" name="{{ $id.'_bahagian' }}" id="{{ $id.'_bahagian' }}">
                    </td>

                    <td>
                        <input type="text" class="form-control integerInput" name="{{ $id.'_negeri' }}" id="{{ $id.'_negeri' }}">
                    </td>

                    <td>
                        <input type="text" class="form-control integerInput" name="{{ $id.'_kebangsaan' }}" id="{{ $id.'_kebangsaan' }}">
                    </td>

                    <td>
                        <input type="text" class="form-control integerInput" name="{{ $id.'_antarabangsa' }}" id="{{ $id.'_antarabangsa' }}">
                    </td>
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
                        <select class="form-control select2" name="{{ $id.'_zon' }}" id="{{ $id.'_zon' }}">
                            <option value="" hidden>{{ $sukan }}</option>
                            <option value="1">Dart</option>
                            <option value="2">Dodgeball</option>
                            <option value="3">Frisbee</option>
                        </select>
                        @else
                        {{ $sukan }} 
                        @endif
                    </td>

                    <td>
                        <input type="text" class="form-control integerInput" name="{{ $id.'_zon' }}" id="{{ $id.'_zon' }}">
                    </td>

                    <td>
                        <input type="text" class="form-control integerInput" name="{{ $id.'_daerah' }}" id="{{ $id.'_daerah' }}">
                    </td>

                    <td>
                        <input type="text" class="form-control integerInput" name="{{ $id.'_bahagian' }}" id="{{ $id.'_bahagian' }}">
                    </td>

                    <td>
                        <input type="text" class="form-control integerInput" name="{{ $id.'_negeri' }}" id="{{ $id.'_negeri' }}">
                    </td>

                    <td>
                        <input type="text" class="form-control integerInput" name="{{ $id.'_kebangsaan' }}" id="{{ $id.'_kebangsaan' }}">
                    </td>

                    <td>
                        <input type="text" class="form-control integerInput" name="{{ $id.'_antarabangsa' }}" id="{{ $id.'_antarabangsa' }}">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<br>

<div class="d-flex justify-content-center">
    <button type="button" class="btn btn-primary" onclick="submitTab('#staPenForm')">Simpan</button>
</div>

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
