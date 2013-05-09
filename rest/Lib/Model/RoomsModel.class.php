<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Jun
 * Date: 13-5-9
 * Time: 下午8:24
 * To change this template use File | Settings | File Templates.
 */

class RoomsModel extends Model{
    protected $_auto = array (
        array('orientation','东', 3),
        array('toilet','内部', 3),
    );
    protected $_validate = array(
        array('orientation',array('东','西','南','北'),"值的范围不对！",2,'in'),
        array('toilet',array('内部','无','套间'),"值的范围不对！",2,'in'),
        array('bid','require','楼栋号必须！','1'),
        array('bid','checkIn','该楼栋不存在！',2,'function'),

    );
    protected function checkIn($data){
        $building = M('Buildings');
       if($building->find($data))
           return true;
        else return false;
    }

}