'use strict';

/**
 * @ngdoc overview
 * @name yoExemploApp
 * @description
 * # yoExemploApp
 *
 * Main module of the application.
 */
var app = angular.module('ucApp',['ngRoute', 'ngSanitize', 'textAngular',"ngTable", 'ngTagsInput']);

    app.controller('UcController', ['$scope', '$http', '$sce', function ($scope, $http, $sce) {
        $scope.passo = {};
        $scope.passos = [];
        $scope.btnSalvar = 'save';

        $scope.getPassos = function(id){
            $http.get('passo/all/'+id).
                success(function(data, status, headers, config) {
                    $scope.passos = data;
                });
        };

        $scope.getPassos($scope.fluxo.id);

        $scope.save = function () {
            $scope.passo.fluxo_id = $scope.fluxo.id;
                    $http({
                       method  : $scope.btnSalvar == 'save' ? 'POST' : 'PATCH',
                       url     : $scope.btnSalvar == 'save' ? 'passo' : 'passo/'+ $scope.passo.id,
                       data    : jQuery.param($scope.passo) ,  // pass in data as strings
                       headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
                    }).
                    success(function(response){
                        $scope.passos = {};
                        location.reload();
                    }).
                    error(function(response){
                       alert('Incomplete Form');
                    });
                 }

        $scope.editar = function(id) {
                    $scope.passo = $scope.passos[id];
                    $scope.btnSalvar = 'edit';
                 }

        $scope.delete = function(id) {
                       $http
                            .delete('passo/'+id)
                            .success(function(data){
                              location.reload();
                            })
                            .error(function(data) {
                              alert('Unable to delete');
                           });
                }

                $scope.htmlTrust = function (html){
                    return  $sce.trustAsHtml(html);
                }
    }])
    .controller('FluxoController', ['$scope', '$http', '$routeParams', function ($scope, $http, $routeParams) {
        $scope.fluxo = {};
        $scope.fluxos = [];
        $scope.btnSalvar = 'save';

        $scope.getFluxos = function(id){
            $http.get('fluxo/all/'+id).
                success(function(data, status, headers, config) {
                    $scope.fluxos = data;
                });
        };

        $scope.getFluxos($routeParams.id);

        $scope.save = function() {
            $scope.fluxo.documento_id = $routeParams.id;
            //$scope.passo.fluxo_id = $scope.fluxo.id;

                    $http({
                       method  : $scope.btnSalvar == 'save' ? 'POST' : 'PATCH',
                       url     : $scope.btnSalvar == 'save' ? 'fluxo' : 'fluxo/'+ $scope.fluxo.id,
                       data    : jQuery.param($scope.fluxo) ,  // pass in data as strings
                       headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
                    }).
                    success(function(response){
                        $scope.fluxos = {};
                        location.reload();
                    }).
                    error(function(response){
                       alert('Incomplete Form');
                    });
                 }

        $scope.editar = function(id) {
                    $scope.fluxo = $scope.fluxos[id];
                    $scope.btnSalvar = 'edit';
                 }

        $scope.delete = function(id) {
                       $http
                            .delete('fluxo/'+id)
                            .success(function(data){
                              location.reload();
                            })
                            .error(function(data) {
                              alert('Unable to delete');
                           });
                }
    }])
    .controller('PassoFluxosController', ['$scope', '$http', '$routeParams', function ($scope, $http, $routeParams) {

        $scope.passoFluxo = {};
        $scope.passoFluxos = [];
        $scope.btnSalvar = 'save';

        $scope.getPassoFluxos = function(id){
            $http.get('passofluxos/all/'+id).
                success(function(data, status, headers, config) {
                    $scope.passoFluxos = data;
                });
        };

        $scope.selectFluxos = {
            repeatSelect: null,
            availableOptions: $scope.fluxos
           };

        $scope.getPassoFluxos($scope.passo.id);

        $scope.save = function() {
           $scope.passoFluxo.passo_id = $scope.passo.id;
           $scope.passoFluxo.fluxo_id = $scope.selectFluxos.repeatSelect;

                    $http({
                       method  : $scope.btnSalvar == 'save' ? 'POST' : 'PATCH',
                       url     : $scope.btnSalvar == 'save' ? 'passofluxos' : 'passofluxos/'+ $scope.passofluxo.id,
                       data    : jQuery.param($scope.passoFluxo) ,  // pass in data as strings
                       headers : { 'Content-Type': 'application/x-www-form-urlencoded' }  // set the headers so angular passing info as form data (not request payload)
                    }).
                    success(function(response){
                        $scope.fluxos = {};
                        location.reload();
                    }).
                    error(function(response){
                       alert('Incomplete Form');
                    });
                 }

        $scope.editar = function(id) {
                    $scope.passoFluxo = $scope.passoFluxos[id];
                    $scope.btnSalvar = 'edit';
                 }

        $scope.delete = function (fluxo_id, passo_id) {
                       $http
                            .delete('passofluxos/'+fluxo_id+'/'+passo_id)
                            .success(function(data){
                              location.reload();
                            })
                            .error(function(data) {
                              alert('Unable to delete');
                           });
                }
    }])
    ;
