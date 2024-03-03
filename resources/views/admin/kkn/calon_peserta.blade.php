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
            <div class="col-12 mt-5" ng-show="attr">
                <div class="card">
                    <div class="card-body" id="tabel-toko">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-10">
                                <p style="font-size: 17px" class="poppins">{{ $data->keterangan }}</p>
                            </div>
                            <div class="col-2">
                            </div>
                        </div>
                        <div class="data-tab">
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-filter cursor no-color">
                                        <div class="row">
                                            <div class="col-4">
                                                <p style="margin-top: 10px;" class="poppins">Tahun Akademik</p>
                                            </div>
                                            <div class="col-6">
                                                <div class="field-form">
                                                    <select class="form-control poppins" id="id_periode">
                                                        <option ng-repeat="row in dataperiode"
                                                            value="@{{ row.id }}">@{{ row.tahunakademik }} -
                                                            @{{ row.angkatan }}</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <button class="btn btn-primary poppins"
                                                    ng-click="getDataByPeriode()">Pencarian</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table datatable="ng" class="table table-bordered poppins">
                                <thead class="bg-light" style="font-size: 12px;">
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>NIM</th>
                                        <th>Nama Lengkap</th>
                                        <th>Tahun Periode KKN</th>
                                        <th>Angkatan</th>
                                        <th>Status</th>
                                        <th>Tanggal Daftar</th>
                                        <th>
                                            Aksi
                                        </th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 12px">
                                    <tr class="text-center" ng-repeat="row in datapesertakkn">
                                        <td>@{{ $index + 1 }}</td>
                                        <td>@{{ row.nimmhs }}</td>
                                        <td>@{{ row.namalengkapmhs }}</td>
                                        <td>@{{ row.tahunperiodekkn }}</td>
                                        <td>@{{ row.angkatanperiodekkn }}</td>
                                        <td>
                                            <p class="alert alert-warning" ng-if="row.status==0">Sedang Proses</p>
                                            <p class="alert alert-success" ng-if="row.status==1">Diterima</p>
                                            <p class="alert alert-danger" ng-if="row.status==2">Tidak Diterima</p>
                                        </td>
                                        <td>@{{ row.tgl }}</td>
                                        <td>
                                            <span class="fa fa-edit" style="font-size: 20px;color: yellow;cursor: pointer;"
                                                ng-click="editData(row)"></span>
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
            <div class="col-12 mt-5" ng-hide="attr" style="margin: auto;">
                <div class="card">
                    <div class="card-body" id="tabel-toko">
                        <div class="row" style="margin-bottom: 10px;">
                            <div class="col-10">
                                <h4 class="text-center">Calon Peserta KKN</h4>
                            </div>
                            <div class="col-2">

                            </div>
                        </div>
                        <div class="data-tab">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="col-12 detail-profil-mhs">
                                        <div class="row sub-profil">
                                            <div class="col-12">
                                                <h5>Biodata Diri</h5>
                                            </div>
                                            <div class="col-12">
                                                <div class="profil-mhs">
                                                    <p>NIM</p>
                                                    <p class="field">@{{ nim }}</p>
                                                </div>
                                                <div class="profil-mhs">
                                                    <p>Nama Lengkap</p>
                                                    <p class="field">@{{ nama }}</p>
                                                </div>
                                                <div class="profil-mhs">
                                                    <p>Tempat Lahir</p>
                                                    <p class="field">@{{ tempat_lahir }}</p>
                                                </div>
                                                <div class="profil-mhs">
                                                    <p>Tanggal Lahir</p>
                                                    <p class="field">@{{ tgl_lahir }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row sub-profil">
                                            <div class="col-12">
                                                <h5>Alamat Rumah</h5>
                                            </div>
                                            <div class="col-12">
                                                <div class="profil-mhs">
                                                    <p>Kabupaten</p>
                                                    <p class="field">@{{ kabupaten }}</p>
                                                </div>
                                                <div class="profil-mhs">
                                                    <p>Kecamatan</p>
                                                    <p class="field">@{{ kecamatan }}</p>
                                                </div>
                                                <div class="profil-mhs">
                                                    <p>Desa/Kelurahan</p>
                                                    <p class="field">@{{ desa }}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row sub-profil">
                                            <div class="col-12">
                                                <h5>Kontak</h5>
                                            </div>
                                            <div class="col-12">
                                                <div class="profil-mhs">
                                                    <p>Nomor Handphone/Telepon</p>
                                                    <p class="field">@{{ nomor_hp }}</p>
                                                </div>
                                                <div class="profil-mhs">
                                                    <p>Email</p>
                                                    <p class="field">@{{ email }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="row sub-profil">
                                        <div class="col-12">
                                            <div class="profil-img">
                                                <img src="@{{ foto }}" class="img-profils" id="img-load" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="profil-mhs">
                                                <p>Kode Calon KKN</p>
                                                <p class="field">@{{ kode_calon_kkn }}</p>
                                            </div>
                                            <div class="profil-mhs">
                                                <p>Ukuran Baju</p>
                                                <p class="field">@{{ ukuran_baju }}</p>
                                            </div>
                                            <div class="profil-mhs cursor">
                                                <p>Surat Izin Atasan</p>
                                                <p class="field"
                                                    ng-click="openFile('surat_izin_atasan',surat_izin_atasan)">
                                                    @{{ surat_izin_atasan }}</p>
                                            </div>
                                            <div class="profil-mhs cursor">
                                                <p>Surat Izin Orang Tua</p>
                                                <p class="field" ng-click="openFile('surat_izin_ortu',surat_izin_ortu)">
                                                    @{{ surat_izin_ortu }}</p>
                                            </div>
                                            <div class="profil-mhs cursor">
                                                <p>Sertifikat Vaksin</p>
                                                <p class="field"
                                                    ng-click="openFile('sertifikat_vaksin',sertifikat_vaksin)">
                                                    @{{ sertifikat_vaksin }}</p>
                                            </div>

                                            <div class="profil-mhs cursor">
                                                <p>KRS Terakhir</p>
                                                <p class="field" ng-click="openFile('krs_terakhir',krs_terakhir)">
                                                    @{{ krs_terakhir }}</p>
                                            </div>
                                            <div class="profil-mhs cursor">
                                                <p>Transkip Nilai</p>
                                                <p class="field" ng-click="openFile('transkip_nilai',transkip_nilai)">
                                                    @{{ transkip_nilai }}</p>
                                            </div>
                                            <div class="profil-mhs cursor">
                                                <p>Slip Pembayaran Semester Terakhir</p>
                                                <p class="field"
                                                    ng-click="openFile('slip_pembayaran_smt',slip_pembayaran_smt)">
                                                    @{{ slip_pembayaran_smt }}</p>
                                            </div>
                                            <div class="profil-mhs cursor">
                                                <p>Slip Pembayaran KKN</p>
                                                <p class="field"
                                                    ng-click="openFile('slip_pembayaran_kkn',slip_pembayaran_kkn)">
                                                    @{{ slip_pembayaran_kkn }}</p>
                                            </div>
                                            <div class="profil-mhs cursor">
                                                <p>Status</p>
                                                <div class="field-form">
                                                    <select class="form-control" ng-model="checkstatus" id="status">
                                                        <option ng-repeat="row in datastatus"
                                                            value="@{{ row.status }}">@{{ row.caption }}
                                                        </option>
                                                    </select>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-md-12">
                                    <div class="row" style="margin-top: 20px;">
                                        <div class="col-10">
                                            <button class="btn btn-danger" ng-click="cancel()">Batal</button>
                                        </div>
                                        <div class="col-2">
                                            <button class="btn btn-primary" ng-click="konfirmasi()">Konfirmasi</button>
                                        </div>
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
    <script src="{{ asset('assets/js/admin/calon_peserta_kkn/app.js') }}"></script>
    <script src="{{ asset('assets/js/admin/calon_peserta_kkn/service.js') }}"></script>
@endsection
