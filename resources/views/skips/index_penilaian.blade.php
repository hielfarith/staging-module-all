<ul class="nav nav-pills justify-content-center" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="text-wrap nav-link fw-bolder active" id="skor-1-tab" data-bs-toggle="tab" href="#skor-1" aria-controls="skor-1" role="tab" aria-selected="true">
            PENUBUHAN & PENDAFTARAN
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-wrap nav-link fw-bolder" id="skor-2-tab" data-bs-toggle="tab" href="#skor-2" aria-controls="skor-2" role="tab" aria-selected="true">
            PENGURUSAN INSTITUSI
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-wrap nav-link fw-bolder" id="skor-3-tab" data-bs-toggle="tab" href="#skor-3" aria-controls="skor-3" role="tab" aria-selected="true">
            PENGURUSAN KURIKULUM
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-wrap nav-link fw-bolder" id="skor-4-tab" data-bs-toggle="tab" href="#skor-4" aria-controls="skor-4" role="tab" aria-selected="true">
            PENGAJARAN & PEMBELAJARAN
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-wrap nav-link fw-bolder" id="skor-5-tab" data-bs-toggle="tab" href="#skor-5" aria-controls="skor-5" role="tab" aria-selected="true">
            PENGURUSAN PENILAIAN / PEPERIKSAAN
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-wrap nav-link fw-bolder" id="skor-6-tab" data-bs-toggle="tab" href="#skor-6" aria-controls="skor-6" role="tab" aria-selected="true">
            PENGURUSAN & PEMBANGUNAN GURU
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-wrap nav-link fw-bolder" id="skor-7-tab" data-bs-toggle="tab" href="#skor-7" aria-controls="skor-7" role="tab" aria-selected="true">
            DISIPLIN
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-wrap nav-link fw-bolder" id="skor-8-tab" data-bs-toggle="tab" href="#skor-8" aria-controls="skor-8" role="tab" aria-selected="true">
            PIAWAIAN
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-wrap nav-link fw-bolder" id="skor-9-tab" data-bs-toggle="tab" href="#skor-9" aria-controls="skor-9" role="tab" aria-selected="true">
            KEBERSIHAN & KECERIAAN
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-wrap nav-link fw-bolder" id="skor-10-tab" data-bs-toggle="tab" href="#skor-10" aria-controls="skor-10" role="tab" aria-selected="true">
            PENGURUSAN PELAJAR ANTARABANGSA
        </a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane fade show active" id="skor-1" role="tabpanel" aria-labelledby="skor-1-tab">
        @include('skips.borang_skips.skor_penilaian.item_1')
    </div>
    <div class="tab-pane fade" id="skor-2" role="tabpanel" aria-labelledby="skor-2-tab">
        @include('skips.borang_skips.skor_penilaian.item_2')
    </div>
    <div class="tab-pane fade" id="skor-3" role="tabpanel" aria-labelledby="skor-3-tab">
        @include('skips.borang_skips.skor_penilaian.item_3')
    </div>
    <div class="tab-pane fade" id="skor-4" role="tabpanel" aria-labelledby="skor-4-tab">
        @include('skips.borang_skips.skor_penilaian.item_4')
    </div>
    <div class="tab-pane fade" id="skor-5" role="tabpanel" aria-labelledby="skor-5-tab">
        @include('skips.borang_skips.skor_penilaian.item_5')
    </div>
    <div class="tab-pane fade" id="skor-6" role="tabpanel" aria-labelledby="skor-6-tab">
        @include('skips.borang_skips.skor_penilaian.item_6')
    </div>
    <div class="tab-pane fade" id="skor-7" role="tabpanel" aria-labelledby="skor-7-tab">
        @include('skips.borang_skips.skor_penilaian.item_7')
    </div>
    <div class="tab-pane fade" id="skor-8" role="tabpanel" aria-labelledby="skor-8-tab">
        @include('skips.borang_skips.skor_penilaian.item_8')
    </div>
    <div class="tab-pane fade" id="skor-9" role="tabpanel" aria-labelledby="skor-9-tab">
        @include('skips.borang_skips.skor_penilaian.item_9')
    </div>
    <div class="tab-pane fade" id="skor-10" role="tabpanel" aria-labelledby="skor-10-tab">
        @include('skips.borang_skips.skor_penilaian.item_10')
    </div>
</div>
<?php
    $butiran_institusi_id = Request::segment(3);
    $itemStandardQualitySkips = App\Models\ItemStandardQualitySkips::where('butiran_institusi_id', $butiran_institusi_id)->first();
    $showHantar = false;
    if ($butiran_institusi_id) {
        if (!empty($itemStandardQualitySkips->penubuhan_pendaftaran) && !empty($itemStandardQualitySkips->pengurusan_institusi) && !empty($itemStandardQualitySkips->pengurusan_kurikulum) && !empty($itemStandardQualitySkips->pengajaran) && !empty($itemStandardQualitySkips->pengurusan_penilaian) && !empty($itemStandardQualitySkips->pengurusan_pembangunan_guru) && !empty($itemStandardQualitySkips->displin) && !empty($itemStandardQualitySkips->piawaian) && !empty($itemStandardQualitySkips->kebersihan) && !empty($itemStandardQualitySkips->pengurusan_pelajar_antarabangsa)) {
            $showHantar = true;
        }
    }
?>
<hr>
@if($showHantar && $type != 'verfikasi')
    <div class="d-flex justify-content-end align-items-center mt-1">
        <button type="button" class="btn btn-primary float-right" onclick="submitCompleteForm(1)">Hantar</button>
    </div>
@endif

<script type="text/javascript">
    function submitCompleteForm(id) {
        var url = "{{ route('skips.instrumen-update') }}"
        $.ajax({
            url: url,
            method: 'POST',
            data: {
                type: 'borang',
                status: id
            },
            contentType: false,
            processData: false,
            success: function(response) {
               if (response.status) {
                    Swal.fire('Success', 'Berjaya', 'success');
               }
            }
        });
    }
</script>
