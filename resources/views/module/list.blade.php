@extends('layouts.app')

@section('header')
    {{ __('msg.customList', ['item' => __('msg.module')]) }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('msg.home') }}</a></li>
    <li class="breadcrumb-item"><a> {{ __('msg.module') }}</a></li>
@endsection

@section('content')
    <style>
        .legend-container {
            text-align: right;
            /* Align legend to the right */
            margin-bottom: 10px;
            /* Optional: Add some bottom margin */
        }

        .legend {
            display: inline-block;
            /* background-color: #f0f0f0; */
            padding: 5px 10px;
            /* border: 1px solid #ccc; */
            border-radius: 5px;
        }

        .legend-item {
            margin-right: 10px;
        }
    </style>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">

                    </h4>
                    {{-- @can('admin.user.create') --}}
                    <div class="card-tools">
                        <a type="button" name="create_new" id="create-new" href="{{ route('module.create') }}"
                            class="btn btn-primary btn-md text-uppercase">
                            {{ __('msg.customCreate', ['item' => __('msg.module')]) }}
                        </a>
                    </div>
                    {{-- @endcan --}}
                </div>
                <div class="card-body">
                    <div class="legend-container">
                        <div class="legend">
                            <span class="legend-item"><i class="fa fa-pencil text-warning" style="font-size: 16px;"></i> :
                                Kemaskini Modul </span>
                            <span class="legend-item"><i class="fa fa-trash text-danger" style="font-size: 16px;"></i> :
                                Hapus Modul</span>
                        </div>
                    </div>
                    <table class="table table-bordered table-hover table-condensed">
                        <thead style="color:white; background-color:#8cb2e8;">
                            <tr class="">
                                <th width="2%">No</th>
                                <th>Module Name</th>
                                <th class="text-center">Status</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!count($allModule))
                                <tr class="text-center">
                                    <td colspan="4">No data yet</td>
                                </tr>
                            @endif

                            @foreach ($allModule as $module)
                                <tr>
                                    <th>{{ ($allModule->currentPage() - 1) * $allModule->perPage() + $loop->iteration }}
                                    </th>
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
                                        @if ($module->active)
                                            <span class="badge badge-light-success">ACTIVE</span>
                                        @else
                                            <span class="badge badge-light-danger">NOT ACTIVE</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-sm d-flex justify-content-center" role="group"
                                            aria-label="Role Action">
                                            <div class="btn-group" role="group" aria-label="Action">
                                                <a type="button" class="btn " href="{{ route('module.edit', $module) }}">
                                                    <i class="fas fa-pencil text-warning"></i>
                                                </a>
                                                <a type="button" class="btn "
                                                    onclick="$('#deleteBtn_{{ $module->id }}').trigger('click');"
                                                    data-bs-original-title="Delete">
                                                    <i class="fas fa-trash text-danger"></i> </a>
                                            </div>
                                        </div>
                                        <form action="{{ route('module.destroy', $module) }}" method="POST"
                                            data-reloadPage="true">
                                            <div class="row">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE" />
                                                <button type="button" hidden id="deleteBtn_{{ $module->id }}"
                                                    onclick="confirmBeforeSubmit(this);">
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
        $(document).ready(function() {
            // Swal.fire('Hello');
        });
    </script>
@endsection
