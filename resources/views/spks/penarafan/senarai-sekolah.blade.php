@extends('layouts.app')

@section('header')
    Laporan Penarafan
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('home') }}">{{ __('msg.home') }}</a>
    </li>

    <li class="breadcrumb-item">
        <a href="#"> Data Penarafan Keselamatan Sekolah </a>
        <a href="#"> Petaling Utama </a>
    </li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4 class="card-title fw-bolder"> Laporan SPKS Peringkat PPD Petaling Utama (Sekolah Rendah)</h4>

            <div class="d-flex justify-content-end align-items-center">
                <a type="button" class="btn btn-primary float-right">
                    <i class="fa-solid fa-print"></i>
                </a>
            </div>
        </div>
        <hr>
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-bordered mb-2">
                    <thead class="table-secondary">
                        <tr class="text-center align-middle">
                            <th rowspan="2">Bil</th>
                            <th rowspan="2">Sekolah</th>
                            <th colspan="6">Pengurusan Murid</th>
                            <th rowspan="2">Infrastruktur</th>
                            <th rowspan="2">Sosial</th>
                            <th rowspan="2">Krisis</th>
                            <th rowspan="2">Risiko</th>
                            <th rowspan="2">Pengawal</th>
                            <th rowspan="2">Jumlah Skor</th>
                            <th rowspan="2">Peratus (%)</th>
                            <th rowspan="2">Kategori Sekolah I II III</th>
                            <th rowspan="2">Catatan</th>
                        </tr>

                        <tr class="text-center align-middle">
                            <th>A</th>
                            <th>B</th>
                            <th>C</th>
                            <th>D</th>
                            <th>E</th>
                            <th>Jumlah</th>
                        </tr>

                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td>1</td>
                            <td>Sekolah Jenis Kebangsaan (Cina) Yuk Chai</td>
                            <td>14</td>
                            <td>14</td>
                            <td>10</td>
                            <td>14</td>
                            <td>0</td>
                            <td>52</td>
                            <td>26</td>
                            <td>14</td>
                            <td>12</td>
                            <td>12</td>
                            <td>29</td>
                            <td><b>145</b></td>
                            <td><b>93</b></td>
                            <td><b>I</b></td>
                            <td class="text-danger table-danger">Tiada Catatan</td>
                        </tr>
                        <tr class="text-center">
                            <td>2</td>
                            <td>Sekolah Jenis Kebangsaan (Cina) Sungai Buloh</td>
                            <td>14</td>
                            <td>12</td>
                            <td>10</td>
                            <td>12</td>
                            <td>0</td>
                            <td>48</td>
                            <td>23</td>
                            <td>12</td>
                            <td>11</td>
                            <td>10</td>
                            <td>30</td>
                            <td><b>142</b></td>
                            <td><b>90</b></td>
                            <td><b>I</b></td>
                            <td class="text-danger table-danger">Tiada Catatan</td>
                        </tr>
                        <tr class="text-center">
                            <td>3</td>
                            <td>Sekolah Jenis Kebangsaan (Cina) Damansara</td>
                            <td>16</td>
                            <td>14</td>
                            <td>10</td>
                            <td>14</td>
                            <td>0</td>
                            <td>54</td>
                            <td>28</td>
                            <td>14</td>
                            <td>14</td>
                            <td>14</td>
                            <td>32</td>
                            <td><b>156</b></td>
                            <td><b>100</b></td>
                            <td><b>I</b></td>
                            <td class="text-danger table-danger">Tiada Catatan</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        })
    </script>
@endsection
