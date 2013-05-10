
var ser = angular.module('app.service',['ngResource']);

    ser.factory("Students",function($resource){
        return  $resource('./rest.php/Info/students');
    });

    ser.factory("Buildings",function($resource){
        return  $resource('./rest.php/Info/buildings');
    });
    ser.factory("Rooms",function($resource){
        return  $resource('./rest.php/Info/rooms');
    });
    ser.factory("Query",function($resource){
        return $resource('./rest.php/Query/:table',{},{
            search: {method: 'POST'}
        });
    })

var app = angular.module('app',['ui.bootstrap','app.service']);
app.
    config(function($routeProvider) {
        $routeProvider.
            when('/',{templateUrl:dorm.viewpath+'Status.html'}).
            when('/System/Property',{templateUrl:dorm.viewpath+'System/Property.html'}).
            when('/StudentManage',{controller: StudentManageCtrl, templateUrl: dorm.viewpath+'StudentManage.html'}).
            when('/StudentManage/Edit/:studentId',{controller: StudentManageEditCtrl, templateUrl: dorm.viewpath+'StudentManageInfo.html'}).
            when('/StudentManage/Add',{controller: StudentManageAddCtrl, templateUrl: dorm.viewpath+'StudentManageInfo.html'}).
            when('/BuildingManage',{controller: DormitoryBuildingManageCtrl, templateUrl: dorm.viewpath+'BuildingManage.html'}).
            when('/BuildingManage/Edit/:buildingId',{controller: DormitoryBuildingManageEditCtrl, templateUrl: dorm.viewpath+'BuildingManageInfo.html'}).
            when('/BuildingManage/Add',{controller: DormitoryBuildingManageAddCtrl, templateUrl: dorm.viewpath+'BuildingManageInfo.html'}).
            when('/RoomManage',{controller: DormitoryRoomManageCtrl, templateUrl: dorm.viewpath+'RoomManage.html'}).
            when('/RoomManage/Edit/:roomId',{controller: DormitoryRoomManageEditCtrl, templateUrl: dorm.viewpath+'RoomManageInfo.html'}).
            when('/RoomManage/Add',{controller: DormitoryRoomManageAddCtrl, templateUrl: dorm.viewpath+'RoomManageInfo.html'}).
            otherwise({redirectTo:'/'});

    });