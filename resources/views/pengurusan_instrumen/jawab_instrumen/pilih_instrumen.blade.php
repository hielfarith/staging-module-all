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
<div class="row">
    <div class="col-md-4">
        <div class="card card-search-custom" style="background-image: url('{{asset('images/banner/banner.png')}}')">
            <div class="card-body text-center">
                <h2 class="text-primary fw-bolder">Carian Instrumen</h2>
                <p class="card-text mb-2">Pilih Instrumen yang Hendak Diisi</p>

                <div class="search-input-custom">
                    <select class="form-control select2" name="choose_form" id="choose_form" onchange="handleFormName()">
                        <option value="" hidden>Pilih Instrumen</option>
                            @foreach($form as $data)
                                <option value="{{ $data['form_name'] }}">{{ $data['form_name'] }} - {{ $data['category'] }}</option>
                            @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-body" id="senarai_atribut_instrumen">
            </div>
        </div>
    </div>
</div>



@endsection

@section('script')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function handleFormName() {
        var form_name = $('#choose_form').val();
        var url = "{{ route('senarai_atribut_instrumen') }}";

         $.ajax({
            url: url, // Route URL
            type: 'POST', // Request type (GET, POST, etc.)
             data: {
                form_name: form_name
             },
            success: function(response) {
                $('.formdiv').attr("style", "display:block");
                $('#senarai_atribut_instrumen').empty();
                $('#senarai_atribut_instrumen').append(response);
            }
        });
    }
</script>
@endsection
