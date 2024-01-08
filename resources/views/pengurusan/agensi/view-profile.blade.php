<div class="row invoice-add">
    <div class="col-xl-12 col-md-12 col-12">
        <div class="card invoice-preview-card">

             <div>
                <label class="fw-bolder">Nama Pengguna/Penilai:</label>
                <input type="text" class="form-control" name="nama_pengguna" value="{{$agensi->nama_pengguna}}" readonly>
            </div>

            <div>
                <label class="fw-bolder"> Panggilan:</label>
                  <select class="form-control select2" name="panggilan" readonly>
                        <option value="{{$agensi->panggilan}}" selected>{{$agensi->panggilan}}</option>
                </select>
            </div>

            <div>
                <label class="fw-bolder">No Kad Pengenalan:</label>
                <input type="text" class="form-control" name="no_kad" value="{{$agensi->no_kad}}">
            </div>

            <div>
                <label class="fw-bolder">
                    <input type="radio" name="jenis" class="form-check-input" value="Kerajan" @if($agensi->jenis == 'Kerajan') checked @endif disabled>Kerajan
                </label>
                <label class="fw-bolder">
                    <input type="radio" name="jenis"class="form-check-input"  value="Swasta" @if($agensi->jenis == 'Swasta') checked @endif disabled>Swasta
                </label>
            </div>

            <div>
                <label class="fw-bolder">Jawatan:</label>
                <input type="text" name="jawatan" value="" class="form-control" value="{{$agensi->jawatan}}">
            </div>

            <div>
                <label class="fw-bolder"> Gred:</label>
                  <select class="form-control select2" name="gred" disabled>
                        <option  value="{{$agensi->gred}}" selected>{{$agensi->gred}}</option>
                </select>
            </div>

            <div>
                <label class="fw-bolder">
                    <input type="checkbox" name="modul" value="1" class="form-check-input" @if($agensi->modul) checked @endif disabled>Modul
                </label>
            </div>
           
            <div>
                <label class="fw-bolder"> Agensi/ Kementerian:</label>
                  <select class="form-control select2" name="agensi_kementerian[]" multiple disabled>
                        <option  value="{{$agensi->gred}}" selected>{{$agensi->gred}}</option>
                </select>
            </div>

             <div>
                <label class="fw-bolder"> Alamat 1:</label>
                <input type="text" class="form-control" name="alamat1" value="{{$agensi->alamat1}}" readonly>
            </div>

             <div>
                <label class="fw-bolder"> Alamat 2:</label>
                <input type="text" class="form-control" name="alamat2" value="{{$agensi->alamat2}}" readonly>
            </div>

             <div>
                <label class="fw-bolder"> Alamat 3:</label>
                <input type="text" class="form-control" name="alamat3" value="{{$agensi->alamat3}}" readonly>
            </div>

             <div>
                <label class="fw-bolder"> Poskod:</label>
                <input type="text" class="form-control" maxlength="5" name="poskod" value="{{$agensi->poskod}}" readonly>
            </div>

             <div>
                <label class="fw-bolder"> Daerah:</label>
                  <select class="form-control select2" name="daerah" readonly>
                        <option value="{{$agensi->daerah}}">{{$agensi->daerah}}</option>
                </select>
            </div>

             <div>
                <label class="fw-bolder"> Negeri:</label>
                  <select class="form-control select2" name="negeri" readonly>
                        <option value="{{$agensi->negeri}}">{{$agensi->negeri}}</option>
                </select>
            </div>

            <div>
                <label class="fw-bolder">  Emel Ketua Pengarah/ Pengarah:</label>
                <input type="email" class="form-control" name="email_ketua" value="{{$agensi->email_ketua}}" readonly>
            </div>
            
            <div>
                <label class="fw-bolder"> No Tel Pejabat:</label>
                <input type="text" class="form-control" name="no_tel_pejabat" value="{{$agensi->no_tel_pejabat}}" readonly>
            </div>

             <div>
                <label class="fw-bolder"> No Tel Peribadi:</label>
                <input type="text" class="form-control" name="no_tel_peribadi" value="{{$agensi->no_tel_peribadi}}"  readonly>
            </div>

        </div>
    </div>
</div>