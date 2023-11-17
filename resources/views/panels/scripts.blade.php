<!-- BEGIN: Vendor JS-->
<script src="{{ asset(mix('vendors/js/vendors.min.js')) }}"></script>
<!-- BEGIN Vendor JS-->
<!-- BEGIN: Page Vendor JS-->
<script src="{{ asset(mix('vendors/js/ui/jquery.sticky.js')) }}"></script>
@yield('vendor-script')

<!-- END: Page Vendor JS-->
<!-- BEGIN: Theme JS-->
<script src="{{ asset(mix('js/core/app-menu.js')) }}"></script>
<script src="{{ asset(mix('js/core/app.js')) }}"></script>

<!-- custome scripts file for user -->
<script src="{{ asset(mix('js/core/scripts.js')) }}"></script>

{{-- Form-Wizard All  --}}
<script src="{{ asset(mix('vendors/js/forms/wizard/bs-stepper.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
<script src="{{ asset(mix('vendors/js/forms/validation/jquery.validate.min.js')) }}"></script>

@if ($configData['blankPage'] === false)
    <script src="{{ asset(mix('js/scripts/customizer.js')) }}"></script>
@endif
<!-- END: Theme JS-->
<!-- BEGIN: Page JS-->
@yield('page-script')
<script src="{{ asset(mix('js/scripts/forms/pickers/form-pickers.js')) }}"></script>

<!-- END: Page JS-->
<!-- BEGIN: Developer Code JS-->
@yield('developer-script')
@yield('script')
@stack('js')

