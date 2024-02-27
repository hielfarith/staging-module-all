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
                <hr>

                @if($insertone)
                    @if( in_array($array['type'], ['text', 'number','date','time','email']))
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
                    @elseif($array['type'] == 'segment')
                        {{-- <div class="row" id="div_{{$array['name']}}" style="text-align: center;">
                            <div class="col-md-8 alert alert-info" role="alert">
                                <p class="fw-bolder">{{$array['label']}}</p>
                            </div>
                        </div> --}}

                        <?php
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
                        </div>

                    @elseif($array['type'] == 'radio' || $array['type'] == 'checkbox' )
                        {{-- <x-input-radio-field name="{{$array['name']}}" value="" :required="$array['required']"
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
                        </x-input-radio-field> --}}

                        <x-input-radio-field name="{{$array['name']}}" value="" :required="$array['required']" label="{{$array['label']}}" placeholder="{{$array['placeholder']}}">
                            <div class="col-md-12 mb-1">
                                <div class="demo-inline-spacing">
                                    @foreach($array['slot'] as $option)
                                        <div class="form-check form-check-inline">
                                            <input type="hidden" label="{{$array['label']}}" class="form-check-input" checktype="{{$array['type']}}" name="{{$array['name']}}" value="{{json_encode($array['slot'])}}" id="{{$array['name']}}">
                                            <label class="form-check-label">{{$option}}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </x-input-radio-field>
                    @endif
                @else

                <div class="row">
                    <form id="borang_jawab_instrumen">
                        @csrf()
                        <div class="col-md-12 mb-1">
                            <label class="fw-bolder">Nama Instrumen</label>
                            <input class="form-control" type="text" name="form_name" id="form_name" value="{{ $form_name }}" readonly>
                        </div>
                        <div class="col-md-12 mb-1">
                            <label class="fw-bolder">Kategori Instrumen</label>
                            <input class="form-control" type="text" name="category_name" id="category_name" value="{{ $category }}" readonly>
                        </div>
                        <hr>

                        <?php
                            $i = 0;
                        ?>

                        <ul class="nav nav-pills nav-justified" role="tablist">
                            @foreach($arrays as $key => $array)
                                @if($array['type'] == 'segment')
                                    <li class="nav-item" role="presentation">
                                        <a class="text-uppercase nav-link fw-bolder {{ $key == 0 ? 'active' : '' }}" id="{{ $key++ }}-tab" data-bs-toggle="tab" href="#{{ $key++ }}" aria-controls="{{ $key++ }}" role="tab" aria-selected="true">
                                            {{ $array['label'] }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>

                        <div class="tab-content">
                            @foreach($arrays as $array)
                                @if($array['type'] == 'segment')
                                    <div class="tab-pane fade {{ $key == 0 ? 'show active' : '' }}" id="{{ $key++ }}" role="tabpanel" aria-labelledby="{{ $key++ }}-tab">
                                        <div class="row">
                                            {{ empty($array['options']) ? '' : $array['options'] }}
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        @foreach($arrays as $array)
                            @if( in_array($array['type'], ['text', 'number', 'date','time','email']))
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
                            {{-- @elseif($array['type'] == 'segment')
                                <div class="row" role="alert">
                                    <div class="col-xl-8 col-md-8 alert alert-info">
                                        <p class="fw-bolder">{{$array['label']}}</p>
                                    <span>{{ empty($array['options']) ? '' : $array['options'] }}</span>
                                    </div>
                                </div> --}}
                            @elseif($array['type'] == 'radio' || $array['type'] == 'checkbox' )
                                {{-- <x-input-radio-field name="{{$array['name']}}" value="" :required="$array['required']" label="{{$array['label']}}">
                                <?php
                                    $options = json_decode($array['options'], true);
                                    $name = $array['name'].'[]';
                                ?>
                                @foreach($options as $option)
                                <label class="form-check-label">
                                    <input type="{{$array['type']}}" class="form-check-input"  name="{{$name}}" value="{{$option}}">
                                    {{$option}}
                                </label>
                                @endforeach
                            </x-input-radio-field> --}}

                                <x-input-radio-field name="{{$array['name']}}" value="" :required="$array['required']" label="{{$array['label']}}">
                                    <?php
                                        $options = json_decode($array['options'], true);
                                        $values = $data[$array['name']];
                                    ?>
                                    <div class="col-md-12 mb-1">
                                        <div class="demo-inline-spacing">
                                            @foreach($options as $option)
                                            <div class="form-check form-check-inline">
                                                <input type="{{$array['type']}}" class="form-check-input"  name="{{$name}}" value="{{$option}}">
                                                <label class="form-check-label">{{$option}}</label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </x-input-radio-field>
                            @endif
                        @endforeach

                        <div class="d-flex justify-content-end align-items-center my-1">
                            <button type="submit" class="btn btn-primary float-right">Hantar</button>
                        </div>
                    </form>
                </div>
                @endif

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
</div>

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
