@extends('layouts.app')

@section('vendor-style')
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/wizard/bs-stepper.min.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection

@section('page-style')
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
  <link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-wizard.css')) }}">
@endsection

@section('header')
{{ __('msg.system_config') }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#"> {{ __('msg.home') }}</a></li>
    <li class="breadcrumb-item active"> {{ __('msg.system_config') }}</li>
@endsection

@section('content')
    <section class="vertical-wizard">
        <div class="bs-stepper vertical vertical-wizard-example">
            <div class="bs-stepper-header">
                <div class="step" data-target="#system-vertical" role="tab" id="system-vertical-trigger">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-box">1</span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">System Configuration</span>
                        </span>
                    </button>
                </div>
                    <hr>
                <div class="step" data-target="#database-vertical" role="tab" id="database-vertical-trigger">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-box">2</span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Database Configuration</span>
                        </span>
                    </button>
                </div>
                    <hr>
                <div class="step" data-target="#email-vertical" role="tab" id="email-vertical-trigger">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-box">3</span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">Email Configuration</span>
                        </span>
                    </button>
                </div>
                    <hr>
                <div class="step" data-target="#general-vertical" role="tab" id="general-vertical-trigger">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-box">4</span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">General Settings</span>
                        </span>
                    </button>
                </div>
            </div>

            <div class="bs-stepper-content">
                <div id="system-vertical" class="content" role="tabpanel" aria-labelledby="system-vertical-trigger">
                    <div class="content-header">
                        <h5 class="mb-0">System Configuration</h5>
                        <hr>
                    </div>
                    @include('admin.settings.tab1')
                </div>

                <div id="database-vertical" class="content" role="tabpanel"baria-labelledby="database-vertical-trigger">
                    <div class="content-header">
                        <h5 class="mb-0">Database Configuration</h5>
                        <hr>
                    </div>
                    @include('admin.settings.tab2')
                </div>

                <div id="email-vertical" class="content" role="tabpanel" aria-labelledby="email-vertical-trigger">
                    <div class="content-header">
                        <h5 class="mb-0">Email Configuration</h5>
                        <hr>
                    </div>
                    @include('admin.settings.tab3')
                </div>

                <div id="general-vertical" class="content" role="tabpanel" aria-labelledby="general-vertical-trigger">
                    <div class="content-header">
                        <h5 class="mb-0">General Settings</h5>
                        <hr>
                    </div>
                    @include('admin.settings.tab4')
                </div>
            </div>
        </div>
    </section>
@endsection

@section('vendor-script')
  <script src="{{ asset(mix('vendors/js/forms/wizard/bs-stepper.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
  <script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>
@endsection

@section('page-script')
  <script src="{{ asset(mix('js/scripts/forms/form-wizard.js')) }}"></script>
@endsection

@section('developer-script')
<script type="text/javascript">
    $(document).ready(function() {
        $('.dropify').dropify();

        $('#customOptionsCheckableRadiosWithIcon1').on('click', function() {
                Swal.fire({
                    title: 'Confirm to activate maintenance mode',
                    text: 'When maintenance mode is activated, the "System is being maintained" will be displayed to external users.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Confirm',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        alert('dah');
                    }else{
                        Swal.close();
                    }
                });
            });

        $('#configForm').on('submit', function(event) {
            event.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-outline-danger ms-1'
                },
                buttonsStyling: false
            }).then(function(result) {
                if (result.value) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Deleted!',
                        text: 'Your file has been deleted.',
                        customClass: {
                            confirmButton: 'btn btn-success'
                        }
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire({
                        title: 'Cancelled',
                        text: 'Your imaginary file is safe :)',
                        icon: 'error',
                        customClass: {
                            confirmButton: 'btn btn-success'
                        }
                    });
                }
            });
        });

        $('.configForm2').on('submit', function(event) {
            event.preventDefault();

            Swal.fire({
                title: "Berjaya!",
                text: "Data berjaya disimpan!",
                icon: "success",
            }).then((result) => {
                $('.preloader').removeClass('is-loading');
            });
        });

    });
</script>
@endsection
