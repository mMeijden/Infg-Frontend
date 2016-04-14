'use strict';

/**
 * @ngdoc function
 * @name webappApp.controller:AboutCtrl
 * @description
 * # AboutCtrl
 * Controller of the webappApp
 */
angular.module('webappApp')
  .controller('EmployeeCtrl', function ($scope, employeeService,travelService) {





   // $scope.employee = $scope.getEmployee(1);

    $scope.getAllEmployees = function () {
      $scope.employees = employeeService.getAllEmployees();
    };

    $scope.getEmployee = function () {
      console.log("get employee called");
     $scope.employee = employeeService.getEmployeeById();
      console.log($scope.employee);
    };

    $scope.getAllTravelBookings = function(){
      console.log("called.");
      return travelService.getAllTravelBookings();
    };


  });

