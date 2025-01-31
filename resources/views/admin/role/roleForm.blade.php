@section('vendor-style')
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection

@php
    $read_only = $read_only ?? null;
    $moduleRole = $moduleRole ?? null;
@endphp
<div class="modal fade" id="roleFormModal" tabindex="-1" aria-labelledby="#addNewCardTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light-primary">
                <h4 class="address-title text-center" id="addNewCardTitle">Role Information</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <form id="roleForm" action="{{ route('role.store') }}" method="POST" data-reloadPage="true">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $id ?? null }}">
                    <input type="hidden" name="_method" value="">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label fw-bolder" for="role_name">Role Name <span class="text text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <input type="text" id="role_name" name="role_name" value=""
                                        class="form-control" placeholder="Role Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label fw-bolder" for="role_display">Role Display Name <span
                                        class="text text-danger">*</span> </label>
                                <div class="input-group">
                                    <input type="text" id="role_display" class="form-control"
                                        placeholder="Display Role As" name="role_display" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label class="form-label fw-bolder" for="role_description">Descriptions <span
                                        class="text text-danger">*</span> </label>
                                <div class="input-group">
                                    <textarea class="form-control" rows=2 placeholder="Role Descriptions" name="role_description"></textarea>
                                </div>
                            </div>
                        </div>

                         <div class="form-group row">
                            <div class="col-md-12 col-12">
                                <label for="inputDescription" class="col-form-label">
                                <input type="radio" name="internal" class="form-check-input" value="1"> 
                                Internal</label>
                                <label for="inputDescription" class="col-form-label">
                                <input type="radio" name="internal" class="form-check-input" value="0"> 
                                External</label>
                            </div>
                        </div>
                        {{-- <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label class="form-label fw-bolder" for="role_description">Permissions <span
                                        class="text text-danger">*</span> </label>
                                <div class="input-group">
                                    @foreach ($permissions as $permission)
                                        <div class="col-sm-4 mt-1 mb-1">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" name="permissions[]"
                                                    value="{{ $permission->id }}" type="checkbox"
                                                    id="permissionCB_{{ $permission->id }}" />
                                                <label for="permissionCB_{{ $permission->id }}"
                                                    class="custom-control-label"> {{ $permission->name }} </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div> --}}
                        <hr>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label fw-bolder" for="modul">Modul<span
                                        class="text text-danger">*</span> </label>
                                <select id="modul" class="form-control select2" name="modul" required onchange="getSubModul(this.value)">
                                    <option value="" hidden></option>
                                    @foreach(config('staticdata.role.modul') as $key => $modul)
                                    <option value="{{ $key }}">{{ $modul }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label fw-bolder" for="sub_modul">Sub Modul<span
                                        class="text text-danger">*</span> </label>
                                <select id="sub_modul" class="form-control select2" name="sub_modu[]" required multiple>
                                    <option value="" hidden></option>
                                    {{-- @foreach(config('staticdata.role.sub_modul.spks') as $key => $subModul)
                                    <option value="{{ $key }}">{{ $subModul }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                        </div>
                        {{-- <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label fw-bolder" for="proses">Pilihan Proses<span
                                        class="text text-danger">*</span> </label>
                                <select id="proses" class="form-control select2" name="proses" required>
                                    <option value="" hidden></option>
                                    @foreach(config('staticdata.role.pilihan_proses') as $key => $proses)
                                    <option value="{{ $key }}">{{ $proses }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}
                        {{-- <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label fw-bolder" for="capaian">Had Capaian<span
                                        class="text text-danger">*</span> </label>
                                <select id="capaian" class="form-control select2" name="capaian[]" required multiple>
                                    <option value="" hidden></option>
                                    @foreach(config('staticdata.role.had_capaian') as $key => $capaian)
                                    <option value="{{ $key }}">{{ $capaian }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label fw-bolder" for="jenis">Jenis Peranan<span
                                        class="text text-danger">*</span> </label>
                                <select id="jenis" class="form-control select2" name="jenis[]" required multiple>
                                    <option value="" hidden></option>
                                    {{-- @foreach(config('staticdata.role.jenis_peranan') as $key => $jenis)
                                    <option value="{{ $key }}">{{ $jenis }}</option>
                                    @endforeach --}}
                                </select>
                            </div>
                        </div>
                    </div>
                    <button type="button" id="btnUpdateRoleForm" hidden onclick="generalFormSubmit(this);"></button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
                <button type="button" id="btnRoleAdd" class="btn btn-primary"
                    onclick="$('#btnUpdateRoleForm').trigger('click');">{{ __('msg.submit') }}</button>
            </div>
        </div>
    </div>
</div>

<script>
    function getSubModul($type){
        
        url = "{{ route('role.get-sub-modul', ':replaceThis') }}";
        url = url.replace(':replaceThis', $type);

        $.ajax({
            url: url,
            method: 'GET',
            async: true,
            contentType: false,
            processData: false,
            success: function(data) {
                $('#sub_modul option:not([hidden])').remove();

                // Iterate over the 'detail' object and append options
                $.each(data.detail, function(key, value) {
                    $('#sub_modul').append($('<option>', {
                        value: key,
                        text: value
                    }));
                });
            }
        });

        url2 = "{{ route('role.get-peranan', ':replaceThis') }}";
        url2 = url2.replace(':replaceThis', $type);

        $.ajax({
            url: url2,
            method: 'GET',
            async: true,
            contentType: false,
            processData: false,
            success: function(data) {
                $('#jenis option:not([hidden])').remove();

                // Iterate over the 'detail' object and append options
                $.each(data.detail, function(key, value) {
                    $('#jenis').append($('<option>', {
                        value: key,
                        text: value
                    }));
                });
            }
        });
    }
</script>
@section('vendor-script')
    <!-- vendor files -->
    <script src="{{ asset(mix('vendors/js/forms/select/select2.full.min.js')) }}"></script>
@endsection
@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/forms/form-select2.js')) }}"></script>
@endsection
