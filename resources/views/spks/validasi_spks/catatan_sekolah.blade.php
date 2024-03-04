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
<form id="catatan">
<input type="hidden" name="spks_id" value="{{$id}}">

<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered mb-5" style="width:100%" id="catatan_sekolah">
        <thead style="font-size: 9pt;width:100%">
            <tr style="font-size: 9pt;width:100%">
                <th style="font-size: 9pt; width:1%">No.</th>
                <th style="font-size: 9pt; width:10%">Aspek</th>
                <th style="font-size: 9pt; width:22%">Maklumat Item</th>
                <th style="font-size: 9pt; width:17%">Isu/Permasalahan</th>
                <th style="font-size: 9pt; width:20%">Catatan Verifikasi (PPD)</th>
                <th style="font-size: 9pt; width:10%">Penentuan Criticality</th>
                <th style="font-size: 9pt; width:20%">Tindakan</th>
            </tr>
        </thead>
        <tbody style="font-size: 10pt;width:100%" id="catatan_sekolah_body">
           
        </tbody>
    </table>
</div>
<div class="buy-now">
    <button class="btn btn-primary waves-effect waves-float waves-light" type="button" onclick="formsubmitc()">
        Simpan
    </button>
</div>
</form>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script type="text/javascript">
    var id = <?php echo Request::segment(3); ?>;
    function formsubmitc() {
        var formData = new FormData(document.getElementById('catatan'));
        var error = false;

         $('form#catatan').find('radio, input, checkbox, textarea').each(function() {
            if(this.required && this.type == 'radio' && !this.checked) {
                var val = $("input[type='radio'][name="+this.name+"]:checked", '#catatan').val();
                if (typeof val == 'undefined') {
                    error = true;
                }
            }
        });

        if (error) {
            Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
            return false;
        }
        var APIUrl = "{{ env('APP_VERFIKASI_URL') }}" + 'api/spks/save-catatan';

        $.ajax({
            url: APIUrl,
            method: 'POST',
            data: formData,
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

