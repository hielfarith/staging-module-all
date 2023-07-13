<form id="configForm" action="{{ route('admin.settings') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6 mb-1">
            <label class="form-label fw-bolder">{{ __('msg.webapp_name') }}</label>
            <input type="text" class="form-control" id="system_name" name="system_name" value="{{ $system_name }}">
        </div>

        <div class="col-md-6 mb-1">
            <label class="form-label fw-bolder">{{ __('msg.copyright') }}</label>
            <input type="text" class="form-control" id="system_name" name="system_name" value="2023 @ {{ $system_name }}">
        </div>

        <div class="col-md-4 mb-1">
            <label class="form-label fw-bolder">{{ __('msg.webapp_logo') }}</label>
            <input id="logo_header" name="logo_header" type="file" class="dropify" data-default-file="{{ url($logo_header) }}" data-height="110" data-allowed-file-extensions="png" />
        </div>

        <div class="col-md-4 mb-1">
            <label class="form-label fw-bolder">{{ __('msg.webapp_favicon') }}</label>
            <input id="favicon" name="favicon" type="file" class="dropify" data-default-file="{{ url($favicon) }}" data-height="110" data-allowed-file-extensions="png"  />
        </div>

        <div class="col-md-4 mb-1">
            <label class="form-label fw-bolder">{{ __('msg.webapp_bg') }}</label>
            <input id="background_login_page" name="background_login_page" type="file" class="dropify" data-default-file="{{ url($background_login_page) }}" data-height="110" data-allowed-file-extensions="png jpeg jpg" />
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-5 float-end" onclick="generalFormSubmit(this)">{{ __('msg.submit') }}</button>
</form>
