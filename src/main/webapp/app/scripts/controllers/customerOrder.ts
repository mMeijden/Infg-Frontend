'use strict';

/**
 * @ngdoc function
 * @name webappApp.controller:AboutCtrl
 * @description
 * # AboutCtrl
 * Controller of the webappApp
 */
angular.module('webappApp')
  .controller('CustomerOrderCtrl', function ($scope, customerOrderService) {



    //$scope.setAllCustomerOrders = function(customerOrders){
    //  $scope.customerOrders = customerOrders;
    //};

    $scope.getAllCustomerOrders = function () {
     return $scope.customerOrders = customerOrderService.getAllCustomerOrders();
    };

    $scope.getCustomerOrder = function () {
      console.log("get employee called");
      $scope.customerOrder = customerOrderService.getCustomerOrderById();
      console.log($scope.customerOrder);
    };

    $scope.customerOrders = $scope.getAllCustomerOrders();


  });

