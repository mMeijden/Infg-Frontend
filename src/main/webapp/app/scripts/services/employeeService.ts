'use strict';

angular.module('webappApp').service('employeeService', function ($resource, $http) {

  var employeeResource = $resource(
    'http://localhost:10081/employees/:id',
    {
      id: '@id',
      //profile: '@profile'
    },
    {
      query:  {method:'GET', isArray:true},
      //get: {method: 'GET'},
     // save: {method: 'POST'},
     // update: {method: 'PUT'}
    }
  );
  this.getAllEmployees = function () {
    var employees = employeeResource.query();
    console.log(employees);
    return employees ;
  };

  this.getEmployeeById = function (id) {
    return employeeResource.query({id: id}, function () {
    }, function () {
      handleError();
    });
  };


  var handleError = function () {
    console.log('error');
  };

  this.getCustomerProfile = function (callback) {
    $http({
      method: 'GET',
      url: 'http://localhost:6789/customers/profile'
    }).then(function (response) {
      callback.setCustomer(response);
    }, function () {
      handleError();
    });
  };

});
