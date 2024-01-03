@if($insertone)
	@if( in_array($array['type'], ['text', 'number']))
		<x-input-field type="{{$array['type']}}" name="{{$array['name']}}" value="" :required="$array['required']"
		label="{{$array['label']}}" placeholder="{{$array['placeholder']}}"></x-input-field>
	@elseif($array['type'] == 'select')
		<x-input-select-field name="{{$array['name']}}" label="{{$array['label']}}" :required="$array['required']" placeholder="{{$array['placeholder']}}">
			@foreach($array['slot'] as $option)
			    <option value="{{$option}}">{{$option}}</option>
			@endforeach
		</x-input-select-field>
	@elseif($array['type'] == 'file')
		<x-input-file-field name="{{$array['name']}}" label="{{$array['label']}}" accept=".pdf,.doc,.docx" :required="$array['required']" placeholder="{{$array['placeholder']}}">
		</x-input-file-field>
	@elseif($array['type'] == 'segment')
	<div class="row" id="div_{{$array['name']}}">
		<div class="col-md-8 alert alert-info" role="alert">
			<p class="fw-bolder">{{$array['label']}}</p>
			<span>{{$array['slot']}}</span>
		</div>
        <input type="hidden" id="{{$array['name']}}" checktype="{{$array['type']}}" name="{{$array['name']}}" label="{{$array['label']}}" value="{{$array['slot']}}">
        <div class="col-md-2">
            <a class="delete-button btn-btn-danger text-danger" onclick="deletediv('div_{{$array['name']}}')">
                <i class="fa fa-trash"></i>
            </a>
        </div>
	</div>
	@elseif($array['type'] == 'radio' || $array['type'] == 'checkbox' )
		<x-input-radio-field name="{{$array['name']}}" value="" :required="$array['required']"
		label="{{$array['label']}}" placeholder="{{$array['placeholder']}}">
			@foreach($array['slot'] as $option)
			<label class="form-check-label">
				@if($array['type'] == 'radio')
				<span> <i class="fa fa-circle" aria-hidden="true"></i></span> {{$option}}
				 @endif
				 @if($array['type'] == 'checkbox')
				<span> <i class="fa fa-square" aria-hidden="true"></i></span> {{$option}}
				 @endif
			</label>
			@endforeach
			<input type="hidden" label="{{$array['label']}}" class="form-check-input" checktype="{{$array['type']}}" name="{{$array['name']}}" value="{{json_encode($array['slot'])}}" id="{{$array['name']}}">
		</x-input-radio-field>

	@endif
@else

<form id="form-submit">
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
				<div class="form-group main-container">
					<label>{{$array['label']}}</label>
					<input type="{{$array['type']}}" name="{{$array['name']}}" id="{{$array['name']}}" value="{{$value}}"  class="form-control">
				</div>
			@else
				<x-input-field type="{{$array['type']}}" name="{{$array['name']}}" value="" :required="$array['required']" placeholder="{{$array['placeholder']}}" label="{{$array['label']}}" />
			@endif
		@elseif($array['type'] == 'select')
			<x-input-select-field name="{{$array['name']}}" label="{{$array['label']}}" :required="$array['required']" placeholder="{{$array['placeholder']}}">
				@foreach($array['options'] as $option)
				    <option value="{{$option}}">{{$option}}</option>
				@endforeach
			</x-input-select-field>
		@elseif($array['type'] == 'file')
			<x-input-file-field name="{{$array['name']}}" label="{{$array['label']}}" accept=".pdf,.doc,.docx" :required="$array['required']" placeholder="{{$array['placeholder']}}">
			</x-input-file-field>
		@elseif($array['type'] == 'segment')
		<div class="row" id="div_{{$array['name']}}">
			<div class="col-md-8 alert alert-info" role="alert">
				<p class="fw-bolder">{{$array['label']}}</p>
                    <span>{{ empty($array['options']) ? '' : $array['options'] }}</span>
			</div>
		</div>
		@elseif($array['type'] == 'radio' || $array['type'] == 'checkbox' )
		<x-input-radio-field name="{{$array['name']}}" value="" :required="$array['required']"
		label="{{$array['label']}}" placeholder="{{$array['placeholder']}}">
			@foreach($array['options'] as $option)
			<label class="form-check-label">
				<input type="{{$array['type']}}" class="form-check-input" name="{{$array['name']}}" value="{{$option}}" id="{{$array['name']}}"
				 @if($array['required']) required @endif>
				 {{trim($option)}}
			</label>
			@endforeach
		</x-input-radio-field>
		@endif
	@endforeach
	<div class="form-group main-container" style="padding-top: 5px;">
		<button type="submit" class="btn btn-primary btn-block">Submit</button>
	</div>
</form>

@endif

<script type="text/javascript">
	$('#form-submit').submit(function(event) {
    	event.preventDefault();
		var formData = new FormData(document.getElementById('form-submit'));

		var url = "{{route('form-submit')}}"
        $.ajax({
            url: url,
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
               if (response.success) {
               	var newurl = "{{route('listfillform')}}";
             		window.location.href = newurl;
               }
            }
        });

	});
</script>