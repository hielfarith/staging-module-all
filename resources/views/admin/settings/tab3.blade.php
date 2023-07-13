<form class="configForm2" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-1">
                <label class="form-label fw-bolder">{{__('msg.sys.emeltype')}}</label>
                <input type="text" class="form-control" id="emeltype" name="emeltype" placeholder="" value="SMTP">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group mb-1">
                <label class="form-label fw-bolder">{{__('msg.sys.encryption')}}</label>
                <select name="encryption" id="encryption" class="form-select select2">
                    <option value="" hidden>System Encryption</option>
                    <option value="ssl">SSL</option>
                    <option value="tsl">TSL</option>
                    <option value="none">None</option>
                </select>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group mb-1">
                <label class="form-label fw-bolder">{{__('msg.sys.ipaddress')}}</label>
                <input type="text" class="form-control" id="ip_address2" name="ip_address" value="smtp.gmail.com">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group mb-1">
                <label class="form-label fw-bolder">{{__('msg.sys.port')}}</label>
                <input type="text" class="form-control" id="port2" name="port" value="587">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group mb-1">
                <label class="form-label fw-bolder">{{__('msg.sys.dbname')}}</label>
                <input type="text" class="form-control" id="database_name2" name="database_name" value="{{ env('DB_DATABASE') }}">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group mb-1">
                <label class="form-label fw-bolder">{{__('msg.sys.sendername')}}</label>
                <input type="text" class="form-control" id="sendername" name="sendername" value="">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group mb-1">
                <label class="form-label fw-bolder">{{__('msg.sys.senderemel')}}</label>
                <input type="text" class="form-control" id="senderemel" name="senderemel" value="">
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-5 float-end" onclick="generalFormSubmit(this)">{{ __('msg.submit') }}</button>
</form>
