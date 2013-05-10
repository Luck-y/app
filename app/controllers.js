/**
 * Created with JetBrains PhpStorm.
 * User: lab
 * Date: 13-4-27
 * Time: 上午11:21
 * To change this template use File | Settings | File Templates.
 */

function DropdownCtrl($scope) {

  $scope.navbar = [{
	  name: "宿舍分配", 
	  items: [
				{name: "宿舍分配", url: "#"},
				{name: "临时住宿", url: "#"}
			 ]
	  },
	  {
	  name: "宿舍信息", 
	  items: [
			  {name: "宿舍管理", url: "#"},
			  {name: "历史记录", url: "#"}
			 ]
	  },
	  {
	  name: "房屋信息", 
	  items: [
			 {name: "楼栋管理", url: "#/BuildingManage"},
			 {name: "房间管理", url: "#/RoomManage"},
			 {name: "其他参数", url: "#"}
			 ]
	  },
	  {
	  name: "学生信息",
	  items: [
			 {name:"学生管理", url: '#/StudentManage'},
			 {name:"临时学生", url: "#"},
			 {name:"权限分配", url: "#"}
			]
	  }];
}

function DistrubitonDormitoryCtrl(){

}

function DistributionTemporaryCtrl(){

}

function AccommodationManageCtrl(){

}

function AccommodationHistoryCtrl(){

}

function DormitoryBuildingManageCtrl($scope, $location, Buildings){
    $scope.dataSet = Buildings.query();

    $scope.delete = function(arg){
        Buildings.delete({id: arg}, function(){
            $location.path('/BuildingManage');
        });
    }
}
function DormitoryBuildingManageEditCtrl(){

}
function DormitoryBuildingManageAddCtrl(){

}
function DormitoryRoomManageCtrl($scope, $location, Rooms, Buildings){
    $scope.dataSet = Rooms.query();

    $scope.delete = function(arg){
        Rooms.delete({id: arg}, function(){
            $location.path('/RoomManage');
        });
    }
    $scope.obtainBuilding = function(bid){
        var b = new Buildings.get({id: bid},function(){
            return b.name;
        });
       /*
        var q = new Query({table: buildings});
        var result =  Query.search({},{id: bid},function(){
            return result[0].name;
        });
        */
    }
}
function DormitoryRoomManageEditCtrl(){

}
function DormitoryRoomManageAddCtrl(){

}
function DormitoryOtherCtrl(){

}

function StudentManageCtrl($scope, Students, $location){
    $scope.dataSet = Students.query();

    $scope.delete = function(arg){
       // var student = Students.get({id: arg});
        Students.delete({id: arg}, function(){
            $location.path('/StudentManage');
        });
    }
}
function StudentManageEditCtrl($scope, Students, $routeParams, $location){
    /* why ????
    var self = this;
    $scope.data = Students.get({id: $routeParams.studentId},function(data){
        self.original = data;
    });
    */
    //var self = this;
    Students.get({id: $routeParams.studentId}, function(data) {
        self.original = data;
        $scope.data = new Students(self.original);
    });
    $scope.isClean = function(){
        return angular.equals(self.original, $scope.data);
    }
    $scope.save = function() {
        $scope.data.$save(function() {
            $location.path('/StudentManage');
        });
    };
    $scope.reset = function(){
//        $scope.data = self.original;             // why?????
        $scope.data = new Students(self.original);
    }

}
function StudentManageAddCtrl($scope, Students, $location){
    original = {
        id: '',
        name: '',
        remark: '',
        class: '',
        type: '本科生',
        gender: '男',
        admission: '0000-00-00',
        graduation: '0000-00-00',
        status: '在校'
    }
    $scope.data = original;

    $scope.isClean = function(){
        return angular.equals( $scope.data, {
            id: '',
            name: '',
            remark: '',
            class: '',
            type: '本科生',
            gender: '男',
            admission: '0000-00-00',
            graduation: '0000-00-00',
            status: '在校'
        });
    }
    $scope.save = function(){
        Students.save({},$scope.data, function(){
            $location.path('/StudentManage');
        });
    }
    $scope.reset = function(){
       $scope.data = {
           id: '',
           name: '',
           remark: '',
           class: '',
           type: '本科生',
           gender: '男',
           admission: '0000-00-00',
           graduation: '0000-00-00',
           status: '在校'
       };
    }
}
function StudentTemporaryCtrl(){

}

function StudentAuthorityCtrl(){

}

