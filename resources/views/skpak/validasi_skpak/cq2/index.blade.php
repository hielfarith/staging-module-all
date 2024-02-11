<ul class="nav nav-pills nav-justified" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder active" id="sq2-1-tab" data-bs-toggle="tab" href="#sq2-1" aria-controls="sq2-1" role="tab" aria-selected="true">
            SQ2.1
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="sq2-2-tab" data-bs-toggle="tab" href="#sq2-2" aria-controls="sq2-2" role="tab" aria-selected="false">
            SQ2.2
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="sq2-3-tab" data-bs-toggle="tab" href="#sq2-3" aria-controls="sq2-3" role="tab" aria-selected="false">
            SQ2.3
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="sq2-4-tab" data-bs-toggle="tab" href="#sq2-4" aria-controls="sq2-4" role="tab" aria-selected="false">
            SQ2.4
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="sq2-5-tab" data-bs-toggle="tab" href="#sq2-5" aria-controls="sq2-5" role="tab" aria-selected="false">
            SQ2.5
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="sq2-6-tab" data-bs-toggle="tab" href="#sq2-6" aria-controls="sq2-6" role="tab" aria-selected="false">
            SQ2.6
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="jumlah-sq2-tab" data-bs-toggle="tab" href="#jumlah-sq2" aria-controls="jumlah-sq2" role="tab" aria-selected="false" onclick="updateJumlah2('itemcq2',{{$id}})">
            JUMLAH CQ2
        </a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane active" id="sq2-1" role="tabpanel" aria-labelledby="sq2-1-tab">
        @include('skpak.validasi_skpak.cq2.sq2_1')
    </div>
    <div class="tab-pane fade" id="sq2-2" role="tabpanel" aria-labelledby="sq2-2-tab">
        @include('skpak.validasi_skpak.cq2.sq2_2')
    </div>
    <div class="tab-pane fade" id="sq2-3" role="tabpanel" aria-labelledby="sq2-3-tab">
        @include('skpak.validasi_skpak.cq2.sq2_3')
    </div>
    <div class="tab-pane fade" id="sq2-4" role="tabpanel" aria-labelledby="sq2-4-tab">
        @include('skpak.validasi_skpak.cq2.sq2_4')
    </div>
    <div class="tab-pane fade" id="sq2-5" role="tabpanel" aria-labelledby="sq2-5-tab">
        @include('skpak.validasi_skpak.cq2.sq2_5')
    </div>
    <div class="tab-pane fade" id="sq2-6" role="tabpanel" aria-labelledby="sq2-6-tab">
        @include('skpak.validasi_skpak.cq2.sq2_6')
    </div>
    <div class="tab-pane fade" id="jumlah-sq2" role="tabpanel" aria-labelledby="jumlah-sq2-tab" >
    </div>
</div>

<script type="text/javascript">
     function filechange(id, file, event){
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
    function  updateJumlah2(tabname, id) {
        var url = "{{ route('skpak.get-verfikasi-jumlah') }}"
        $.ajax({
            url: url,
            method: 'POST',
            data: {
                id:id,
                tabname: tabname
            },
            success: function(response) {
                $('#jumlah-sq2').empty();
                $('#jumlah-sq2').append(response)
            }
        });
    }
</script>