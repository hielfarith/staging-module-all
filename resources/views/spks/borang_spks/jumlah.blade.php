<style>
    #jumlahKeseluruhanSpks thead th {
        vertical-align: middle;
        text-align: center;
    }

    #jumlahKeseluruhanSpks tbody {
        vertical-align: middle;
        /* text-align: center; */
    }

    #jumlahKeseluruhanSpks table {
        width: 100% !important;
        /* word-wrap: break-word; */
    }

</style>

<h5 class="card-title fw-bolder">
    JUMLAH KESELURUHAN STANDARD PENILAIAN
</h5>

<hr>
 
@php
$jumlahs_spks = [
    'Aspek 1: Pengurusan Aktiviti Murid',
    'Aspek 2: Pengurusan Keselamatan Infrastruktur Sekolah',
    'Aspek 3: Pengurusan Sosial',
    'Aspek 4: Pengurusan Krisis/ Bencana',
    'Aspek 5: Pengurusan Risiko',
    'Aspek 6: Pengurusan Perkhidmatan Pengawal Keselamatan Sekolah',
];
@endphp
<input type="hidden" name="spks_id" value="{{$id}}" id="spks_id">
<div class="table-responsive">
    <table class="table header_uppercase table-bordered table-hovered" id="jumlahKeseluruhanSpks">
        <thead>
            <tr>
                <th>Nama Aspek Penilaian</th>
                <th width="3%">0</th>
                <th width="3%">1</th>
                <th width="3%">2</th>
                <th width="3%">TB</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($jumlahs_spks as $key => $jumlah_spks)
            <tr>
                @php
                    $keyval = $key+1;
                    $variableName = 'aspek'.$keyval;
                @endphp
                <td>{{ $jumlah_spks }}</td>
                <td class="text-center"> @if(!empty($array)) {{$array[$variableName]['0']}} @else - @endif</td>
                <td class="text-center"> @if(!empty($array)) {{$array[$variableName]['1']}} @else - @endif</td>
                <td class="text-center"> @if(!empty($array)) {{$array[$variableName]['2']}} @else - @endif</td>
                <td class="text-center"> @if(!empty($array)) {{$array[$variableName]['tb']}} @else - @endif</td>
            </tr>
            @endforeach
        </tbody>

        <tfoot>
            <tr class="bg-light-danger">
                <td class="text-end">
                    Jumlah Keseluruhan
                </td>
                <td class="text-center">@if(!empty($jumlah)) {{ $jumlah['f0'] }} @else - @endif</td>
                <td class="text-center">@if(!empty($jumlah)) {{ $jumlah['f1'] }} @else - @endif</td>
                <td class="text-center">@if(!empty($jumlah)) {{ $jumlah['f2'] }} @else - @endif</td>
                <td class="text-center">@if(!empty($jumlah)) {{ $jumlah['ftb'] }} @else - @endif</td>
            </tr>
        </tfoot>
    </table>
</div>

<hr>

@if($disabled != 'disabled')
<div class="buy-now">
    <button class="btn btn-primary waves-effect waves-float waves-light" type="button" onclick="formHantar('hantar-aspek')">
        Hantar
    </button>
</div>
@endif
<script type="text/javascript">
    function  formHantar(argument) {
        var id = $('#spks_id').val();
        var url = "{{ route('spks.submit-jumlah') }}"
        $.ajax({
            url: url,
            method: 'POST',
            data: {
                id: id,
            },
            success: function(response) {
                if (response.status) {
                    Swal.fire('Success', 'Berjaya', 'success');
                    var location = "{{route('spks.senarai-spks')}}";
                    window.location.href = location;
                } else {
                    Swal.fire('Gagal', 'Gagal', 'error');
                }
            }
        });
    }
</script>
