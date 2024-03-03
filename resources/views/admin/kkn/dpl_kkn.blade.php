
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
            <div class="col-12 mt-5" ng-show="form_dpl">
                <div class="card">
                    <div class="card-body" id="tabel-toko">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-10">
                                <p style="font-size: 17px">{{ $data->keterangan }}</p>
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
                                        <th>NIDN</th>
                                        <th>Nama Lengkap</th>
                                        <th>Email</th>
                                        <th>Nomor Handphone</th>
                                        <th>Tahun Akademik</th>
                                        <th>Angkatan</th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px">
                                    <tr class="text-center" ng-repeat="row in datadpl">
                                        <td>@{{ $index + 1 }}</td>
                                        <td>@{{ row.nidn }}</td>
                                        <td>@{{row.nama_dosen}} @{{ row.gelar_depan }} @{{row.gelar_belakang}}</td>
                                        <td>@{{ row.email }}</td>
                                        <td>@{{ row.nomor_hp }}</td>
                                        <td>@{{ row.tahun_akademik }}</td>
                                        <td>@{{ row.angkatan }}</td>
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

            <div class="col-6 mt-5" ng-hide="form_dpl" style="margin: auto;">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-danger" ng-show="check">@{{error}}</div>
                <h5>Profil Dosen</h5>
                <div class="form-periode">
                    <input type="text" class="form-control dpl" placeholder="NIDN Dosen" oninput="changeBorder(event)">
                    <p style="font-size: 12px;"><small style="color: red"> * </small> Wajib Di Isi</p>
                </div>

                <div class="form-periode">
                    <input type="text" class="form-control dpl" placeholder="Nama Dosen" oninput="changeBorder(event)">
                    <p style="font-size: 12px;"><small style="color: red"> * </small> Wajib Di Isi</p>
                </div>

                <div class="form-periode">
                    <input type="text" class="form-control dpl" placeholder="Gelar Depan" oninput="changeBorder(event)">
                    <p style="font-size: 12px;"><small style="color: red"> * </small> Wajib Di Isi</p>
                </div>

                <div class="form-periode">
                    <input type="text" class="form-control dpl" placeholder="Gelar Belakang" oninput="changeBorder(event)">
                    <p style="font-size: 12px;"><small style="color: red"> * </small> Wajib Di Isi</p>
                </div>

                <div class="form-periode">
                    <select class="form-control dpl" oninput="changeBorder(event)">
                        <option value="">Pilih Periode KKN</option>
                        <option ng-repeat="row in dataperiodekkn" value="@{{row.id}}">@{{row.tahunakademik}} @{{row.angkatan}}</option>
                    </select>
                    <p style="font-size: 12px;"><small style="color: red"> * </small> Wajib Di Isi</p>
                </div>

                <h5>Kontak Dosen</h5>
                <div class="form-periode">
                    <input type="email" class="form-control dpl" placeholder="Email" oninput="changeBorder(event)">
                    <p style="font-size: 12px;"><small style="color: red"> * </small> Wajib Di Isi</p>
                </div>

                <div class="form-periode">
                    <input type="number" class="form-control dpl" placeholder="Nomor Handphone" oninput="changeBorder(event)">
                    <p style="font-size: 12px;"><small style="color: red"> * </small> Wajib Di Isi</p>
                </div>

                <button type="button" class="btn btn-success" ng-hide="aksi" ng-click="saveDpl()"><i class="ti-save"></i> SIMPAN</button>
                        <button type="button" class="btn btn-success" ng-show="aksi" ng-click="updateDpl()"><i class="ti-save"></i> PERBARUI</button>
                        <button type="button" class="btn btn-danger" ng-click="batal()" ><i class="ti-close"></i> BATAL</button>
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
    <script src="{{ asset('assets/js/admin/dpl/app.js') }}"></script>
    <script src="{{ asset('assets/js/admin/dpl/service.js') }}"></script>
@endsection
