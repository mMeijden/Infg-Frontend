'use strict';

/**
 * @ngdoc function
 * @name webappApp.controller:AboutCtrl
 * @description
 * # AboutCtrl
 * Controller of the webappApp
 */
angular.module('webappApp')
  .controller('EmployeeCtrl', function ($scope, employeeService) {





   // $scope.employee = $scope.getEmployee(1);

    $scope.getAllEmployees = function () {
      //employeeService.getAllEmployees();
      $scope.employees = employeeService.getAllEmployees();
    };

    $scope.getEmployee = function (id) {
      employeeService.getEmployee(id);
    };

   $scope.employees = $scope.getAllEmployees();
    console.log($scope.getAllEmployees());

  });

