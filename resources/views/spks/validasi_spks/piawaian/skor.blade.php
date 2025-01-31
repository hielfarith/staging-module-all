<style>
    #jumlahKeseluruhanSpks thead th {
        vertical-align: middle;
        text-align: center;
    }

    #jumlahKeseluruhanSpks tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #jumlahKeseluruhanSpks table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }

</style>

{{-- <div class="card-header d-flex justify-content-between align-items-center"> --}}

    <div class="card-header d-flex justify-content-end">
        {{-- <h5 class="card-title fw-bolder">SKOR PIAWAIAN</h5> --}}
        <div style="padding-top: 1%;">
            <p style="font-size:10pt;background-color: #0C2043; color: white; padding: 5px 10px; font-weight: bold;">Status Sekolah:
                <span id="skoreview"></span></p>
        </div>
    </div>



    <div style="margin-top: -1%" class="table-responsive">
        <table class="table header_uppercase table-bordered table-hovered" id="jumlahKeseluruhanSpks">
            <thead>
                <tr>
                    <th style="font-size: 9pt" width="4%">Bil</th>
                    <th style="font-size: 9pt" width="20%">ASPEk</th>
                    <th style="font-size: 9pt" width="18%">WAJARAN</th>
                    <th style="font-size: 9pt" width="18%">SKOR PENUH</th>
                    <th style="font-size: 9pt" width="18%">SKOR DIPEROLEHI</th>
                    <th style="font-size: 9pt" width="18%">PERATUS PENCAPAIAN</th>
                </tr>
            </thead>

            <tbody>

                <tr>
                    <td style="font-size: 9pt" class="text-center">1</td>
                    <td style="font-size: 9pt">Pengurusan Aktiviti Murid</td>
                    <td style="font-size: 9pt" class="text-center">30%</td>
                    <td style="font-size: 9pt" class="text-center" id="count1Total"></td>
                    <td style="font-size: 9pt" class="text-center" id="count1"></td>
                    <td style="font-size: 9pt" class="text-center" id="percentage1"></td>
                </tr>
                <tr>
                    <td style="font-size: 9pt" class="text-center">2</td>
                    <td style="font-size: 9pt">Pengurusan Keselamatan Infrastruktur Sekolah</td>
                    <td style="font-size: 9pt" class="text-center">20%</td>
                    <td style="font-size: 9pt" class="text-center" id="count2Total"></td>
                    <td style="font-size: 9pt" class="text-center" id="count2"></td>
                    <td style="font-size: 9pt" class="text-center" id="percentage2"></td>
                </tr>
                <tr>
                    <td style="font-size: 9pt" class="text-center">3</td>
                    <td style="font-size: 9pt">Pengurusan Sosial</td>
                    <td style="font-size: 9pt" class="text-center">10%</td>
                    <td style="font-size: 9pt" class="text-center" id="count3Total"></td>
                    <td style="font-size: 9pt" class="text-center" id="count3"></td>
                    <td style="font-size: 9pt" class="text-center" id="percentage3"></td>
                </tr>
                <tr>
                    <td style="font-size: 9pt" class="text-center">4</td>
                    <td style="font-size: 9pt">Pengurusan Krisis/Bencana</td>
                    <td style="font-size: 9pt" class="text-center">9%</td>
                    <td style="font-size: 9pt" class="text-center" id="count4Total"></td>
                    <td style="font-size: 9pt" class="text-center" id="count4"></td>
                    <td style="font-size: 9pt" class="text-center" id="percentage4"></td>
                </tr>
                <tr>
                    <td style="font-size: 9pt" class="text-center">5</td>
                    <td style="font-size: 9pt">Pengurusan Risiko</td>
                    <td style="font-size: 9pt" class="text-center">10%</td>
                    <td style="font-size: 9pt" class="text-center" id="count5Total"></td>
                    <td style="font-size: 9pt" class="text-center" id="count5"></td>
                    <td style="font-size: 9pt" class="text-center" id="percentage5"></td>
                </tr>
                <tr>
                    <td style="font-size: 9pt" class="text-center">6</td>
                    <td style="font-size: 9pt">Pengurusan Perkhidmatan Pengawal Keselamatan Sekolah</td>
                    <td style="font-size: 9pt" class="text-center">20%</td>
                    <td style="font-size: 9pt" class="text-center" id="count6Total"></td>
                    <td style="font-size: 9pt" class="text-center" id="count6"></td>
                    <td style="font-size: 9pt" class="text-center" id="percentage6"></td>
                </tr>

            </tbody>

            <tfoot>
                <tr class="bg-light-danger">
                    <td style="font-size: 10pt" class="text-end" colspan="2">
                        JUMLAH
                    </td>
                    <td style="font-size: 10pt" class="text-center">100%</td>
                    <td style="font-size: 10pt" class="text-center" id="total"></td>
                    <td style="font-size: 10pt" class="text-center" id="totalskor"></td>
                    <td style="font-size: 10pt" class="text-center" id="percentage">0.00</td>
                </tr>
            </tfoot>
        </table>
    </div>

    {{-- <div class="buy-now">
        <button class="btn btn-primary waves-effect waves-float waves-light" type="button" onclick="">
            Simpan
        </button>
    </div> --}}
