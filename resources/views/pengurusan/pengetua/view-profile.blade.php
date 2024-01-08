<div class="row invoice-add">
    <div class="col-xl-12 col-md-12 col-12">
        <div class="card invoice-preview-card">

            <div>
                <label class="fw-bolder">Nama:</label>
                <input type="text" class="form-control" name="nama" readonly value="{{$pengetua->nama}}">
            </div>

            <div>
                <label class="fw-bolder">No Kad Pengenalan:</label>
                <input type="text" class="form-control" name="no_kp" readonly value="{{$pengetua->no_kp}}">
            </div>
            
            <div>
                <label class="fw-bolder"> No Tel:</label>
                <input type="text" class="form-control" name="no_tel" readonly value="{{$pengetua->no_tel}}">
            </div>

             <div>
                <label class="fw-bolder"> Email:</label>
                <input type="text" class="form-control" name="email" readonly value="{{$pengetua->email}}">
            </div>
 
             <div>
                <label class="fw-bolder"> Jawatan:</label>
                  <select class="form-control select2" name="jawatan" readonly>
                        <option value="{{$pengetua->jawatan}}" selected>{{$pengetua->jawatan}}</option>
                </select>
            </div>

            <div>
                <label class="fw-bolder"> Negeri:</label>
                  <select class="form-control select2" name="negeri" readonly>
                        <option value="{{$pengetua->negeri}}" selected>{{$pengetua->negeri}}</option>

                </select>
            </div>

            <div>
                <label class="fw-bolder"> Institusi:</label>
                  <select class="form-control select2" name="institusi" readonly>
                        <option value="{{$pengetua->institusi}}" selected>{{$pengetua->institusi}}</option>

                </select>
            </div>

             <div>
                <label class="fw-bolder"> Sebab Pertukaran:</label>
                  <select class="form-control select2" name="sebab_pertukaran" required onchange="checksebab(this)">
                        <option value="{{$pengetua->sebab_pertukaran}}" selected>{{$pengetua->sebab_pertukaran}}</option>
                </select>
                <br> 
            </div>

        </div>
    </div>
</div>