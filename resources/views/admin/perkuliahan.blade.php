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
            <div class="col-12 mt-5" ng-hide="action">
                <div class="card">
                    <div class="card-body" id="tabel-toko">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-10">
                                <p style="font-size: 17px">{{ $data->keterangan }}</p>
                            </div>
                            <div class="col-2">

                            </div>
                        </div>
                        <div class="data-tab">
                            <table datatable="ng" class="table table-bordered">
                                <thead class="bg-light" style="font-size: 12px;">
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama Lengkap</th>
                                        <th>SKS</th>
                                        <th>Semster</th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px">
                                    <tr class="text-center" ng-repeat="row in datamahasiswa">
                                        <td>@{{ $index + 1 }}</td>
                                        <td>@{{ row.nim }}</td>
                                        <td>@{{ row.nama_lengkap }}</td>
                                        <td>@{{ row.sks }}</td>
                                        <td>@{{ row.semester }}</td>
                                        <td>
                                            <p id="design-btn-2" ng-click="tambahData(row)">KRS</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-10 mt-5" style="margin: 0 auto;" ng-show="action">
                <div class="card">
                    <div class="card-body" id="tabel-toko">
                        <div class="data-tab">
                            <div class="column-1" style="margin-bottom: 10px;">
                                <div class="column-2">
                                    <div class="column-3">
                                        <p class="desc-pengajar">NIM</p>
                                        <p class="desc-pengajar">:</p>
                                        <p class="desc-pengajar">@{{ detailmhs.nim }}</p>
                                    </div>
                                    <div class="column-3">
                                        <p class="desc-pengajar">Tahun Ajaran</p>
                                        <p class="desc-pengajar">:</p>
                                        <p class="desc-pengajar">@{{ detailmhs.akademik }}</p>
                                    </div>
                                </div>
                                <div class="column-2" style="margin-top:-10px;">
                                    <div class="column-3">
                                        <p class="desc-pengajar">Nama Lengkap</p>
                                        <p class="desc-pengajar">:</p>
                                        <p class="desc-pengajar">@{{ detailmhs.nama }}</p>
                                    </div>
                                    <div class="column-3">
                                        <p class="desc-pengajar">Semester</p>
                                        <p class="desc-pengajar">:</p>
                                        <p class="desc-pengajar">@{{ detailmhs.semester }}</p>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <table class="table table-bordered">
                                        <thead class="bg-light" style="font-size: 12px;">
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th>Matakuliah</th>
                                                <th>SKS</th>
                                                <th>Semester</th>
                                                <th>
                                                    Aksi
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody style="font-size: 12px">
                                            <tr class="text-center" ng-repeat="row in datamatkul"
                                                style="background-color: @{{ row.warnaback }};color:@{{ row.warnafore }};">
                                                <td>@{{ $index + 1 }}</td>
                                                <td>@{{ row.nama_matkul }}</td>
                                                <td>@{{ row.sks }}</td>
                                                <td>@{{ row.ket_semester }}</td>
                                                <td>
                                                    <input type="checkbox" ng-model="row.SELECTED" ng-change="checkKrs()">
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                </div>

                            </div>



                        </div>
                        <div class="row" style="margin-top: 20px;">
                            <div class="col-10">
                                <div class="row">
                                    <div class="col-2">
                                        <p id="design-btn-2" style="background-color: #E81224;" ng-click="kembali()"><i
                                                class="ti-arrow-left"></i>
                                            Kembali</p>
                                    </div>
                                </div>

                            </div>
                            <div class="col-2">
                                <p id="design-btn-2" ng-click="insertKrs()">Simpan</p>

                            </div>
                        </div>

                    </div>



                </div>
            </div>
            <div class="col-10 mt-5" style="margin: 0 auto;" ng-show="list_kuliah">
                <div class="card">
                    <div class="card-body" id="tabel-toko">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-10">
                                <p>Data Perkuliahan</p>
                            </div>
                            <div class="col-2 pull-right">
                                <button class="btn btn-danger" ng-click="kembali()"><i class="ti-arrow-left"></i>
                                    Kembali</button>
                            </div>
                        </div>
                        <div class="data-tab">
                            <div class="column-1">
                                <div class="column-2">
                                    <div class="column-3">
                                        <p class="desc-pengajar">Nama Dosen</p>
                                        <p class="desc-pengajar">:</p>
                                        <p class="desc-pengajar">@{{ nama_dosen }}</p>
                                    </div>
                                    <div class="column-3">
                                        <p class="desc-pengajar">Matakuliah</p>
                                        <p class="desc-pengajar">:</p>
                                        <p class="desc-pengajar">@{{ nama_matkul }}</p>
                                    </div>
                                    <div class="column-3">
                                        <p class="desc-pengajar">Kelas</p>
                                        <p class="desc-pengajar">:</p>
                                        <p class="desc-pengajar">@{{ kelas }}</p>
                                    </div>
                                    <div class="column-3">
                                        <p class="desc-pengajar">Tahun Akademik</p>
                                        <p class="desc-pengajar">:</p>
                                        <p class="desc-pengajar">@{{ caption_akademik }}</p>
                                    </div>
                                </div>

                            </div>
                            <table datatable="ng" class="table table-bordered">
                                <thead class="bg-light" style="font-size: 12px;">
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama Lengkap</th>
                                        <th>Kelas</th>
                                        <th>Angkatan</th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px">
                                    <tr class="text-center" ng-repeat="row in datamahasiswa">
                                        <td>@{{ $index + 1 }}</td>
                                        <td>@{{ row.nim }}</td>
                                        <td>@{{ row.nama_lengkap }}</td>
                                        <td>@{{ row.keterangan_kelas }}</td>
                                        <td>@{{ row.angkatan }}</td>
                                        <td>
                                            <input type="checkbox" ng-model="row.SELECTED">
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
    <script src="{{ asset('assets/js/admin/perkuliahan/app.js') }}"></script>
    <script src="{{ asset('assets/js/admin/perkuliahan/service.js') }}"></script>
@endsection
