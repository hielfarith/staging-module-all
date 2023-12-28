
<div class="card">
            <div class="card-header"><b>MODULE INFORMATION</b> </div>
            <div class="card-body">
                <form action="{{ route('module.update',0) }}" method="POST" class="form-horizontal" autocomplete="off" data-reloadPage="true">
                    <div class="row">
                        @csrf
                        <input type="hidden" name="module_id" value="{{$module->id ?? null}}" />
                        <div class="col-md-3 col-12">
                            <div class="form-group">
                                <label class="form-label" for="module_name">Module Name <span class="text text-danger">*</span> </label>
                                <div class="input-group">
                                    @if(!empty($modules))
                                        <select id="module_name" name="module_name" class="form-control" placeholder="Name of Module" required>
                                            @foreach($modules as $form)
                                            <option value="{{$form->id}}">{{$form->form_name}}-{{$form->category}}</option>
                                            @endforeach
                                        </select>
                                    @else
                                        <?php
                                            $formData = \App\Models\NewForm::where('id', $module->module_name)->first();
                                        ?>
                                        <input type="hidden" id="module_name" name="module_name" value="{{ $module->module_name ?? null }}" class="form-control" placeholder="Name of Module" required>
                                        <input type="text" id="module_show" name="module_show" value="{{$formData->form_name}}-{{$formData->category}}" class="form-control" placeholder="Name of Module" readonly>

                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-12">
                            <div class="form-group">
                                <label class="form-label" for="module_short_name">Module Short Name <span class="text text-danger">*</span> </label>
                                <div class="input-group">
                                    <input type="text" id="module_short_name" name="module_short_name" value="{{ $module->module_short_name ?? null }}" class="form-control" placeholder="Short Name of Module" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-12">
                            <div class="form-group">
                                <label class="form-label" for="module_description">Module Description </label>
                                <div class="input-group">
                                    <textarea  id="module_description" name="module_description" class="form-control" placeholder="Module Description">{{$module->module_description ?? ""}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 col-12">
                            <div class="form-group">
                                <label class="form-check-label mb-50" for="active">Active </label>
                                <div class="form-check form-check-success form-switch">
                                    <input type="checkbox" class="form-check-input" id="active" name="active" {{$module?->active ? "checked" : ""}}>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end align-items-center">
                            <button type="submit" class="btn btn-primary float-right">
                                <i class="fa-solid fa-file-print"></i> {{$module ? __('msg.update') : __('msg.submit')}}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
