@section('page-style')
    <style>
        .nav-pills .nav-link{
            font-size:12px;
        }

    </style>
@endsection

<ul class="nav nav-pills nav-justified" role="tablist">

    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder active" id="skor-tab" data-bs-toggle="tab" href="#skor" aria-controls="skor" role="tab" aria-selected="false" onclick="">
            SKOR PIAWAIAN
        </a>
    </li>

    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="penarafan-tab" data-bs-toggle="tab" href="#penarafan" aria-controls="penarafan" role="tab" aria-selected="false" onclick="">
            PENARAFAN PIAWAIAN
        </a>
    </li>
</ul>

<div class="card">
    <div class="card-body">
        <div style="margin-top: -3%" class="tab-content">

            <div class="tab-pane active" id="skor" role="tabpanel" aria-labelledby="skor-tab">
                @include('spks.validasi_spks.piawaian.skor')
            </div>
            <div class="tab-pane fade" id="penarafan" role="tabpanel" aria-labelledby="penarafan-tab">
                @include('spks.validasi_spks.piawaian.penarafan')
            </div>
        </div>
    </div>
</div>
