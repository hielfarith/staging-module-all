<div class="row invoice-add">
        <div class="col-xl-12 col-md-12 col-12">
            <div class="card invoice-preview-card">
                <div class="card-body invoice-padding pb-0">
                    <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                        <div class="me-1" style="width: 70%;">
                            <div class="logo-wrapper">
                                <img src="{{ asset('images/logo/jata_negara.png') }}" height="24">
                                <h3 class="text-primary invoice-logo">Kementerian Pendidikan Malaysia (KPM)</h3>
                            </div>

                            <h4 class="fw-bolder mb-25">{{$form_name}}</h4>
                            <h6 class="fw-bolder mb-25">{{$category}}</h6>
                            <p class="mb-25">{{$data->description}}</p>
                        </div>
                        <div class="invoice-number-date mt-md-0 mt-2">
                            <div class="d-flex align-items-center justify-content-md-end mb-1">
                                <h4 class="title">ID Instrumen</h4>
                                <div class="input-group input-group-merge invoice-edit-input-group">
                                    <div class="input-group-text">
                                        <i data-feather="hash"></i>
                                    </div>

                                    <input type="text" class="form-control invoice-edit-input" value="{{$data->id_instrumen}}" disabled>
                                </div>
                            </div>
                            <div class="mb-1">
                                <label class="fw-bolder"> Tarikh Didaftar</label>
                                <input type="text" class="form-control flatpickr" value="{{date('d/m/Y', strtotime($data->tarikh_didaftar))}}" disabled>
                            </div>

                            <div class="mb-1">
                                <label class="fw-bolder"> Tarikh Tutup Pengisian</label>
                                <input type="text" class="form-control flatpickr" value="{{ date('d/m/Y', strtotime($data->tarikh_tutup))}}" disabled>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="invoice-spacing" />

                <div class="col-md-6 mb-1">
                    <label class="fw-bold form-label">Nama Aspek
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="nama_aspek" id="nama_aspek" required onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 32) || event.charCode == 8" value="{{$TetapanAspek?->nama_aspek}}">
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Status Aspek:
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="status_aspek" id="status_aspek" required>
                        <option value="" hidden>Sila Pilij</option>
                        <option value="Belum Set" @if($TetapanAspek?->status_aspek == 'Belum Set') selected @endif>Belum Set</option>
                        <option value="Telah Set" @if($TetapanAspek?->status_aspek == 'Telah Set') selected @endif>Telah Set</option>
                    </select>
                </div>
                <hr class="invoice-spacing" />
                @foreach($arrays as $array)
                    <?php
                    if(!array_key_exists('type', $array))
                        continue;
                    ?>
                    @if( in_array($array['type'], ['text', 'number','date','time', 'email']))
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
                            <span>{{ empty($array['options']) ? '' : $array['options'] }}</span>
                        </div>
                    </div>
                    @elseif($array['type'] == 'radio' || $array['type'] == 'checkbox' )
                    <x-input-radio-field name="{{$array['name']}}" value="" :required="$array['required']"
                    label="{{$array['label']}}">
                        <?php
                            $options = json_decode($array['options'], true);
                        ?>
                        @foreach($options as $option)
                        <label class="form-check-label">
                            <input type="{{$array['type']}}" label="{{$array['label']}}" class="form-check-input"  name="{{$array['name']}}" value="{{$option}}">
                            {{$option}}
                        </label>
                        @endforeach
                    </x-input-radio-field>
                    @endif
                @endforeach

                <br>
                <hr class="invoice-spacing mt-0" />

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
