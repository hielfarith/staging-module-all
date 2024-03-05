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



<?php
$id = Request::segment(3);
?>
<hr>
<form id="jpn_verfikasi">
    <input type="hidden" name="spks_id" value="{{ $id }}">

    <div class="table-responsive mb-5">
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
            <tbody style="font-size: 10pt;width:100%" id="catatan_sekolah_jpn">

            </tbody>
        </table>
        <input type="hidden" name="selesai" value="" id="selesai">
        <div class="d-flex justify-content-end align-items-center mt-1">
            <button type="button" class="btn btn-primary btn-sm waves-effect waves-float waves-light"
                onclick="formsubmitv('1')">Selesai</button>
            <div style="margin-left: 10px;"></div> <!-- Adjust margin as needed -->
            <button type="button" class="btn btn-primary btn-sm waves-effect waves-float waves-light"
                onclick="formsubmitv('2')">Tidak
                Selesai</button>
        </div>
    </div>

</form>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script type="text/javascript">
    var id = <?php echo Request::segment(3); ?>;

    function formsubmitv(argument) {
        $('#selesai').val(argument);
        var formData = new FormData(document.getElementById('jpn_verfikasi'));
        var error = false;

        $('form#jpn_verfikasi').find('radio, input, checkbox, textarea').each(function() {
            if (this.required && this.type == 'radio' && !this.checked) {
                var val = $("input[type='radio'][name=" + this.name + "]:checked", '#jpn_verfikasi').val();
                if (typeof val == 'undefined') {
                    error = true;
                }
            }
        });

        if (error) {
            Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
            return false;
        }
        var APIUrl = "{{ env('APP_VERFIKASI_URL') }}" + 'api/spks/save-verfikasi';

        $.ajax({
            url: APIUrl,
            method: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.status == 'success') {
                    Swal.fire('Success', 'Berjaya', 'success');
                    var location = "{{ route('spks.verfikasi_senarai')}}"
                    window.location.href = location;
               } else {
                    Swal.fire('Gagal', 'gagal', 'error');
               }
            }
        });
    }
</script>
