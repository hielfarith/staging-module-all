<div class="row invoice-add">
    <div class="col-xl-12 col-md-12 col-12">
        <div class="card invoice-preview-card">

             <div>
                <label class="fw-bolder">Nama Pengguna/ Ketua TASKA:</label>
                <input type="text" class="form-control" name="nama_pengguna" value="{{$pengguna->nama_pengguna}}" readonly>
            </div>

            <div>
                <label class="fw-bolder">No Kad Pengenalan atau passport:</label>
                <input type="text" class="form-control" name="no_kad" value="{{$pengguna->no_kad}}" readonly>
            </div>

            <div>
                <label class="fw-bolder"> Emel Peribadi:</label>
                <input type="email" class="form-control" name="email_peribadi" value="{{$pengguna->email_peribadi}}" readonly>
            </div>

            <div>
                <label class="fw-bolder"> Emel TASKA:</label>
                <input type="email" class="form-control" name="email_taska" value="{{$pengguna->email_taska}}" readonly >
            </div>

            <div>
                <label class="fw-bolder"> Emel Ibu Pejabat (Negeri)/ Penyelia:</label>
                <input type="email" class="form-control" name="email_pejabat_penyelia" value="{{$pengguna->email_pejabat_penyelia}}" readonly>
            </div>

            <div>
                <label class="fw-bolder"> Agensi/ Kementerian:</label>
                <input type="text" class="form-control" name="agensi_kementerian" value="{{$pengguna->agensi_kementerian}}" readonly>
            </div>

             <div>
                <label class="fw-bolder"> Jenis :<span style="color: red;">*</span></label>
                <select class="form-control select2" name="jenis" readonly>
                        <option value="{{$pengguna->jenis}}">{{$pengguna->jenis}}</option>
                </select> 
            </div>

            <div>
                <label class="fw-bolder"> Jawatan:</label>
                <select class="form-control select2" name="jawatan" readonly>
                        <option value="{{$pengguna->jawatan}}" selected>{{$pengguna->jawatan}}</option>
                </select>
            </div>

            <div>
                <label class="fw-bolder"> Gred:</label>
                  <select class="form-control select2" name="gred" readonly>
                        <option value="{{$pengguna->gred}}" selected>{{$pengguna->gred}}</option>
                </select>
            </div>

             <div>
                <label class="fw-bolder"> Alamat 1:</label>
                <input type="text" class="form-control" name="alamat1" required value="{{$pengguna->alamat1}}" readonly>
            </div>

             <div>
                <label class="fw-bolder"> Alamat 2:</label>
                <input type="text" class="form-control" name="alamat2" value="{{$pengguna->alamat2}}" readonly>
            </div>

             <div>
                <label class="fw-bolder"> Alamat 3:</label>
                <input type="text" class="form-control" name="agensi_kementerian" value="{{$pengguna->alamat3}}" readonly>
            </div>

             <div>
                <label class="fw-bolder"> Poskod:</label>
                <input type="text" class="form-control" maxlength="5" name="agensi_kementerian" value="{{$pengguna->poskod}}" readonly>
            </div>

             <div>
                <label class="fw-bolder"> Daerah:</label>
                  <select class="form-control select2" name="daerah" readonly>
                        <option value="{{$pengguna->daerah}}" selected>{{$pengguna->daerah}}</option>                </select>
            </div>

             <div>
                <label class="fw-bolder"> Negeri:</label>
                  <select class="form-control select2" name="negeri" readonly>
                         <option value="{{$pengguna->negeri}}" selected>{{$pengguna->negeri}}</option>
                </select>
            </div>

             <div>
                <label class="fw-bolder"> Tarikh Penubuhan:</label>
                <input type="text" class="form-control flatpickr" name="tarikh_penubuhan" value="{{$pengguna->tarikh_penubuhan}}" readonly>
            </div>

            <div>
                <label class="fw-bolder"> Jenis Taska:</label>
                  <select class="form-control select2" name="jenis_taska" readonly>
                        <option>select</option>
                        <option value="swasta">swasta</option>
                        <option value="kerajan">kerajan</option>
                </select>
            </div>

             <div>
                <label class="fw-bolder"> Jumla Pendidik:</label>
                <input type="text" class="form-control" name="jumla_pendidik" value="{{$pengguna->jumla_pendidik}}" readonly>
            </div> 

             <div>
                <label class="fw-bolder"> Jumlah Kank-Kanak:</label>
                <input type="text" class="form-control" name="jumlah_kanak" value="{{$pengguna->jumlah_kanak}}" readonly>
            </div>


             <div>
                <label class="fw-bolder"> Jumla Staf Sokogan:</label>
                <input type="text" class="form-control" name="jumla_staf_sokogan" value="{{$pengguna->jumla_staf_sokogan}}" readonly>
            </div>

            <div>
                <label class="fw-bolder"> Jenis Banugunan:</label>
                  <select class="form-control select2" name="jenisbanugunan" readonly>
                        <option>select</option>
                        <option value="tempat kerja">tempat kerja</option>
                        <option value="rumah kedai">rumah kedai</option>
                        <option value="bangunan">bangunan</option>
                        <option value="teres">teres</option>
                        <option value="banglo">banglo</option>
                </select>
            </div>
         

             <div>
                <label class="fw-bolder"> No Tel Pejabat:</label>
                <input type="text" class="form-control" name="no_tel_pejabat" value="{{$pengguna->no_tel_pejabat}}" readonly>
            </div>


             <div>
                <label class="fw-bolder"> No Tel Peribadi:</label>
                <input type="text" class="form-control" name="no_tel_peribadi" value="{{$pengguna->no_tel_peribadi}}" readonly>
            </div>

        </div>
    </div>
</div>