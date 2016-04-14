'use strict';

/**
 * @ngdoc function
 * @name webappApp.controller:AboutCtrl
 * @description
 * # AboutCtrl
 * Controller of the webappApp
 */
angular.module('webappApp')
  .controller('ProductCtrl', function ($scope, productService) {


    // $scope.employee = $scope.getEmployee(1);

    $scope.getAllProducts = function () {
     return $scope.products = productService.getAllProducts();
    };


    $scope.products = $scope.getAllProducts();

  });
