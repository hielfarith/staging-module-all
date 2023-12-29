<div class="row invoice-add">
        <div class="col-xl-9 col-md-8 col-12">
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
                            <h4 class="fw-bolder mb-25">{{$input['form_name']}}</h4>

                            {{-- Kategori Instrumen --}}
                            <h6 class="fw-bolder mb-25">{{$input['category_name']}}</h6>

                            {{-- Deskripsi Instrumen --}}
                            <p class="mb-25">{{$input['description']}}</p>
                        </div>
                        <div class="invoice-number-date mt-md-0 mt-2">
                            <div class="d-flex align-items-center justify-content-md-end mb-1">
                                <h4 class="title">ID Instrumen</h4>
                                <div class="input-group input-group-merge invoice-edit-input-group">
                                    <div class="input-group-text">
                                        <i data-feather="hash"></i>
                                    </div>

                                    {{-- ID Instrument --}}
                                    <input type="text" class="form-control invoice-edit-input" value="{{$input['id_instrumen']}}" disabled>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-1">
                                <span class="title">Tarikh Didaftar:</span>

                                {{-- Tarikh Instrumen Didaftarkan --}}
                                <input type="text" class="form-control flatpickr" value="{{$input['tarikh_didaftar']}}" disabled>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="title">Tarikh Tutup Pengisian:</span>

                                {{-- Tarikh Tutup Pengisian Instrumen --}}
                                <input type="text" class="form-control flatpickr" value="{{$input['tarikh_tutup']}}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Header ends -->

                <hr class="invoice-spacing" />

                <!-- Instrument Form starts -->
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
                                            @if( in_array($data['type'], ['text', 'number', 'email']))
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
                                            @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Instrument Form ends -->

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
                <!-- Footer ends -->
            </div>
        </div>

        <!-- Tindakan Borang Instrumen starts -->
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
                    <a href="{{ route('instrumen_baru') }}" class="btn btn-primary w-100 mb-75">Kemaskini Borang</a>
                    <button type="button" class="btn btn-success w-100">Simpan</button>
                </div>
            </div>
        </div>
        <!-- Tindakan Borang Instrumen ends -->
    </div>