<script>
    // window.userGuiding.identify(userId*, attributes)

    // example with attributes
    // window.userGuiding.identify('1Ax69i57j0j69i60l4', {
    // email: 'user@awesome.com',
    // name: 'Awesome User',
    // created_at: 1644403436643,
    // })

    // or just send userId without attributes
    // window.userGuiding.identify('1Ax69i57j0j69i60l4')


    //Custom Initializer General FlatPickr (Datepicker)
    $(function() {
        $('.flatpickrDeklarasi').flatpickr({
            dateFormat: 'd/m/Y',
            allowInput: true
        });
    })
    //End Custom Initializer General FlatPickr

    //Default: Ajax Request

    // jQuery Validation Global Defaults
    if (typeof jQuery.validator === 'function') {
        jQuery.validator.setDefaults({
            errorElement: 'span',
            errorPlacement: function(error, element) {
                if (
                    element.parent().hasClass('input-group') ||
                    element.hasClass('select2') ||
                    element.attr('type') === 'checkbox'
                ) {
                    error.insertAfter(element.parent());
                } else if (element.hasClass('form-check-input')) {
                    error.insertAfter(element.parent().siblings(':last'));
                } else {
                    error.insertAfter(element);
                }

                if (element.parent().hasClass('input-group')) {
                    element.parent().addClass('is-invalid');
                }
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('error');
                if ($(element).parent().hasClass('input-group')) {
                    $(element).parent().addClass('is-invalid');
                }
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('error');
                if ($(element).parent().hasClass('input-group')) {
                    $(element).parent().removeClass('is-invalid');
                }
            }
        });
    }
    //setup ajax error handling
    $.ajaxSetup({
        error: function(data) {
            var data = data.responseJSON;
            // console.log(data);
            if (data.errors === undefined) {
                Swal.fire(data.title, data.detail, 'error');
            } else {
                $('#bahagianErrorBox').html(""); //clear error message
                $('#bahagianErrorBox').show(); //show
                let errorsHtml = "<ul>";
                $.each(data.errors, function(key, value) {
                    errorsHtml += '<li>' + value + '</li>';
                });
                errorsHtml += '</ul>';
                $('#bahagianErrorBox').html(errorsHtml); //put error message into box
                $('html, body').animate({
                    scrollTop: 0
                }, 'fast'); // scroll to the top
            }
        }
    });
    //End setup ajax error handling
    //Show SweetAlert Confirmation Window
    confirmBeforeSubmit = function(elem) {
        event.preventDefault();
        Swal.fire({
            title: 'Confirm action?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.isConfirmed) {
                generalFormSubmit(elem);
            } else {
                return false;
            }
        });
    }
    //End Show SweetAlert Confirmation Window

    //To use this, please refer Report Example or Module blade page
    generalFormSubmit = function(elem) {
        var form = $(elem).closest('form');
        var refreshFunctionName = form.attr('data-refreshFunctionName');
        var refreshFunctionNameIfSuccess = form.attr('data-refreshFunctionNameIfSuccess');
        var refreshFunctionURL = form.attr('data-refreshFunctionURL');
        var refreshFunctionDivId = form.attr('data-refreshFunctionDivId');
        var reloadPage = form.attr('data-reloadPage');
        var swal = form.attr('data-swal');

        event.preventDefault();
        $.ajax({
            url: $(form).attr('action'),
            method: $(form).attr('method'),
            data: new FormData($(form)[0]),
            async: true,
            contentType: false,
            processData: false,
            success: function(data) {
                event.preventDefault();

                if (swal != null) {
                    if (swal != 'false') {
                        Swal.fire({
                            text: swal,
                            title: '{{ __('msg.information') }}',
                            icon: 'success',
                            showCancelButton: false,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            // showing swal then proceed
                            proceed();
                        })
                    } else {
                        // without showing prompt then proceed
                        proceed();
                    }
                } else {
                    // showing prompt then proceed
                    toastr.success(data.title ?? "Saved");
                    proceed();
                }

                function proceed() {

                    //If data-reloadPage exists, then reload the page
                    if (reloadPage) {
                        if (reloadPage == "true") {
                            location.reload();
                            return false;
                        }
                    }

                    //If redirect page exists, then redirect to the page
                    if (data.redirectRoute ?? false) {
                        window.location.href = data.redirectRoute;
                        return false;
                    }

                    //You either can put your refresh function inside your blade page
                    //or put the div id directly to load with the url
                    if (refreshFunctionDivId) {
                        if (refreshFunctionURL) {
                            $('#' + refreshFunctionDivId).load(refreshFunctionURL, function() {

                                if (refreshFunctionName) {
                                    executeFunctionByName(refreshFunctionName);
                                }
                                if (refreshFunctionNameIfSuccess) {
                                    executeFunctionByName(refreshFunctionNameIfSuccess);
                                }

                            });
                        }
                    } else {

                        if (refreshFunctionName) {
                            executeFunctionByName(refreshFunctionName);
                        }
                        if (refreshFunctionNameIfSuccess) {
                            executeFunctionByName(refreshFunctionNameIfSuccess);
                        }
                    }
                }

                return false;

            },
            error: function(data) {
                var data = data.responseJSON;
                // console.log(data);
                if (data.errors === undefined) {
                    Swal.fire(data.title, data.detail, 'error');
                } else {
                    $('#bahagianErrorBox').html(""); //clear error message
                    $('#bahagianErrorBox').show(); //show
                    let errorsHtml = "<ul>";
                    $.each(data.errors, function(key, value) {
                        errorsHtml += '<li>' + value + '</li>';
                    });
                    errorsHtml += '</ul>';
                    $('#bahagianErrorBox').html(errorsHtml); //put error message into box
                    $('html, body').animate({
                        scrollTop: 0
                    }, 'fast'); // scroll to the top
                }

                //You either can put your refresh function inside your blade page
                //or put the div id directly to load with the url
                if (refreshFunctionDivId) {
                    if (refreshFunctionURL) {
                        $('#' + refreshFunctionDivId).load(refreshFunctionURL, function() {

                            if (refreshFunctionName) {
                                executeFunctionByName(refreshFunctionName);
                            }

                        });
                    }
                } else {

                    if (refreshFunctionName) {
                        executeFunctionByName(refreshFunctionName);
                    }
                }
                return false;
            },
        });
    }

    getModalContent = (elem) => {
        $.get(elem.dataset.action, function(response) {

            $("#modal-div").html(response);
            $("#baseAjaxModalContent").modal("show");
            initializeFlatpickr();
        });
    }
    //End Default: Ajax Request
</script>

<!-- END: Developer Code JS-->
