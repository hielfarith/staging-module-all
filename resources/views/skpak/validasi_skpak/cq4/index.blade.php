<ul class="nav nav-pills nav-second nav-justified" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder active" id="sq4-1-tab" data-bs-toggle="tab" href="#sq4-1"
            aria-controls="sq4-1" role="tab" aria-selected="true">
            SQ4.1
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="sq4-2-tab" data-bs-toggle="tab" href="#sq4-2"
            aria-controls="sq4-2" role="tab" aria-selected="false">
            SQ4.2
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="jumlah-sq4-tab" data-bs-toggle="tab"
            href="#jumlah-sq4" aria-controls="jumlah-sq4" role="tab" aria-selected="false"
            onclick="updateJumlah4('itemcq4',{{ $id }})">
            JUMLAH CQ4
        </a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane active" id="sq4-1" role="tabpanel" aria-labelledby="sq4-1-tab">
        @include('skpak.validasi_skpak.cq4.sq4_1')
    </div>
    <div class="tab-pane fade" id="sq4-2" role="tabpanel" aria-labelledby="sq4-2-tab">
        @include('skpak.validasi_skpak.cq4.sq4_2')
    </div>
    <div class="tab-pane fade" id="jumlah-sq4" role="tabpanel" aria-labelledby="jumlah-sq4-tab">
    </div>
</div>

<script type="text/javascript">
    function filechange(id, file, event) {
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

    function assignmandatory(id, event) {

        var idval = 'uploadfile_' + id;
        var jumlahval = 'jumlah_' + id;
        $('#' + jumlahval).text(event.value);
        if (event.value != 4) {
            $('#' + idval).prop('required', true);
        } else {
            $('#' + idval).prop('required', false);
        }
    }

    function updateJumlah4(tabname, id) {
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
