@extends('layouts.app')

@section('header')
    {{ __('msg.role') }}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('msg.home') }}</a></li>
    <li class="breadcrumb-item"><a> {{ __('msg.role') }}</a></li>
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
        <div class="col-12">
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div id="userFormDiv">
                        @include('admin.role.roleForm')
                    </div>
                </div>
            </div>
            <!-- Role cards -->
            <div class="row">

                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card">
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="d-flex align-items-end justify-content-center h-100">
                                    <img src="{{ asset('images/illustration/faq-illustrations.svg') }}"
                                        class="img-fluid mt-2" alt="Image" width="75" />
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="card-body text-sm-end text-center ps-sm-0">
                                    <a href="javascript:void(0)" class="stretched-link text-nowrap add-new-role"
                                        onclick="viewRoleForm()">
                                        <span class="btn btn-primary mb-1">Add New Role</span>
                                    </a>
                                    <p class="mb-0">Add role, if it does not exist</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Role cards -->
            <div class="card">
                <!--<div class="card-header">
                                    <h4 class="card-title">ROLE</h4>
                                    @can('admin.role.create')
        {{-- <a href="{{ route('role.create') }}" class="btn btn-primary float-right hovertext waves-effect waves-float waves-light"> CREATE </a> --}}
                                                        <div class="d-flex justify-content-end align-items-center">
                                                            <button type="button" class="btn btn-success btn-sm float-right" onclick="viewRoleForm()">
                                                                <i class="fa-solid fa-add"></i> Add
                                                            </button>
                                                        </div>
    @endcan
                                </div> -->
                <div class="card-body">
                    <div class="legend-container">
                        <div class="legend">
                            <span class="legend-item"><i class="fa fa-eye text-primary" style="font-size: 16px;"></i> :
                                Lihat
                                Pengguna</span>
                            <span class="legend-item"><i class="fa fa-pencil text-warning" style="font-size: 16px;"></i> :
                                Kemaskini
                                Pengguna</span>
                        </div>
                    </div>
                    <table class="table header_uppercase table-bordered table-responsive" id="listRole">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Display As</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{--  @foreach ($roles as $role)
                                <tr>
                                    <th>{{ ($roles->currentPage() - 1) * $roles->perPage() + $loop->iteration }}</th>
                                    <td>{{ $role->name }}</td>
                                    <td>{{ $role->description }}</td>
                                    <td>{{ $role->display_name }}</td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Role Action">
                                            @can('admin.role.show')
                                            <a href="{{ route('role.show', $role) }}"
                                                class="btn btn-outline-dark waves-effect"> <i class="fas fa-eye"></i> </a>
                                            @endcan

                                             @can('admin.role.update')
                                            <a href="{{ route('role.edit', $role) }}"
                                                class="btn btn-outline-dark waves-effect"> <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ route('role.edit', $role->id) }}"
                                                class="btn btn-outline-dark waves-effect"
                                                onclick="viewRoleForm('{{ $role->id }}')"> <i
                                                    class="fas fa-edit"></i> </a>
                                             @endcan

                                             @can('admin.role.delete')
                                            <a href="#" class="btn btn-outline-dark waves-effect"
                                                onclick="event.preventDefault(); document.getElementById('formDestroyRole_{{ $role->id }}').submit();">
                                                <i class="fas fa-trash"></i> </a>
                                            <form id="formDestroyRole_{{ $role->id }}" method="POST"
                                                action="{{ route('role.destroy', $role) }}">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE" />
                                            </form>
                                               @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach --}}
                        </tbody>
                    </table>
                    {{-- <div class="d-flex justify-content-end">
                        {!! $roles->links() !!}
                    </div> --}}

                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $(function() {
                var table = $('#listRole').DataTable({
                    orderCellsTop: true,
                    colReorder: false,
                    pageLength: 10,
                    processing: true,
                    serverSide: false, //enable if data is large (more than 50,000)
                    ajax: {
                        url: "{{ fullUrl() }}",
                        cache: false,
                    },
                    columns: [{
                            data: "id",
                            name: "id",
                            render: function(data, type, row) {
                                return $("<div/>").html(data).text();
                            }
                        },
                        {
                            data: "name",
                            name: "name",
                            render: function(data, type, row) {
                                return $("<div/>").html(data).text();
                            }
                        },
                        {
                            data: "description",
                            name: "description",
                            render: function(data, type, row) {
                                return $("<div/>").html(data).text();
                            }
                        },
                        {
                            data: "display_name",
                            name: "display_name",
                            render: function(data, type, row) {
                                return $("<div/>").html(data).text();
                            }
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: true,
                            searchable: true
                        },

                    ],
                });

            });
            viewRoleForm = function(id = null) {
                var roleFormModal;
                roleFormModal = new bootstrap.Modal(document.getElementById('roleFormModal'), {
                    keyboard: false
                });

                event.preventDefault();
                if (id === null) {
                    $('#roleForm').attr('action', "{{ route('role.store') }}");
                    $('#roleForm input[name="_method"]').attr('value', 'POST');
                    $('#roleForm input[name="role_name"]').val("");
                    $('#roleForm textarea[name="role_description"]').val("");
                    $('#roleForm input[name="role_display"]').val("");
                    $('#roleForm input[name="permissions[]"]').each(function() {
                        $(this).removeAttr('checked')
                    });
                    $('#sub_title').html('Add Role');

                    $('#roleFormModal #btnRoleAdd').html("{{ __('msg.submit') }}");
                    roleFormModal.show();
                } else {
                    url = "{{ route('role.edit', ':replaceThis') }}"
                    url = url.replace(':replaceThis', id);
                    $.ajax({
                        url: url,
                        method: 'GET',
                        async: true,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            id_used = data.detail.id;
                            url2 = "{{ route('role.edit', ':replaceThis') }}"
                            url2 = url2.replace(':replaceThis', id_used);

                            $('#roleForm').attr('action', url2);
                            $('#roleForm input[name="_method"]').attr('value', 'PUT');
                            $('#roleForm input[name="role_name"]').val(data.detail.name);
                            $('#roleForm textarea[name="role_description"]').val(data.detail
                                .description);
                            $('#roleForm input[name="role_display"]').val(data.detail.display_name);
                            $('#roleForm input[name="permissions[]"]').each(function() {
                                if (data.detail.listOfPermission.includes(parseInt(this
                                        .value)))
                                    $(this).attr('checked', 'checked')
                                else
                                    $(this).removeAttr('checked')
                            });
                            $('#sub_title').html('Edit Role');

                            $('#roleFormModal #btnRoleAdd').html("{{ __('msg.update') }}");
                            roleFormModal.show();
                        },
                    });
                }
            };
        });
    </script>
@endsection
