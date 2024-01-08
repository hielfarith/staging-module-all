<div class="row invoice-add">
    <div class="col-xl-12 col-md-12 col-12">
        <div class="card invoice-preview-card">

             <div>
                <label class="fw-bolder">Nama Pengguna/Penilai:</label>
                <input type="text" class="form-control" name="nama_pengguna">
            </div>

            <div>
                <label class="fw-bolder"> Panggilan:</label>
                  <select class="form-control select2" name="panggilan">
                        <option>select</option>
                        <option value="Dato'">Dato'</option>
                        <option value="Datin">Datin</option>
                        <option value="Prof.">Prof.</option>
                        <option value="Prof Madya">Prof Madya</option>
                        <option value="Dr.">Dr.</option>
                        <option value="Tuan">Tuan</option>
                        <option value="Puan">Puan</option>
                        <option value="Cik">Cik</option>
                </select>
            </div>

            <div>
                <label class="fw-bolder">No Kad Pengenalan:</label>
                <input type="text" class="form-control" name="no_kad">
            </div>

            <div>
                <label class="fw-bolder">
                    <input type="radio" name="jenis" class="form-check-input" value="Kerajan" disabled>Kerajan
                </label>
                <label class="fw-bolder">
                    <input type="radio" name="jenis"class="form-check-input"  value="Swasta" disabled>Swasta
                </label>
            </div>

            <div>
                <label class="fw-bolder">Jawatan:</label>
                <input type="text" name="jawatan" value="" class="form-control">
            </div>

            <div>
                <label class="fw-bolder"> Gred:</label>
                  <select class="form-control select2" name="gred">
                        <option>select</option>
                        <option>1</option>
                        <option>2</option>
                </select>
            </div>

            <div>
                <label class="fw-bolder">
                    <input type="checkbox" name="modul" value="1" class="form-check-input" disabled>Modul
                </label>
            </div>
           
            <div>
                <label class="fw-bolder"> Agensi/ Kementerian:</label>
                  <select class="form-control select2" name="agensi_kementerian[]" multiple>
                        <option>select</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                </select>
            </div>

             <div>
                <label class="fw-bolder"> Alamat 1:</label>
                <input type="text" class="form-control" name="alamat1" readonly>
            </div>

             <div>
                <label class="fw-bolder"> Alamat 2:</label>
                <input type="text" class="form-control" name="alamat2" readonly>
            </div>

             <div>
                <label class="fw-bolder"> Alamat 3:</label>
                <input type="text" class="form-control" name="alamat3" readonly>
            </div>

             <div>
                <label class="fw-bolder"> Poskod:</label>
                <input type="text" class="form-control" maxlength="5" name="poskod" readonly>
            </div>

             <div>
                <label class="fw-bolder"> Daerah:</label>
                  <select class="form-control select2" name="daerah" readonly>
                        <option>select</option>
                        <option>1</option>
                        <option>2</option>
                </select>
            </div>

             <div>
                <label class="fw-bolder"> Negeri:</label>
                  <select class="form-control select2" name="negeri" readonly>
                        <option>select</option>
                        @foreach($states as $state)
                        <option value="{{$state->name}}">{{$state->name}}</option>
                        @endforeach
                </select>
            </div>

            <div>
                <label class="fw-bolder">  Emel Ketua Pengarah/ Pengarah:</label>
                <input type="email" class="form-control" name="email_ketua" readonly>
            </div>
            
            <div>
                <label class="fw-bolder"> No Tel Pejabat:</label>
                <input type="text" class="form-control" name="no_tel_pejabat" readonly>
            </div>

             <div>
                <label class="fw-bolder"> No Tel Peribadi:</label>
                <input type="text" class="form-control" name="no_tel_peribadi" readonly>
            </div>

        </div>
    </div>
</div>