'use strict';
/**
 * @ngdoc overview
 * @name webappApp
 * @description
 * # webappApp
 *
 * Main module of the application.
 */
angular.module('webappApp', [
  'ngAnimate',
  'ngCookies',
  'ngResource',
  'ngRoute',
  'ngSanitize',
  'ngTouch',
  'ui.router'
]).config(function ($routeProvider, $stateProvider, $urlRouterProvider) {
  $stateProvider
    .state('home', {
      url: '/',
      templateUrl: 'views/main.html',

    })
    //.state('product', {
    //  url: '/product',
    //  templateUrl: 'views/manageProduct.html',
    //  controller: 'ProductCtrl',
    //  controllerAs: 'product'
    //})
    .state('employee', {
      url: '/employee',
      templateUrl: 'views/manageEmployee.html',
      controller: 'EmployeeCtrl',
      controllerAs: 'employee'
    }).state('employeeDetail', {
      url: '/employee/:id',
      templateUrl: 'views/employee-detail.html',
      controller: 'EmployeeCtrl',
      controllerAs: 'employee',
    })
      .state('travels', {
        url: '/travels',
        templateUrl: 'views/travel.html',
        controller: 'travelController',
        controllerAs: 'travel',
      })
    .state('products', {
      url: '/products',
      templateUrl: 'views/Product.html',
      controller: 'ProductCtrl',
      controllerAs: 'product',
    })
      .state('customerorders', {
        url: '/customerorders',
        templateUrl: 'views/customerOrderOverview.html',
        controller: 'CustomerOrderCtrl',
        controllerAs: 'customerOrder',
      })
      .state('customerOrderDetail', {
        url: '/customerorders/:id',
        templateUrl: 'views/customerOrderDetail.html',
        controller: 'CustomerOrderCtrl',
        controllerAs: 'customerOrder',
      });

  $urlRouterProvider.otherwise('/');


});
angular.module('webApp.services', []);
