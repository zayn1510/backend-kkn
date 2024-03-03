/*jshint esversion: 6 */

$(document).ready(function () {
    $('#dataTable').DataTable();
});
function preview(event, a) {
    var berkas = event.target;
    var ext = berkas.value.substring(berkas.value.lastIndexOf(".") + 1);
    if (ext == "jpg" || ext == "jpeg") {
        if (a == 1) {
            const loadimg = document.getElementById("muat_foto");
            loadimg.src = URL.createObjectURL(event.target.files[0]);
        }
        return;
    }
    swal({
        text: "Format file tidak mendukung",
        icon: "warning",
    });
}

function handleResult(result) {
    return result;
}
var ExcelToJSON = function () {
    this.parseExcel = function (file) {
        return new Promise(function (resolve, reject) {
            var reader = new FileReader();

            reader.onload = function (e) {
                var data = e.target.result;
                var workbook = XLSX.read(data, {
                    type: 'binary'
                });

                // Resolve the promise with the workbook
                resolve(workbook);
            };

            reader.onerror = function (ex) {
                reject(ex);
            };

            reader.readAsBinaryString(file);
        });
    };
};

var app = angular.module("homeApp", ['ngRoute', 'datatables']);


app.controller("homeController", function ($scope, service) {

    var fun = $scope;
    var service = service;
    var message = "";
    var id_mhs = 0;
    var data_temp_fakultas = [];

    var temp_foto = null;
    var temp_data = null;

    fun.checksheet = true;

    var responjson = [
        { sukses: "Simpan data berhasil", error: "Simpan data gagal" },
        { sukses: "Update Data Berhasil", error: "Update data gagal" },
        { sukses: "Delete Data Berhasil", error: "Delete data gagal" }
    ];

    var mahasiswa = document.getElementsByClassName("mahasiswa");

    $(".loading-container").hide();
    $(".dataexcelmhs").hide();

    fun.loadDataExcel = (data) => {
        const obj = {
            data: data
        }
        fun.datamhs = [];
        $(".loading-container").show();
        service.checkDuplicate(obj, res => {

            setTimeout(() => {
                $(".loading-container").hide();
                fun.datamhs = res.data;
                fun.checkmhs = true;
                fun.$apply();
            }, 3000);
        });
    }

    fun.importDataExcel = () => {
        var datasheet = [];
        var datamhs = [];
        const fileInput = document.getElementById("fileexcel");

        // Trigger a click on the file input to open the file dialog.
        fileInput.click();

        // Listen for the change event on the file input.
        fileInput.addEventListener("change", () => {
            const selectedFile = fileInput.files[0]; // Get the selected file

            if (selectedFile) {
                $("#ketfile").text("Data excel yang diimport " + selectedFile.name);
                var xl2json = new ExcelToJSON();
                xl2json.parseExcel(fileexcel.files[0])
                    .then(handleResult)
                    .then(function (result) {
                        const arrsheet = result.SheetNames;
                        arrsheet.forEach((value) => {
                            var XL_row_object = XLSX.utils.sheet_to_row_object_array(result.Sheets[value]);
                            datamhs = XL_row_object;
                            datasheet.push({
                                name: value,
                                jumlah: XL_row_object.length,
                                data: XL_row_object
                            });
                        });
                        fun.datasheet = datasheet;
                        fun.$apply();
                    })
                    .catch(function (error) {
                        console.error(error); // Handle any errors
                    });
            }
        });



    }

    fun.simpanExcelData = () => {
        const datamhs = fun.datamhs;
        if (datamhs.length == 0) {
            swal({
                text: "Tolong Masukan data excel terlebih dahulu",
                icon: "warning"
            });
            return;
        }
        const data = {
            data: datamhs
        }
        service.insertExcel(data, (res) => {
            if (res.success) {
                swal({
                    text: "Import data excel ke database berhasil",
                    icon: "success"
                });
                fun.clearData();
                return;
            }

            swal({
                text: "Import data excel ke database gagal",
                icon: "error"
            });
        })
    }
    fun.clearData = () => {
        fun.form_mahasiswa = false;
        fun.table_mahasiswa = true;
        fun.import_excel = false;
        fun.datamhs = [];
        fun.datasheet = [];
        $("#ketfile").text("");
    }

    fun.openFile = () => {
        document.getElementById("foto_profil").click();
    }

    fun.loadDataFakultas = () => {
        service.dataFakultasMahasiswa(res => {
            fun.datafakultas = res.data;
            data_temp_fakultas = res.data;
        })
    }

    fun.loadDataMahasiswa = () => {
        service.dataMahasiswa(res => {
            fun.datamahasiswa = res.data;
        });
    }

    fun.loadDataMahasiswa();

    fun.getJurusan = (id_fakultas) => {
        if (id_fakultas == "") return true;
        const filterData = data_temp_fakultas.filter(row => row.id_fakultas == id_fakultas);
        fun.datajurusan = filterData[0].jurusan;
    }

    fun.loadDataFakultas();

    fun.clearData();

    fun.tambahData = () => {
        fun.aksi = false;
        fun.clearData();
        fun.form_mahasiswa = true;
        fun.foto = URL_APP + "other/no image dosen.png";
        fun.table_mahasiswa = false;
        fun.import_excel = false;
    }

    fun.openExcel = () => {
        fun.form_mahasiswa = false;
        fun.table_mahasiswa = false;
        fun.import_excel = true;

    }

    fun.downloadExcel = () => {
        window.location.href = URL_FILE + "/data_mahasiswa.ods";
    }


    fun.closeForm = () => {
        fun.form_mahasiswa = false;
        fun.table_mahasiswa = true;
        fun.import_excel = false;
        fun.clearData();
        fun.loadDataMahasiswa();
    }

    fun.saveMahasiswa = () => {

        var file = document.getElementById("foto_profil");
        var fd_berkas = new FormData();
        fd_berkas.append("files", file.files[0]);
        const data = {
            nim_mhs: mahasiswa[0].value, nama_mhs: mahasiswa[1].value, tempat_lahir_mhs: mahasiswa[2].value, tgl_lahir_mhs: mahasiswa[3].value,
            foto_mhs: "default.jpg", nomor_hp_mhs: mahasiswa[4].value, email_mhs: mahasiswa[5].value,
            angkatan_mhs: mahasiswa[6].value, id_fakultas: mahasiswa[7].value, id_jurusan: fun.id_jurusan
        };
        service.uploadFotoMahasiswa(fd_berkas, mahasiswa[0].value, (res) => {
            data.foto_mhs = res.data;

            if (res.val > 0) {
                var check = fun.checkValidation();
                if (check) { swal({ text: message, icon: "error" }); return true; };

                service.createMahasiswa(data, res => {
                    if (res.action > 0) { swal({ text: responjson[0].sukses, icon: "success" }); fun.clearData(); return true; }
                    swal({ text: responjson[0].error, icon: "error" });
                });
                return true;
            }
            swal({
                text: res.message,
                icon: "error"
            });

        });

    }

    fun.editData = (row) => {
        const filterData = data_temp_fakultas.filter(row => row.id_fakultas == row.id_fakultas);
        fun.datajurusan = filterData[0].jurusan;
        mahasiswa[0].value = row.nim_mhs; mahasiswa[1].value = row.nama_mhs; mahasiswa[2].value = row.tempat_lahir_mhs; mahasiswa[3].value = row.tgl_lahir_mhs;
        mahasiswa[4].value = row.nomor_hp_mhs; mahasiswa[5].value = row.email_mhs; mahasiswa[6].value = row.angkatan_mhs;
        mahasiswa[7].value = row.id_fakultas; fun.id_jurusan = row.id_jurusan;
        id_mhs = row.id_mhs;
        fun.form_mahasiswa = true;
        fun.table_mahasiswa = false;
        fun.import_excel = false;
        fun.aksi = true;
        temp_foto = row.foto_mhs;
        temp_data = row;
        fun.foto = URL_APP + "mahasiswa/" + row.nim_mhs + "/" + row.foto_mhs;

    }

    fun.updateMahasiswa = () => {
        var file = document.getElementById("foto_profil");
        var fd_berkas = new FormData();
        fd_berkas.append("files", file.files[0]);
        var data = {
            id_mhs: id_mhs,
            nim_mhs: mahasiswa[0].value, nama_mhs: mahasiswa[1].value, tempat_lahir_mhs: mahasiswa[2].value, tgl_lahir_mhs: mahasiswa[3].value,
            foto_mhs: "default.jpg", nomor_hp_mhs: mahasiswa[4].value, email_mhs: mahasiswa[5].value,
            angkatan_mhs: mahasiswa[6].value, id_fakultas: parseInt(mahasiswa[7].value), id_jurusan: parseInt(fun.id_jurusan)
        };

        if (file.value.length == 0) {
            fun.executeUpdate(data);
            return;
        }


        service.uploadFotoMahasiswa(fd_berkas, mahasiswa[0].value, (res) => {
            data.foto_mhs = res.data;
            if (res.val > 0) {
                fun.executeUpdate(data);
                return true;
            }
            swal({
                text: "Upload Foto Gagal",
                icon: "error"
            });

        });




    }

    fun.executeUpdate = (data) => {
        service.updateMahasiswa(data, res => {
            if (res.success) { swal({ text: responjson[1].sukses, icon: "success" }); fun.loadDataMahasiswa(); return true; }
            swal({
                text: "Update Data Gagal",
                icon: "error"
            });
        });
    }

    fun.deleteMahasiswa = (row) => {
        const id = row.id_mhs
        service.deleteMahasiswa(id, res => {
            if (res.action > 0) { swal({ text: responjson[2].sukses, icon: "success" }); fun.loadDataMahasiswa(); return true; }
            swal({ text: responjson[2].error, icon: "error" });

        });
    }

    fun.checkValidation = () => {
        var validate = [mahasiswa[0].value.length, mahasiswa[1].value.length, mahasiswa[7].value.length, mahasiswa[8].value.length];
        if (validate[0] == 0) { message = "NIM Wajib Di Isi"; return true; }
        else if (validate[1] == 0) { message = "Nama Wajib Di Isi"; return true }
        else if (validate[2] == 0) { message = "Fakultas Wajib Di Isi"; return true; }
        else if (validate[3] == 0) { message = "Jurusan Wajib Di Isi"; return true; }
    }





});
