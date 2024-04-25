<ul class="nav nav-pills nav-second nav-justified" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder active" id="ruang-dalam-tab" data-bs-toggle="tab"
            href="#ruang-dalam" aria-controls="ruang-dalam" role="tab" aria-selected="true">
            Ruang Dalam
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="ruang-luar-tab" data-bs-toggle="tab"
            href="#ruang-luar" aria-controls="ruang-luar" role="tab" aria-selected="false">
            Ruang Luar
        </a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane active" id="ruang-dalam" role="tabpanel" aria-labelledby="ruang-dalam-tab">
        @include('skpak.validasi_skpak.senarai_semak.ruang_dalam')
    </div>
    <div class="tab-pane fade" id="ruang-luar" role="tabpanel" aria-labelledby="ruang-luar-tab">
        @include('skpak.validasi_skpak.senarai_semak.ruang_luar')
    </div>
</div>
