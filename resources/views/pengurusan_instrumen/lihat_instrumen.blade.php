@extends('layouts.app')

@section('header')
Pengurusan Instrumen
@endsection

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
</li>

<li class="breadcrumb-item">
    <a href="#"> Pengurusan Instrumen </a>
</li>
@endsection

@section('content')
<section class="invoice-add-wrapper">
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
                            <h4 class="fw-bolder mb-25">Nama Instrumen</h4>

                            {{-- Kategori Instrumen --}}
                            <h6 class="fw-bolder mb-25">Kategori Instrumen</h6>

                            {{-- Deskripsi Instrumen --}}
                            <p class="mb-25">Deskripsi Ringkas Instrumen</p>
                        </div>
                        <div class="invoice-number-date mt-md-0 mt-2">
                            <div class="d-flex align-items-center justify-content-md-end mb-1">
                                <h4 class="title">ID Instrumen</h4>
                                <div class="input-group input-group-merge invoice-edit-input-group">
                                    <div class="input-group-text">
                                        <i data-feather="hash"></i>
                                    </div>

                                    {{-- ID Instrument --}}
                                    <input type="text" class="form-control invoice-edit-input" value="53634" disabled>
                                </div>
                            </div>
                            <div class="d-flex align-items-center mb-1">
                                <span class="title">Tarikh Didaftar:</span>

                                {{-- Tarikh Instrumen Didaftarkan --}}
                                <input type="text" class="form-control flatpickr" value="12/02/2023" disabled>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="title">Tarikh Tutup Pengisian:</span>

                                {{-- Tarikh Tutup Pengisian Instrumen --}}
                                <input type="text" class="form-control flatpickr" value="12/02/2023" disabled>
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
                                        <div class="col-md-12 mb-1">
                                            <label class="form-label fw-bolder">Nama Label 1</label>
                                            <input type="text" class="form-control" name="" id="" placeholder="Nama Label 1">
                                        </div>

                                        <div class="col-md-12 mb-1">
                                            <label class="form-label fw-bolder">Nama Label 2</label>
                                            <input type="text" class="form-control" name="" id="" placeholder="Nama Label 2">
                                        </div>

                                        <div class="col-md-12 mb-1">
                                            <label class="form-label fw-bolder">Nama Label 3</label>
                                            <input type="text" class="form-control" name="" id="" placeholder="Nama Label 3">
                                        </div>
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
</section>
@endsection

@section('script')
<script>
    function sahkan_kategori_borang(type) {
        var form_name = $('#form_name').val();
        var name = $('#category_name').val();
        var url = "{{ route('sahkan_kategori_instrumen') }}";

        $.ajax({
            url: url, // Route URL
            type: 'POST', // Request type (GET, POST, etc.)
            data: {
                form_name: form_name,
                name: name,
                type: type
            },
            success: function(response) {
                if(!response.success) {
                    $('#category-error').text('Kategori Telah Wujud!');
                    $('#category-error').show();
                } else {
                    $('#category-error').hide();
                }
            }
        });
    }

    $(function () {
        var applyChangesBtn = $('.btn-apply-changes'),
            sourceItem = $('.source-item'),
            formName = $('#form_name'),
            categoryName = $('#category_name'),
            type = $('#type'),
            labelName = $('#label_name'),
            name = $('#name'),
            options = $('#options'),
            btnAddNewItem = $('.btn-add-new ');

        if (sourceItem.length) {
            sourceItem.on('submit', function (e) {
                e.preventDefault();
            });
            sourceItem.repeater({
                show: function () {
                    var repeaterRow = $(this);
                    repeaterRow.find('#type').on('change', function () {
                        handleDropdownChange(repeaterRow);
                    });
                    $(this).slideDown();
                    handleDropdownChange(repeaterRow);
                },
                hide: function (e) {
                    $(this).slideUp();
                }
            });
        }

        function handleDropdownChange(row) {
            var typeDropdown = row.find('#type');
            var optionsDiv = row.find('.divTextareaOptions');

            if (typeDropdown.val() === 'select') {
                optionsDiv.show(300);
            } else {
                optionsDiv.hide(300);
            }
        }

        if (btnAddNewItem.length) {
            btnAddNewItem.on('click', function () {
                if (feather) {
                    // featherSVG();
                    feather.replace({ width: 14, height: 14 });
                }
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl);
                });
            });
        }
    });

</script>
@endsection
