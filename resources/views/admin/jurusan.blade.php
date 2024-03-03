@extends('admin.layout.template')
@section('header-lvl-1')
    <div class="col-sm-6">
        <div class="breadcrumbs-area clearfix">
            <h4 class="page-title pull-left">Dashboard</h4>
            <ul class="breadcrumbs pull-left">
                <li><a href="index.html">Home</a></li>
                <li class="poppins"><span>{{ $data->keterangan }}</span></li>
            </ul>
        </div>
    </div>
@endsection
@section('content')
    <div class="main-content-inner poppins" ng-app="homeApp" ng-controller="homeController">
        <div class="row">
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body" id="tabel-toko">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-10">
                                <p style="font-size: 17px" class="poppins">{{ $data->keterangan }}</p>
                            </div>
                            <div class="col-2">
                                <button class="btn btn-primary" data-toggle="modal" data-target="#myModal"
                                    ng-click="tambahData()" style="width: 100%;"><i class="ti-plus"></i> Tambah Data</button>
                            </div>
                        </div>
                        <div class="data-tab">
                            <table datatable="ng" class="table table-bordered">
                                <thead class="bg-light" style="font-size: 12px;">
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Kode Jurusan</th>
                                        <th>Nama Jurusan</th>
                                        <th>Nama Fakultas</th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px">
                                    <tr class="text-center" ng-repeat="row in datajurusan">
                                        <td>@{{ $index + 1 }}</td>
                                        <td>@{{ row.kode_jurusan }}</td>
                                        <td>@{{ row.nama_jurusan }}</td>
                                        <td>@{{row.nama_fakultas}}</td>
                                        <td>
                                            <span class="fa fa-edit" style="font-size: 20px;color: yellow;cursor: pointer;"
                                                ng-click="editData(row)" data-toggle="modal" data-target="#myModal"></span>
                                            <span class="fa fa-trash" style="font-size: 20px;color:red;cursor: pointer;"
                                                ng-click="delete(row)"></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">@{{ket}}</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <input type="text" class="form-control jurusan" placeholder="Kode Jurusan">
                        <p style="font-size: 12px;"><small style="color: red"> * </small>Wajib Di Isi</p>

                        <input type="text" class="form-control jurusan" placeholder="Nama Jurusan">
                        <p style="font-size: 12px;"><small style="color: red"> * </small> Wajib Di Isi</p>
                        <select class="form-control jurusan">
                            <option value="">Pilih Fakultas</option>
                            <option ng-repeat="row in datafakultas" value="@{{row.id_fakultas}}">@{{row.nama_fakultas}}</option>
                        </select>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" ng-hide="aksi" ng-click="saveJurusan()"><i class="ti-save"></i> SIMPAN</button>
                        <button type="button" class="btn btn-success" ng-show="aksi" ng-click="updateJurusan()"><i class="ti-save"></i> PERBARUI</button>
                        <button type="button" class="btn btn-danger"data-dismiss="modal"><i class="ti-close"></i> BATAL</button>
                    </div>

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
    <script src="{{ asset('assets/js/admin/jurusan/app.js') }}"></script>
    <script src="{{ asset('assets/js/admin/jurusan/service.js') }}"></script>
@endsection
