<style>
    #catatan_sekolah thead th {
        vertical-align: middle;
        text-align: center;
    }

    #catatan_sekolah tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #catatan_sekolah table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }

    .catatan {
        font-size: 11pt;
    }
</style>

<div class="catatan">
    <p class=" fw-bolder text-uppercase">
        Catatan Sekolah
    </p>
</div>


<hr>

<div class="table-responsive mb-3">
    <table class="table header_uppercase table-bordered table-hovered" style="width:100%" id="catatan_sekolah">
        <thead style="font-size: 9pt;width:100%">
            <tr style="font-size: 9pt;width:100%">
                <th style="font-size: 9pt; width:1%">No.</th>
                <th style="font-size: 9pt; width:10%">Aspek</th>
                <th style="font-size: 9pt; width:22%">Maklumat Item</th>
                <th style="font-size: 9pt; width:17%">Isu/Permasalahan</th>
                <th style="font-size: 9pt; width:10%">Catatan Verifikasi (PPD)</th>
                <th style="font-size: 9pt; width:10%">KLASIFIKASI ISU</th>
                <th style="font-size: 9pt; width:10%">Tindakan PPD</th>
                <th style="font-size: 9pt; width:10%">Tindakan JPN</th>
            </tr>
        </thead>
        <tbody style="font-size: 10pt;width:100%" id="catatan_sekolah_jpn_validasi">

        </tbody>
    </table>
<?php
    $id = Request::segment(3);
?>
<form id="jpn_validasi">
    <input type="hidden" name="spks_id" value="{{ $id }}">

    <div class="mt-1">
        <label for="comment">Komen:</label>
        <textarea class="form-control" id="comment" rows="3" name="comment"></textarea>
    </div>
    <input type="hidden" name="selesai" value="" id="selesai_validasi">
    <div class="d-flex justify-content-end align-items-center mt-1 mb-1">
        <button type="button" class="btn btn-primary btn-sm waves-effect waves-float waves-light" onclick="formsubmitval('1')">Selesai</button>
        <div style="margin-left: 10px;"></div> 
        <button type="button" class="btn btn-primary btn-sm waves-effect waves-float waves-light" onclick="formsubmitval('2')">Tidak Selesai</button>
    </div>

</div>

</div>
</form>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script type="text/javascript">
    var id = <?php echo Request::segment(3); ?>;

    function formsubmitval(argument) {
        $('#selesai_validasi').val(argument);
        var formData = new FormData(document.getElementById('jpn_validasi'));
        var error = false;

        var APIUrl = "{{ env('APP_VALIDASI_URL') }}" + 'api/spks/save-validasi';

        $.ajax({
            url: APIUrl,
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.status == 'success') {
                    Swal.fire('Success', 'Berjaya', 'success');
                    var location = "{{ route('spks.validasi_senarai')}}"
                    window.location.href = location;
               } else {
                    Swal.fire('Gagal', 'gagal', 'error');
               }
            }
        });
    }
</script>
