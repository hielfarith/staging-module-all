<div class="row invoice-add">
        <div class="col-xl-9 col-md-8 col-12">
            <div class="card invoice-preview-card">
                <div class="card-body invoice-padding pb-0">
                    <div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
                        <div class="me-1" style="width: 70%;">
                            <div class="logo-wrapper">
                                <img src="{{ asset('images/logo/jata_negara.png') }}" height="24">
                                <h3 class="text-primary invoice-logo">Kementerian Pendidikan Malaysia (KPM)</h3>
                            </div>

                            <h4 class="fw-bolder mb-25">{{$input['form_name']}}</h4>
                            <h6 class="fw-bolder mb-25">{{$input['category_name']}}</h6>
                            <p class="mb-25">{{$input['description']}}</p>
                        </div>
                        <div class="invoice-number-date mt-md-0 mt-2">
                            <div class="d-flex align-items-center justify-content-md-end mb-1">
                                <h4 class="title">ID Instrumen</h4>
                                <div class="input-group input-group-merge invoice-edit-input-group">
                                    <div class="input-group-text">
                                        <i data-feather="hash"></i>
                                    </div>

                                    <input type="text" class="form-control invoice-edit-input" value="{{$input['instrumen_id']}}" disabled>
                                </div>
                            </div>

                            <div class="mb-1">
                                <label class="fw-bolder"> Tarikh Didaftar</label>
                                <input type="text" class="form-control flatpickr" value="{{$input['tarikh_didaftar']}}" disabled>
                            </div>

                            <div class="mb-1">
                                <label class="fw-bolder"> Tarikh Tutup Pengisian</label>
                                <input type="text" class="form-control flatpickr" value="{{$input['tarikh_tutup']}}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="invoice-spacing" />

                <div class="col-md-6 mb-1">
                    <label class="fw-bold form-label">Nama Aspek
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="nama_aspek" id="nama_aspek" required onkeypress="return ((event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 32) || event.charCode == 8" value="{{$input['nama_aspek']}}">
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Status Aspek:
                        <span class="text-danger">*</span>
                    </label>
                    <select class="form-control select2" name="status_aspek" id="status_aspek" required>
                        <option value="" hidden>Sila Pilih</option>
                        <option value="Belum Set" @if($input["status_aspek"] == 'Belum Set') selected @endif>Belum Set</option>
                        <option value="Telah Set" @if($input["status_aspek"] == 'Telah Set') selected @endif>Telah Set</option>
                    </select>
                </div>
                <hr class="invoice-spacing" />

                <div class="card-body invoice-padding invoice-product-details">
                    <div class="row">
                        <div class="col-12 d-flex product-details-border position-relative pe-0">
                            <div class="row w-100 pe-1 py-2">
                                <div class="col-lg-12 col-12 mb-lg-0 mb-2 mt-lg-0 mt-2">
                                    <div class="row">
                                        <?php
                                            $decodedData = json_decode($input['form_data'], true);
                                        ?>
                                        @foreach($decodedData as $data)
                                            <div class="col-md-12 mb-1">
                                                @if( in_array($data['type'], ['text', 'number', 'email','date','time']))
                                                    <label class="form-label fw-bolder">{{$data['label']}}
                                                        @if(isset($data['required']))<span style="color: red;">*</span>  @endif
                                                    </label>
                                                    <input type="{{$data['type']}}" class="form-control" name="{{$data['name']}}" id="" placeholder="{{$data['placeholder']}}">

                                                    @elseif($data['type'] == 'select')
                                                        <label class="form-label fw-bolder">{{$data['label']}}
                                                            @if(isset($data['required']))<span style="color: red;">*</span>  @endif
                                                        </label>
                                                        <select name="{{$data['name']}}" class="form-control" placeholder="{{$data['placeholder']}}">
                                                            @foreach($data['options'] as $option)
                                                                <option value="{{$option}}">{{$option}}</option>
                                                            @endforeach
                                                        </select>

                                                    @elseif($data['type'] == 'file')
                                                        <label class="form-label fw-bolder">{{$data['label']}}
                                                            @if(isset($data['required']))<span style="color: red;">*</span>  @endif
                                                        </label>
                                                        <input type="file" name="{{$data['name']}}" class="form-control" accept=".pdf,.doc,.docx" placeholder="{{$data['placeholder']}}">

                                                    @elseif($data['type'] == 'segment')
                                                        <div class="row alert alert-info" role="alert">
                                                            <p class="fw-bolder">{{$data['label']}}</p>
                                                            <span>
                                                                {{$data['options']}}
                                                            </span>
                                                        </div>

                                                    @elseif($data['type'] == 'radio' || $data['type'] == 'checkbox')
                                                        <div>
                                                            <label class="form-label fw-bolder">{{$data['label']}}
                                                                @if(isset($data['required']))<span style="color: red;">*</span>  @endif
                                                            </label>
                                                        </div>
                                                        <label>
                                                            <?php
                                                                $options = json_decode($data['options'], true);
                                                            ?>
                                                            @foreach($options as $option)
                                                            <label>
                                                                <input type="{{$data['type']}}" name="{{$data['name']}}" class="form-check-input" $data['required']>{{$option}}
                                                            </label>
                                                            @endforeach
                                                        </label>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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

        <div class="col-xl-3 col-md-4 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="fw-bolder">Status Instrumen: </h4>
                    <h4>
                        <span class="badge rounded-pill badge-light-primary me-1">
                            Draf
                        </span>
                    </h4>
                </div>
                <hr>
                <div class="card-body">
                    <a class="btn btn-primary w-100 mb-75" data-bs-dismiss="modal" aria-label="Close">Kemaskini Borang</a>
                    <button type="button" class="btn btn-success w-100" onclick="submitDynamicForm()">Simpan</button>
                </div>
            </div>
        </div>
    </div>
