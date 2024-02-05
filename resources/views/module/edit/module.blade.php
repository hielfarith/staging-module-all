
<div class="card">
            <div class="card-header"><b>Maklumat Flow</b> </div>
            <div class="card-body">
                <form action="{{ route('module.update',0) }}" method="POST" class="form-horizontal" autocomplete="off" data-reloadPage="true">
                    <div class="row">
                        @csrf
                        <input type="hidden" name="module_id" value="{{$module->id ?? null}}" />

                         <div class="col-md-3 col-12">
                            <div class="form-group">
                                <label class="form-label" for="module_type">Type <span class="text text-danger">*</span> </label>
                                <div >
                                    <select id="module_type" name="module_type" class="form-control select2" placeholder="Name of Module" required onchange="typechange(this)">
                                            <option value="">Sila Pilih</option>
                                            <option value="SEDIA" @if($module?->module_type == 'SEDIA') selected @endif>Static</option>
                                            <!-- <option value="SKIPS" @if($module?->module_type == 'SKIPS') selected @endif>SKIPS</option> -->
                                            <option value="NewForm" @if($module?->module_type == 'NewForm') selected @endif>Dynamic</option>
                                        </select>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-12">
                            <div class="form-group">
                                <label class="form-label" for="module_name">Nama Instrumen <span class="text text-danger">*</span> </label>
                                <div class="">
                                    @if(!empty($modules))
                                        <select id="module_name" name="module_name" class="form-control select2" placeholder="Name of Module" required>
                                             
                                        </select>
                                    @else
                                        <?php
                                            if ($module->module_type == 'NewForm') {
                                                $formData = \App\Models\NewForm::where('id', $module->module_name)->first();
                                            }  else {
                                                $formData = \App\Models\InstrumenSkpakSpksIkeps::where('id', $module->module_name)->first();
                                            }
                                        ?>
                                        <input type="hidden" id="module_name" name="module_name" value="{{ $module->module_name ?? null }}" class="form-control" placeholder="Name of Module" required>
                                        @if($module->module_type == 'NewForm') 
                                            <input type="text" id="module_show" name="module_show" value="{{$formData->form_name}}" class="form-control" placeholder="Name of Module" readonly>
                                        @else
                                            <input type="text" id="module_show" name="module_show" value="{{$formData->nama_instrumen}}" class="form-control" placeholder="Name of Module" readonly>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                        

                        <div class="col-md-3 col-12">
                            <div class="form-group">
                                <label class="form-label" for="module_short_name">Nama Instrumen [Pendek] <span class="text text-danger">*</span> </label>
                                <div class="input-group">
                                    <input type="text" id="module_short_name" name="module_short_name" value="{{ $module->module_short_name ?? null }}" class="form-control" placeholder="Short Name of Module" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3 col-12">
                            <div class="form-group">
                                <label class="form-label" for="module_description">Deskripsi Flow </label>
                                <div class="input-group">
                                    <textarea  id="module_description" name="module_description" class="form-control" placeholder="Module Description">{{$module->module_description ?? ""}}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1 col-12">
                            <div class="form-group">
                                <label class="form-check-label mb-50" for="active">Aktif </label>
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
