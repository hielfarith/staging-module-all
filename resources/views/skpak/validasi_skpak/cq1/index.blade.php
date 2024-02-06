<ul class="nav nav-pills nav-justified" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder active" id="sq1-1-tab" data-bs-toggle="tab" href="#sq1-1" aria-controls="sq1-1" role="tab" aria-selected="true">
            SQ1.1
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="sq1-2-tab" data-bs-toggle="tab" href="#sq1-2" aria-controls="sq1-2" role="tab" aria-selected="false">
            SQ1.2
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="sq1-3-tab" data-bs-toggle="tab" href="#sq1-3" aria-controls="sq1-3" role="tab" aria-selected="false">
            SQ1.3
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="jumlah-sq1-tab" data-bs-toggle="tab" href="#jumlah-sq1" aria-controls="jumlah-sq1" role="tab" aria-selected="false">
            JUMLAH CQ1
        </a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane active" id="sq1-1" role="tabpanel" aria-labelledby="sq1-1-tab">
        @include('skpak.validasi_skpak.cq1.sq1_1')
    </div>
    <div class="tab-pane fade" id="sq1-2" role="tabpanel" aria-labelledby="sq1-2-tab">
        @include('skpak.validasi_skpak.cq1.sq1_2')
    </div>
    <div class="tab-pane fade" id="sq1-3" role="tabpanel" aria-labelledby="sq1-3-tab">
        @include('skpak.validasi_skpak.cq1.sq1_3')
    </div>
    <div class="tab-pane fade" id="jumlah-sq1" role="tabpanel" aria-labelledby="jumlah-sq1-tab">
        @include('skpak.validasi_skpak.cq1.jumlah')
    </div>
</div>
