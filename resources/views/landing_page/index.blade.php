@extends('landing_page.layout')
@section('vendor-style')
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/forms/select/select2.min.css')) }}">
@endsection
@section('content')
    {{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">Your Brand</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> --}}

    <div class="jumbotron">
        <div class="container">
            <p>SELAMAT DATANG KE</p>
            <h2>SISTEM PEMERIKSAAN <br> DAN PENILAIAN <br>INSTITUSI PENDIDIKAN</h2>
            <div class="status">
                <label class="text-dark ">Semakan Status Permohonan Pendaftaran</label><br>
                <div class="input-group  w-75 ">
                    <input type="text" class="form-control rounded-pill" placeholder="Masukkan No Pengenalan"
                        aria-label="Example input" aria-describedby="button-addon1" />
                    <button data-mdb-button-init data-mdb-ripple-init class="btn  rounded-pill" type="button"
                        id="button-addon1" data-mdb-ripple-color="dark">
                        Semak
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="card-container bg-black" id="team">
        <div class="container-fluid px-3 py-3">
            <div class="row mx-4 my-4 text-dark justify-content-center text-center">
                <div class="col">
                    <h2>Senarai Modul SPPIP</h2>
                </div>
            </div>
            <div class="row mb-5 text-center">
                <div class="col">
                    <div class="card  overflow-hidden">
                        <div class="card-header">
                            <h5 class="card-title" style="color:#ff6c62;">I-KePS</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Instrumen Kemudahan Prasarana dan Program Sukan Sekolah.</p>
                            <a data-toggle="modal" data-target="#daftar_ikeps" aria-controls="daftar_ikeps"
                                class="btn rounded-pill">Daftar</a>
                        </div>
                        <div class="card-footer text-center"> <!-- New footer for the button -->

                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card  overflow-hidden">
                        <div class="card-header">
                            <h5 class="card-title" style="color:#ff6c62;">SKIPS</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Standard Kualiti Institusi <br> Pendidikan Swasta</p>
                            <a data-toggle="modal" data-target="#daftar_skips" aria-controls="daftar_skips"
                                class="btn rounded-pill">Daftar</a>
                        </div>
                        <div class="card-footer text-center"> <!-- New footer for the button -->

                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card  overflow-hidden">
                        <div class="card-header">
                            <h5 class="card-title" style="color:#ff6c62;">SKPAK</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">Standard Kualiti Pengasuhan & Pendidikan Awal Kanak-Kanak</p>
                            <a data-toggle="modal" data-target="#daftar_skpak" aria-controls="daftar_skpak"
                                class="btn rounded-pill">Daftar</a>
                        </div>
                        <div class="card-footer text-center"> <!-- New footer for the button -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('landing_page.daftar.skips')
    @include('landing_page.daftar.ikeps')
    @include('landing_page.daftar.skpak')



    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
@endsection


@section('script')
    <script>
        fakeSuccess = function(title, text) {
            Swal.fire({
                title: "Adakah anda pasti?",
                text: "Hantar. Teruskan?",
                icon: 'success',
                confirmButtonText: 'OK',
            }).then((result) => {
                if (result.isConfirmed) {
                    $('.modal').modal('hide');
                } else {
                    return false;
                }

            });
        }
    </script>
@endsection
