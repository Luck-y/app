
angular.module('app.service',['ngResource']).
    factory("Students",function($resource){
        return  $resource('./rest.php/Info/students');
    });

var app = angular.module('app',['ui.bootstrap','app.service']);
app.
    config(function($routeProvider) {
        $routeProvider.
            when('/',{templateUrl:dorm.viewpath+'Status.html'}).
            when('/System/Property',{templateUrl:dorm.viewpath+'System/Property.html'}).
            when('/StudentsManage',{controller: StudentManageCtrl, templateUrl: dorm.viewpath+'StudentManage.html'}).
            when('/StudentsManage/Edit/:studentId',{controller: StudentManageEditCtrl, templateUrl: dorm.viewpath+'StudentManageInfo.html'}).
            when('/StudentsManage/Add',{controller: StudentManageAddCtrl, templateUrl: dorm.viewpath+'StudentManageInfo.html'}).
            otherwise({redirectTo:'/'});

    });