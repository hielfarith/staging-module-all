@if($insertone)
    @if( in_array($array['type'], ['text', 'number']))
        <x-input-field type="{{$array['type']}}" label="{{$array['label']}}" name="{{$array['name']}}" value="" :required="$array['required']" placeholder="{{$array['placeholder']}}"></x-input-field>
    @elseif($array['type'] == 'select')
        <x-input-select-field name="{{$array['name']}}" label="{{$array['label']}}" :required="$array['required']" placeholder="{{$array['placeholder']}}">
            @foreach($array['slot'] as $option)
                <option value="{{$option}}">{{$option}}</option>
            @endforeach
        </x-input-select-field>
    @elseif($array['type'] == 'file')
        <x-input-file-field name="{{$array['name']}}" label="{{$array['label']}}" accept=".pdf,.doc,.docx" :required="$array['required']" placeholder="{{$array['placeholder']}}">
        </x-input-file-field>
    @endif
@else

<div class="row">
    <form id="borang_jawab_instrumen">
        @csrf()
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
                    <x-input-field type="{{ $array['type'] }}" name="{{ $array['name'] }}" value="" label="{{ $array['label'] }}" :required="$array['required']" placeholder="{{$array['placeholder']}}"/>
                @endif
            @elseif($array['type'] == 'select')
                <x-input-select-field class="form-control select2" name="{{ $array['name'] }}" label="{{ $array['label'] }}" :required="$array['required']" placeholder="{{$array['placeholder']}}">
                    <option value="" hidden>Pilih {{ $array['label'] }}</option>
                    @foreach($array['options'] as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </x-input-select-field>
            @elseif($array['type'] == 'file')
                <x-input-file-field class="form-control" name="{{ $array['name'] }}" label="{{ $array['label'] }}" accept=".pdf,.doc,.docx" :required="$array['required']" placeholder="{{$array['placeholder']}}">
                </x-input-file-field>
            @endif
        @endforeach

        {{-- Button: Submit Borang Instrumen yang Telah Dijawab --}}
        <div class="d-flex justify-content-end align-items-center my-1">
            <button type="button" class="btn btn-primary float-right">Hantar</button>
        </div>
    </form>
</div>
@endif

<script>
	$('#borang_jawab_instrumen').submit(function(event) {
    	event.preventDefault();
		var formData = new FormData(document.getElementById('borang_jawab_instrumen'));

		var url = "{{ route('simpan_instrumen_dijawab') }}"
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
               if (response.success) {
             		window.location.reload();
               }
            }
        });

	});
</script>
