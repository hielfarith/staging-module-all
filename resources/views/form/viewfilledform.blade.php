<div class="row invoice-add">
        <div class="col-xl-12 col-md-12 col-12">
            <div class="card invoice-preview-card">
 <!-- Header starts -->
                <div class="card-body invoice-padding pb-0">
                    <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                        <div>
                            <div class="logo-wrapper">
                                <img src="{{ asset('images/logo/jata_negara.png') }}" height="24">
                                <h3 class="text-primary invoice-logo">Kementerian Pendidikan Malaysia (KPM)</h3>
                            </div>

                            {{-- Nama Instrumen --}}
                            <h4 class="fw-bolder mb-25">{{$form_name}}</h4>

                            {{-- Kategori Instrumen --}}
                            <h6 class="fw-bolder mb-25">{{$category}}</h6>

                            {{-- Deskripsi Instrumen --}}
                            <p class="mb-25">{{$data->description}}</p>
                        </div>
                        <div class="invoice-number-date mt-md-0 mt-2">
                            <div class="d-flex align-items-center justify-content-md-end mb-1">
                                <h4 class="title">ID Instrumen</h4>
                                <div class="input-group input-group-merge invoice-edit-input-group">
                                    <div class="input-group-text">
                                        <i data-feather="hash"></i>
                                    </div>

                                    {{-- ID Instrument --}}
                                    <input type="text" class="form-control invoice-edit-input" value="{{$data->id_instrumen}}" disabled>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-1">
                                <span class="title">Tarikh Didaftar:</span>

                                {{-- Tarikh Instrumen Didaftarkan --}}
                                <input type="text" class="form-control flatpickr" value="{{date('d/m/Y', strtotime($data->tarikh_didaftar))}}" disabled>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="title">Tarikh Tutup Pengisian:</span>

                                {{-- Tarikh Tutup Pengisian Instrumen --}}
                                <input type="text" class="form-control flatpickr" value="{{ date('d/m/Y', strtotime($data->tarikh_tutup))}}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Header ends -->
	@foreach($arrays as $array)
		<?php
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
				
			@else
				<x-input-field type="{{$array['type']}}" name="{{$array['name']}}" value="{{$staticForm ? $data[$array['name']] : ''}}" :required="$array['required']" placeholder="{{$array['placeholder']}}" label="{{$array['label']}}" />
			@endif
		@elseif($array['type'] == 'select')
		<div class="form-group main-container">
			<label>{{$array['label']}} @if($array['required']) <span style="color: red;">*</span> @endif</label>
			<div class="col-md-8">
				<?php
					if ($staticForm) {
						$disabled = false;
					} else {
						$disabled = true;
					}
				?>
				<select class="form-control" {{$disabled}} :required="$array['required']" placeholder="{{$array['placeholder']}}">  
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
			<x-input-file-field name="{{$array['name']}}" label="{{$array['label']}}" :required="$array['required']" placeholder="{{$array['placeholder']}}" accept=".pdf,.doc,.docx" disabled>
		</x-input-file-field>
			@else
			<label>{{$array['label']}}</label>
			<a href="{{$url}}" class="btn btn-primary">Download File</a>
			@endif
			</div>
		@elseif($array['type'] == 'segment')
		<div class="row" role="alert">
			<div class="col-xl-8 col-md-8 alert alert-info">
				<p class="fw-bolder">{{$array['label']}}</p>
				<span>{{$array['options']}}</span>
			</div>
		</div>
		@endif
	@endforeach
	<br>
	  <hr class="invoice-spacing mt-0" />

		    <!-- Footer starts -->
		    <div class="card-body invoice-padding py-0">
		        <div class="d-flex justify-content-center align-items-center">
		            <div class="row">
		                <div class="col-12">
		                    <div class="mb-2">
		                        <p class="fw-bolder mb-25">Hakcipta Terpelihara SKPAK 2023</p>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
   		</div>
	</div>
</div>
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