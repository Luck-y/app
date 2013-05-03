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
			 {name:"学生管理", url: '#/Students'},
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

function StudentManageCtrl($scope, Students){
    //$scope.data = Students.query();
    //var data = Students.get({key: 'id',value: "5090729022"});
    //Students.delete({key: 'id',value: "5090729013"})
    //$scope.item =data;
    $scope.data = Students.query();

}

function StudentTemporaryCtrl(){

}

function StudentAuthorityCtrl(){

}

