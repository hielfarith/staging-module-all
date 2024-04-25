<ul class="nav nav-pills nav-second nav-justified" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder active" id="sq3-1-tab" data-bs-toggle="tab" href="#sq3-1"
            aria-controls="sq3-1" role="tab" aria-selected="true">
            SQ3.1
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="sq3-2-tab" data-bs-toggle="tab" href="#sq3-2"
            aria-controls="sq3-2" role="tab" aria-selected="false">
            SQ3.2
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="sq3-3-tab" data-bs-toggle="tab" href="#sq3-3"
            aria-controls="sq3-3" role="tab" aria-selected="false">
            SQ3.3
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="sq3-4-tab" data-bs-toggle="tab" href="#sq3-4"
            aria-controls="sq3-4" role="tab" aria-selected="false">
            SQ3.4
        </a>
    </li>
    <li class="nav-item" role="presentation">
        <a class="text-uppercase text-wrap nav-link fw-bolder" id="jumlah-sq3-tab" data-bs-toggle="tab"
            href="#jumlah-sq3" aria-controls="jumlah-sq3" role="tab" aria-selected="false"
            onclick="updateJumlah3('itemcq3',{{ $id }})">
            JUMLAH cq3
        </a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane active" id="sq3-1" role="tabpanel" aria-labelledby="sq3-1-tab">
        @include('skpak.validasi_skpak.cq3.sq3_1')
    </div>
    <div class="tab-pane fade" id="sq3-2" role="tabpanel" aria-labelledby="sq3-2-tab">
        @include('skpak.validasi_skpak.cq3.sq3_2')
    </div>
    <div class="tab-pane fade" id="sq3-3" role="tabpanel" aria-labelledby="sq3-3-tab">
        @include('skpak.validasi_skpak.cq3.sq3_3')
    </div>
    <div class="tab-pane fade" id="sq3-4" role="tabpanel" aria-labelledby="sq3-4-tab">
        @include('skpak.validasi_skpak.cq3.sq3_4')
    </div>
    <div class="tab-pane fade" id="jumlah-sq3" role="tabpanel" aria-labelledby="jumlah-sq3-tab">
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

    function updateJumlah3(tabname, id) {
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
