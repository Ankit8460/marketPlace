'use strict';
var crhub = angular.module('crhub', ['ui.router']);
crhub.config(function($stateProvider, $urlRouterProvider) {
    $stateProvider.state({
        name: 'hello',
        url: '/hello',
        template: '<h3>hello world!</h3>'
    });
    $stateProvider
        .state({
            name: 'home',
            url: '/home',
            abstract: true,
            views: {
                content: {
                    template: '<div ui-view></div>',
                    controller: 'homeCtrl'
                }
            }
        }).state('home.landing', {
            url: '/landing',
            templateUrl: 'views/landing.html',
            controller: 'landingCntrl'
        }).state('home.login', {
            url: '/login',
            templateUrl: 'views/login.html',
            controller: 'landingCntrl'
        }).state({
            name: 'admin',
            url: '/admin',
            abstract: true,
            views: {
            	header:{
            		templateUrl: 'views/admin/header.html',
                    controller: 'adminHeader'
            	},
            	nav:{
            		templateUrl: 'views/admin/nav.html',
                    controller: 'adminNav'
            	},
                content: {
                    template: '<div ui-view></div>',
                    controller: 'adminCtrl'
                }
            }
        }).state('admin.login', {
            url: '/home',
            templateUrl: 'views/admin/home.html',
            controller: 'adminHome'
        });

    $urlRouterProvider.otherwise('/home/landing');
});
