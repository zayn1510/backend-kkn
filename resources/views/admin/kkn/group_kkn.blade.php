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
            <div class="col-12 mt-5" ng-show="form_status">
                <div class="card">
                    <div class="card-body" id="tabel-toko">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-10">
                                <p style="font-size: 17px">{{ $data->keterangan }}</p>
                            </div>
                            <div class="col-2">
                                <button class="btn btn-primary" ng-click="tambahData()" style="width: 100%;"><i
                                        class="ti-plus"></i> Tambah Data</button>
                            </div>
                        </div>
                        <div class="data-tab">
                            <table datatable="ng" class="table table-bordered poppins">
                                <thead class="bg-light" style="font-size: 12px;">
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>NIDN</th>
                                        <th>Nama Dosen</th>
                                        <th>Kabupaten</th>
                                        <th>Kecamatan</th>
                                        <th>Desa</th>
                                        <th>Posko</th>
                                        <th>Jumlah</th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px">
                                    <tr class="text-center" ng-repeat="row in datagroupkkn">
                                        <td>@{{ $index + 1 }}</td>
                                        <td>@{{ row.nidn }}</td>
                                        <td>@{{ row.nama_dosen }}</td>
                                        <td>@{{ row.kabupaten }}</td>
                                        <td>@{{ row.kecamatan }}</td>
                                        <td>@{{ row.desa }}</td>
                                        <td>@{{ row.desa }}</td>
                                        <td>@{{ row.jumlah }}</td>
                                        <td>
                                            <button class="alert alert-primary btn-edit" ng-click="detail(row)"> Detail
                                                Data</button>
                                            <button class="alert alert-danger btn-delete" ng-click="delete(row)"> Hapus
                                                Data</button>
                                        </td>
                                    </tr>
                                </tbody>
                                <tbody>
                                    <tr>
                                        <th colspan="8">Jumlah Group Anggota KKN</th>
                                        <th class="text-center">@{{jumlahgroup}}</th>
                                    </tr>
                                    <tr>
                                        <th colspan="8">Jumlah Peserta KKN Telah Masuk Group </th>
                                        <th class="text-center">@{{pesertagroup}}</th>
                                    </tr>
                                    <tr>
                                        <th colspan="8">Jumlah Peserta KKN Belum Masuk Group </th>
                                        <th class="text-center">@{{pesertanogroup}}</th>
                                    </tr>
                                    <tr>
                                        <th colspan="8">Jumlah Total Peserta KKN</th>
                                        <th class="text-center">@{{totalpeserta}}</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-5 mg-auto" ng-show="form_insert">
                <div class="card">
                    <div class="card-body">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-2">
                                <button class="btn btn-danger poppins" ng-click="cancel()"
                                    style="width: 100%;">Batal</button>
                            </div>
                            <div class="col-10">
                                <div class="row justify-content-end">
                                    <div class="col-2">
                                        <button class="btn btn-success poppins" style="width: 100%;" ng-click="saveData()"
                                            ng-hide="aksi">Simpan data</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="data-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Data Group Anggota KKN</h5>
                                    <table class="table">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th>Dosen</th>
                                                <th>Desa</th>
                                                <th>Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody style="font-size: 12px">
                                            <tr class="text-center" ng-repeat="row in datagroupkkn">
                                                <td>@{{ $index + 1 }}</td>
                                                <td>@{{ row.nidn }}</td>
                                                <td>@{{ row.nama_dosen }}</td>
                                                <td>@{{ row.desa }}</td>
                                                <td>@{{ row.jumlah }}</td>
                                            </tr>
                                        </tbody>
                                        <thead>
                                            <tr>
                                                <th colspan="8">Jumlah Group Anggota KKN</th>
                                                <th class="text-center">@{{jumlahgroup}}</th>
                                            </tr>
                                            <tr>
                                                <th colspan="8">Jumlah Peserta KKN Telah Masuk Group </th>
                                                <th class="text-center">@{{pesertagroup}}</th>
                                            </tr>
                                            <tr>
                                                <th colspan="8">Jumlah Peserta KKN Belum Masuk Group </th>
                                                <th class="text-center">@{{pesertanogroup}}</th>
                                            </tr>
                                            <tr>
                                                <th colspan="8">Jumlah Total Peserta KKN</th>
                                                <th class="text-center">@{{totalpeserta}}</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="alert alert-danger" ng-show="checkerror">@{{ error }}</div>
                                            <div class="row">
                                                <div class="col-2">
                                                    <p class="poppins mg-top">Dosen</p>
                                                </div>
                                                <div class="col-10">
                                                    <div class="form-periode">
                                                        <select class="form-control group poppins" style="margin-bottom: 20px">
                                                            <option value="">Pilih Dosen Pembimbing Lapangan</option>
                                                            <option ng-repeat="row in datadpl" value="@{{ row.id_dpl }}">
                                                                @{{ row.gelar_depan }} @{{ row.nama_dosen }}
                                                                @{{ row.gelar_belakang }}</option>
                                                        </select>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-2">
                                                    <p class="poppins mg-top">Desa/Kelurahan</p>
                                                </div>
                                                <div class="col-10">
                                                    <div class="form-periode">
                                                        <select class="form-control group poppins">
                                                            <option value="">Pilih Kabupaten</option>
                                                            <option ng-repeat="row in datadesa" value="@{{ row.id_desa }}">
                                                                @{{ row.kabupaten }} @{{ row.kecamatan }}
                                                                @{{ row.desa }}</option>
                                                        </select>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="poppins" style="margin-top: 30px">Anggota KKN</p>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <table datatable="ng" class="table table-bordered">
                                                <thead class="text-center">
                                                    <th>No</th>
                                                    <th>NIM</th>
                                                    <th>Nama Lengkap</th>
                                                    <th>Aksi</th>
                                                </thead>
                                                <tbody style="font-size: 12px">
                                                    <tr class="text-center" ng-repeat="row in dataanggota">
                                                        <td>@{{ $index + 1 }}</td>
                                                        <td>@{{ row.nimmhs }}</td>
                                                        <td>@{{ row.namalengkapmhs }}</td>
                                                        <td>
                                                            <button class="alert alert-success btn-edit" ng-if="row.check==false"
                                                                ng-click="updateCalonKkn(row,true)"> Tambah Data</button>
                                                            <button class="alert alert-danger btn-edit" ng-if="row.check==true"
                                                                ng-click="updateCalonKkn(row,false)"> Hapus Data</button>
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
            </div>
            <div class="col-8 mt-5 mg-auto" ng-show="form_detail">
                <div class="card">
                    <div class="card-body">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-2">
                                <button class="btn btn-danger poppins" ng-click="cancel()"
                                    style="width: 100%;">Kembali</button>
                            </div>
                        </div>
                        <div class="data-tab">
                            <div class="row">
                                <div class="col-12">
                                    <div class="alert alert-danger" ng-show="checkerror">@{{ error }}</div>
                                    <div class="row">
                                        <div class="col-4">
                                            <p class="poppins mg-top">Dosen Pembimbing Lapangan</p>
                                        </div>
                                        <div class="col-8">
                                            <div class="form-periode">
                                                <p class="poppins mg-top">: @{{ nama_dosen }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-4">
                                            <p class="poppins mg-top">Desa/Kelurahan</p>
                                        </div>
                                        <div class="col-8">
                                            <div class="form-periode">
                                                <p class="poppins mg-top">: @{{ desa }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-4">
                                            <p class="poppins mg-top">Posko</p>
                                        </div>
                                        <div class="col-8">
                                            <div class="form-periode">
                                                <p class="poppins mg-top">: @{{ posko }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-12">
                                            <p class="poppins" style="margin-top: 30px">Anggota KKN</p>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-12">
                                    <table datatable="ng" class="table table-bordered">
                                        <thead class="text-center">
                                            <th>No</th>
                                            <th>NIM</th>
                                            <th>Nama Lengkap</th>
                                        </thead>
                                        <tbody style="font-size: 12px">
                                            <tr class="text-center" ng-repeat="row in datadetail">
                                                <td>@{{ $index + 1 }}</td>
                                                <td>@{{ row.nim_mhs }}</td>
                                                <td>@{{ row.nama_mhs }}</td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="2" class="text-center">Jumlah Mahasiswa</th>
                                                <th class="text-center">@{{jumlah}}</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
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
    <script src="{{ asset('assets/js/admin/group_kkn/app.js') }}"></script>
    <script src="{{ asset('assets/js/admin/group_kkn/service.js') }}"></script>
@endsection
