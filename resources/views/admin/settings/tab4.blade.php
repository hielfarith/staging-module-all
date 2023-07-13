<form class="configForm2">
    @csrf
    <div class="row">

        <div class="col-md-12 col-sm-12 col-lg-12 mb-2 text-center">
            <label class="custom-option-item text-center p-1">
                <i data-feather="alert-triangle" class="font-large-1 mb-75 text-warning"></i>
                <span class="custom-option-item-title h4 d-block text-danger">
                    When maintenance mode is activated, the "System is being maintained" display will be displayed to external users. Access to the login will also be closed to all users (other than Administrators).
                </span>
            </label>
        </div>
        <hr>

        <div class="row custom-options-checkable g-1">
            <div class="col-md-6 col-sm-6 col-lg-6 mt-2">
                <input class="custom-option-item-check" type="radio" name="customOptionsCheckableRadiosWithIcon" id="customOptionsCheckableRadiosWithIcon1" value=""/>
                <label class="custom-option-item text-center p-1" for="customOptionsCheckableRadiosWithIcon1">
                    <i data-feather="archive" class="font-large-1 mb-75 text-primary"></i>
                    <span class="custom-option-item-title h4 d-block">Activate Maintenance Mode</span>
                </label>
            </div>

            <div class="col-md-6 col-sm-6 col-lg-6 mt-2">
                <input class="custom-option-item-check" type="radio" name="customOptionsCheckableRadiosWithIcon" id="customOptionsCheckableRadiosWithIcon3" value="" />
                <label class="custom-option-item text-center p-1" for="customOptionsCheckableRadiosWithIcon3">
                    <i data-feather="briefcase" class="font-large-1 mb-75 text-primary"></i>
                    <span class="custom-option-item-title h4 d-block">Stop Maintenance Mode</span>
                </label>
            </div>
        </div>
    </div>
</form>
