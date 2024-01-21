@extends('layouts.app')

@section('header')
    {{__('msg.customList', ['item' => __('msg.module')])}}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('msg.home')}}</a></li>
    <li class="breadcrumb-item"><a>  {{__('msg.module')}}</a></li>
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">

                </h4>
                {{-- @can('admin.user.create') --}}
                <div class="card-tools">
                    <a type="button" name="create_new" id="create-new" href="{{ route('module.create') }}"
                        class="btn btn-primary btn-md text-uppercase" > {{__('msg.customCreate',['item' => __('msg.module')])}}
                    </a>
                </div>
                {{-- @endcan --}}
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover table-condensed">
                    <thead>
                        <tr class="">
                            <th width="2%">No</th>
                            <th>Module Name</th>
                            <th class="text-center">Status</th>
                            <th width="10%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!count($allModule))
                        <tr class="text-center">
                            <td colspan="4">No data yet</td>
                        </tr>
                        @endif

                        @foreach($allModule as $module)
                        <tr>
                            <th>{{ (($allModule->currentPage() - 1) * $allModule->perPage()) + $loop->iteration }}</th>
                            <?php
                                if ($module->module_type == 'SEDIA') {
                                    $formData = \App\Models\InstrumenSkpakSpksIkeps::where('id', $module->module_name)->first();
                                } else {
                                    $formData = \App\Models\NewForm::where('id', $module->module_name)->first();
                                }
                            ?>
                            @if ($module->module_type == 'NewForm') 
                                <td>{{ $formData->form_name }}</td>
                            @else
                                <td>{{ $formData->nama_instrumen }}</td>
                            @endif
                            <td class="text-center">
                                @if( $module->active)
                                    <span class="badge badge-light-success">ACTIVE</span>
                                @else
                                    <span class="badge badge-light-danger">NOT ACTIVE</span>

                                @endif
                            </td>
                            <td>
                                <div class="btn-group btn-group-sm d-flex justify-content-center" role="group" aria-label="Role Action">
                                    <div class="btn-group" role="group" aria-label="Action">
                                        <a type="button" class="btn btn-outline-dark waves-effect" href="{{route('module.edit',$module)}}">
                                            <i data-feather="edit"></i>
                                        </a>
                                        <a type="button" class="btn btn-outline-dark waves-effect" onclick="$('#deleteBtn_{{$module->id}}').trigger('click');" data-bs-original-title="Delete">
                                            <i data-feather="trash"></i>
                                        </a>
                                    </div>
                                </div>
                                <form action="{{ route('module.destroy',$module) }}" method="POST" data-reloadPage="true">
                                    <div class="row">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE" />
                                        <button type="button" hidden id="deleteBtn_{{$module->id}}" onclick="confirmBeforeSubmit(this);">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end">
                    {!! $allModule->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function(){
        // Swal.fire('Hello');
    });
</script>
@endsection
