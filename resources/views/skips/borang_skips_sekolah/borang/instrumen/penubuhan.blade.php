<?php
    $butiran_institusi_id = $butiran_id;
    $tab1 = App\Models\ItemStandardQualitySkipsSekolah::where('butiran_institusi_id', $butiran_institusi_id)->first();
    if ($butiran_institusi_id && $tab1) {
        $penubuhan_pendaftaran = json_decode($tab1->penubuhan_pendaftaran);
    } else {
        $penubuhan_pendaftaran = null;
    }
?>

@php
    $pendaftarans = [
        'perakuan_pendaftaran' => '1.1 Perakuan Pendaftaran',
        'permit_pengelola' => '1.2 Permit Pengelola',
        'permit_pekerja' => '1.3 Permit Pekerja',
        'permit_pengetua' => '1.4 Permit Pengetua ',
        'permit_guru' => '1.5 Permit Guru',
        'yuran_dan_bayaran_lain' => '1.6 Yuran dan Bayaran Lain',
        'suratcara_pengelola' => '1.7 Suratcara Pengelolaan',
    ];

    $options = [
        'perakuan_pendaftaran' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada</i>',
            2 => '<i style="font-size:12px;">Ada, Terkini</i>',
            3 => '<i style="font-size:12px;">Ada, Terkini, Dipamerkan</i>',
            4 => '<i style="font-size:12px;">Ada, Terkini, Dipamerkan, Strategik</i>',
            5 => '<i style="font-size:12px;">Ada, Terkini, Dipamerkan, Kemas/ Kreatif</i>',
        ],

        'permit_pengelola' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada</i>',
            2 => '<i style="font-size:12px;">Ada, Terkini</i>',
            3 => '<i style="font-size:12px;">Ada, Terkini, Dipamerkan</i>',
            4 => '<i style="font-size:12px;">Ada, Terkini, Dipamerkan, Didokumentasikan</i>',
            5 => '<i style="font-size:12px;">Ada, Terkini, Dipamerkan, Kebolehcapaian</i>',
        ],
        'permit_pekerja' => [
            0 => '',
            1 => '<i style="font-size:12px;">Ada</i>',
            2 => '<i style="font-size:12px;">Ada, Terkini</i>',
            3 => '<i style="font-size:12px;">Ada, Terkini, Dipamerkan</i>',
            4 => '<i style="font-size:12px;">Ada, Terkini, Dipamerkan, Didokumentasikan</i>',
            5 => '<i style="font-size:12px;">Ada, Terkini, Dipamerkan, Kebolehcapaian</i>',
        ],

        'permit_pengetua' => [
            0 => '',
            1 => '<i style="font-size:12px;"> Ada</i>',
            2 => '<i style="font-size:12px;"> Ada, Terkini</i>',
            3 => '<i style="font-size:12px;"> Ada, Terkini, Didokumentasikan</i>',
            4 => '<i style="font-size:12px;"> Ada, Terkini, Didokumentasikan, Kebolehcapaian</i>',
            5 => '<i style="font-size:12px;"> Ada, Terkini, Didokumentasikan, Kebolehcapaian, Mencukupi sekiranya ada pertukaran/perpindahan</i>',
        ],
        'permit_guru' => [
            0 => '',
            1 => '<i style="font-size:12px;"> Ada</i>',
            2 => '<i style="font-size:12px;"> Ada, Terkini</i>',
            3 => '<i style="font-size:12px;"> Ada, Terkini, Mecukupi</i>',
            4 => '<i style="font-size:12px;"> Ada, Terkini, Mecukupi, Difailkan</i>',
            5 => '<i style="font-size:12px;"> Ada, Terkini, Mecukupi, Difailkan, Kebolehcapaian</i>',
        ],
        'yuran_dan_bayaran_lain' => [
            0 => '',
            1 => '<i style="font-size:12px;"> Diluluskan</i>',
            2 => '<i style="font-size:12px;"> Diluluskan, Terkini</i>',
            3 => '<i style="font-size:12px;"> Diluluskan, Terkini, Mematuhi</i>',
            4 => '<i style="font-size:12px;"> Diluluskan, Terkini, Mematuhi, Didokumentasikan</i>',
            5 => '<i style="font-size:12px;"> Diluluskan, Terkini, Mematuhi, Didokumentasikan, Kebolehcapaian</i>',
        ],

        'suratcara_pengelola' => [
            0 => '',
            1 => '<i style="font-size:12px;"> Diluluskan</i>',
            2 => '<i style="font-size:12px;"> Diluluskan, Terkini</i>',
            3 => '<i style="font-size:12px;"> Diluluskan, Terkini, Mematuhi</i>',
            4 => '<i style="font-size:12px;"> Diluluskan, Terkini, Mematuhi, Didokumentasikan</i>',
            5 => '<i style="font-size:12px;"> Diluluskan, Terkini, Mematuhi, Didokumentasikan, Kebolehcapaian</i>',
        ],
    ];

    $count = 1.1;
