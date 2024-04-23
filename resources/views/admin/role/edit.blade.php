@extends('layouts.app')

@section('header')
{{__('msg.roleedit')}}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('msg.home')}}</a></li>
    <li class="breadcrumb-item"><a href="{{url('/admin/role')}}"> {{__('msg.role')}}</a></li>
    <li class="breadcrumb-item"><a> {{__('msg.roleedit')}} </a></li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">

        <div class="card px-2">
            <div class="card-header">
                <h4 class="card-title">{{__('msg.roleedit')}}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('role.update', $role) }}" method="POST" class="form-horizontal" autocomplete="off">
                    @csrf
                    <input type="hidden" name="_method" value="PUT"/>
                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" value="{{ $role->name }}" class="form-control" id="name" placeholder="Name" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="display_name" class="col-sm-2 col-form-label">Display Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="display_name" value="{{ $role->display_name }}" class="form-control" id="display_name" placeholder="Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputDescription" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <input type="text" name="description" value="{{ $role->description }}" class="form-control" id="inputDescription" placeholder="Description">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="internal" class="col-form-label">
                                <input type="radio" name="internal" class="form-check-input" value="1" @if($role->is_internal) checked @endif> 
                                Internal</label>
                                <label for="inputDescription" class="col-form-label">
                                <input type="radio" name="internal" class="form-check-input" value="0" @if(!$role->is_internal) checked @endif> 
                                External</label></div>
                    </div>
                    {{-- <div class="form-group row">
                        <label for="inputDescription" class="col-sm-2 col-form-label">Permissions</label>
                        <div class="col-sm-10 d-flex flex-row flex-wrap mt-1">
                            @foreach($permissions as $permission)
                            <div class="col-sm-3 mt-1 mb-1">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" name="permissions[]" value="{{ $permission->name }}" type="checkbox" id="permissionCB_{{ $permission->id }}" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }} />
                                    <label for="permissionCB_{{ $permission->id }}" class="custom-control-label"> {{ $permission->name }} </label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div> --}}
                    <div class="form-group row">
                        <label for="modul" class="col-sm-2 col-form-label">Modul</label>
                        <div class="col-sm-10">
                            <select id="modul" class="form-control select2" name="modul" required onchange="getSubModul(this.value)">
                                <option value="" hidden></option>
                                @foreach(config('staticdata.role.modul') as $key => $modul)
                                <option value="{{ $key }}" @if($role->access) @if($key == $role->access->modul) selected @endif @endif>{{ $modul }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <?php
                    if($role->access->modul == 1){
                        $type = 'ikeps';
                    } else if($role->access->modul == 2){
                        $type = 'skips';
                    } else if($role->access->modul == 3){
                        $type = 'skpak';
                    } else {
                        $type = 'spks';
                    }
                    $sub_modul = explode(',', $role->access->sub_modul);
                    ?>
                    <div class="form-group row">
                        <label for="sub_modul" class="col-sm-2 col-form-label">Sub Modul</label>
                        <div class="col-sm-10">
                            <select id="sub_modul" class="form-control select2" name="sub_modul[]" required multiple>
                                <option value="" hidden></option>
                                @foreach(config('staticdata.role.sub_modul.'.$type) as $key => $subModul)
                                <option value="{{ $key }}" @if($role->access) @if(in_array($key, $sub_modul)) selected @endif @endif>{{ $subModul }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <label for="inputDescription" class="col-sm-2 col-form-label">Pilihan Proses</label>
                        <div class="col-sm-10">
                            <select id="proses" class="form-control select2" name="proses" required>
                                <option value="" hidden></option>
                                @foreach(config('staticdata.role.pilihan_proses') as $key => $proses)
                                <option value="{{ $key }}" @if($role->access) @if($key == $role->access->proses) selected @endif @endif>{{ $proses }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputDescription" class="col-sm-2 col-form-label">Had Capaian</label>
                        <div class="col-sm-10">
                            <select id="capaian" class="form-control select2" name="capaian" required>
                                <option value="" hidden></option>
                                @foreach(config('staticdata.role.had_capaian') as $key => $capaian)
                                <option value="{{ $key }}" @if($role->access) @if($key == $role->access->capaian) selected @endif @endif>{{ $capaian }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}
                    <div class="form-group row">
                        <label for="inputDescription" class="col-sm-2 col-form-label">Jenis Peranan</label>
                        <div class="col-sm-10">
                            <select id="jenis" class="form-control select2" name="jenis[]" required>
                                <option value="" hidden></option>
                                @foreach(config('staticdata.role.jenis_peranan.'.$type) as $key => $jenis)
                                <option value="{{ $key }}" @if($role->access) @if($key == $role->access->jenis) selected @endif @endif>{{ $jenis }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('role.index') }}" class="btn btn-light-secondary text-danger me-1">
                                Cancel
                            </a>
                            <button type="submit" class="btn btn-primary float-end hovertext waves-effect waves-float waves-light">Update</button>
                        </div>
                    </div>
                </form>
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
@endsection
