<ul class="nav nav-pills nav-justified" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder active" id="sq4-1-tab" data-bs-toggle="tab" href="#sq4-1" aria-controls="sq4-1" role="tab" aria-selected="true">
            SQ4.1
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="sq4-2-tab" data-bs-toggle="tab" href="#sq4-2" aria-controls="sq4-2" role="tab" aria-selected="false">
            SQ4.2
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="jumlah-sq4-tab" data-bs-toggle="tab" href="#jumlah-sq4" aria-controls="jumlah-sq4" role="tab" aria-selected="false">
            JUMLAH CQ4
        </a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane active" id="sq4-1" role="tabpanel" aria-labelledby="sq4-1-tab">
        @include('skpak.validasi_skpak.cq4.sq4_1')
    </div>
    <div class="tab-pane fade" id="sq4-2" role="tabpanel" aria-labelledby="sq4-2-tab">
        @include('skpak.validasi_skpak.cq4.sq4_2')
    </div>
    <div class="tab-pane fade" id="jumlah-sq4" role="tabpanel" aria-labelledby="jumlah-sq4-tab">
        @include('skpak.validasi_skpak.cq4.jumlah')
    </div>
</div>
