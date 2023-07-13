<form class="configForm2" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group mb-1">
                <label class="form-label fw-bolder">{{__('msg.sys.ipaddress')}}</label>
                <input type="text" class="form-control" id="ip_address" name="ip_address" value="{{ env('DB_HOST') }}">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group mb-1">
                <label class="form-label fw-bolder">{{__('msg.sys.port')}}</label>
                <input type="text" class="form-control" id="port" name="port" value="3306">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group mb-1">
                <label class="form-label fw-bolder">{{__('msg.sys.dbname')}}</label>
                <input type="text" class="form-control" id="database_name" name="database_name" value="{{ env('DB_DATABASE') }}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group mb-1">
                <label class="form-label fw-bolder">{{__('msg.sys.dbusername')}}</label>
                <input type="text" class="form-control" id="dbusername" name="dbusername" value="{{ env('DB_USERNAME') }}">
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group mb-1">
                <label class="form-label fw-bolder">{{__('msg.sys.dbpassword')}}</label>
                <input type="password" class="form-control" id="dbpassword" name="dbpassword" value="{{ env('DB_DATABASE') }}">
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-5 float-end" onclick="generalFormSubmit(this)">{{ __('msg.submit') }}</button>
</form>
