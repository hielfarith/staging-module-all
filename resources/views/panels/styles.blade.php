@if ($configData['direction'] === 'rtl' && isset($configData['direction']))
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/vendors-rtl.min.css')) }}" />
@else
  <link rel="stylesheet" href="{{ asset(mix('vendors/css/vendors.min.css')) }}" />
@endif

@yield('vendor-style')
    <link rel="stylesheet" href="{{ asset(mix('fonts/font-awesome/css/all.min.css')) }}" >
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/wizard/bs-stepper.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/core.css')) }}" />
    <link rel="stylesheet" href="{{ asset(mix('css/base/themes/dark-layout.css')) }}" />
    <link rel="stylesheet" href="{{ asset(mix('css/base/themes/bordered-layout.css')) }}" />
    <link rel="stylesheet" href="{{ asset(mix('css/base/themes/semi-dark-layout.css')) }}" />
    <link rel="stylesheet" href="{{asset('vendors/css/pickers/flatpickr/flatpickr.min.css')}}">

@php $configData = Helper::applClasses(); @endphp

@if ($configData['mainLayoutType'] === 'horizontal')
  <link rel="stylesheet" href="{{ asset(mix('css/base/core/menu/menu-types/horizontal-menu.css')) }}" />
@else
  <link rel="stylesheet" href="{{ asset(mix('css/base/core/menu/menu-types/vertical-menu.css')) }}" />
@endif

@yield('page-style')
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-validation.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/form-wizard.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/pages/page-faq.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-flat-pickr.css')) }}">
<link rel="stylesheet" href="{{ asset(mix('css/base/plugins/forms/pickers/form-pickadate.css')) }}">
<link rel="stylesheet" href="{{asset('css/base/plugins/forms/pickers/form-flat-pickr.css')}}">
<link rel="stylesheet" href="{{asset('css/base/pages/app-invoice.css')}}">

    <style>
        .table .header_uppercase .table-bordered .table-hovered{
            font-size: 1.1rem;
        }

        .error-message {
            color: red;
            font-size: 12px;
            display: none;
        }

        /*--card border--*/
        .border-dark {
            border: 1px solid #b8c2cc!important;
        }

        /*--paginator--*/
        .pagination{
            margin-top: 1rem!important;
        }

        .page-item .page-link,
        .page-item.active {
        border-radius: 5rem !important;
        }

        /*--Modal Right Side Login Page--*/
        .modal.login.fade:not(.in).right .modal-dialog {
            -webkit-transform: translate3d(110%, 60%, 0);
            transform: translate3d(110%, 60%, 0);
            max-width: 30%;
        }

        /*--Modal Custom Height: 70% of resolution height--*/
        .modal .modal-body.height-70 {
            height: 70vh;
        }

        /*--Modal Custom Height: 40% of resolution height--*/
        .modal .modal-body.height-40{
            height: 40vh;
        }

        /*--Modal Make Scrollable Y Stay--*/
        .modal-body.modal-force-scroll-y{
            overflow-y:scroll !important;
        }

        /*--Modal Make Scrollable X Stay--*/
        .modal-body.modal-force-scroll-x{
            overflow-x:scroll !important;
        }

        /*--Fixed FormLabel sizing from bootstrap--*/
        .form-label {
            /* font-size: var(--bs-body-font-size); */
            font-size: 1.1rem;
        }
        .col-form-label{
            /* font-size: var(--bs-body-font-size); */
            font-size: 1.1rem;
        }

        /*--Fixed Form Group margin too near--*/
        .form-group{
            margin-bottom:1rem;
        }

        /*- Make table able to scroll horizontally --*/
        .tableWrapper {
            display: block;
            overflow-x: scroll;
        }

        /*- Fix Dropify Font Size --*/
        .dropify-wrapper .dropify-message span.file-icon {
        font-size:2rem !important;
        }

        .card-search-custom {
            background-size: cover;
            background-color: rgba(115, 103, 240, 0.12) !important;
            .search-input-custom {
                width: auto;
                margin: 0 auto;
                &:focus-within {
                    box-shadow: none;
                }
            }
        }
    </style>

    <link rel="stylesheet" href="{{ asset(mix('css/overrides.css')) }}" />

@if ($configData['direction'] === 'rtl' && isset($configData['direction']))
  <link rel="stylesheet" href="{{ asset(mix('css-rtl/custom-rtl.css')) }}" />
  <link rel="stylesheet" href="{{ asset(mix('css-rtl/style-rtl.css')) }}" />
@else
  <link rel="stylesheet" href="{{ asset(mix('css/style.css')) }}" />
@endif
