/**
 * @ngdoc function
 * @name yoExemploApp.controller:AboutCtrl
 * @description
 * # AboutCtrl
 * Controller of the yoExemploApp
 */
app.controller('RegraNegocioController', ['$scope', '$http', function ($scope, $http){
        $scope.regra = {};
        $scope.regras = [];
        $scope.btnSalvar = 'save';

        $scope.getRegras = function(){
            $http.get('regranegocio/all').
                success(function(data, status, headers, config) {
                    $scope.regras = data;
                });
        };

        $scope.getRegras();

        $scope.save = function() {
                    $http({
                       method  : $scope.btnSalvar == 'save' ? 'POST' : 'PATCH',
                       url     : $scope.btnSalvar == 'save' ? 'regranegocio' : 'regranegocio/'+ $scope.regra.id,
                       data    : jQuery.param($scope.regra) ,  // pass in data as strings
                       headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
                    }).
                    success(function(response){
                        $scope.regras = {};
                        location.reload();
                    }).
                    error(function(response){
                       alert('Incomplete Form');
                    });
                 }

        $scope.editar = function(id) {
                    $scope.regra = $scope.regras[id];
                    $scope.btnSalvar = 'edit';
                 }

        $scope.delete = function(id) {
                       $http
                            .delete('regranegocio/'+id)
                            .success(function(data){
                              location.reload();
                            })
                            .error(function(data) {
                              alert('Unable to delete');
                           });
                }
  }]);

app.controller('RegraNegocioDocController', ['$scope', '$http', function ($scope, $http){
        $scope.regra = {};
        $scope.regras = [];
        $scope.btnSalvar = 'save';

        $scope.getRegras = function(id) {
            $http.get('passoregranegocio/allbyid/'+id).
                success(function(data, status, headers, config) {
                    $scope.regras = data;
                });
        };

        $scope.getAllRegras = function() {
            $http.get('regranegocio/all').
                success(function(data, status, headers, config) {
                    $scope.selectRegras = {
                        repeatSelect: null,
                        availableOptions: data
                       };
                });
        };

        $scope.getAllRegras();
        $scope.getRegras($scope.passo.id);

        $scope.save = function() {
            $scope.regra.passo_id = $scope.passo.id;
            $scope.regra.regra_negocio_id =$scope.selectRegras.repeatSelect;
            console.log($scope.regra);
                    $http({
                       method  : $scope.btnSalvar == 'save' ? 'POST' : 'PATCH',
                       url     : $scope.btnSalvar == 'save' ? 'passoregranegocio' : 'passoregranegocio/'+ $scope.regra.id,
                       data    : jQuery.param($scope.regra) ,  // pass in data as strings
                       headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
                    }).
                    success(function(response){
                        $scope.regras = {};
                        location.reload();
                    }).
                    error(function(response){
                       alert('Incomplete Form');
                    });
                 }

        $scope.editar = function(id) {
                    $scope.regra = $scope.regras[id];
                    $scope.btnSalvar = 'edit';
                 }

        $scope.delete = function(id) {
                       $http
                            .delete('regranegocio/'+id)
                            .success(function(data){
                              location.reload();
                            })
                            .error(function(data) {
                              alert('Unable to delete');
                           });
                }
  }]);
