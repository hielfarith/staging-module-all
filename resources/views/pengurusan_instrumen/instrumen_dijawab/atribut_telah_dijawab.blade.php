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

                        <p class="mb-25">{{$DynamicFormData->description}}</p>
                    </div>
                    <div class="invoice-number-date mt-md-0 mt-2">
                        <div class="d-flex align-items-center justify-content-md-end mb-1">
                            <h4 class="title">ID Instrumen</h4>
                            <div class="input-group input-group-merge invoice-edit-input-group">
                                <div class="input-group-text">
                                    <i data-feather="hash"></i>
                                </div>

                                <input type="text" class="form-control invoice-edit-input" value="{{$DynamicFormData->id_instrumen}}" disabled>
                            </div>
                        </div>
                        <div class="mb-1">
                            <label class="fw-bolder"> Tarikh Didaftar</label>
                            <input type="text" class="form-control flatpickr" value="{{date('d/m/Y', strtotime($DynamicFormData->tarikh_didaftar))}}" disabled>
                        </div>

                        <div class="mb-1">
                            <label class="fw-bolder"> Tarikh Tutup Pengisian</label>
                            <input type="text" class="form-control flatpickr" value="{{ date('d/m/Y', strtotime($DynamicFormData->tarikh_tutup))}}" disabled>
                        </div>
                    </div>
                </div>
                <hr>

                @foreach($arrays as $array)
                    <?php
                    if(!array_key_exists('type', $array))
                        continue;
                    ?>
                    @if( in_array($array['type'], ['text', 'number','date','time','email']))
                        @if(in_array($array['name'], ['form_name','category_name']))
                            @php
                            if ($array['name'] == 'form_name') {
                                $value = $form_name;
                            } else {
                                $value = $category;
                            }
                            @endphp

                        @else
                            <x-input-field type="{{$array['type']}}" name="{{$array['name']}}" value="{{$staticForm ? '' : $data[$array['name']]}}" :required="$array['required']" placeholder="{{$array['placeholder']}}" label="{{$array['label']}}" readonly/>
                        @endif

                    @elseif($array['type'] == 'select')
                        <div class="col-md-12 mb-1">
                            <label class="form-label fw-bold">{{$array['label']}}
                                @if($array['required'])
                                    <span class="text-danger">*</span>
                                @endif
                            </label>
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

                    @elseif($array['type'] == 'file')
                        <div class="col-md-12 mb-1">
                            <?php
                                $url = route('download',['id' => $id,'name' => $array['name']]);
                            ?>
                            @if($staticForm)
                                <x-input-file-field name="{{$array['name']}}" label="{{$array['label']}}" :required="$array['required']" placeholder="{{$array['placeholder']}}" accept=".pdf,.doc,.docx" disabled>
                                </x-input-file-field>
                            @else
                                <label class="form-label fw-bold">{{$array['label']}}</label>
                                <a href="{{$url}}" class="btn btn-primary">Download File</a>
                            @endif
                        </div>

                    @elseif($array['type'] == 'segment')
                        <div class="row " role="alert" >
                            <div class="col-xl-8 col-12 col-md-8 alert alert-info">
                                <p class="fw-bolder">{{$array['label']}}</p>
                                <span>{{ empty($array['options']) ? '' : $array['options'] }}</span>
                            </div>
                        </div>

                        {{-- <?php
                            $i = 0;
                        ?>

                        <ul class="nav nav-pills nav-justified" role="tablist">
                            @foreach($array['type'] as $segement)
                                <li class="nav-item" role="presentation">
                                    <a class="text-uppercase nav-link fw-bolder {{ $i == 0 ? 'active' : '' }}" id="{{ $i++ }}-tab" data-bs-toggle="tab" href="#{{ $i++ }}" aria-controls="{{ $i++ }}" role="tab" aria-selected="true">
                                        {{ $array['label'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                        <div class="tab-content">
                            @foreach($array['type'] as $segement)
                                <div class="tab-pane fade {{ $i == 0 ? 'show active' : '' }}" id="{{ $i++ }}" role="tabpanel" aria-labelledby="{{ $i++ }}-tab">
                                    <div class="row">
                                        {{ empty($array['options']) ? '' : $array['options'] }}
                                    </div>
                                </div>
                            @endforeach
                        </div> --}}

                    @elseif($array['type'] == 'radio' || $array['type'] == 'checkbox' )
                        <x-input-radio-field name="{{$array['name']}}" value="" :required="$array['required']" label="{{$array['label']}}">
                            <?php
                                $options = json_decode($array['options'], true);
                                $values = $data[$array['name']];
                            ?>
                            <div class="col-md-12 mb-1">
                                <div class="demo-inline-spacing">
                                    @foreach($options as $option)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="{{$array['type']}}" name="{{$array['name']}}" id="inlineRadio1" value="{{$option}}" @if(in_array($option, $values)) checked  @endif disabled />
                                        <label class="form-check-label">{{$option}}</label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </x-input-radio-field>
                    @endif
                @endforeach
            </div>

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
    @if($canQuery && !empty($query))
        <button type="button" class="btn btn-primary" onclick="formverify({{$query}},{{$filledform->id}})">Query</button>
    @endif

    <button type="button" class="btn btn-danger" onclick="formverify({{$reject}},{{$filledform->id}})">Reject</button>
</div>
@endif
