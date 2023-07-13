@extends('layouts.app')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('msg.home')}}</a></li>
    <li class="breadcrumb-item"><a href="#"> URS Templates </a></li>
@endsection

@section('header')
    <h2 class="customTitle1"> URS Templates </span></h2>
@endsection

@section('content')

<div class="row pt-1">

    <div class="col-md-6">
        <div class="card">
            <div class="card-header"> Add Template </div>
            <form method="POST" action="{{ route('urs-template.add') }}" enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
                <div class="card-body">

                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="templateFile"> templateFile <span class="text text-danger">*</span></label>
                            <input type="file" name="templateFile" id="templateFile" accept=".docx,.doc" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="template_remark"> template_remark <span class="text text-danger">*</span></label>
                            <input type="text" name="template_remark" id="template_remark" class="form-control" placeholder="template_remark" required>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <input type="submit" name="submit" class="btn btn-cobaltblue float-right" />
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header"> Default Template </div>
            <div class="card-body">

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <a href="{{ url('/urs/templates/TEMPLATE_URS_DEFAULT.docx') }}" class="btn btn-sm btn-info" target="_blank"> Download Default Template </a>
                    </div>
                </div>

            </div>
            <div class="card-footer">
                {{-- <input type="submit" name="submit" class="btn btn-cobaltblue float-right" /> --}}
            </div>
        </div>
    </div>

    <div class="col-md-12 table-scroll">
        <table class="table table-striped" width="100%">
            <thead>
                <tr>
                    <th width="5%"> No. </th>
                    <th> template_ori_name </th>
                    <th> template_remark </th>
                    <th> is_active </th>
                    <th> created_at </th>
                    <th width="10%"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($ursTemplates as $ursTemplate)
                <tr class="{{ $ursTemplate->is_active ? 'table-success' : '' }}">
                    <td> {{ $loop->iteration }} </td>
                    <td> <span class="{{ $ursTemplate->templateExist() ? 'text-success' : 'text-danger' }}"> {{ $ursTemplate->template_ori_name }} </span> </td>
                    <td> {{ $ursTemplate->template_remark }} </td>
                    <td> {{ $ursTemplate->is_active }} </td>
                    <td> {{ $ursTemplate->created_at ? $ursTemplate->created_at->format('d/m/Y h:ia') : '' }} </td>
                    <td>
                        <div class="btn-group btn-group-sm d-flex justify-content-center dropleft" role="group" aria-label="Action">
                            @if($ursTemplate->templateExist())
                                <a href="{{ route('urs-template.setActive', $ursTemplate) }}" class="btn btn-xs btn-default" data-toggle="tooltip" data-placement="top" title="Set active"> <i class="fas fa-check text-success"></i> </a>
                                <a href="{{ route('urs-template.download', $ursTemplate) }}" class="btn btn-xs btn-default" data-toggle="tooltip" data-placement="top" title="Download"> <i class="fas fa-download text-success"></i> </a>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
</div>
@endsection
