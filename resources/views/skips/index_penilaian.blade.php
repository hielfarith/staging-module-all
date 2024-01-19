<ul class="nav nav-pills nav-justified" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder active" id="nilai-1-tab" data-bs-toggle="tab" href="#nilai-1" aria-controls="nilai-1" role="tab" aria-selected="true">
            1.0 PENUBUHAN & PENDAFTARAN
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="nilai-2-tab" data-bs-toggle="tab" href="#nilai-2" aria-controls="nilai-2" role="tab" aria-selected="true">
            2.0 PENGURUSAN INSTITUSI
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="nilai-3-tab" data-bs-toggle="tab" href="#nilai-3" aria-controls="nilai-3" role="tab" aria-selected="true">
            3.0 PENGURUSAN KURIKULUM
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="nilai-4-tab" data-bs-toggle="tab" href="#nilai-4" aria-controls="nilai-4" role="tab" aria-selected="true">
            4.0 PENGAJARAN DAN PEMBELAJARAN
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="nilai-5-tab" data-bs-toggle="tab" href="#nilai-5" aria-controls="nilai-5" role="tab" aria-selected="true">
            5.0 PENGURUSAN PENILAIAN / PEPERIKSAAN
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="nilai-6-tab" data-bs-toggle="tab" href="#nilai-6" aria-controls="nilai-6" role="tab" aria-selected="true">
            6.0 PENGURUSAN DAN PEMBANGUNAN GURU
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="nilai-7-tab" data-bs-toggle="tab" href="#nilai-7" aria-controls="nilai-7" role="tab" aria-selected="true">
            7.0 DISIPLIN
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="nilai-8-tab" data-bs-toggle="tab" href="#nilai-8" aria-controls="nilai-8" role="tab" aria-selected="true">
            8.0 PIAWAIAN
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="nilai-9-tab" data-bs-toggle="tab" href="#nilai-9" aria-controls="nilai-9" role="tab" aria-selected="true">
            9.0 KEBERSIHAN DAN KECERIAAN
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="nilai-10-tab" data-bs-toggle="tab" href="#nilai-10" aria-controls="nilai-10" role="tab" aria-selected="true">
            10.0 PENGURUSAN PELAJAR ANTARABANGSA
        </a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane fade show active" id="nilai-1" role="tabpanel" aria-labelledby="nilai-1-tab">
        @include('skips.borang_skips.skor_penilaian.item_1')
    </div>
    <div class="tab-pane fade" id="nilai-2" role="tabpanel" aria-labelledby="nilai-2-tab">
        @include('skips.borang_skips.skor_penilaian.item_2')
    </div>
    <div class="tab-pane fade" id="nilai-3" role="tabpanel" aria-labelledby="nilai-3-tab">
        @include('skips.borang_skips.skor_penilaian.item_3')
    </div>
    <div class="tab-pane fade" id="nilai-4" role="tabpanel" aria-labelledby="nilai-4-tab">
        @include('skips.borang_skips.skor_penilaian.item_4')
    </div>
    <div class="tab-pane fade" id="nilai-5" role="tabpanel" aria-labelledby="nilai-5-tab">
        @include('skips.borang_skips.skor_penilaian.item_5')
    </div>
    <div class="tab-pane fade" id="nilai-6" role="tabpanel" aria-labelledby="nilai-6-tab">
        @include('skips.borang_skips.skor_penilaian.item_6')
    </div>
    <div class="tab-pane fade" id="nilai-7" role="tabpanel" aria-labelledby="nilai-7-tab">
        @include('skips.borang_skips.skor_penilaian.item_7')
    </div>
    <div class="tab-pane fade" id="nilai-8" role="tabpanel" aria-labelledby="nilai-8-tab">
        @include('skips.borang_skips.skor_penilaian.item_8')
    </div>
    <div class="tab-pane fade" id="nilai-9" role="tabpanel" aria-labelledby="nilai-9-tab">
        @include('skips.borang_skips.skor_penilaian.item_9')
    </div>
    <div class="tab-pane fade" id="nilai-10" role="tabpanel" aria-labelledby="nilai-10-tab">
        @include('skips.borang_skips.skor_penilaian.item_10')
    </div>
</div>
