<ul class="nav nav-pills nav-justified" role="tablist">
  <li class="nav-item" role="presentation">
      <a class="text-uppercase text-wrap nav-link fw-bolder active" id="penilai-tab" data-bs-toggle="tab" href="#penilai" aria-controls="penilai" role="tab" aria-selected="true">
          PENYELARASAN PENILAI
      </a>
  </li>
  <li class="nav-item" role="presentation">
      <a class="text-uppercase text-wrap nav-link fw-bolder" id="jk-kerja-tab" data-bs-toggle="tab" href="#jk-kerja" aria-controls="jk-kerja" role="tab" aria-selected="false">
          PENETAPAN JK KERJA
      </a>
  </li>
</ul>

<div class="tab-content">
  <div class="tab-pane active" id="penilai" role="tabpanel" aria-labelledby="penilai-tab">
      @include('skpak.validasi_skpak.selaras_markah.penilai')
  </div>
  <div class="tab-pane fade" id="jk-kerja" role="tabpanel" aria-labelledby="jk-kerja-tab">
      @include('skpak.validasi_skpak.selaras_markah.jk_kerja')
  </div>
</div>
