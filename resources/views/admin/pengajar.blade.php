@extends('admin.layout.template')
@section('header-lvl-1')
    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Dashboard</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="index.html">Home</a></li>
                <li><span>{{ $data->keterangan }}</span></li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div class="main-content-inner" ng-app="homeApp" ng-controller="homeController">
        <div class="row">
            <div class="col-12 mt-5" ng-hide="tambah_action">
                <div class="card">
                    <div class="card-body" id="tabel-toko">
                        <div class="row">
                            <div class="col-8">
                                <div class="information-3-colomn">
                                    <p>Tahun Akademik</p>
                                    <p>:</p>
                                    <p>@{{ ket_akademik }}</p>

                                    <p>Status Akademik</p>
                                    <p>:</p>
                                    <p>Aktif</p>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="information-3-colomn">
                                    <p>Semester</p>
                                    <p>:</p>
                                    <p>@{{ status_semester }}</p>

                                    <p>Program Studi</p>
                                    <p>:</p>
                                    <p>Teknik Informatika</p>
                                </div>
                            </div>
                        </div>
                        <div class="data-tab">


                            <div class="row" style="margin-top: 10px;">
                                <div class="col-12">
                                    <table datatable="ng" class="table table-bordered" style="font-size: 12px;">
                                        <thead>
                                            <tr style="text-align: center;">
                                                <th>No</th>
                                                <th>Matakuliah</th>
                                                <th>Dosen</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr style="text-align: center;" ng-repeat="row in datamatkul">
                                                <td>@{{ $index + 1 }}</td>
                                                <td>@{{ row.nama_matkul }}</td>
                                                <td style="font-size: 12px;color:blue;cursor: pointer;"
                                                 data-toggle="modal" data-target="#listPengajar" ng-click="detailPengajar(row.id)">
                                                    @{{ row.pengajar }}</td>
                                                <td>
                                                    <p id="design-btn-2" data-toggle="modal" data-target="#myModal"
                                                        ng-click="openPengajar(row.id)"> <i class="ti-plus"></i> Pengajar
                                                    </p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Pengajar </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <input type="text" class="form-control" placeholder="Masukan Kelas" ng-model="kelas_temp" />
                        <select class="form-control" style="margin-top: 10px;" ng-model="dosen_temp">
                            <option value="">Pilih Dosen</option>
                            <option ng-repeat="row in datadosen" value="@{{ row.id }}">@{{ row.nama_lengkap }}
                            </option>
                        </select>
                        <p id="design-btn-2" style="margin-top: 10px;" ng-click="insertPengajar()">Simpan data</p>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">

                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade" id="listPengajar">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Data Pengajar </h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama Dosen</th>
                                    <th>Kelas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-center">
                                    <td colspan="4" ng-if="len_pengajar==0">Tidak ada data</td>
                                </tr>
                                <tr class="text-center" ng-repeat="row in datapengajar">
                                    <td>@{{$index+1}}</td>
                                    <td>@{{row.nama_lengkap}}</td>
                                    <td>@{{row.kelas}}</td>
                                    <td>
                                        <p id="design-btn-2"
                                        style="background-color: #E81224;width: 50%;margin: auto;font-size: 10px;" ng-click="deletePengajar(row)"><i class="ti-close"></i></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">

                    </div>

                </div>
            </div>
        </div>
    </div>


    <div id="cover-spin">
        <div class="modal-message">
            <h2 class="animate">Loading</h2>
        </div>
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('assets/angularjs/angular.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular-route.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/angular-datatables.min.js') }}"></script>
    <script src="{{ asset('assets/angularjs/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/js/admin/pengajar/app.js') }}"></script>
    <script src="{{ asset('assets/js/admin/pengajar/service.js') }}"></script>
@endsection
