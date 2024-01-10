<div class="row invoice-add">
    <div class="col-xl-12 col-md-12 col-12">
        <div class="card invoice-preview-card">

           <form id="formpengetua" novalidate="novalidate">
            <input type="hidden" name="pengetua_id" value="{{$pengetua->id}}"> 
            <div>
                <label class="fw-bolder">Nama:<span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="nama" required onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 32) || event.charCode == 8" {{$readonly}} value={{$pengetua->nama}}>
            </div>

            <div>
                <label class="fw-bolder">No Kad Pengenalan:<span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="no_kp" required {{$readonly}} value="{{$pengetua->no_kp}}">
            </div>
            
            <div>
                <label class="fw-bolder"> No Tel:<span style="color: red;">*</span></label>
                <input type="text" class="form-control" name="no_tel" required onkeypress='return event.charCode >= 48 && event.charCode <= 57' {{$readonly}} value="{{$pengetua->no_tel}}">
            </div>

             <div>
                <label class="fw-bolder"> Email:<span style="color: red;">*</span></label>
                <input type="email" class="form-control" name="email" required {{$readonly}} value="{{$pengetua->email}}">
            </div>
 
             <div>
                <label class="fw-bolder"> Jawatan:<span style="color: red;">*</span></label>
                  <select class="form-control select2" name="jawatan" required {{$disabled}}> 
                        <option>select</option>
                        <option value="1" @if($pengetua->jawatan == '1') selected @endif>1</option>
                        <option value="2" @if($pengetua->jawatan == '2') selected @endif>2</option>
                </select>
            </div>

            <div>
                <label class="fw-bolder"> Negeri:<span style="color: red;">*</span></label>
                  <select class="form-control select2" name="negeri" required {{$disabled}}>
                        <option>pilih</option>
                        @foreach($states as $state)
                        <option value="{{$state->name}}" @if($pengetua->negeri == $state->name) selected @endif>{{$state->name}}</option>
                        @endforeach
                </select>
            </div>

            <div>
                <label class="fw-bolder"> Institusi:<span style="color: red;">*</span></label>
                  <select class="form-control select2" name="institusi" required {{$disabled}} value="{{$pengetua->institusi}}">
                        <option>select</option>
                        <option value="1" @if($pengetua->jawatan == '1') selected @endif>1</option>
                        <option value="2" @if($pengetua->jawatan == '2') selected @endif>2</option>
                </select>
            </div>


             <div>
                <label class="fw-bolder"> Sebab Pertukaran:<span style="color: red;">*</span></label>
                  <select class="form-control select2" name="sebab_pertukaran" id="sebab_pertukaran" required onchange="checksebab(this)">
                        <option>select</option>
                        <option value="Dalam Proses Pertukaran Pengerusi/Pengetua/Guru Besar" @if($pengetua->sebab_pertukaran == 'Dalam Proses Pertukaran Pengerusi/Pengetua/Guru Besar') selected @endif>Dalam Proses Pertukaran Pengerusi/Pengetua/Guru Besar</option>
                        <option value="Pengambilalihan Pemilikan Baru" @if($pengetua->sebab_pertukaran == 'Pengambilalihan Pemilikan Baru') selected @endif>Pengambilalihan Pemilikan Baru</option>
                        <option value="Kematian" @if($pengetua->sebab_pertukaran == 'Kematian') selected @endif>Kematian</option>
                        <option value="Lain-lain" @if($pengetua->sebab_pertukaran == 'Lain-lain') selected @endif>Lain-lain</option>
                </select>
                <br>
                <input type="text" name="sebab_pertukaran_lain" placeholder="Sila nyatakan." id="sebab_pertukaran_lain" class="form-control" style="display: none;" value="{{$pengetua->sebab_pertukaran_lain}}">
            </div>
            @if($readonly != 'readonly')
            <hr>
            <div class="d-flex justify-content-end align-items-center my-1">
                <button type="submit" class="btn btn-primary float-right">Hantar</button>
            </div>   
            @endif 
        </form>

        </div>
    </div>
</div>

<script type="text/javascript">
var sebab_pertukaran = $('#sebab_pertukaran').val();
if (sebab_pertukaran == 'Lain-lain') {
    $('#sebab_pertukaran_lain').css('display','block');
} else {
    $('#sebab_pertukaran_lain').css('display','none');
}
$('#formpengetua').submit(function(event) {
        event.preventDefault();
        var formData = new FormData(document.getElementById('formpengetua'));
        var error = false;
        $('select.select2').each(function() {
            var element = $(this);
            var select2Value = element.select2('data');
            var selectedValues = element.val();
            var fieldName = element.attr('name');
            if (typeof element.attr('disabled') == 'undefined') {

                if (!selectedValues || selectedValues === '') {
                    Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
                    error = true;
                    return false; // Stop the loop if an error is found
                }
            }
        });

        formData.forEach(function(value, name) {
            var element = $("input[name='"+name+"']");
            if (typeof element.attr('name') != 'undefined' && typeof element.attr('required') != 'undefined') {
                if (element.val() == '') {
                    Swal.fire('Error', 'Sila isi ruangan yang diperlukan', 'error');
                    error = true;
                    return false;
                }
            }
        });

        if (error) {
            return false;
        }
        var url = "{{ route('admin.internal.pengetuasave') }}"
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
               if (response.status) {
                    Swal.fire('Success', 'Berjaya', 'success');
                    var location = "{{route('admin.internal.pengetualist')}}"
                    window.location.href = location;
               }
            }
        });

    });
</script>