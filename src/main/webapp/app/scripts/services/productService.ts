'use strict';

angular.module('webappApp').service('productService', function ($resource, $http) {

  var employeeResource = $resource(
    'http://localhost:10081/products/:id',
    {
      id: '@id',
      //profile: '@profile'
    },
    {
      query: {method: 'GET', isArray: true},
      //get: {method: 'GET'},
      // save: {method: 'POST'},
      // update: {method: 'PUT'}
    }
  );
  this.getAllProducts = function () {
    var products = employeeResource.query();
  //  console.log(employees);
    return products;
  };
});
