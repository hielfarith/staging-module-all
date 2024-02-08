<?php
    $butiran_institusi_id = $butiran_id;;
    $tab1 = App\Models\ItemStandardQualitySkips::where('butiran_institusi_id', $butiran_institusi_id)->first();
    if ($butiran_institusi_id && !empty($tab1->penubuhan_pendaftaran_verfikasi)) {
        $penubuhan_pendaftaran = json_decode($tab1->penubuhan_pendaftaran_verfikasi);
    } else {
        $penubuhan_pendaftaran = null;
    }
?>

@php
$pendaftarans = [
    'kelulusan_penubuhan' => '<a> 1.1 Surat Kelulusan Penubuhan </a>',
    'perakuan_pendaftaran' => '<a> 1.2 Perakuan Pendaftaran </a>',
    'permit_pengelola' => '<a> 1.3 Permit Pengelola </a>',
    'permit_pekerja' => '<a> 1.4 Permit Pekerja </a>',
    'kelulusan_pengetua' => '<a> 1.5 Surat Kelulusan Pengetua  </a>',
    'permit_guru' => '<a> 1.6 Permit Guru </a>',
    'suratcara_pengelola' => '<a> 1.7 Suratcara Pengelola </a>',
    'yuran_dan_bayaran_lain' => '<a> 1.8 Yuran dan Bayaran Lain </a>',
    'surat_surat_sokongan_agensi' => '<a> 1.9 Surat-surat Sokongan Agensi </a>',
];

$options = [
    'kelulusan_penubuhan' => [
        0 => '',
        1 => '',
        2 => '<i style="font-size: 12px;">Ada</i>',
        3 => '<i style="font-size: 12px;">Ada, Lengkap</i>',
        4 => '<i style="font-size: 12px;">Ada, Lengkap, Difailkan</i>',
        5 => '<i style="font-size: 12px;">Ada, Lengkap, Difailkan, Kebolehcapaian</i>',
    ],
    'perakuan_pendaftaran' => [
        0 => '',
        1 => '<i style="font-size: 12px;"> Ada</i>',
        2 => '<i style="font-size: 12px;"> Ada, Lengkap</i>',
        3 => '<i style="font-size: 12px;"> Ada, Lengkap, Dipamerkan</i>',
        4 => '<i style="font-size: 12px;"> Ada, Lengkap, Dipamerkan, Strategik</i>',
        5 => '<i style="font-size: 12px;"> Ada, Lengkap, Dipamerkan, Strategik, Kemas</i>',
    ],

    'permit_pengelola' => [
        0 => '',
        1 => '<i style="font-size: 12px;"> Ada</i>',
        2 => '<i style="font-size: 12px;"> Ada, Terkini</i>',
        3 => '<i style="font-size: 12px;"> Ada, Terkini, Mecukupi</i>',
        4 => '<i style="font-size: 12px;"> Ada, Terkini, Mecukupi, Difailkan</i>',
        5 => '<i style="font-size: 12px;"> Ada, Terkini, Mecukupi, Difailkan, Kebolehcapaian</i>',
    ],
    'permit_pekerja' => [
        0 => '',
        1 => '<i style="font-size: 12px;"> Ada</i>',
        2 => '<i style="font-size: 12px;"> Ada, Terkini</i>',
        3 => '<i style="font-size: 12px;"> Ada, Terkini, Mecukupi</i>',
        4 => '<i style="font-size: 12px;"> Ada, Terkini, Mecukupi, Difailkan</i>',
        5 => '<i style="font-size: 12px;"> Ada, Terkini, Mecukupi, Difailkan, Kebolehcapaian</i>',
    ],

    'kelulusan_pengetua' => [
        0 => '',
        1 => '<i style="font-size: 12px;"> Ada</i>',
        2 => '<i style="font-size: 12px;"> Ada, Terkini</i>',
        3 => '<i style="font-size: 12px;"> Ada, Terkini, Difailkan</i>',
        4 => '<i style="font-size: 12px;"> Ada, Terkini, Difailkan, Kebolehcapaian</i>',
        5 => '<i style="font-size: 12px;"> Ada, Terkini, Difailkan, Kebolehcapaian, Dipamerkan</i>',
    ],
    'permit_guru' => [
        0 => '',
        1 => '<i style="font-size: 12px;"> Ada</i>',
        2 => '<i style="font-size: 12px;"> Ada, Terkini</i>',
        3 => '<i style="font-size: 12px;"> Ada, Terkini, Mecukupi</i>',
        4 => '<i style="font-size: 12px;"> Ada, Terkini, Mecukupi, Difailkan</i>',
        5 => '<i style="font-size: 12px;"> Ada, Terkini, Mecukupi, Difailkan, Kebolehcapaian</i>',
    ],
    'suratcara_pengelola' => [
        0 => '',
        1 => '<i style="font-size: 12px;"> Ada</i>',
        2 => '<i style="font-size: 12px;"> Ada, Terkini</i>',
        3 => '<i style="font-size: 12px;"> Ada, Terkini, Mecukupi</i>',
        4 => '<i style="font-size: 12px;"> Ada, Terkini, Mecukupi, Difailkan</i>',
        5 => '<i style="font-size: 12px;"> Ada, Terkini, Mecukupi, Difailkan, Kebolehcapaian</i>',
    ],

    'yuran_dan_bayaran_lain' => [
        0 => '',
        1 => '<i style="font-size: 12px;"> Ada</i>',
        2 => '<i style="font-size: 12px;"> Ada, Lengkap</i>',
        3 => '<i style="font-size: 12px;"> Ada, Lengkap, Difailkan</i>',
        4 => '<i style="font-size: 12px;"> Ada, Lengkap, Difailkan, Kebolehcapaian</i>',
        5 => '<i style="font-size: 12px;"> Ada, Lengkap, Difailkan, Kebolehcapaian</i>',
    ],
    'surat_surat_sokongan_agensi' => [
        0 => '',
        1 => '<i style="font-size: 12px;"> Ada</i>',
        2 => '<i style="font-size: 12px;"> Ada, Terkini</i>',
        3 => '<i style="font-size: 12px;"> Ada, Terkini, Difailkan</i>',
        4 => '<i style="font-size: 12px;"> Ada, Terkini, Difailkan, Kebolehcapaian</i>',
        5 => '<i style="font-size: 12px;"> Ada, Terkini, Difailkan, Kebolehcapaian, Dipamerkan</i>',
    ],

];
@endphp

