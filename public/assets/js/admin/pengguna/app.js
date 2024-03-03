/*jshint esversion: 6 */
$(document).ready(function() {
    $('#dataTable').DataTable();
});
var app = angular.module("homeApp", ['ngRoute', 'datatables']);


app.controller("homeController", function($scope, service) {

    var fun = $scope;
    var service = service;

    fun.aksi=true;

    fun.loadPengguna=()=>{
        service.dataPengguna(row=>{
            fun.pengguna=row.data;
        });
    }
    fun.loadPengguna();



});
