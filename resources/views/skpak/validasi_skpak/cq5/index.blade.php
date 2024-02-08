<ul class="nav nav-pills nav-justified" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder active" id="sq5-1-tab" data-bs-toggle="tab" href="#sq5-1" aria-controls="sq5-1" role="tab" aria-selected="true">
            SQ5.1
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="sq5-2-tab" data-bs-toggle="tab" href="#sq5-2" aria-controls="sq5-2" role="tab" aria-selected="false">
            SQ5.2
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="jumlah-sq5-tab" data-bs-toggle="tab" href="#jumlah-sq5" aria-controls="jumlah-sq5" role="tab" aria-selected="false">
            JUMLAH CQ5
        </a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane active" id="sq5-1" role="tabpanel" aria-labelledby="sq5-1-tab">
        @include('skpak.validasi_skpak.cq5.sq5_1')
    </div>
    <div class="tab-pane fade" id="sq5-2" role="tabpanel" aria-labelledby="sq5-2-tab">
        @include('skpak.validasi_skpak.cq5.sq5_2')
    </div>
    <div class="tab-pane fade" id="jumlah-sq5" role="tabpanel" aria-labelledby="jumlah-sq5-tab">
        @include('skpak.validasi_skpak.cq5.jumlah')
    </div>
</div>
