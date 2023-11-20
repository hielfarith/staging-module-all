<div class="card">
    <div class="card-header">
        <h4 class="card-title">Tukar Kata Laluan</h4>
    </div>
    <hr>
    <form id="kemaskini_katalaluan" method="POST" action="{{ route('update_password') }}" refreshFunctionDivId="divChangePassword">
        @csrf

        <div class="card-body">
            <div class="alert alert-warning mb-2" role="alert">
                <h6 class="alert-heading">
                    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                    Pastikan keperluan ini dipenuhi:
                </h6>
                <div class="alert-body fw-normal">
                    Minimum panjang kata laluan adalah 12 huruf, kombinasi antara huruf besar dan kecil, karakter & nombor.
                </div>
            </div>

            <div class="divChangePassword">
                <table class="table" width="100%">
                    <tr>
                        <td class="fw-bolder">Kata Laluan Semasa: </td>
                        <td>
                            <div class="input-group input-group-merge form-password-toggle">
                                <input type="password" class="form-control" name="reset_password_old" id="reset_password_old" placeholder="············">
                                <span class="input-group-text cursor-pointer">
                                    <i data-feather="eye"></i>
                                </span>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="fw-bolder">Kata Laluan Baru: </td>
                        <td>
                            <div class="input-group input-group-merge form-password-toggle">
                                <input type="password" class="form-control" name="reset_password_new" id="reset_password_new" placeholder="············">
                                <span class="input-group-text cursor-pointer">
                                    <i data-feather="eye"></i>
                                </span>
                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td class="fw-bolder">Sahkan Kata Laluan: </td>
                        <td>
                            <div class="input-group input-group-merge form-password-toggle">
                                <input type="password" class="form-control" name="reset_password_confirm" id="reset_password_confirm" placeholder="············">
                                <span class="input-group-text cursor-pointer">
                                    <i data-feather="eye"></i>
                                </span>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <button type="button" class="btn btn-success" onclick="generalFormSubmit(this);" id="change_password_button" hidden></button>
        </div>

        <div class="card-footer">
            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-primary" onclick="$('#change_password_button').trigger('click');">
                    <span class="align-middle d-sm-inline-block d-none">
                        Kemaskini Kata Laluan
                    </span>
                </button>
            </div>
        </div>
    </form>
</div>

@section('script')
<script>
</script>
@endsection
