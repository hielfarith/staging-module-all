<ul class="nav nav-pills  justify-content-center" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder active" id="penubuhan-tab" data-bs-toggle="tab"
            href="#penubuhan" aria-controls="penubuhan" role="tab" aria-selected="true">
            PENUBUHAN & PENDAFTARAN
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="pengurusan-institusi-tab" data-bs-toggle="tab"
            href="#pengurusan-institusi" aria-controls="pengurusan-institusi" role="tab" aria-selected="true">
            PENGURUSAN INSTITUSI
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="pengurusan-kurikulum-tab" data-bs-toggle="tab"
            href="#pengurusan-kurikulum" aria-controls="pengurusan-kurikulum" role="tab" aria-selected="true">
            PENGURUSAN KURIKULUM
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="pdpc-tab" data-bs-toggle="tab" href="#pdpc"
            aria-controls="pdpc" role="tab" aria-selected="true">
            PEMBELAJARAN DAN PEMUDAHCARAAN
        </a>
    </li>

    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="pengurusan-peperiksaan-tab" data-bs-toggle="tab"
            href="#pengurusan-peperiksaan" aria-controls="pengurusan-peperiksaan" role="tab" aria-selected="true">
            PENGURUSAN PENILAIAN / PEPERIKSAAN
        </a>
    </li>

    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="pengurusan-guru-tab" data-bs-toggle="tab"
            href="#pengurusan-guru" aria-controls="pengurusan-guru" role="tab" aria-selected="true">
            PENGURUSAN DAN PEMBANGUNAN GURU
        </a>
    </li>

    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="pengurusan-kesihatan-murid-tab" data-bs-toggle="tab"
            href="#pengurusan-kesihatan-murid" aria-controls="pengurusan-kesihatan-murid" role="tab"
            aria-selected="true">
            PENGURUSAN KESIHATAN MURID
        </a>
    </li>

    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="disiplin-tab" data-bs-toggle="tab" href="#disiplin"
            aria-controls="disiplin" role="tab" aria-selected="true">
            DISIPLIN
        </a>
    </li>

    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="piawaian-tab" data-bs-toggle="tab" href="#piawaian"
            aria-controls="piawaian" role="tab" aria-selected="true">
            PIAWAIAN
        </a>
    </li>

    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="pencapaian-tab" data-bs-toggle="tab"
            href="#pencapaian" aria-controls="pencapaian" role="tab" aria-selected="true">
            PENCAPAIAN AKADEMIK (2019 - 2021)
        </a>
    </li>

    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="pencapaian-kokurikulum-tab" data-bs-toggle="tab"
            href="#pencapaian-kokurikulum" aria-controls="pencapaian-kokurikulum" role="tab" aria-selected="true">
            PENCAPAIAN KOKURIKULUM (TAHUN 2019 - 2021)
        </a>
    </li>

    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="kemenjadian-murid-tab" data-bs-toggle="tab"
            href="#kemenjadian-murid" aria-controls="kemenjadian-murid" role="tab" aria-selected="true">
            KEMENJADIAN MURID - BERDASARKAN PEMERHATIAN
        </a>
    </li>

    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="perwatakan-sekolah-tab" data-bs-toggle="tab"
            href="#perwatakan-sekolah" aria-controls="perwatakan-sekolah" role="tab" aria-selected="true">
            PERWATAKAN SEKOLAH
        </a>
    </li>

    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="kokurikulum-tab" data-bs-toggle="tab"
            href="#kokurikulum" aria-controls="kokurikulum" role="tab" aria-selected="true">
            KOKURIKULUM
        </a>
    </li>

    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="kebersihan-keceriaan-tab" data-bs-toggle="tab"
            href="#kebersihan-keceriaan" aria-controls="kebersihan-keceriaan" role="tab" aria-selected="true">
            KEBERSIHAN & KECERIAAN
        </a>
    </li>






</ul>
<hr>
<div class="card">
    <div class="card-body">
        <div class="tab-content">

            <div class="tab-pane active" id="penubuhan" role="tabpanel" aria-labelledby="penubuhan-tab">
                @include('skips.borang_skips_sekolah.borang.instrumen.penubuhan')
            </div>
            <div class="tab-pane fade" id="pengurusan-institusi" role="tabpanel"
                aria-labelledby="pengurusan-institusi-tab">
                @include('skips.borang_skips_sekolah.borang.instrumen.pengurusan_institusi')
            </div>

            <div class="tab-pane fade" id="pengurusan-kurikulum" role="tabpanel"
                aria-labelledby="pengurusan-kurikulum-tab">
                @include('skips.borang_skips_sekolah.borang.instrumen.pengurusan_kurikulum')
            </div>
            <div class="tab-pane fade" id="pdpc" role="tabpanel" aria-labelledby="pdpc-tab">
                @include('skips.borang_skips_sekolah.borang.instrumen.pdpc')
            </div>
            <div class="tab-pane fade" id="pengurusan-peperiksaan" role="tabpanel"
                aria-labelledby="pengurusan-peperiksaan-tab">
                @include('skips.borang_skips_sekolah.borang.instrumen.pengurusan_peperiksaan')
            </div>
            <div class="tab-pane fade" id="pengurusan-guru" role="tabpanel" aria-labelledby="pengurusan-guru-tab">
                @include('skips.borang_skips_sekolah.borang.instrumen.pengurusan_guru')
            </div>
            <div class="tab-pane fade" id="pengurusan-kesihatan-murid" role="tabpanel"
                aria-labelledby="pengurusan-kesihatan-murid-tab">
                @include('skips.borang_skips_sekolah.borang.instrumen.pengurusan_kesihatan_murid')
            </div>
            <div class="tab-pane fade" id="disiplin" role="tabpanel" aria-labelledby="disiplin-tab">
                @include('skips.borang_skips_sekolah.borang.instrumen.disiplin')
            </div>
            <div class="tab-pane fade" id="piawaian" role="tabpanel" aria-labelledby="piawaian-tab">
                @include('skips.borang_skips_sekolah.borang.instrumen.piawaian')
            </div>
            <div class="tab-pane fade" id="pencapaian" role="tabpanel" aria-labelledby="pencapaian-tab">
                @include('skips.borang_skips_sekolah.borang.instrumen.pencapaian_akademik')
            </div>
            <div class="tab-pane fade" id="pencapaian-kokurikulum" role="tabpanel"
                aria-labelledby="pencapaian-kokurikulum-tab">
                @include('skips.borang_skips_sekolah.borang.instrumen.pencapaian_kokurikulum')
            </div>
            <div class="tab-pane fade" id="kemenjadian-murid" role="tabpanel"
                aria-labelledby="kemenjadian-murid-tab">
                @include('skips.borang_skips_sekolah.borang.instrumen.kemenjadian_murid')
            </div>
            <div class="tab-pane fade" id="perwatakan-sekolah" role="tabpanel"
                aria-labelledby="perwatakan-sekolah-tab">
                @include('skips.borang_skips_sekolah.borang.instrumen.perwatakan_sekolah')
            </div>
            <div class="tab-pane fade" id="kokurikulum" role="tabpanel" aria-labelledby="kokurikulum-tab">
                @include('skips.borang_skips_sekolah.borang.instrumen.kokurikulum')
            </div>
            <div class="tab-pane fade" id="kebersihan-keceriaan" role="tabpanel"
                aria-labelledby="kebersihan-keceriaan-tab">
                @include('skips.borang_skips_sekolah.borang.instrumen.kebersihan_keceriaan')
            </div>
        </div>
    </div>
</div>

<script type="text/javascript"></script>
