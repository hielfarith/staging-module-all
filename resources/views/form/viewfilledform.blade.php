	@foreach($arrays as $array)
		<?php
		if ($array['type'] == 'select') {
			// dd($array);
		}
		if(!array_key_exists('type', $array))
			continue;
		?>
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
				<x-input-field type="{{$array['type']}}" name="{{$array['name']}}" value="{{$staticForm ? $data[$array['name']] : ''}}" readonly required label="{{$array['label']}}" />
			@endif
		@elseif($array['type'] == 'select')
		<div class="form-group main-container">
			<label>{{$array['label']}}</label>
			<div class="col-md-8">
				<?php
					if ($staticForm) {
						$disabled = false;
					} else {
						$disabled = true;
					}
				?>
				<select class="form-control" {{$disabled}}>  
					@if($staticForm)
						@foreach($array['options'] as $option)
							<option>{{$option}}</option>
						@endforeach
					@else
						<option>{{$data[$array['name']]}}</option>
					@endif
				</select>
			</div>
		</div>
		@elseif($array['type'] == 'file')
			<div class="form-group main-container">
			<?php
				$url = route('download',['id' => $id,'name' => $array['name']]);
			?>
			@if($staticForm) 
			<x-input-file-field name="{{$array['name']}}" label="{{$array['label']}}" accept=".pdf,.doc,.docx" disabled>
		</x-input-file-field>
			@else
			<label>{{$array['label']}}</label>
			<a href="{{$url}}" class="btn btn-primary">Download File</a>
			@endif
			</div>
		@endif
	@endforeach

@if ($canVerify || $canApprove || $canQuery)

@php
	$status = \App\Helpers\FMF::getNextStatus($dynamicModuleId, $filledform->status, 'success');
	$reject = \App\Helpers\FMF::getNextStatus($dynamicModuleId, $filledform->status, 'reject');
	$query = \App\Helpers\FMF::getNextStatus($dynamicModuleId, $filledform->status, 'query');
@endphp
<div class="modal-footer">
	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	@if($canVerify && !$canApprove)
 		<button type="button" class="btn btn-primary" onclick="formverify({{$status}},{{$filledform->id}})">Verify</button>
 	@endif
 	@if($canApprove)
 		<button type="button" class="btn btn-primary" onclick="formverify({{$status}},{{$filledform->id}})">Approve</button>
 	@endif
 	@if($canQuery)
 		<button type="button" class="btn btn-primary" onclick="formverify({{$query}},{{$filledform->id}})">Query</button>
 	@endif
 	
 	<button type="button" class="btn btn-danger" onclick="formverify({{$reject}},{{$filledform->id}})">Reject</button>
</div>
@endif