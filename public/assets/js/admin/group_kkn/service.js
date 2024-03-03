app.service("service", ["$http", function($http) {

    this.dataGroupKkn = function(callback) {
        $http({
            url: URL_API+"group-kkn",
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }


    this.dataCalonKkn = function(callback) {
        $http({
            url: URL_API+"group-kkn/calon-kkn",
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

    this.dataDpl = function(callback) {
        $http({
            url: URL_API+"dpl/load-data",
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

    this.dataDesa = function(callback) {
        $http({
            url: URL_API+"desa/load-data",
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

    this.detailGroupKkn = function(id,callback) {
        $http({
            url: URL_API+"group-kkn/detail/"+id,
            method: "GET"
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

    this.createGroupKkn = function(obj, callback) {

        $http({
            url:URL_API+"group-kkn",
            method: "POST",
            data: obj
        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }

    this.deleteGroupKkn= function(id,callback) {
        $http({
            url: URL_API+"group-kkn/"+id,
            method: "DELETE",

        }).then(function(e) {

            callback(e.data);
        }).catch(function(err) {

        });
    }



}]);
