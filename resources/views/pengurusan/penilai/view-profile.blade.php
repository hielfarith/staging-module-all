<div class="row invoice-add">
    <div class="col-xl-12 col-md-12 col-12">
        <div class="card invoice-preview-card">

             <div>
                <label class="fw-bolder">Nama Pengguna/Penilai:</label>
                <input type="text" class="form-control" name="nama_pengguna" value="{{$penilai->nama_pengguna}}" readonly>
            </div>

            <div>
                <label class="fw-bolder">No Kad Pengenalan:</label>
                <input type="text" class="form-control" name="no_kad" value="{{$penilai->no_kad}}" readonly>
            </div>

            <div>
                <label class="fw-bolder"> Emel Peribadi:</label>
                <input type="email" class="form-control" name="email_peribadi" value="{{$penilai->email_peribadi}}" readonly>
            </div>

            <div>
                <label class="fw-bolder"> Emel Ketua Jabatan:</label>
                <input type="email" class="form-control" name="email_ketua_jabatan" value="{{$penilai->email_ketua_jabatan}}" readonly>
            </div>

            <div>
                <label class="fw-bolder"> Emel Penyelia:</label>
                <input type="email" class="form-control" name="email_penyelia" value="{{$penilai->email_penyelia}}" readonly>
            </div>

            <div>
                <label class="fw-bolder"> Agensi/ Kementerian:</label>
                <input type="text" class="form-control" name="agensi_kementerian" value="{{$penilai->agensi_kementerian}}" readonly>
            </div>

            <div>
                <label class="fw-bolder"> No Tel Pejabat:</label>
                <input type="text" class="form-control" name="no_tel_pejabat" value="{{$penilai->no_tel_pejabat}}" readonly>
            </div>

             <div>
                <label class="fw-bolder"> No Tel Peribadi:</label>
                <input type="text" class="form-control" name="no_tel_peribadi" value="{{$penilai->no_tel_peribadi}}" readonly>
            </div>
            
             <div>
                <label class="fw-bolder"> Alamat 1:</label>
                <input type="text" class="form-control" name="alamat1" value="{{$penilai->alamat1}}" readonly>
            </div>

             <div>
                <label class="fw-bolder"> Alamat 2:</label>
                <input type="text" class="form-control" name="alamat2" value="{{$penilai->alamat2}}" readonly>
            </div>

             <div>
                <label class="fw-bolder"> Alamat 3:</label>
                <input type="text" class="form-control" name="alamat3" value="{{$penilai->alamat3}}" readonly>
            </div>

             <div>
                <label class="fw-bolder"> Poskod:</label>
                <input type="text" class="form-control" maxlength="6" name="poskod" value="{{$penilai->poskod}}" readonly>
            </div>

             <div>
                <label class="fw-bolder"> Daerah:</label>
                  <select class="form-control select2" name="daerah" required>
                        <option>select</option>
                        <option>1</option>
                        <option>2</option>
                </select>
            </div>

             <div>
                <label class="fw-bolder"> Negeri:</label>
                  <select class="form-control select2" name="negeri" required>
                        <option>select</option>
                        @foreach($states as $state)
                        <option value="{{$state->name}}" @if($state->name == $penilai->negeri) selected @endif>{{$state->name}}</option>
                        @endforeach
                </select>
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
                <label class="fw-bolder"> 3 negeri pilihan bagi menjalankan penilaian SKPAK:</label>
                  <select class="form-control select2" name="negeri_skpak[]" multiple>
                        <option>select</option>
                        @foreach($states as $state)
                            <option value="{{$state->name}}">{{$state->name}}</option>
                        @endforeach
                </select>
            </div>

        </div>
    </div>
</div>