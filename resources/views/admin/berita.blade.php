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
            <div class="col-12 mt-5" ng-show="tabel_berita">
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
                                        <th>Judul</th>
                                        <th>Author</th>
                                        <th>Tanggal</th>
                                        <th>Waktu</th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px">
                                    <tr class="text-center" ng-repeat="row in databerita">
                                        <td>@{{ $index + 1 }}</td>
                                        <td>@{{ row.judul }}</td>
                                        <td>@{{ row.author }}</td>
                                        <td>@{{ row.tgl }}</td>
                                        <td>@{{ row.waktu }}</td>
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

            <div class="col-8 mt-5" ng-hide="tabel_berita" style="margin: auto;">
                <div class="card">
                    <div class="card-body" id="tabel-toko">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-10">
                                <p style="font-size: 17px">@{{keterangan }}</p>
                            </div>

                        </div>
                        <div class="data-tab">
                            <div class="row form-berita">
                                <div class="col-12">
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control berita" oninput="changeBorder(event)" placeholder="Judul Berita"/>
                                    <p style="font-size: 12px;"><small style="color: red"> * </small>Wajib Di Isi</p>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control berita" disabled  placeholder="Author Berita" value="Admin"/>
                                    <p style="font-size: 12px;"><small style="color: red"> * </small>Otomatis Terisi</p>
                                </div>
                                <div class="col-12">
                                    <textarea class="summernote berita" name="content"></textarea>
                                </div>
                                <div class="col-12">
                                    <div class="row form-upload-thumbnail">
                                        <div class="col-6">
                                            <p>Thumbnail Upload</p>
                                        </div>
                                        <div class="col-3">
                                            <button type="button" class="btn btn-primary" ng-click="openFile()"> Open File</button>
                                            <input type="file" style="display: none" id="thumbnail"  onchange="preview(event,1)">
                                        </div>
                                        <div class="col-3">
                                            <button type="button" class="btn btn-warning" ng-click="previewFile()"> Preview File</button>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="button" class="btn btn-success" ng-hide="aksi" ng-click="saveBerita()"><i
                                        class="ti-save"></i> SIMPAN</button>
                                    <button type="button" class="btn btn-success" ng-show="aksi" ng-click="updateBerita()"><i
                                        class="ti-save"></i> PERBARUI</button>
                                    <button type="button" class="btn btn-danger" ng-click="closeForm()"><i class="ti-close"></i>
                                    BATAL</button>
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
    <script src="{{ asset('summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('assets/js/admin/berita/app.js') }}"></script>
    <script src="{{ asset('assets/js/admin/berita/service.js') }}"></script>
@endsection
