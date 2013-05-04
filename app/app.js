
angular.module('app.service',['ngResource']).
    factory("Students",function($resource){
        return  $resource('./rest.php/Info/students/:key/:value',
            {key: '@key',value: '@id'},
            {
                delete: {method: "DELETE", params:{}},
               // add: {method: "POST"},
                //update: {method: "POST"}
            }
            );

    });

var app = angular.module('app',['ui.bootstrap','app.service']);
app.
    config(function($routeProvider) {
        $routeProvider.
            when('/',{templateUrl:dorm.viewpath+'Status.html'}).
            when('/System/Property',{templateUrl:dorm.viewpath+'System/Property.html'}).
            when('/StudentsManage',{controller: StudentManageCtrl, templateUrl: dorm.viewpath+'StudentManage.html'}).
            when('/StudentsManage/Edit/:studentId',{controller: StudentManageEditCtrl, templateUrl: dorm.viewpath+'StudentManageEdit.html'}).
            when('/StudentsManage/Add',{controller: StudentManageAddCtrl, templateUrl: dorm.viewpath+'StudentManageAdd.html'}).
            otherwise({redirectTo:'/'});

    });