@endphp

<style>
    #SkipsNilai1 thead th {
        vertical-align: middle;
        text-align: center;
    }

    #SkipsNilai1 tbody {
        vertical-align: middle;
    }

    #SkipsNilai1 table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }
</style>
<form id="penubuhan_pendaftaran_sekolah">
    <div class="table-responsive">
        <table class="table header_uppercase table-bordered table-hovered" id="SkipsNilai1">
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
                <input type="hidden" name="butiran_institusi_id" value="{{$butiran_id}}">
                <tr>
                    <td colspan="8" class="bg-light-primary fw-bolder text-uppercase">Penubuhan & Pendaftaran</td>
                </tr>
                @foreach ($pendaftarans as $index => $pendaftaran)
                    @php
                        $numeric = preg_replace('/[^0-9.]/', '', $pendaftaran);
                        $text = trim(preg_replace('/[0-9.]/', '', $pendaftaran), '.');

                        $excludeNumber = strpos($pendaftaran, 'text-primary') !== false;
                    @endphp

                    <tr>
                        @if (!$excludeNumber)
                            <td> {{ $numeric }} </td>
                        @endif

                        @if (!$excludeNumber)
                            <td> {!! $text !!} </td>
                        @else
                            <td class="bg-light-primary" colspan="8"> {!! $text !!} </td>
                        @endif

                        @foreach ($options[$index] as $key => $option)
                            <td>
                                <div
                                    class="form-check form-check-inline d-flex justify-content-center align-items-center">
                                    <input class="form-check-input" type="radio" name="{{ $index }}" value="{{ $key }}" required  @if($penubuhan_pendaftaran && $penubuhan_pendaftaran->$index == $key) checked @endif @if($type == 'verfikasi' || $type == 'validasi' || $type == 'laporan') disabled @endif>
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


    <div class="d-flex justify-content-end align-items-center mt-1">
        <button type="button" class="btn btn-primary float-right formdd" onclick="submitformsekolah4()">Simpan</button>
    </div>

</form>

<script>
    function submitformsekolah4() {
        var formData = new FormData(document.getElementById('penubuhan_pendaftaran_sekolah'));
        var error = false;

        $('form#penubuhan_pendaftaran_sekolah').find('radio, input, checkbox').each(function() {
             var value = $("input[name='"+this.name+"']:checked").val();
            if (typeof value == 'undefined' && this.type == 'radio') {
                console.log(this.name)
                error = true;
            }
        });

        if (error) {
            Swal.fire('Error', 'Sila isi ruangan yang diperlukan test', 'error');
            return false;
        }

        var url = "{{ env('APP_PENGISIAN_URL') }}" + 'api/skips/store-item-standard-sekolah/penubuhan_pendaftaran';

        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.status) {
                    Swal.fire('Success', 'Berjaya', 'success');
                    if (response.formfilled == true) {
                        window.location.reload();
                    }
                }
            }
        });

    };
</script>
