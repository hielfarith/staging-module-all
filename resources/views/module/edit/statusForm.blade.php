@php
    $moduleStatus = $moduleStatus ?? null;
@endphp
<div class="modal fade" id="statusFormModal" tabindex="-1" aria-labelledby="statusFormModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header py-0 bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-sm-2 mx-50">
                <h1 class="text-center mb-1" id="addNewCardTitle">Module Status Form</h1>
                <p class="text-center">Add/Edit Status for Module</p>

                <form id="statusForm" class="gy-1 gx-2 mt-3" action="{{route('module.updateStatusForm')}}" method="POST" data-refreshFunctionDivId="moduleStatusTable" data-refreshFunctionURL="{{route('module.refreshModuleStatusTable',$module)}}">
                    @csrf
                    <input type="hidden" name="module_status_id" value="{{$moduleStatus->id ?? null}}">
                    <input type="hidden" name="module_id" value="{{$module->id}}">
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label class="form-label" for="status_index">Status Index <span class="text text-danger">*</span> </label>
                                <div class="input-group">
                                    <input type="text" id="status_index" name="status_index" value="" class="form-control" placeholder="Index Of Status" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-12"></div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="status_name">Status Name <span class="text text-danger">*</span> </label>
                                <div class="input-group">
                                    <input type="text" id="status_name" name="status_name" value="" class="form-control" placeholder="Name of Status" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="status_description">Status Description <span class="text text-danger">*</span> </label>
                                <div class="input-group">
                                    <textarea id="status_description" name="status_description" class="form-control" placeholder="Description of Status" rows="1" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label class="form-label mb-1" for="status_color">Status Color <span class="text text-danger">*</span> </label>
                                <div class="row p-0 m-0">
                                    <div class="col-4 mb-1 form-check form-check-primary">
                                        <input type="radio" class="form-check-input" id="colorCheck1" name="status_color" value="primary"/>
                                        <label class="form-check-label badge rounded-pill badge-light-primary px-1" for="colorCheck1">Primary</label>
                                    </div>
                                    <div class="col-4 mb-1 form-check form-check-secondary">
                                        <input type="radio" class="form-check-input" id="colorCheck2" name="status_color" value="secondary"/>
                                        <label class="form-check-label badge rounded-pill badge-light-secondary px-1" for="colorCheck2">Secondary</label>
                                    </div>
                                    <div class="col-4 mb-1 form-check form-check-success">
                                        <input type="radio" class="form-check-input" id="colorCheck3" name="status_color" value="success"/>
                                        <label class="form-check-label badge rounded-pill badge-light-success px-1" for="colorCheck3">Success</label>
                                    </div>
                                    <div class="col-4 mb-1 form-check form-check-danger">
                                        <input type="radio" class="form-check-input" id="colorCheck5" name="status_color" value="danger"/>
                                        <label class="form-check-label badge rounded-pill badge-light-danger px-1" for="colorCheck5">Danger</label>
                                    </div>
                                    <div class="col-4 mb-1 form-check form-check-warning">
                                        <input type="radio" class="form-check-input" id="colorCheck4" name="status_color" value="warning"/>
                                        <label class="form-check-label badge rounded-pill badge-light-warning px-1" for="colorCheck4">Warning</label>
                                    </div>
                                    <div class="col-4 mb-1 form-check form-check-info">
                                        <input type="radio" class="form-check-input" id="colorCheck6" name="status_color" value="info"/>
                                        <label class="form-check-label badge rounded-pill badge-light-info px-1" for="colorCheck6">Info</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="button" id="btnUpdateStatusForm" hidden onclick="generalFormSubmit(this);"></button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnUpdateStatusFormFake" class="btn btn-success" onclick="$('#btnUpdateStatusForm').trigger('click');">{{$moduleStatus ? __('msg.update') : __('msg.submit')}}</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
