/**
 * @ngdoc function
 * @name yoExemploApp.controller:AboutCtrl
 * @description
 * # AboutCtrl
 * Controller of the yoExemploApp
 */
app.controller('DocumentoController', ['$scope', '$http','$routeParams', function ($scope, $http, $routeParams){
        $scope.documento = {};
        $scope.documentos = [];
        $scope.btnSalvar = 'save';

        $scope.getDocumentos = function(id){
            $http.get('documento/allbyid/'+id).
                success(function(data, status, headers, config) {
                    console.log(data);
                    $scope.documentos = data;
                });
        };

        $scope.getDocumentos($routeParams.id);

        $scope.save = function() {
            $scope.documento.projeto_id = $routeParams.id;
                    $http({
                       method  : $scope.btnSalvar == 'save' ? 'POST' : 'PATCH',
                       url     : $scope.btnSalvar == 'save' ? 'documento' : 'documento/'+ $scope.documento.id,
                       data    : jQuery.param($scope.documento) ,  // pass in data as strings
                       headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
                    }).
                    success(function(response){
                        $scope.documentos = {};
                        location.reload();
                    }).
                    error(function(response){
                       alert('Incomplete Form');
                    });
                 }

        $scope.editar = function(id) {
                    $scope.documento = $scope.documentos[id];
                    $scope.btnSalvar = 'edit';
                 }

        $scope.delete = function(id) {
                       $http
                            .delete('documento/'+id)
                            .success(function(data){
                              location.reload();
                            })
                            .error(function(data) {
                              alert('Unable to delete');
                           });
                }
  }]);
