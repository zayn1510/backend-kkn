app.service("service", ["$http", function($http) {

    this.dataPengguna = function(callback) {
        $http({
            url: URL_API+"pengguna",
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }



}]);
