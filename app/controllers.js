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
			 {name: "楼栋管理", url: "#"},
			 {name: "房间管理", url: "#"},
			 {name: "其他参数", url: "#"}
			 ]
	  },
	  {
	  name: "学生信息",
	  items: [
			 {name:"学生管理", url: '#/StudentsManage'},
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

function DormitoryBuildingManageCtrl(){

}

function DormitoryRoomManageCtrl(){

}

function DormitoryOtherCtrl(){

}

function StudentManageCtrl($scope, Students, $location){
    $scope.dataSet = Students.query();

    $scope.delete = function(arg){
       // var student = Students.get({id: arg});
        Students.delete({id: arg}, function(){
            $location.path('/StudentsManage');
        });
    }
}
function StudentManageEditCtrl($scope, Students, $routeParams, $location){
    $scope.path = $location.path();
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
    $scope.test = self.original;
    $scope.isClean = function(){
        return angular.equals(self.original, $scope.data);
    }
    $scope.destroy = function() {
        self.original.destroy(function() {
            $location.path('/StudentsManage');
        });
    };
    $scope.save = function() {
        $scope.data.$save(function() {
            $location.path('/StudentsManage');
        });
    };
    $scope.reset = function(){
//        $scope.data = self.original;             // why?????
        $scope.data = new Students(self.original);
    }

}
function StudentManageAddCtrl($scope, Students, $location){
    $scope.add = function(){
        Students.save({},$scope.data, function(){
            $location.path('/StudentsManage');
        });
    }
    $scope.reset = function(){
        $scope.data.id='';
        $scope.data.name="";
        $scope.data.remark="";
        $scope.data.class="";
    }
}
function StudentTemporaryCtrl(){

}

function StudentAuthorityCtrl(){

}

