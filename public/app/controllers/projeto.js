/**
 * @ngdoc function
 * @name yoExemploApp.controller:AboutCtrl
 * @description
 * # AboutCtrl
 * Controller of the yoExemploApp
 */
app.controller('ProjetoController', ['$scope', '$http','NgTableParams', function ($scope, $http, NgTableParams){
        $scope.projeto = {};
        $scope.projetos = [];
        $scope.btnSalvar = 'save';

        $scope.getProjetos = function(){
            $http.get('projeto/all').
                success(function(data, status, headers, config) {
                    $scope.projetos = data;
                    $scope.tableParams = new NgTableParams({count: 10}, { data:$scope.projetos});
                    console.log($scope.tableParams);
                });
        };

        $scope.getProjetos();

        $scope.save = function() {
                    $http({
                       method  : $scope.btnSalvar == 'save' ? 'POST' : 'PATCH',
                       url     : $scope.btnSalvar == 'save' ? 'projeto' : 'projeto/'+ $scope.projeto.id,
                       data    : jQuery.param($scope.projeto) ,  // pass in data as strings
                       headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
                    }).
                    success(function(response){
                        $scope.projetos = {};
                        location.reload();
                    }).
                    error(function(response){
                       alert('Incomplete Form');
                    });
                 }

        $scope.editar = function(id) {
                    $scope.projeto = $scope.projetos[id];
                    $scope.btnSalvar = 'edit';
                 }

        $scope.delete = function(id) {
                       $http
                            .delete('projeto/'+id)
                            .success(function(data){
                              location.reload();
                            })
                            .error(function(data) {
                              alert('Unable to delete');
                           });
                }

  }]);
