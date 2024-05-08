@extends('layouts.app')

@section('header')
    I-KePS
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('msg.home') }}</a></li>
    <li class="breadcrumb-item"><a href="#"> Instumen/ Modul </a></li>
    <li class="breadcrumb-item"><a href="#"> Pemantauan Pengisian I-KePS </a></li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title fw-bolder">Pemantauan Pengisian I-KePS</h4>

            <div class="d-flex justify-content-start align-items-center mt-2">
                <div class="btn-group mb-1" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="pilihan_carian" id="radio_option1" autocomplete="off"
                        checked />
                    <label class="btn btn-outline-primary" for="radio_option1">Maklumat Negeri Sahaja</label>

                    <input type="radio" class="btn-check" name="pilihan_carian" id="radio_option2" autocomplete="off" />
                    <label class="btn btn-outline-primary" for="radio_option2">Maklumat PPD Sahaja</label>

                    <input type="radio" class="btn-check" name="pilihan_carian" id="radio_option3" autocomplete="off" />
                    <label class="btn btn-outline-primary" for="radio_option3">Maklumat Sekolah Sahaja</label>
                </div>
            </div>
        </div>
        <hr>

        <div class="card-body">



            <div class="row">
                <div class="col-md-6 mb-1">
                    <label class="form-label fw-bold"> Negeri</label>
                    <select name="negeri" id="negeri" class="form-control select2" multiple>
                        <option value="" hidden>Negeri</option>
                        <option value="1">Selangor</option>
                        <option value="3">Sabah</option>
                        <option value="4">Sarawak</option>
                    </select>
                </div>

                <div class="col-md-6 mb-1">
                    <label class="form-label fw-bold"> PPD</label>
                    <select name="ppd" id="ppd" class="form-control select2" multiple>
                        <option value="" hidden>PPD</option>
                        <option value="1">Meru</option>
                        <option value="2">Cyberjaya</option>
                        <option value="3">Selayang</option>
                    </select>
                </div>

                <div class="col-md-8 mb-1">
                    <label class="form-label fw-bold"> Sekolah </label>
                    <select name="sekolah" id="sekolah" class="form-control select2" multiple>
                        <option value="" hidden>Sekolah</option>
                        <option value="1">Semua Sekolah</option>
                        <option value="2">Sekolah Rendah Sahaja</option>
                        <option value="3">Sekolah Menengah Sahaja</option>
                        <option value="4">SMK Meru</option>
                        <option value="5">SMK Cyberjaya</option>
                        <option value="6">SMK Selayang</option>
                    </select>
                </div>
                <div class="col-md-4 mb-1">
                    <label class="form-label fw-bold">Tahun Kutipan</label>
                    <select name="" id="" class="form-select select2" multiple>
                        @for ($year = date('Y') - 5; $year <= date('Y'); $year++)
                            <option value="{{ $year }}">{{ $year }}
                            </option>
                        @endfor
                    </select>
                </div>
            </div>

            <div class="d-flex justify-content-end align-items-center mt-1">
                <a class="me-3 text-danger" type="button" id="reset" href="#">
                    Setkan Semula
                </a>
                <button type="button" onclick="search()" class="btn btn-success float-right">
                    <i class="fa fa-search me-1"></i> Cari
                </button>
            </div>

            <hr>

            <div class="d-flex justify-content-end align-items-center mb-2">
                <div class="btn-group" role="group" aria-label="Role Action">
                    <a href="#" class="btn btn-outline-success waves-effect">
                        <i class="fa fa-file-excel text-success"></i> Muat Turun Excel
                    </a>
                    <a href="#" class="btn btn-outline-info waves-effect">
                        <i class="fa fa-print text-info"></i> Cetak
                    </a>
                </div>
            </div>

            <style>
                #ringkasan_prasarana_sekolah thead th {
                    vertical-align: middle;
                    text-align: center;
                }

                #ringkasan_prasarana_sekolah tbody {
                    vertical-align: middle;
                }
            </style>

            <div class="table-responsive ">
                <table class=" table table-bordered table-hovered" id="ringkasan_prasarana_sekolah" style="width:100%;">
                    <thead style="color: white; background-color: #d8bfb0;">
                        <tr>
                            <th rowspan="2">No.</th>
                            <th rowspan="2">Negeri</th>
                            <th rowspan="2">Jumlah Sekolah</th>
                            <th colspan="5">Pengisian</th>
                            <th rowspan="2">Pengesahan PGB</th>
                        </tr>
                        <tr>
                            <th>Prasarana <br> Sekolah</th>
                            <th>Kemudahan <br> Sukan</th>
                            <th>Perancangan <br> Sukan</th>
                            <th>Penyertaan <br> Sukan</th>
                            <th>Progrm <br> Sukan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><a>JOHOR</a></td>
                            <td>1,193</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>

                        </tr>
                        <tr>
                            <td>2</td>
                            <td><a>KEDAH</a></td>
                            <td>752</td>
                            <td>99.73%</td>
                            <td>99.73%</td>
                            <td>99.73%</td>
                            <td>99.73%</td>
                            <td>99.73%</td>
                            <td>99.73%</td>

                        </tr>
                        <tr>
                            <td>3</td>
                            <td><a>KELANTAN</a></td>
                            <td>595</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>

                        </tr>
                        <tr>
                            <td>4</td>
                            <td><a>MELAKA</a></td>
                            <td>317</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>

                        </tr>
                        <tr>
                            <td>5</td>
                            <td><a>NEGERI SEMBILAN</a></td>
                            <td>479</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>

                        </tr>
                        <tr>
                            <td>6</td>
                            <td><a>PAHANG</a>
                            </td>
                            <td>739</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>

                        </tr>
                        <tr>
                            <td>7</td>
                            <td><a>PULAU PINANG</a></td>
                            <td>396</td>
                            <td>99.75%</td>
                            <td>99.75%</td>
                            <td>99.75%</td>
                            <td>99.75%</td>
                            <td>99.75%</td>
                            <td>97.22%</td>

                        </tr>
                        <tr>
                            <td>8</td>
                            <td><a>PERAK</a></td>
                            <td>1,104</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>99.91%</td>

                        </tr>
                        <tr>
                            <td>9</td>
                            <td><a>PERLIS</a></td>
                            <td>104</td>
                            <td>98.08%</td>
                            <td>97.12%</td>
                            <td>97.12%</td>
                            <td>97.12%</td>
                            <td>97.12%</td>
                            <td>80.77%</td>

                        </tr>
                        <tr>
                            <td>10</td>
                            <td><a>SELANGOR</a></td>
                            <td>940</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>99.89%</td>

                        </tr>
                        <tr>
                            <td>11</td>
                            <td><a>TERENGGANU</a>
                            </td>
                            <td>505</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>

                        </tr>
                        <tr>
                            <td>12</td>
                            <td><a>SABAH</a></td>
                            <td>1,297</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>

                        </tr>
                        <tr>
                            <td>13</td>
                            <td><a>SARAWAK</a></td>
                            <td>1,460</td>
                            <td>99.93%</td>
                            <td>99.93%</td>
                            <td>99.93%</td>
                            <td>99.93%</td>
                            <td>99.93%</td>
                            <td>99.93%</td>

                        </tr>
                        <tr>
                            <td>14</td>
                            <td><a>WP KUALA LUMPUR</a></td>
                            <td>292</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>97.6%</td>

                        </tr>
                        <tr>
                            <td>15</td>
                            <td><a>WP LABUAN</a></td>
                            <td>28</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>

                        </tr>
                        <tr>
                            <td>16</td>
                            <td><a>WP PUTRAJAYA</a></td>
                            <td>27</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>
                            <td>100%</td>

                        </tr>
                    </tbody>
            </div>
        </div>
    @endsection

    @section('script')
        <script></script>
    @endsection
