<div class="modal fade" id="structure_database" tabindex="-1" aria-labelledby="structure_database" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered modal-xl">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">STRUCTURE</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="row ">
                    <div class="col-md-12 mb-1">
                        <label class="form-label fw-bolder">Table Name</label>
                        <input type="text" class="form-control" placeholder="address" disabled>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-bolder">Field</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-bolder">Type</label>
                        <select class="form-select select2">
                            <option value="" hidden>Type</option>
                            <option value="int">int</option>
                            <option value="varchar">varchar</option>
                            <option value="timestamp">timestamp</option>
                            <option value="time">time</option>
                            <option value="date">date</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label fw-bolder">Key</label>
                        <input type="text" class="form-control">
                    </div>

                    <div class="d-flex justify-content-end align-items-center my-1 ">
                        <a class="me-3" type="button" id="reset" href="#">
                            <span class="text-danger"> Reset </span>
                        </a>
                        <button type="submit" class="btn btn-success float-right">
                            <i class="fa fa-search"></i> Search
                        </button>
                    </div>
                </div>

                <div class="btn-group" role="group" aria-label="Role Action">
                    <a href="#" class="btn btn-outline-success waves-effect">
                        <i class="fa fa-file-excel text-success"></i> Excel
                    </a>
                    <a href="#" class="btn btn-outline-danger waves-effect">
                        <i class="fa fa-file-pdf text-danger"></i> PDF
                    </a>
                </div>

                <hr>

                <div class="table-responsive">
                    <table class="table header_uppercase table-bordered table-hovered">
                        <thead>
                            <tr class="text-center">
                                <th> No </th>
                                <th> Field </th>
                                <th> Type </th>
                                <th> Null </th>
                                <th> Key </th>
                                <th> Default </th>
                                <th> Extra </th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr class="text-center">
                                <td> 1 </td>
                                <td> id </td>
                                <td> int, unsigned </td>
                                <td> no </td>
                                <td> primary_key </td>
                                <td> </td>
                                <td> auto_increment </td>
                            </tr>

                            <tr class="text-center">
                                <td> 2 </td>
                                <td> username </td>
                                <td> varhar </td>
                                <td> no </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>

                            <tr class="text-center">
                                <td> 3 </td>
                                <td> created_at </td>
                                <td> timestamp </td>
                                <td> no </td>
                                <td> </td>
                                <td> </td>
                                <td> timestamp </td>
                            </tr>

                            <tr class="text-center">
                                <td> 4 </td>
                                <td> updated_at </td>
                                <td> timestamp </td>
                                <td> no </td>
                                <td> </td>
                                <td> </td>
                                <td> timestamp </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="modal-footer">
                <div class="d-flex justify-content-center">
                    <a href="javascript();" class="btn btn-sm btn-danger" data-bs-dismiss="modal" aria-label="Close">
                        Close
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