<style>
    #NilaiItem1 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #NilaiItem1 tbody {
        vertical-align: middle;
    }

    #NilaiItem1 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>

<form id="penubuhan_pendaftaranv">
    <div class="table-responsive">
        <table class="table header_uppercase table-bordered table-hovered" id="NilaiItem1">
            <thead>
                <tr>
                    <th rowspan="2" width="5%">No.</th>
                    <th rowspan="2" width="20%"> Kriteria </th>
                    <th width="12">0</th>
                    <th width="12">1</th>
                    <th width="12">2</th>
                    <th width="12">3</th>
                    <th width="12">4</th>
                    <th width="12">5</th>
                </tr>

                <tr>
                    <th>TIADA</th>
                    <th>LEMAH</th>
                    <th>SEDERHANA</th>
                    <th>HARAPAN</th>
                    <th>BAIK</th>
                    <th>CEMERLANG</th>
                </tr>
            </thead>
            <tbody>
                <input type="hidden" name="usertype" value="{{$type}}">
                <input type="hidden" name="butiran_institusi_id" value="{{$butiran_institusi_id}}">
                <tr>
                    <td colspan="8" class="bg-light-primary fw-bolder text-uppercase">Penubuhan & Pendaftaran</td>
                </tr>
                @foreach ($pendaftarans as $index => $pendaftaran)
                <?php
                    $keyval = '';
                    $keyval = $index.'_verfikasi';

                    $numeric = preg_replace('/[^0-9.]/', '', $pendaftaran);
                    $text = trim(preg_replace('/[0-9.]/', '', $pendaftaran), '.');

                    $excludeNumber = strpos($pendaftaran, 'text-primary') !== false;
                ?>
                    <tr>
                        @if (!$excludeNumber)
                            <td> {{ $numeric }} </td>
                        @endif

                        @if(!$excludeNumber)
                            <td> {!! $text !!} </td>
                        @else
                            <td class="bg-light-primary" colspan="8"> {!! $text !!} </td>
                        @endif

                        @foreach ($options[$index] as $key => $option)
                            <td>
                                <div class="form-check form-check-inline d-flex justify-content-center align-items-center">
                                     <input class="form-check-input" type="radio" name="{{ $index }}_verfikasi" value="{{$key}}" required  @if($penubuhan_pendaftaran && $penubuhan_pendaftaran->$keyval == $key) checked @endif @if($type == 'validasi' || $status == 'done')  disabled @endif>
                                </div>
                                <br>

                                <div class="d-flex justify-content-center align-items-center">
                                    {!! $option !!}
                                </div>
                            </td>
                        @endforeach
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <hr>
    <div class="col-md-12">
        <label class="fw-bolder">Ulasan</label>
        <textarea name="ulasan_verfikasi" id="" rows="3" class="form-control">{{$penubuhan_pendaftaran?->ulasan_verfikasi}}</textarea>
    </div>
@if($canVerify)

    <div class="d-flex justify-content-end align-items-center mt-1">
        <button type="button" class="btn btn-primary float-right verify" onclick="submitform1v()">Simpan</button>
    </div>
@endif
</form>

<script>
    function submitform1v() {
        var formData = new FormData(document.getElementById('penubuhan_pendaftaranv'));
        var error = false;

         $('form#penubuhan_pendaftaranv').find('radio, input, checkbox').each(function() {
            if(this.required && this.type == 'checkbox' && !this.checked) {
                error = true;
            }
            if (this.required && this.value == '') {
                error = true;
            }
        });

        if (error) {
             Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
            return false;
        }
        var url = "{{ route('skips.instrumen-submit', ['tab' => 'penubuhan_pendaftaran']) }}"
        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
               if (response.status) {
                    Swal.fire('Success', 'Berjaya', 'success');
               }
            }
        });

    };
</script>
