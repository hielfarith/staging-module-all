<div class="row match-height">
    <div class="col-md-6 col-lg-6 col-xl-6 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Change Password</h4>
            </div>
            <hr>
        
            <div class="card-body">
                <p class="text-danger text-center">
                    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                    Minimum 8 characters long, mixed with uppercase, lowercase, symbol and number.
                </p>

                <table class="table" width="100%">
                    <tr>
                        <td>
                            <label class="form-label fw-bolder">New Password:</label>
                            <div class="input-group">
                                <input type="password" class="form-control" placeholder="New Password">
                            </div>
                        </td>
                    </tr>
        
                    <tr>
                        <td>
                            <label class="form-label fw-bolder">Confirm Password:</label>
                            <div class="input-group">
                                <input type="password" class="form-control" placeholder="Confirm Password">
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        
            <div class="card-footer">
                <div class="d-flex justify-content-center">
                    <a href="javascript();" class="btn btn-primary me-1">
                        Update Password
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-6 col-lg-6 col-xl-6 col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">2-Step Verification</h4>
            </div>
            <hr>
        
            <div class="card-body">
                <table class="table" width="100%">
                    <tr>
                        <td>
                            <label class="form-label fw-bolder">Through SMS (Phone Number):</label>
                            <div class="input-group">
                                <input type="text" class="form-control" required/>
                                <button class="btn btn-primary" type="button">
                                    Verify
                                </button>
                            </div>
                        </td>
                    </tr>
        
                    <tr class="text-center fw-bolder">
                        <td>
                            <h4>or</h4>
                        </td>
                    </tr>
        
                    <tr>
                        <td>
                            <label class="form-label fw-bolder">Using Email:</label>
                            <div class="input-group">
                                <input type="text" class="form-control" required/>
                                <button class="btn btn-primary" type="button">
                                    Verify
                                </button>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
