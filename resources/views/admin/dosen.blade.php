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
            <div class="col-12 mt-5">
                <div class="card">
                    <div class="card-body" id="tabel-toko">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-10">
                                <p style="font-size: 17px">{{ $data->keterangan }}</p>
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
                                        <th>NIDN</th>
                                        <th>Nama Lengkap</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Telepon</th>
                                        <th>Email</th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px">
                                    <tr class="text-center" ng-repeat="row in datadosen">
                                        <td>@{{ $index + 1 }}</td>
                                        <td>@{{ row.nidn }}</td>
                                        <td>@{{ row.nama_lengkap }}</td>
                                        <td>@{{ row.tempat_lahir }}</td>
                                        <td>@{{ row.tgl_lahir }}</td>
                                        <td>@{{ row.telepon }}</td>
                                        <td>@{{ row.email }}</td>
                                        <td>
                                            <span class="fa fa-edit" style="font-size: 20px;color: yellow;cursor: pointer;"
                                                ng-click="editData(row)" data-toggle="modal" data-target="#myModal"></span>
                                            <span class="fa fa-trash" style="font-size: 20px;color:red;cursor: pointer;"
                                                ng-click="deleteDosen(row)"></span>
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
                        <div class="card-image">
                            <img src="{{ asset('other/no image dosen.png') }}" id="muat_foto" ng-click="openFile()">
                            <input type="file" style="display: none" id="foto_profil"  onchange="preview(event,1)">
                        </div>
                        <input type="number" class="form-control dosen" placeholder="32893811823">
                        <p style="font-size: 12px;"><small style="color: red"> * </small> Masukan NIDN</p>

                        <input type="text" class="form-control dosen" placeholder="Sri Mulyani">
                        <p style="font-size: 12px;"><small style="color: red"> * </small> Masukan Nama Lengkap</p>

                        <input type="text" class="form-control dosen" placeholder="Baubau">
                        <p style="font-size: 12px;"><small style="color: red"> * </small> Masukan Tempat Lahir</p>

                        <input type="date" class="form-control dosen" placeholder="Sri Mulyani">
                        <p style="font-size: 12px;"><small style="color: red"> * </small> Masukan Tanggal Lahir</p>

                        <input type="number" class="form-control dosen" placeholder="082271586923">
                        <p style="font-size: 12px;"><small style="color: red"> * </small> Masukan Nomor Telepon</p>

                        <input type="email" class="form-control dosen" placeholder="srimulyani15@gmail.com">
                        <p style="font-size: 12px;"><small style="color: red"> * </small> Masukan Email</p>

                        <textarea placeholder="Jln Ahmad Yani" class="form-control dosen"></textarea>
                        <p style="font-size: 12px;"><small style="color: red"> * </small> Masukan Alamat Lengkap</p>

                        <select class="form-control dosen">
                            <option value="">Belum dipilih</option>
                            <option ng-repeat="row in dataagama" value="@{{row.ket}}">@{{row.ket}}</option>
                        </select>
                        <p style="font-size: 12px;"><small style="color: red"> * </small> Pilihlah Agama</p>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" ng-hide="aksi" ng-click="saveDosen()"><i
                                class="ti-save"></i> SIMPAN</button>
                        <button type="button" class="btn btn-success" ng-show="aksi" ng-click="updateDosen()"><i
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
    <script src="{{ asset('assets/js/admin/dosen/app.js') }}"></script>
    <script src="{{ asset('assets/js/admin/dosen/service.js') }}"></script>
@endsection
