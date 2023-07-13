@extends('layouts.app')

@section('header')
{{__('msg.roleshow')}}
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('home')}}">{{__('msg.home')}}</a></li>
    <li class="breadcrumb-item"><a href="{{url('/admin/role')}}"> {{__('msg.role')}}</a></li>
    <li class="breadcrumb-item"><a> {{__('msg.roleshow')}} </a></li>
@endsection

@section('content')
<div class="row">
    <div class="col-12">

        <div class="card px-2">
            <div class="card-header">
                <h4 class="card-title">{{__('msg.roleshow')}}</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('role.update', $role) }}" method="POST" class="form-horizontal" autocomplete="off">
                    @csrf
                    <input type="hidden" name="_method" value="PUT"/>
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" value="{{ $role->name }}" class="form-control" id="inputName" placeholder="Name" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputDescription" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <input type="text" name="description" value="{{ $role->description }}" class="form-control" id="inputDescription" placeholder="Description" disabled>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputDescription" class="col-sm-2 col-form-label">Permissions</label>
                        <div class="col-sm-10 d-flex flex-row flex-wrap mt-1">
                        @foreach($permissions as $permission)
                        <div class="col-sm-3 mt-1 mb-1">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" name="permissions[]" value="{{ $permission->name }}" type="checkbox" id="permissionCB_{{ $permission->id }}" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }} disabled />
                                <label for="permissionCB_{{ $permission->id }}" class="custom-control-label"> {{ $permission->name }} </label>
                            </div>
                        </div>
                        @endforeach
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                            {{-- <button type="submit" class="btn btn-success">Submit</button> --}}
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('role.edit', $role) }}" class="btn btn-light-secondary text-danger me-1">
                                Edit
                            </a>
                            <a href="{{ route('role.index') }}" class="btn btn-primary">
                                Back
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
