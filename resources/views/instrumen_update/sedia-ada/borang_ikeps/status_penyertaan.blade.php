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
                $sukans = [
                            1 => 'Bola Sepak',
                            2 => 'Bola Keranjang',
                            3 => 'Tenis',
                            4 => 'Renang',
                            5 => 'Badminton',
                            6 => 'Larian',
                            7 => 'Gimnastik',
                            8 => 'Bola Tampar',
                            9 => 'Berbasikal',
                            10 => 'Ping Pong',
                        ];
            ?>

            @foreach($sukans as $id => $sukan)
                <tr>
                    <td> {{ $id }} </td>
                    <td> {{ $sukan }} </td>

                    <td>
                        <input type="text" class="form-control" name="" id="">
                    </td>

                    <td>
                        <input type="text" class="form-control" name="" id="">
                    </td>

                    <td>
                        <input type="text" class="form-control" name="" id="">
                    </td>

                    <td>
                        <input type="text" class="form-control" name="" id="">
                    </td>

                    <td>
                        <input type="text" class="form-control" name="" id="">
                    </td>

                    <td>
                        <input type="text" class="form-control" name="" id="">
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

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
