<form id="formjurulaith" novalidate="novalidate">
    <div class="row">
        <div class="col-md-12">
            <h5 class="mb-2 fw-bold">
                <span class="badge rounded-pill bg-danger">
                    Maklumat Jurulatih
                </span>
            </h5>
            <div class="row">
                <div class="col-md-9 mb-1">
                    <label class="fw-bold form-label">Nama Jurulatih/ Pengguna
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="nama_pengguna">
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">No Kad Pengenalan/ Pasport
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="no_kad">
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Warganegara
                        <span class="text-danger">*</span>
                    </label>
                    <select name="warganegara" id="warganegara" class="form-select select2">
                        <option value="" hidden>Warganergara</option>
                        @foreach ($negaras as $negara)
                            <option value="{{ $negara->name }}">{{ $negara->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Jantina
                        <span class="text-danger">*</span>
                    </label>
                    <select name="jantina" id="jantina" class="form-select select2">
                        <option value="" hidden>Jantina</option>
                        @foreach ($jantinas as $id => $jantina)
                            <option value="{{ $id }}">{{ $jantina }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Kaum
                        <span class="text-danger">*</span>
                    </label>
                    <select name="kaum" id="kaum" class="form-select select2">
                        <option value="" hidden>Kaum</option>
                        @foreach ($kaums as $id => $kaum)
                            <option value="{{ $id }}">{{ $kaum }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Tarikh Lahir
                        <span class="text-danger">*</span>
                    </label>
                    <input type="date" id="tarikh_lahir" name="tarikh_lahir" class="form-control flatpickr-basic"
                        placeholder="YYYY-MM-DD">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Telefon Rumah
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="telefon_rumah" required>
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Telefon Bimbit
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="telefon_bimbit" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="fw-bold form-label">Email
                        <span class="text-danger">*</span>
                    </label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <hr>
                <div class="col-md-12 mb-1 ">
                    <h5 class="mb-2 fw-bold">
                        <span class="badge rounded-pill bg-danger">
                            Maklumat Penempatan/ Lantikan
                        </span>
                    </h5>
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Gred Jawatan
                        <span class="text-danger">*</span>
                    </label> <br>
                    <select class="form-select select2" name="gred_jawatan" id="gred_jawatan" required>
                        <option value="" hidden>Gred</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                    </select>
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Tarikh Lantikan ke Gred Semasa
                        <span class="text-danger">*</span>
                    </label>
                    <input type="date" id="" name="tarikh_lantikan" class="form-control flatpickr-basic"
                        placeholder="YYYY-MM-DD" required>
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Tarikh Mula Bertugas di PLD
                        <span class="text-danger">*</span>
                    </label>
                    <input type="date" id="" name="tarikh_mula" class="form-control flatpickr-basic"
                        placeholder="YYYY-MM-DD" required>
                </div>

                <div class="col-md-12 mb-1">
                    <label class="fw-bold form-label">Majikan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="majikan" required>
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label"> Jarak Rumah ke Pusat Latihan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="jarak_rumah" required>
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label"> Penerima Bayaran Insentif Jurulatih Sukan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="penerima_bayaran" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="fw-bold form-label">Jurulatih Sukan
                        <span class="text-danger">*</span>
                    </label> <br>
                    <select name="jurulaith_sukan" id="" class="form-select select2"
                        style="width: 300px;"multiple required>
                        @foreach ($sukans as $id => $sukan)
                            <option value="{{ $id }}">{{ $sukan }}</option>
                        @endforeach
                    </select>
                </div>

                <hr>
                <div class="col-md-12 mb-1 ">
                    <h5 class="mb-2 fw-bold">
                        <span class="badge rounded-pill bg-danger">
                            Maklumat Alamat
                        </span>
                    </h5>
                </div>

                <div class="col-md-12 mb-1">
                    <label class="fw-bold form-label">Alamat
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="alamat1" placeholder="Alamat 1" required>
                </div>

                <div class="col-md-12 mb-1">
                    {{-- <label class="fw-bold form-label">Alamat 2
                <span class="text-danger">*</span>
            </label> --}}
                    <input type="text" class="form-control" name="alamat2" placeholder="Alamat 2" required>
                </div>

                <div class="col-md-12 mb-1">
                    {{-- <label class="fw-bold form-label">Alamat 3</label> --}}
                    <input type="text" class="form-control" name="alamat3" placeholder="Alamat 3">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Bandar
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="bandar">
                </div>

                <div class="col-md-4 mb-1">
                    <label class="fw-bold form-label">Negeri
                        <span class="text-danger">*</span>
                    </label><br>
                    <select name="negeri" id="" class="form-select select2" style="width: 300px;">
                        <option value="" hidden>Negeri</option>
                        @foreach ($negeris as $negeri)
                            <option value="{{ $negeri->name }}">{{ $negeri->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="fw-bold form-label">Poskod
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="poskod" maxlength="5" required
                        onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                </div>

                <hr>
                <div class="col-md-6 mb-1 ">
                    <h5 class="mb-2 fw-bold">
                        <span class="badge rounded-pill bg-danger">
                            Maklumat Kesihatan
                        </span>
                    </h5>

                    <label class="fw-bold form-label">Maklumat Kesihatan
                        <span class="text-danger">*</span>
                    </label>
                    <textarea class="form-control" name="maklumat_kesihatan" id="" rows="2" required></textarea>
                </div>

                <div class="col-md-6 mb-1 ">
                    <h5 class="mb-2 fw-bold">
                        <span class="badge rounded-pill bg-danger">
                            Maklumat Sekolah
                        </span>
                    </h5>

                    <label class="fw-bold form-label">Maklumat Sekolah
                        <span class="text-danger">*</span>
                    </label>
                    <textarea class="form-control" name="maklumat_sekolah" id="" rows="2" required></textarea>
                </div>

                <hr>
                <div class="col-md-12 mb-1 ">
                    <h5 class="mb-2 fw-bold">
                        <span class="badge rounded-pill bg-danger">
                            Spesifik
                        </span>
                    </h5>
                </div>


                <div class="col-md-5 mb-1">
                    <label class="fw-bold form-label">Persijilan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="persijilan" required>
                </div>

                <div class="col-md-2 mb-1">
                    <label class="fw-bold form-label">Tahap/Gred
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="tahap_gred" required>
                </div>

                <div class="col-md-2 mb-1">
                    <label class="fw-bold form-label">Tarikh Pensijilan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="date" id="" name="tarikh_pensijilan" required
                        class="form-control flatpickr-basic" placeholder="YYYY-MM-DD">
                </div>

                <div class="col-md-3 mb-3">
                    <label class="fw-bold form-label">Muat Naik Sijil
                        <span class="text-danger">*</span>
                    </label>
                    <input type="file" class="form-control" name="sijil_path" required>
                </div>

                <hr>
                <div class="col-md-12 mb-1 ">
                    <h5 class="mb-2 fw-bold">
                        <span class="badge rounded-pill bg-danger">
                            Sains Sukan
                        </span>
                    </h5>
                </div>


                <div class="col-md-5 mb-1">
                    <label class="fw-bold form-label">Persijilan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="sains_sukan_persijilan" required>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Tarikh Pensijilan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="date" id="" name="sains_sukan_tarikh_pensijilan"
                        class="form-control flatpickr-basic" placeholder="YYYY-MM-DD" required>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="fw-bold form-label">Muat Naik Sijil
                        <span class="text-danger">*</span>
                    </label>
                    <input type="file" class="form-control" name="sains_sukan_sijil_path" required>
                </div>

                <hr>

                <div class="col-md-12 mb-1 ">
                    <h5 class="mb-2 fw-bold">
                        <span class="badge rounded-pill bg-danger">
                            Skim Persijilan Kejurulatihan Kebangsaan (SPKK)
                        </span>
                    </h5>
                </div>

                <div class="col-md-5 mb-1">
                    <label class="fw-bold form-label">Persijilan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="spkk_persijilan" required>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Tarikh Pensijilan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="date" id="" name="spkk_tarikh_pensijilan"
                        class="form-control flatpickr-basic" placeholder="YYYY-MM-DD">
                </div>

                <div class="col-md-4 mb-3">
                    <label class="fw-bold form-label">Muat Naik Sijil
                        <span class="text-danger">*</span>
                    </label>
                    <input type="file" class="form-control" name="spkk_sijil_path" required>
                </div>

                <hr>
                <div class="col-md-12 mb-1 ">
                    <h5 class="mb-2 fw-bold">
                        <span class="badge rounded-pill bg-danger">
                            Pencapaian Sebagai Jurulatih
                        </span>
                    </h5>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Sukan/ Permainan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="sukan_permainan" required>
                </div>

                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Kejohanan
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="kejohanan" required>
                </div>
                <div class="col-md-3 mb-1">
                    <label class="fw-bold form-label">Tahun
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="tahun" required>
                </div>

                <div class="col-md-3 mb-3">
                    <label class="fw-bold form-label">Peringkat
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="peringkat" required>
                </div>

                <hr>
                <div class="col-md-12 mb-1 ">
                    <h5 class="mb-2 fw-bold">
                        <span class="badge rounded-pill bg-danger">
                            Anugerah yang Diterima
                        </span>
                    </h5>
                </div>

                <div class="col-md-5 mb-1">
                    <label class="fw-bold form-label">Anugerah
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="anugerah">
                </div>

                <div class="col-md-2 mb-1">
                    <label class="fw-bold form-label">Tahun
                        <span class="text-danger">*</span>
                    </label>
                    <input type="text" class="form-control" name="anugerah_tahun">
                </div>
            </div>
        </div>
    </div>

    <hr>

</form>
