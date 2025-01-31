<style>
    #jumlah-cq-1 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #jumlah-cq-1 tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #jumlah-cq-1 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

@php
     $jumlahs_sq1 = [
        [
            'section' => 'Hubungan dengan Kanak-Kanak',
            'subSections' => [
                'Interaksi dan komunikasi (Berdasarkan peratus pendidik yang mengamalkannya, Laras bahasa, Intonasi, Kedudukan ketika bercakap, Gerak syarat, Mimik muka, Kemahiran',
                'Sikap dan sokongan dalam pembinaan hubungan (pujian, galakan, pengukuhan positif dan negatif, mengambil tahu perasaan, memberikan respons)',
            ]
        ],
        [
            'section' => 'Hubungan sesama Pendidik dan Pengurusan TASKA',
            'subSections' => [
                'Tanggungjawab terhadap organisasi (kepatuhan, integriti dan komitmen)',
                'Interaksi dan komunikasi (interkasi dua hala, mengadakan perbincangan, bertukar idea)',
                'Sikap dan sokongan terhadap organisasi (menunjukkan kerja berpasukan, melibatkan diri secara langsung dalam perlaksanaan pembangunan TASKA)',
            ]
        ],
        [
            'section' => 'Hubungan dengan Keluarga',
            'subSections' => [
                'Interaksi dan komunikasi (peluang komunikasi bersama keluarga, sikap berkomunikasi, platform komunikasi, cara berkomunikasi)',
                'Tanggungjawab (Sikap pendidik terhadap keperluan perkembangan dan kesejahteraan kanak-kanak.)',
                'Kebajikan (mengambil kira masa, minat dan kebolehan ibu bapa/ keluarga)',
            ]
        ],
    ];

    $subtab = [
        '0' => 'sq1.1',
        '1' => 'sq1.2',
        '2' => 'sq1.3'
    ];

    $subtabdata = [
        'sq1.1' => [
            '0' => '1_1_1',
            '1' => '1_1_2'
        ],
        'sq1.2' => [
            '0' => '1_2_1',
            '1' => '1_2_2',
            '2' => '1_2_3',
        ],
        'sq1.3' => [
            '0' => '1_3_1',
            '1' => '1_3_2',
            '2' => '1_3_3'
        ]
    ];
@endphp

<!-- <h5 class="card-title fw-bolder text-uppercase">
    Hubungan dan Interaksi
</h5>
 -->
<hr>
<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="jumlah-cq-1">
        <thead style="color:black; background-color: #d8bfb0;">
            <tr>
                <th>Kriteria</th>
                <th width="10%">Jumlah</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jumlahs_sq1 as $index => $jumlah_sq1)
                <tr>
                    <td colspan="3" class="bg-light-primary text-uppercase">
                        {{ $jumlah_sq1['section'] }}
                    </td>
                </tr>
                @foreach ($jumlah_sq1['subSections'] as $key => $subsection_sq1)
                    <tr>
                        <td>{{ $subsection_sq1 }}</td>
                        <?php
                        if (isset($tabData) && isset($tabData[$subtab[$index]])) {
                            $value = $tabData[$subtab[$index]][$subtabdata[$subtab[$index]][$key]];
                        }  else {
                            $value = '-';
                        }

                        ?>
                        <td> {{$value}} </td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
        <tfoot>
            <tr class="bg-light-primary">
                <td class="text-end">Jumlah</td>
                <td>{{$totalValue}}</td>
            </tr>
        </tfoot>
    </table>
<form>
    <input type="hidden" name="skpak_standard_penilaian_id" id="skpak_standard_penilaian_id" value="{{$id}}">
    <div class="col-md-12 mt-2">
        <label class="fw-bolder">Ulasan</label>
        <textarea name="ulasan" id="ulasanc1" rows="3" class="form-control" {{$disabled}}>{{$ulasan}}</textarea>
    </div>
</div>

<hr>
@if($disabled != 'disabled')
<div class="buy-now">
    <button class="btn btn-primary waves-effect waves-float waves-light" type="button" onclick="submitcq1jumlah()">
        Simpan
    </button>
</div>
@endif
{{-- <div class="d-flex justify-content-end align-items-center mt-1">
    <button type="button" class="btn btn-primary float-right" onclick="submitcq1jumlah()">Simpan</button>
</div> --}}

</form>

<script>
    function submitcq1jumlah() {
    var ulasan = $('#ulasanc1').val();
    var skpak_standard_penilaian_id = $('#skpak_standard_penilaian_id').val();
      if (ulasan == '') {
             Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
            return false;
        }
        var url = "{{ route('skpak.save-verfikasi', ['tab' => 'itemcq1_jumlah']) }}"
        $.ajax({
            url: url,
            method: 'POST',
            data: {
                ulasan : ulasan,
                skpak_standard_penilaian_id: $('#skpak_standard_penilaian_id').val()
            },
            success: function(response) {
               if (response.success) {
                    Swal.fire('Success', 'Berjaya', 'success');
               }
            }
        });

    };

</script>
