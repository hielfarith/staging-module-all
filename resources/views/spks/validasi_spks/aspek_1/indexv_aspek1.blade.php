
<div   class="bs-stepper vertical vertical-wizard">
    <div style="width: 10%" class="bs-stepper-header">
        <div class="step" data-target="#account-details-vertical" role="tab" id="account-details-vertical-trigger">
            <button type="button" class="step-trigger" onclick="choosetab('aspek1')">
                <span style="width: 100%;padding-left:10%;padding-right:10%" class="bs-stepper-box">Section A</span>
                <span class="bs-stepper-label">
                    <span class="bs-stepper-title"></span>
                    <span class="bs-stepper-subtitle"></span>
                </span>
            </button>
        </div>


        <div class="step" data-target="#personal-info-vertical" role="tab" id="personal-info-vertical-trigger">
            <button type="button" class="step-trigger" onclick="choosetab('aspek1_sectionb')">
                <span style="width: 100%;padding-left:10%;padding-right:10%" class="bs-stepper-box">Section B</span>
                <span class="bs-stepper-label">
                    <span class="bs-stepper-title"></span>
                    <span class="bs-stepper-subtitle"></span>
                </span>
            </button>
        </div>
        <div class="step" data-target="#address-step-vertical" role="tab" id="address-step-vertical-trigger">
            <button type="button" class="step-trigger" onclick="choosetab('aspek1_sectionc')">
                <span style="width: 100%;padding-left:10%;padding-right:10%" class="bs-stepper-box">Section C</span>
                <span class="bs-stepper-label">
                    <span class="bs-stepper-title"></span>
                    <span class="bs-stepper-subtitle"></span>
                </span>
            </button>
        </div>
        <div class="step" data-target="#social-links-vertical" role="tab" id="social-links-vertical-trigger">
            <button type="button" class="step-trigger" onclick="choosetab('aspek1_sectiond')">
                <span style="width: 100%;padding-left:10%;padding-right:10%" class="bs-stepper-box">Section D</span>
                <span class="bs-stepper-label">
                    <span class="bs-stepper-title"></span>
                    <span class="bs-stepper-subtitle"></span>
                </span>
            </button>
        </div>
        <div class="step" data-target="#eela" role="tab" id="eela-trigger">
            <button type="button" class="step-trigger" onclick="choosetab('aspek1_sectione')">
                <span style="width: 100%;padding-left:10%;padding-right:10%" class="bs-stepper-box">Section E</span>
                <span class="bs-stepper-label">
                    <span class="bs-stepper-title"></span>
                    <span class="bs-stepper-subtitle"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="bs-stepper-content">

        <div id="account-details-vertical" class="content" role="tabpanel" aria-labelledby="account-details-vertical-trigger">
            @include('spks.validasi_spks.aspek_1.sectionA')
        </div>
        <div id="personal-info-vertical" class="content" role="tabpanel"
            aria-labelledby="personal-info-vertical-trigger">
            @include('spks.validasi_spks.aspek_1.sectionB')
        </div>
        <div id="address-step-vertical" class="content" role="tabpanel" aria-labelledby="address-step-vertical-trigger">
            @include('spks.validasi_spks.aspek_1.sectionC')
        </div>
        <div id="social-links-vertical" class="content" role="tabpanel" aria-labelledby="social-links-vertical-trigger">
            @include('spks.validasi_spks.aspek_1.sectionD')
        </div>
        <div id="eela" class="content" role="tabpanel" aria-labelledby="eela-trigger">
            @include('spks.validasi_spks.aspek_1.sectionE')
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script type="text/javascript">
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    function  choosetab(argument) {
        var APIUrl = "{{ env('APP_VERFIKASI_URL')}}"+'api/spks/get-tab-jumlah';
        var id = <?php echo Request::segment(3); ?>

        $.ajax({
            url: APIUrl,
            method: 'POST',
            data: {
                id: id,
                tab:argument
            },
            success: function(response) {
                var data = response.data; 
                 var length = 8;
                var sum = 0;
                var sumid = argument+'_sum';
                if (argument == 'aspek1_sectionc') {
                    var length = 6;
                } else if (argument == 'aspek1_sectione') {
                    var length = 9;
                }
                for (var i = 0; i < length; i++) {
                    var id = argument+'_0_'+i;
                    var dataid = '0_'+i;
                    if ($.isNumeric(data[dataid])) {
                        sum += parseInt(data[dataid]);
                    }   
                    $('#'+id).html(data[dataid]); 
                }
                $('#'+sumid).html(sum);
            }
        });
    }
</script>