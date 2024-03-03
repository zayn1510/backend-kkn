@extends('admin.layout.template')
@section('header-lvl-1')
    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Dashboard</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="index.html">Home</a></li>
                <li><span>Dashboard</span></li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div class="main-content-inner" ng-app="homeApp" ng-controller="homeController">

        <div class="row">
            <div class="col-md-12">
                <div class="welcome-dashboard">
                  <p class="poppins">Selamat Datang Di Periode KKN Tahun {{$data->periode->tahun_akademik}} Angkatan {{$data->periode->angkatan}}</p>
                </div>
            </div>
        </div>
        <!-- sales report area start -->
        <div class="sales-report-area mt-5 mb-5">
            <div class="row">
                <div class="col-12">
                    <div class="row" style="margin-bottom: 10px;">
                        <div class="col-md-4" style="cursor: pointer"
                            onclick="window.location.href='{{ url('admin/page/ruangan') }}'">
                            <div class="single-report">
                                <div class="s-report-inner pr--10 pt--30 mb-3">
                                    <div class="icon"><i class="ti-user"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Calon Peserta KKN</h4>

                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2>{{$data->calonkkn[0]->jumlah}}</h2>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4" style="cursor: pointer"
                            onclick="window.location.href='{{ url('admin/page/mapel') }}'">
                            <div class="single-report">
                                <div class="s-report-inner pr--10 pt--30 mb-3">
                                    <div class="icon"><i class="ti-user"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Dosen Pembimbing Lapangan</h4>

                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2>{{$data->dpl[0]->jumlah}}</h2>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4" style="cursor: pointer"
                            onclick="window.location.href='{{ url('admin/page/orangtua') }}'">
                            <div class="single-report">
                                <div class="s-report-inner pr--10 pt--30 mb-3">
                                    <div class="icon"><i class="ti-location-pin"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Desa KKN</h4>

                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h2>{{$data->desa[0]->jumlah}}</h2>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="table-dashboard poppins">
                        <div class="row">
                            <div class="col-md-12">
                                <h4>Dosen Pembimbing Lapangan</h4>
                                <hr>
                                <table class="table table-hover">
                                    <thead>
                                        <tr class="text-center">
                                            <th>No</th>
                                            <th>Dosen</th>
                                            <th>Desa</th>
                                            <th>Posko</th>
                                            <th>Mahasiswa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $counter = 1; // Initialize the counter
                                        @endphp

                                        @foreach ($data->grup as $row)
                                            <tr class="text-center">
                                                <td>{{ $counter }}</td>
                                                <td>{{ $row->gelar_depan }} {{ $row->nama_dosen }} {{ $row->gelar_belakang }}</td>
                                                <td>{{ $row->desa }}</td>
                                                <td>{{ $row->desa }}</td>
                                                <td>{{ $row->jumlah }} Peserta</td>
                                            </tr>
                                            @php
                                                $counter++; // Increment the counter
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    </div>
    </div>
    <!-- sales report area end -->
    <!-- overview area start -->
    <!-- row area start-->
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('grafik/chart.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular-route.min.js') }}"></script>
    <script src="{{ asset('assets/js/admin/dashboard/app.js') }}"></script>
    <script src="{{ asset('assets/js/admin/dashboard/service.js') }}"></script>
@endsection

