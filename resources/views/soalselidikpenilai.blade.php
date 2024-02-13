@extends('layouts.app')

@section('header')
Pengurusan Ketua Taska
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Pengurusan Pengguna </a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Maklumat Ketua Taska Baru </a>
</li>
@endsection

@section('content')
<style>
    .delete-button {
        display: none;
    }

</style>

<div class="card">
    <div class="card-header">
        <h4 class="card-title fw-bolder">
            Borang Soal Selidik
        </h4>
    </div>

    <hr>

    <div class="card-body">
        <div class="row">
            <h5 class="mb-2 fw-bold">
                <span class="badge rounded-pill badge-light-primary">
                    Bahagian A: Profil Taska
                </span>
            </h5>

            <div class="col-md-12 mb-2">
                <label class="form-label fw-bolder">Responden :
                    <span style="color: red;">*</span>
                </label>
                <div class="demo-inline-spacing">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="responden" id="" value="1" />
                        <label class="form-check-label" for="inlineRadio1">Kakitangan Kementerian Pelajaran Malaysia
                            (KPM)</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="responden" id="" value="2" />
                        <label class="form-check-label" for="inlineRadio2">Kakitangan Awam</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="responden" id="" value="3" />
                        <label class="form-check-label" for="inlineRadio2">Sektor Swasta</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="responden" id="" value="4" />
                        <label class="form-check-label" for="inlineRadio2">Orang Awam</label>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mb-1">
                <label class="form-label fw-bolder">Jantina :
                    <span style="color: red;">*</span>
                </label>
                <div class="demo-inline-spacing">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jantina" id="" value="1" />
                        <label class="form-check-label" for="inlineRadio1">Lelaki</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jantina" id="" value="2" />
                        <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mb-2">
                <label class="form-label fw-bolder">Umur :
                    <span style="color: red;">*</span>
                </label>
                <div class="demo-inline-spacing">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="umur" id="" value="1" />
                        <label class="form-check-label" for="inlineRadio1">Kurang daripada 18 tahun</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="umur" id="" value="2" />
                        <label class="form-check-label" for="inlineRadio2">18-24 tahun</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="umur" id="" value="3" />
                        <label class="form-check-label" for="inlineRadio2">25-54 tahun</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="umur" id="" value="4" />
                        <label class="form-check-label" for="inlineRadio2">55 tahun ke atas</label>
                    </div>
                </div>
            </div>

            <div class="col-md-12 mb-1">
                <label class="form-label fw-bolder">Bahagian/Jabatan/Agensi yang dihubungi :
                    <span style="color: red;">*</span>
                </label>
                <input type="text" class="form-control" name="" id="" required>
            </div>

            <hr>

            <h5 class="mb-2 fw-bold">
                <span class="badge rounded-pill badge-light-primary">
                    Bahagian B : Tahap Kepuasan Pelanggan Terhadap Penilai SKPAK
                </span>
            </h5>

            @php
            $items_1 = [
                [
                'section' => 'Tempoh Masa Tindakan',
                    'subSections' => [
                        'Memberi maklumat yang diperlukan dengan lengkap',
                        'Memberi maklumat yang diperlukan dengan tepat',
                        'Memberi penjelasan yang rasional dan munasabah',
                        'Menepati janji kepada TASKA yang dinilai',
                    ]
                ],
                [
                'section' => 'Cara Layanan Disampaikan',
                    'subSections' => [
                        'Memberi layanan mesra',
                        'Sedia membantu menyelesaikan masalah',
                        'Peka dan mengambil berat terhadap kebajikan TASKA',
                        'Mematuhi Piagam Pelanggan Profesionalisme Penilai',
                    ]
                ],
                [
                'section' => 'Kepakaran Pegawai',
                    'subSections' => [
                        'Berkeupayaan memberi penjelasan/ maklumat dengan jelas',
                        'Mempunyai pengetahuan mengenai fungsi organisasi',
                        'Mampu merujuk TASKA kepada sumber yang tepat',
                    ]
                ],
                [
                'section' => 'Jaminan Perkhidmatan',
                    'subSections' => [
                    'Berkeyakinan akan menerima maklum balas mengenai penilaian',
                    'Berkeyakinan bahawa maklumat daripada SKPAK mudah difahami',
                    'Waktu berurusan adalah mencukupi / sesuai',
                    ],
                ],
            ];

            @endphp
            <div class="table-responsive">
                <table class="table header_uppercase table-bordered table-hovered" id="NilaiItem1">
                    <thead>
                        <tr>
                            <th>Skor yang Dinilai</th>
                            <th>1</th>
                            <th>2</th>
                            <th>3</th>
                            <th>4</th>
                            <th>5</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items_1 as $index => $item_1)
                        <tr>
                            <td colspan="6" class="bg-light-primary text-uppercase">
                                {{ $item_1['section'] }}
                            </td>
                        </tr>
                        @foreach ($item_1['subSections'] as $subsection_item1)
                        <tr>
                            <td>{{ $subsection_item1 }}</td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <input class="form-check-input radio-input-1" type="radio"
                                        name="{{ $index }}_{{ $loop->index }}" id="1_{{ $index }}_{{ $loop->index }}"
                                        value="1">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <input class="form-check-input radio-input-1" type="radio"
                                        name="{{ $index }}_{{ $loop->index }}"
                                        id="2_{{ $index }}_{{ $loop->index }}" value="2">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <input class="form-check-input radio-input-1" type="radio"
                                        name="{{ $index }}_{{ $loop->index }}" id="3_{{ $index }}_{{ $loop->index }}"
                                        value="3">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <input class="form-check-input radio-input-1" type="radio"
                                        name="{{ $index }}_{{ $loop->index }}"
                                        id="4_{{ $index }}_{{ $loop->index }}" value="4">
                                </div>
                            </td>
                            <td>
                                <div class="d-flex justify-content-center align-items-center">
                                    <input class="form-check-input radio-input-1" type="radio"
                                        name="{{ $index }}_{{ $loop->index }}" id="5_{{ $index }}_{{ $loop->index }}"
                                        value="5">
                                </div>
                            </td>
                        </tr>
                        @endforeach
                        @endforeach
                    </tbody>

                </table>
            </div>

            <hr>

            <h5 class="mb-2 fw-bold">
                <span class="badge rounded-pill badge-light-primary">
                    BAHAGIAN D : CADANGAN PENAMBAHBAIKAN
                </span>
            </h5>
            <label class="form-label fw-bolder">Berdasarkan pengalaman anda berurusan dengan KPM, sila kemukakan cadangan untuk penambahbaikan kualiti perkhidmatan yang diberi oleh KPM.
            <span style="color: red;">*</span>
            </label>
            <textarea class="form-control" rows="5" id="keteranganInstrumenInput"></textarea>

            <hr>

            <label class="form-label mt-1">Sekian terima kasih. Kesudian anda untuk menjawab dan memulangkan soal selidik ini akan membantu kami meningkatkan lagi kecekapan & keberkesanan perkhidmatan kami.
                </label>
        </div>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-end align-items-center mb-1">
            <button class="btn btn-primary" onclick="$('#submitKetuaBaru').trigger('click');">
                <span class="align-middle d-sm-inline-block d-none">
                    Simpan Maklumat
                </span>
            </button>
        </div>
    </div>
</div>

@endsection
