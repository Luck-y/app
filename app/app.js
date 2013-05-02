
angular.module('app.service',['ngResource']).
    factory("Students",function($resource){
        return  $resource('./rest.php/Info/students/:id',
            {id: '@id'});

    });

var app = angular.module('app',['ui.bootstrap','app.service']);
app.
    config(function($routeProvider) {
        $routeProvider.
            when('/',{templateUrl:dorm.viewpath+'Status.html'}).
            when('/System/Property',{templateUrl:dorm.viewpath+'System/Property.html'}).
            when('/Students',{controller: StudentManageCtrl, templateUrl: dorm.viewpath+'Student.html'}).
            otherwise({redirectTo:'/'});

    });