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
@if($insertone)
	@if( in_array($array['type'], ['text', 'number']))
		<x-input-field type="{{$array['type']}}" name="{{$array['name']}}" value="" label="{{$array['label']}}" />
	@elseif($array['type'] == 'select')
		<x-input-select-field name="{{$array['name']}}" label="{{$array['label']}}">
			@foreach($array['slot'] as $option)
			    <option value="{{$option}}">{{$option}}</option>
			@endforeach
		</x-input-select-field>
	@elseif($array['type'] == 'file')
		<x-input-file-field name="{{$array['name']}}" label="{{$array['label']}}" accept=".pdf,.doc,.docx">
		</x-input-file-field>
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
					<input type="{{$array['type']}}" name="{{$array['name']}}" id="{{$array['name']}}" value="{{$value}}" readonly class="form-control">
				</div>
			@else
				<x-input-field type="{{$array['type']}}" name="{{$array['name']}}" value="" required label="{{$array['label']}}" />
			@endif
		@elseif($array['type'] == 'select')
			<x-input-select-field name="{{$array['name']}}" label="{{$array['label']}}" required>
				@foreach($array['options'] as $option)
				    <option value="{{$option}}">{{$option}}</option>
				@endforeach
			</x-input-select-field>
		@elseif($array['type'] == 'file')
			<x-input-file-field name="{{$array['name']}}" label="{{$array['label']}}" accept=".pdf,.doc,.docx" required>
			</x-input-file-field>
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