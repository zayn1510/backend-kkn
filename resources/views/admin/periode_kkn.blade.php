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
                                    ng-click="tambahData()" style="width: 100%;"><i class="ti-plus"></i> Tambah
                                    Data</button>
                            </div>
                        </div>
                        <div class="data-tab">
                            <table datatable="ng" class="table table-bordered">
                                <thead class="bg-light" style="font-size: 12px;">
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Tahun Akademik</th>
                                        <th>Angkatan</th>
                                        <th>Tanggal</th>
                                        <th>Status KKN</th>
                                        <th>Status Pendaftaran</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Selesai</th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px">
                                    <tr class="text-center" ng-repeat="row in dataperiodekkn">
                                        <td>@{{ $index + 1 }}</td>
                                        <td>@{{ row.tahunakademik }}</td>
                                        <td>@{{ row.angkatan }}</td>
                                        <td>@{{ row.tanggal }}</td>
                                        <td>
                                            <div class="alert alert-danger" style="cursor: pointer;" ng-if="row.status==0"
                                                ng-click="updateStatus(row,1)">Nonaktif</div>
                                            <div class="alert alert-info" style="cursor: pointer;" ng-if="row.status==1"
                                                ng-click="updateStatus(row,0)">Aktif</div>

                                        </td>
                                        <td>
                                            <div class="alert alert-danger" name="status_pendaftaran"
                                                style="cursor: pointer;" ng-if="row.status_pendaftaran==0"
                                                ng-click="updateStatusPendaftaran(row,1,1)">Nonaktif</div>
                                            <div class="alert alert-info" name="status_pendaftaran" style="cursor: pointer;"
                                                ng-if="row.status_pendaftaran==1" ng-click="updateStatusPendaftaran(row,0)">
                                                Aktif</div>
                                        </td>
                                        <td>@{{ row.tgl_mulai }}</td>
                                        <td>@{{ row.tgl_selesai }}</td>
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
                        <h4 class="modal-title">@{{ ket }}</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="alert alert-danger" ng-show="check">@{{ error }}</div>
                        <div class="form-periode">
                            <input type="text" class="form-control periode" placeholder="Tahun Akademik"
                                oninput="changeBorder(event)">
                            <p style="font-size: 12px;"><small style="color: red"> * </small>Tahun Akademik</p>
                        </div>

                        <div class="form-periode">
                            <input type="text" class="form-control periode" placeholder="Angkatan"
                                oninput="changeBorder(event)">
                            <p style="font-size: 12px;"><small style="color: red"> * </small> Angkatan</p>
                        </div>

                        <div class="form-periode">
                            <input type="date" class="form-control periode" placeholder="Angkatan"
                                oninput="changeBorder(event)">
                            <p style="font-size: 12px;"><small style="color: red"> * </small> Tahun Akademik</p>
                        </div>

                        <div class="form-periode">
                            <input type="date" class="form-control periode" placeholder="Angkatan"
                                oninput="changeBorder(event)">
                            <p style="font-size: 12px;"><small style="color: red"> * </small> Tanggal Mulai</p>
                        </div>

                        <div class="form-periode">
                            <input type="date" class="form-control periode" placeholder="Angkatan"
                                oninput="changeBorder(event)">
                            <p style="font-size: 12px;"><small style="color: red"> * </small> Tanggal Selesai</p>
                        </div>

                        <div class="form-periode">
                            <select class="form-control periode">
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                            <p style="font-size: 12px;"><small style="color: red"> * </small> Status KKN Periode</p>
                        </div>
                        <div class="form-periode">
                            <select class="form-control periode">
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                            <p style="font-size: 12px;"><small style="color: red"> * </small> Status Pendaftaran</p>
                        </div>

                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" ng-hide="aksi" ng-click="savePeriode()"><i
                                class="ti-save"></i> SIMPAN</button>
                        <button type="button" class="btn btn-success" ng-show="aksi" ng-click="updatePeriode()"><i
                                class="ti-save"></i> PERBARUI</button>
                        <button type="button" class="btn btn-danger"data-dismiss="modal"><i class="ti-close"></i>
                            BATAL</button>
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
    <script src="{{ asset('assets/js/admin/periode_kkn/app.js') }}"></script>
    <script src="{{ asset('assets/js/admin/periode_kkn/service.js') }}"></script>
@endsection
