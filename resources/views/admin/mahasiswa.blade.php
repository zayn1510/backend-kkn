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
    <div class="main-content-inner" ng-app="homeApp" ng-controller="homeController">
        <div class="row">
            <div class="col-12 mt-5" ng-show="table_mahasiswa">
                <div class="card">
                    <div class="card-body" id="tabel-toko">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-8">
                                <p style="font-size: 17px" class="poppins">{{ $data->keterangan }}</p>
                            </div>
                            <div class="col-2">
                                <button class="btn btn-primary poppins" ng-click="tambahData()" style="width: 100%;"><i
                                        class="ti-plus"></i> Tambah
                                    Data</button>
                            </div>
                            <div class="col-2">
                                <cebutton class="btn btn-success poppins" ng-click="openExcel()" style="width: 100%;"><i
                                        class="ti-file"></i> Import
                                    Excel</cebutton>
                            </div>

                        </div>
                        <div class="data-tab">
                            <table datatable="ng" class="table table-bordered poppins">
                                <thead class="bg-light" style="font-size: 12px;">
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama Lengkap</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Angkatan</th>
                                        <th>Fakultas</th>
                                        <th>Jurusan</th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px">
                                    <tr class="text-center" ng-repeat="row in datamahasiswa">
                                        <td>@{{ $index + 1 }}</td>
                                        <td>@{{ row.nim_mhs }}</td>
                                        <td>@{{ row.nama_mhs }}</td>
                                        <td>@{{ row.tempat_lahir_mhs }}</td>
                                        <td>@{{ row.tgl_lahir_mhs }}</td>
                                        <td>@{{ row.angkatan_mhs }}</td>
                                        <td>@{{ row.nama_fakultas }}</td>
                                        <td>@{{ row.nama_jurusan }}</td>
                                        <td>
                                            <span class="fa fa-edit" style="font-size: 20px;color: yellow;cursor: pointer;"
                                                ng-click="editData(row)" data-toggle="modal" data-target="#myModal"></span>
                                            <span class="fa fa-trash" style="font-size: 20px;color:red;cursor: pointer;"
                                                ng-click="deleteMahasiswa(row)"></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-5" ng-show="import_excel">
                <div class="card">
                    <div class="card-body" id="tabel-toko">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-4">
                                <div class="row">
                                    <div class="col-3">
                                        <p style="font-size: 17px">@{{ ket }}</p>
                                    </div>
                                    <div class="col-8">
                                        <p style="font-size: 15px" class="poppins" id="ketfile"></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">

                                <button class="btn btn-primary" style="width: 100%;" ng-click="downloadExcel()"><i
                                        class="ti-download"></i> Download Format Excel</button>
                            </div>
                            <div class="col-2">
                                <input type="file" id="fileexcel" ng-model="fileexcel" style="display: none">
                                <button class="btn btn-warning" style="width: 100%;" ng-click="importDataExcel()"
                                    onchange="angular.element(this).scope().excelToJson(this)"><i class="ti-file"></i>Import
                                    Data Excel</button>
                            </div>
                            <div class="col-2 pull-right">
                                <div>
                                    <button ng-click="simpanExcelData()" class="btn btn-primary"><i class="ti-save"></i>
                                        SIMPAN</button>
                                    <button ng-click="clearData()" class="btn btn-danger"><i class="ti-close"></i>
                                        BATAL</button>
                                </div>
                            </div>
                        </div>
                        <div class="data-tab">
                            <div class="row">
                                <div class="col-4">
                                    <table datatable="ng" class="table table-bordered" ng-show="checksheet">
                                        <thead class="bg-light" style="font-size: 12px;">
                                            <tr class="text-center">
                                                <th>Sheet</th>
                                                <th>Jumlah</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody style="font-size: 12px">
                                            <tr class="text-center" ng-repeat="row in datasheet">
                                                <td>@{{ row.name }}</td>
                                                <td>@{{ row.jumlah }}</td>
                                                <td>
                                                    <button class="btn btn-primary" ng-click="loadDataExcel(row.data)"><i
                                                            class="ti-eye"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-8">
                                    <table datatable="ng" class="table table-bordered">
                                        <thead class="bg-light" style="font-size: 12px;">
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th>NIM</th>
                                                <th>NAMA LENGKAP</th>
                                                <th>KODE FAKULTAS</th>
                                                <th>KODE JURUSAN</th>
                                                <th>ANGKATAN</th>
                                            </tr>
                                        </thead>

                                        <tbody style="font-size: 12px" class="dataexcelmhs">
                                            <tr class="text-center" ng-repeat="row in datamhs">
                                                <td>@{{ $index + 1 }}</td>
                                                <td>@{{ row.nim }}</td>
                                                <td>@{{ row.nama }}</td>
                                                <td>@{{ row.kode_fakultas }}</td>
                                                <td>@{{ row.kode_jurusan }}</td>
                                                <td>@{{ row.angkatan }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="loading-container">
                                        <div class="loading-animation"></div>
                                        <p>Loading Data</p>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
            <div class="col--12 mt-5" ng-show="load_excel">
                <div class="card">
                    <div class="card-body" id="tabel-toko">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-6">
                                <button class="btn btn-danger">Kembali</button>
                            </div>
                        </div>
                        <div class="data-tab">

                            <button ng-click="simpanExcelData()" class="btn btn-primary"><i class="ti-save"></i>
                                SIMPAN</button>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-8 mt-3" ng-show="form_mahasiswa" style="margin: auto;">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card-image">
                                    <img src="@{{ foto }}" class="img-profils" id="muat_foto"
                                        ng-click="openFile()">
                                    <input type="file" style="display: none" id="foto_profil"
                                        onchange="preview(event,1)">
                                </div>
                                <input type="number" class="form-control mahasiswa" placeholder="15650055">
                                <p style="font-size: 12px;"><small style="color: red"> * </small> Masukan NIM</p>

                                <input type="text" class="form-control mahasiswa" placeholder="Sri Mulyani">
                                <p style="font-size: 12px;"><small style="color: red"> * </small> Masukan Nama Lengkap</p>

                                <input type="text" class="form-control mahasiswa" placeholder="Baubau">
                                <p style="font-size: 12px;"><small style="color: red"> * </small> Tidak Wajib Masukan
                                    Tempat Lahir</p>

                                <input type="date" class="form-control mahasiswa" placeholder="Sri Mulyani">
                                <p style="font-size: 12px;"><small style="color: red"> * </small> Tidak Wajib Masukan
                                    Tanggal Lahir</p>

                                <input type="number" class="form-control mahasiswa" placeholder="082271586923">
                                <p style="font-size: 12px;"><small style="color: red"> * </small> Tidak Wajib Masukan
                                    Nomor Telepon</p>

                                <input type="email" class="form-control mahasiswa"
                                    placeholder="srimulyani15@gmail.com">
                                <p style="font-size: 12px;"><small style="color: red"> * </small> Tidak Wajib Masukan
                                    Email</p>

                                <input type="text" class="form-control mahasiswa" placeholder="Angkatan Cth. 2015">
                                <p style="font-size: 12px;"><small style="color: red"> * </small> Wajib Masukan Angkatan
                                </p>


                                <select class="form-control mahasiswa" ng-model="id_fakultas"
                                    ng-change="getJurusan(id_fakultas)">
                                    <option value="">Pilih Fakultas</option>
                                    <option ng-repeat="row in datafakultas" value="@{{ row.id_fakultas }}">
                                        @{{ row.nama_fakultas }}</option>
                                </select>
                                <p style="font-size: 12px;"><small style="color: red"> * </small>Wajib Masukan Fakultas
                                </p>

                                <select class="form-control mahasiswa" ng-model="id_jurusan">
                                    <option value="0">Pilih Jurusan</option>
                                    <option ng-repeat="row in datajurusan" ng-value="@{{ row.id_jurusan }}">
                                        @{{ row.nama_jurusan }}</option>
                                </select>
                                <p style="font-size: 12px;"><small style="color: red"> * </small>Wajib Masukan Jurusan</p>



                            </div>
                            <div class="col-12">
                                <button type="button" class="btn btn-success" ng-hide="aksi"
                                    ng-click="saveMahasiswa()"><i class="ti-save"></i> SIMPAN</button>
                                <button type="button" class="btn btn-success" ng-show="aksi"
                                    ng-click="updateMahasiswa()"><i class="ti-save"></i> PERBARUI</button>
                                <button type="button" class="btn btn-danger" ng-click="closeForm()"><i
                                        class="ti-close"></i>
                                    BATAL</button>
                            </div>
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
    <script src="{{ asset('assets/js/admin/mahasiswa/app.js') }}"></script>
    <script src="{{ asset('assets/js/admin/mahasiswa/service.js') }}"></script>
    <script src="{{ asset('assets/js/excel/jszip.js') }}"></script>
    <script src="{{ asset('assets/js/excel/xlsx.js') }}"></script>
@endsection
