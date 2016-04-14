'use strict';

angular.module('webappApp').service('customerOrderService', function ($resource, $http) {

  var customerOrderResource = $resource(
    'http://localhost:10081/customerorders/:id',
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
  this.getAllCustomerOrders = function () {
    var customerOrders = customerOrderResource.query();
    //console.log(customerOrders);
    return customerOrders ;
  };

  this.getCustomerOrderById = function (id) {
    return customerOrderResource.query({id: id}, function () {
    }, function () {
      handleError();
    });
  };


  var handleError = function () {
    console.log('error');
  };

  //this.getAllCustomerOrders = function (callback) {
  //  $http({
  //    method: 'GET',
  //    url: 'http://localhost:10081/customerorders'
  //  }).then(function (response) {
  //    console.log(response);
  //    callback.setCustomerOrders(response);
  //  }, function () {
  //    handleError();
  //  });
  //};

});
