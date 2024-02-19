<ul class="nav nav-pills nav-justified" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder active" id="sq5-1-tab" data-bs-toggle="tab" href="#sq5-1" aria-controls="sq5-1" role="tab" aria-selected="true">
            SQ5.1
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="sq5-2-tab" data-bs-toggle="tab" href="#sq5-2" aria-controls="sq5-2" role="tab" aria-selected="false">
            SQ5.2
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="jumlah-sq5-tab" data-bs-toggle="tab" href="#jumlah-sq5" aria-controls="jumlah-sq5" role="tab" aria-selected="false" onclick="updateJumlah5('itemcq5',{{$id}})">
            JUMLAH CQ5
        </a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane active" id="sq5-1" role="tabpanel" aria-labelledby="sq5-1-tab">
        @include('skpak.validasi_skpak.cq5.sq5_1')
    </div>
    <div class="tab-pane fade" id="sq5-2" role="tabpanel" aria-labelledby="sq5-2-tab">
        @include('skpak.validasi_skpak.cq5.sq5_2')
    </div>
    <div class="tab-pane fade" id="jumlah-sq5" role="tabpanel" aria-labelledby="jumlah-sq5-tab">
    </div>
</div>
<script type="text/javascript">
     function filechange(id, file, event){
        var updateid = id+'_view'; 
        var inputname = id+'_list'; 
        $('.'+updateid).css('display', 'none');
        $('#'+inputname).val('');
          var list = document.getElementById(file);
          list.innerHTML = '';
          for (var i = 0; i < event.files.length; i++) {
            list.innerHTML += (i + 1) + '. ' + event.files[i].name + '\n';
          }
          if (list.innerHTML == '') list.style.display = 'none';
          else list.style.display = 'block';
    }

    function assignmandatory(id, event) {

        var idval = 'uploadfile_'+id;
        var jumlahval = 'jumlah_'+id;
        $('#'+jumlahval).text(event.value);
        if (event.value != 4) {
            $('#'+idval).prop('required', true);   
        } else {
            $('#'+idval).prop('required', false);   
        }
    }

     function  updateJumlah5(tabname, id) {
        var url = "{{ route('skpak.get-verfikasi-jumlah') }}";
        var data = '<?php echo Request::segment(2); ?>';
        
        $.ajax({
            url: url,
            method: 'POST',
            data: {
                id:id,
                tabname: tabname,
                type: data
            },
            success: function(response) {
                $('#jumlah-sq1').empty();
                $('#jumlah-sq1').append(response)
            }
        });
    }
</script>