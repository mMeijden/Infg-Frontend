'use strict';

/**
 * @ngdoc function
 * @name webappApp.controller:AboutCtrl
 * @description
 * # AboutCtrl
 * Controller of the webappApp
 */
angular.module('webappApp').controller('travelController', function ($scope,travelService) {

  var newtravel = [];

    $scope.getAllTravels = function(){
      console.log("called.");
      return  $scope.travels = travelService.getAllTravels();
    };

  $scope.setTravel = function(travel){
    newtravel = travel.data;
  };

  $scope.completeTravel = function(id) {
    console.log("complete travel called");
   var  travel = travelService.getTravelById($scope,id);
    travelService.createBooking();
    //if ($scope.order.orderId === undefined){
    //  orderService.postOrder($scope.order);
    //}
    //else {
    //  orderService.updateOrder($scope.order);
    //}
    //$scope.order = orderService.emptyCart();
    //console.log(travel);
  };

    $scope.travels = $scope.getAllTravels();
  });

