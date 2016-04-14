'use strict';

angular.module('webappApp').service('travelService', function ($resource, $http) {

  var customerOrderResource = $resource(
    'http://localhost:10081/travels/:id',
    {
      id: '@id',
      //profile: '@profile'
    },
    {
      query: {method: 'GET', isArray: true},
      //get: {method: 'GET'},
       save: {method: 'POST', isArray: true},
      // update: {method: 'PUT'}
    }
  );



  this.getAllTravels = function () {
    var travels = customerOrderResource.query();
    //console.log(customerOrders);
    console.log(travels);
    return travels;
  };

  this.getTravelById = function (callback,id) {
    $http({
      method: 'GET',
      url: 'http://localhost:10081/travels/'+ id
    }).then(function (response) {
      console.log(response);
      callback.setTravel(response);
    }, function () {
      console.log("slap with newspaper");
    });
  };

  this.createBooking = function(newtravel){
    customerOrderResource.save(newtravel);
  }

});
