<div class="row invoice-add">
    <div class="col-xl-12 col-md-12 col-12">
        <div class="card invoice-preview-card">

            <div>
                <label class="fw-bolder">Nama Pengguna:</label>
                <input type="text" class="form-control" name="nama_pengguna" readonly value="{{$ahli->nama_pengguna}}" readonly>
            </div>

            <div>
                <label class="fw-bolder"> Panggilan:</label>
                  <select class="form-control select2" name="panggilan" readonly>
                        <option value="{{$ahli->panggilan}}" selected>{{$ahli->panggilan}}</option>
                </select>
            </div>

            <div>
                <label class="fw-bolder">No Kad Pengenalan:</label>
                <input type="text" class="form-control" name="no_kad" readonly value="{{$ahli->no_kad}}">
            </div>
            
            <div>
                <label class="fw-bolder"> Alamat 1:</label>
                <input type="text" class="form-control" name="alamat1" readonly value="{{$ahli->alamat1}}">
            </div>

             <div>
                <label class="fw-bolder"> Alamat 2:</label>
                <input type="text" class="form-control" name="alamat2" readonly value="{{$ahli->alamat2}}">
            </div>

             <div>
                <label class="fw-bolder"> Alamat 3:</label>
                <input type="text" class="form-control" name="alamat3" value="{{$ahli->alamat3}}" readonly>
            </div>

             <div>
                <label class="fw-bolder"> Poskod:</label>
                <input type="text" class="form-control" name="poskod" maxlength="5" readonly value="{{$ahli->poskod}}">
            </div>

             <div>
                <label class="fw-bolder"> Daerah:</label>
                  <select class="form-control select2" name="daerah" readonly >
                        <option value="{{$ahli->daerah}}" selected>{{$ahli->daerah}}</option>
                </select>
            </div>

            <div>
                <label class="fw-bolder"> Negeri:</label>
                  <select class="form-control select2" name="negeri" readonly >
                        <option value="{{$ahli->negeri}}" selected>{{$ahli->negeri}}</option>
                </select>
            </div>

             <div>
                <label class="fw-bolder"> Emel Peribadi::</label>
                <input type="text" class="form-control" name="email_peribadi" readonly value="{{$ahli->email_peribadi}}">
            </div>

             <div>
                <label class="fw-bolder"> Nama Majikan:</label>
                <input type="text" class="form-control" name="nama_majikan" value="{{$ahli->nama_majikan}}" readonly>
            </div>


             <div>
                <label class="fw-bolder"> Emel Majikan:</label>
                <input type="text" class="form-control" name="email_majikan" value="{{$ahli->email_majikan}}" readonly>
            </div>

            <div>
                <label class="fw-bolder"> Agensi/ Kementerian:</label>
                <select class="form-control select2" name="agensi_kementerian" readonly>
                    <option value="{{$ahli->agensi_kementerian}}" selected>{{$ahli->agensi_kementerian}}</option>
                </select> 
            </div>

            <div>
                <label class="fw-bolder"> No Tel Pejabat:</label>
                <input type="text" class="form-control" name="no_tel_pejabat" value="{{$ahli->no_tel_pejabat}}" readonly>
            </div>

             <div>
                <label class="fw-bolder"> No Tel Peribadi:</label>
                <input type="text" class="form-control" name="no_tel_peribadi" maxlength="12" readonly value="{{$ahli->no_tel_peribadi}}" readonly>
            </div>

            <div>
                <label class="fw-bolder"> Jawatan/Gred :</label>
                <select class="form-control select2" name="jawatan" readonly >
                    <option value="{{$ahli->jawatan}}" selected>{{$ahli->jawatan}}</option>
                </select> 
            </div>

            <div>
                <label>Tarikh perlantikan AJK Tinggi Unit Jaminan Kualiti:</label>
                <input type="text" class="form-control" name="tarikh_perlantikan" readonly value="{{$ahli->tarikh_perlantikan}}" readonly>
            </div>

        </div>
    </div>
</div>