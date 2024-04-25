<ul class="nav nav-pills nav-second nav-justified" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder active" id="sq1-1-tab" data-bs-toggle="tab" href="#sq1-1"
            aria-controls="sq1-1" role="tab" aria-selected="true">
            SQ1.1
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="sq1-2-tab" data-bs-toggle="tab" href="#sq1-2"
            aria-controls="sq1-2" role="tab" aria-selected="false">
            SQ1.2
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="sq1-3-tab" data-bs-toggle="tab" href="#sq1-3"
            aria-controls="sq1-3" role="tab" aria-selected="false">
            SQ1.3
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="jumlah-sq1-tab" data-bs-toggle="tab"
            href="#jumlah-sq1" aria-controls="jumlah-sq1" role="tab" aria-selected="false"
            onclick="updateJumlah('itemcq1',{{ $id }})">
            JUMLAH CQ1
        </a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane active" id="sq1-1" role="tabpanel" aria-labelledby="sq1-1-tab">
        @include('skpak.validasi_skpak.cq1.sq1_1')
    </div>
    <div class="tab-pane fade" id="sq1-2" role="tabpanel" aria-labelledby="sq1-2-tab">
        @include('skpak.validasi_skpak.cq1.sq1_2')
    </div>
    <div class="tab-pane fade" id="sq1-3" role="tabpanel" aria-labelledby="sq1-3-tab">
        @include('skpak.validasi_skpak.cq1.sq1_3')
    </div>
    <div class="tab-pane fade" id="jumlah-sq1" role="tabpanel" aria-labelledby="jumlah-sq1-tab">

    </div>
</div>

<script type="text/javascript">
    function filechange1(id, file, event) {
        var updateid = id + '_view';
        var inputname = id + '_list';
        $('.' + updateid).css('display', 'none');
        $('#' + inputname).val('');
        var list = document.getElementById(file);
        list.innerHTML = '';
        for (var i = 0; i < event.files.length; i++) {
            list.innerHTML += (i + 1) + '. ' + event.files[i].name + '\n';
        }
        if (list.innerHTML == '') list.style.display = 'none';
        else list.style.display = 'block';
    }

    function assignmandatory1(id, event) {
        var idval = 'uploadfile_' + id;
        var jumlahval = 'jumlah_' + id;
        $('#' + jumlahval).text(event.value);

        if (event.value != 4) {
            $('#' + idval).prop('required', true);
        } else {
            $('#' + idval).prop('required', false);
        }
    }

    function updateJumlah(tabname, id) {
        var url = "{{ route('skpak.get-verfikasi-jumlah') }}";
        var data = '<?php echo Request::segment(2); ?>';

        $.ajax({
            url: url,
            method: 'POST',
            data: {
                id: id,
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
