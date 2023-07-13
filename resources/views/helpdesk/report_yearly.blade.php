@extends('layouts.app')

@section('header')
Yearly Report
@endsection

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('msg.home') }}</a></li>
<li class="breadcrumb-item"><a href="#"> Helpdesk</a></li>
<li class="breadcrumb-item"><a href="#">Yearly Report</a></li>
@endsection

@section('content')
<div class="row">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title fw-bolder">Yearly Report : Helpdesk</h4>

            <div class="btn-group" role="group" aria-label="Role Action">
                <a href="#" class="btn btn-outline-primary waves-effect">
                    2021
                </a>
                <a href="#" class="btn btn-outline-primary waves-effect">
                    2022
                </a>
                <a href="#" class="btn btn-outline-primary waves-effect">
                    2023
                </a>
            </div>

        </div>
        <div class="card-body">
            @include('helpdesk.senarai_yearlyReport')
        </div>
    </div>
</div>
@endsection

@section('script')
<script></script>
@endsection