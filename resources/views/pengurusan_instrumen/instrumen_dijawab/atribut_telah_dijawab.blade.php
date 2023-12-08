@foreach($arrays as $array)
    @if( in_array($array['type'], ['text', 'number']))
        @if(in_array($array['name'], ['form_name','category_name']))

        @php
            if ($array['name'] == 'form_name') {
                $value = $form_name;
            } else {
                $value = $category;
            }
        @endphp

        <div class="col-md-12 mb-1">
            <label class="fw-bolder">{{ $array['label'] }}</label>
            <input class="form-control" type="{{ $array['type'] }}" name="{{ $array['name'] }}" id="{{ $array['name'] }}" value="{{ $value }}" disabled>
        </div>
    @else
        <x-input-field type="{{ $array['type'] }}" name="{{ $array['name'] }}" value="{{$data[$array['name']]}}" label="{{ $array['label'] }}" readonly required/>
    @endif

    @elseif($array['type'] == 'select')
    <div class="col-md-12 mb-1">
        <label class="fw-bolder">{{ $array['label'] }}</label>
        <select class="form-control select2" disabled>
            <option>{{$data[$array['name']]}}</option>
        </select>
    </div>

    @elseif($array['type'] == 'file')
    <div class="col-md-12 mb-1">
        <label class="fw-bolder">{{ $array['label'] }}</label>
        <?php
            $url = route('muat_turun',['id' => $id,'name' => $array['name']]);
        ?>
        <a href="{{ $url }}" class="btn btn-primary">Muat Turun Fail</a>
    </div>
    @endif
@endforeach
