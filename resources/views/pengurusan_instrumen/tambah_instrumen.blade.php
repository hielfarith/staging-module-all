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
                            <input type="text" class="form-control mb-25" name="form_name" id="form_name" placeholder="Nama Instrumen">

                            {{-- Kategori Instrumen --}}
                            <input type="text" class="form-control mb-25" name="category_name" id="category_name" placeholder="Kategori Instrumen">

                            {{-- Deskripsi Instrumen --}}
                            <textarea type="text" class="form-control mb-25" name="" id="">Deskripsi Instrumen</textarea>
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
                                <input type="text" class="form-control flatpickr" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Header ends -->

                <hr class="invoice-spacing" />

                <!-- Instrument Form starts -->
                <div class="card-body invoice-padding invoice-product-details">
                    <form class="source-item">
                        <div data-repeater-list="group-a">
                            <div class="repeater-wrapper" data-repeater-item>
                                <div class="row">
                                    <div class="col-12 d-flex product-details-border position-relative pe-0">
                                        <div class="row w-100 pe-1 py-2">
                                            <div class="col-lg-12 col-12 mb-lg-0 mb-2 mt-lg-0 mt-2">
                                                <p class="card-text col-title mb-md-50 mb-0">Atribut</p>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        {{-- Jenis Atribut --}}
                                                        <select name="type" id="type" class="form-control">
                                                            <option value="" hidden>Jenis Atribut</option>
                                                            <option value="text">Text</option>
                                                            <option value="number">Nombor</option>
                                                            <option value="file">Muat Naik Fail</option>
                                                            <option value="select">Pilihan</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-8">
                                                        &nbsp;
                                                    </div>

                                                    <div class="col-md-6">
                                                        {{-- Nama Label --}}
                                                        <input type="text" class="form-control mt-1" name="label_name" id="label_name" placeholder="Nama Label">
                                                    </div>

                                                    <div class="col-md-6">
                                                        {{-- Nama Atribut --}}
                                                        <input type="text" class="form-control mt-1" name="name" id="name" placeholder="Nama Atribut">
                                                        <p class="text-danger">Sila gunakan '_' untuk menggantikan ruangan kosong.</p>
                                                    </div>
                                                </div>

                                                {{-- Label Pilihan --}}
                                                <div class="mt-1 divTextareaOptions" style="display: none;">
                                                    <label class="form-label"> Label Pilihan </label>
                                                    <textarea name="options" id="options" class="form-control"></textarea>
                                                    <p class="text-danger">Sila gunakan ',' sebagai pemisah antara pilihan.</p>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- Padam Atribut --}}
                                        <div class="d-flex flex-column align-items-center justify-content-between border-start invoice-product-actions py-50 px-25">
                                            <i class="fa fa-trash cursor-pointer font-medium-3 text-danger" data-repeater-delete></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-1">
                            <div class="col-12 px-0">
                                {{-- Tambah Atribut --}}
                                <button type="button" class="btn btn-primary btn-sm btn-add-new" data-repeater-create>
                                    <i data-feather="plus" class="me-25"></i>
                                    <span class="align-middle">Tambah Atribut</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- Instrument Form ends -->

                <hr class="invoice-spacing mt-0" />

                <!-- Footer starts -->
                <div class="card-body invoice-padding py-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-2">
                                <label for="note" class="form-label fw-bold">Penafian dan Hakmilik:</label>
                                <textarea class="form-control" rows="2" id="note"></textarea>
                            </div>
                        </div>
                    </div>
                    <!-- Footer ends -->
                </div>
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
                    <a href="{{url('app/invoice/preview')}}" class="btn btn-primary w-100 mb-75">Lihat Borang</a>
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
    function handleAttributeSelection() {
        var type = $('#type').val();
        if (type == 'select') {
            $('.divTextareaOptions').show(300);
        } else {
            $('.divTextareaOptions').hide(300);
        }
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

    // Repeater init
    if (sourceItem.length) {
        sourceItem.on('submit', function (e) {
            e.preventDefault();
        });
        sourceItem.repeater({
            show: function () {
                $(this).slideDown();
                handleAttributeSelection();
            },
            hide: function (e) {
                $(this).slideUp();
            }
        });
    }

    // Item details select onchange
    $(document).on('change', '#type', function () {
        var $this = $('#type').val();
        if ($this == 'select') {
            $('.divTextareaOptions').show(300);
        } else {
            $('.divTextareaOptions').hide(300);
        }
    });


    // function handleAttributeSelection() {
    //     var type = $('#type').val();
    //     if (type == 'select') {
    //         $('#divTextareaOptions').show(300);
    //     } else {
    //         $('#divTextareaOptions').hide(300);
    //     }
    // }

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
