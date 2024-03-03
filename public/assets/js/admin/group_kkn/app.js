/*jshint esversion: 6 */
$(document).ready(function() {
    $('#dataTable').DataTable();
});
var app = angular.module("homeApp", ['ngRoute', 'datatables']);


app.controller("homeController", function($scope, service) {

    var fun = $scope;
    var service = service;
    var message="";
    var id_jurusan=0;
    var datamhs=[];
    var responjson=[
        {sukses:"Simpan data berhasil",error:"Simpan data gagal"},
        {sukses:"Update Data Berhasil",error:"Update data gagal"},
        {sukses:"Delete Data Berhasil",error:"Delete data gagal"}
    ];

    var data_insert=[];

    var groupkkn=document.getElementsByClassName("group");


    fun.aksi=true;

    fun.form_status=true;

    fun.loadGroupKkn=()=>{
        service.dataGroupKkn((res)=>{
            fun.datagroupkkn=res.data.data;
            fun.jumlahgroup=res.data.jumlahgroup;
            fun.pesertanogroup=res.data.pesertanogroup;
            fun.pesertagroup=res.data.pesertagroup;
            fun.totalpeserta=res.data.totalpeserta;

        })
    }

    fun.loadCalonKkn=()=>{
        service.dataCalonKkn(res=>{
            datamhs=res.data;
            fun.dataanggota=res.data;
            for(var i=0;i<datamhs.length;i++){
                datamhs[i].check=false;

            }
        });
    }

    fun.loadDpl=()=>{
        service.dataDpl(res=>{
            fun.datadpl=res.data;
        });
    }

    fun.loadDesa=()=>{
        service.dataDesa(res=>{
            fun.datadesa=res.data;
        });
    }




    fun.loadGroupKkn();


    fun.clearText=()=>{
        for(var i=0;i<jurusan.length;i++){
            jurusan[i].value="";
        }
    }

    fun.tambahData=()=>{
        fun.aksi=false;
        fun.form_status=false;
        fun.form_insert=true;
        fun.form_detail=false;
        fun.ket="Form Tambah Anggota KKN";
        fun.loadCalonKkn();
        fun.loadDpl();
        fun.loadDesa();

    }

    fun.cancel=()=>{
        fun.aksi=true;
        fun.form_status=true;
        fun.form_detail=false;
        fun.form_insert=false;
        fun.loadGroupKkn();
    }


    fun.checkValidation=()=>{

        if(groupkkn[0].value.length ==0){

            message="Dosen Pembimbing Belum Di Pilih";
            return true;
        }else if(groupkkn[1].value.length==0){
            message="Desa Belum Di Pilih";
            return true;
        }
        return false;
    }
    fun.detail=(row)=>{
        fun.form_detail=true;
        fun.form_status=false;
        fun.form_insert=false;
        fun.nama_dosen=row.gelar_depan+" "+row.nama_dosen+" "+row.gelar_belakang;
        fun.desa=row.kabupaten+" "+row.kecamatan+" "+row.desa;
        fun.posko=row.desa;
        fun.jumlah=row.jumlah;
        service.detailGroupKkn(row.id,res=>{
           fun.datadetail=res.data;
        });
    }


    fun.saveData=()=>{
        var checkValidation=fun.checkValidation();
        if(checkValidation){
            fun.checkerror=true;
            fun.error=message;

            return true;
        }
        const data={
            id_dpl:groupkkn[0].value,
            id_desa:groupkkn[1].value,
            mahasiswa:data_insert
        }
        service.createGroupKkn(data,res=>{
            if(res.success){
                swal({
                    text:"Simpan data berhasil",
                    icon:"success"
                });
                return true;
            }
            swal({
                text:"Simpan data gagal",
                icon:"error"
            });
        });


    }


    fun.delete=(row)=>{

        service.deleteGroupKkn(row.id,(res)=>{

            if(res.success){
                swal({
                    text:responjson[2].sukses,
                    icon:"success"
                });
                fun.loadGroupKkn();
                return;
            }

            swal({
                text:responjson[2].error,
                icon:"error"
            });
        })
    }

    fun.updateCalonKkn=(row,check)=>{
        const {idcalonkkn}=row;
        if(check==true){
            data_insert.push({id_calon_kkn:row.idcalonkkn});
        }
        else{
            const filteredData = data_insert.filter((item) => item.id_calon_kkn !== row.idcalonkkn);
            data_insert=filteredData;

        }
        for(var i=0;i<datamhs.length;i++){
            const obj=datamhs[i];
            if(obj.idcalonkkn==idcalonkkn){
                datamhs[i].check=check;
            }
        }
    }

});
