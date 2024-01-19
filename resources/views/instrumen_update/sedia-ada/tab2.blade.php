<ul class="nav nav-pills nav-justified" role="tablist">
        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder active" id="prasarana-sukan-tab" data-bs-toggle="tab" href="#prasarana-sukan" aria-controls="prasarana-sukan" role="tab" aria-selected="true">
                Prasarana Sekolah
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder" id="kemudahan-sukan-tab" data-bs-toggle="tab" href="#kemudahan-sukan" aria-controls="kemudahan-sukan" role="tab" aria-selected="true">
                Kemudahan Sukan
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder" id="perancangan-sukan-tab" data-bs-toggle="tab" href="#perancangan-sukan" aria-controls="perancangan-sukan" role="tab" aria-selected="true">
                Perancangan Sukan
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder" id="status-penyertaan-tab" data-bs-toggle="tab" href="#status-penyertaan" aria-controls="status-penyertaan" role="tab" aria-selected="true">
                Status Penyertaan
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder" id="program-sekolah-tab" data-bs-toggle="tab" href="#program-sekolah" aria-controls="program-sekolah" role="tab" aria-selected="true">
                Program Sekolah Sukan
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a class="text-uppercase text-wrap nav-link fw-bolder" id="pengesahan-tab" data-bs-toggle="tab" href="#pengesahan" aria-controls="pengesahan" role="tab" aria-selected="true">
                Pengesahan
            </a>
        </li>
    </ul>

     <div class="tab-content">
        <div class="tab-pane fade show active" id="prasarana-sukan" role="tabpanel" aria-labelledby="prasarana-sukan-tab">
            @include('instrumen_update.sedia-ada.borang_ikeps.prasarana_sekolah')
        </div>
        <div class="tab-pane fade" id="kemudahan-sukan" role="tabpanel" aria-labelledby="kemudahan-sukan-tab">
            @include('instrumen_update.sedia-ada.borang_ikeps.kemudahan_sukan')
        </div>
        <div class="tab-pane fade" id="perancangan-sukan" role="tabpanel" aria-labelledby="perancangan-sukan-tab">
            @include('instrumen_update.sedia-ada.borang_ikeps.perancangan_sukan')
        </div>
        <div class="tab-pane fade" id="status-penyertaan" role="tabpanel" aria-labelledby="status-penyertaan-tab">
            @include('instrumen_update.sedia-ada.borang_ikeps.status_penyertaan')
        </div>
        <div class="tab-pane fade" id="program-sekolah" role="tabpanel" aria-labelledby="program-sekolah-tab">
            @include('instrumen_update.sedia-ada.borang_ikeps.program_sekolah')
        </div>
        <div class="tab-pane fade" id="pengesahan" role="tabpanel" aria-labelledby="pengesahan-tab">
            @include('instrumen_update.sedia-ada.borang_ikeps.pengesahan')
        </div>
    </div>
