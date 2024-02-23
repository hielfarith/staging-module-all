<style>
    #catatan_sekolah thead th {
        vertical-align: middle;
        text-align: center;
    }

    #catatan_sekolah tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #catatan_sekolah table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

<h5 class="card-title fw-bolder text-uppercase">
    Catatan Sekolah
</h5>

<hr>

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="catatan_sekolah">
        <thead>
            <tr>
                <th style="font-size: 10pt" width="5%">No.</th>
                <th style="font-size: 10pt" width="5%">Aspek</th>
                <th style="font-size: 10pt" width="15%">Maklumat Item</th>
                {{-- <th style="font-size: 10pt" >Catatan Sekolah</th> --}}
                <th style="font-size: 10pt">Catatan Validasi (PPD)</th>
                <th style="font-size: 10pt"width="5%">Penentuan Critically</th>
                <th style="font-size: 10pt"width="5%">Tindakan</th>
            </tr>
        </thead>
        <tbody style="font-size: 10pt">
            <tr>
                <td>1</td>
                <td>Aspek 1</td>
                <td>Mempunyai data dan rekod cara murid ke sekolah (Berjalan kaki, Berbasikal, Motosikal, Bas sekolah, Dihantar penjaga, Bot/Perahu,Kereta sendiri, Kereta api)</td>
                {{-- <td>Tiada laluan perjalanan kaki</td> --}}
                <td>
                    <textarea rows="5" class="form-control">Ni amik dari yang dah masukkan dalam table from aspek tu

                    </textarea>
                </td>
                <td>
                    <textarea rows="5" class="form-control">Pemeriksaan

                    </textarea>
                </td>
                <td style="text-align: center;">
                    <div class="btn-group " role="group" aria-label="Action">

                        <div class="d-flex justify-content-center align-items-center">
                            <input required class="form-check-input radio-input-2" type="radio" checked>
                        </div>
                        {{-- <a href="#" class="btn btn-xs btn-default" title="">
                            <i class="fa fa-save text-success" aria-hidden="true"></i>
                        </a>
                        <a class="btn btn-xs btn-default" title="">
                            <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                        </a> --}}
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="buy-now">
    <button class="btn btn-primary waves-effect waves-float waves-light" type="button" onclick="">
        Simpan
    </button>
</div>
