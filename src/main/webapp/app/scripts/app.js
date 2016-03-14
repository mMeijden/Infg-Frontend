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
    $stateProvider.state('home', {
        url: '/',
        templateUrl: 'views/main.html'
    }).state('product', {
        url: '/product',
        templateUrl: 'views/manageProduct.html',
        controller: 'ProductCtrl',
        controllerAs: 'product'
    }).state('employee', {
        url: '/employee',
        templateUrl: 'views/manageEmployee.html',
        controller: 'EmployeeCtrl',
        controllerAs: 'employee'
    });
    $urlRouterProvider.otherwise('/');
});
