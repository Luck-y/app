<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Jun
 * Date: 13-5-9
 * Time: 下午8:24
 * To change this template use File | Settings | File Templates.
 */

class BuildingsModel extends Model{
    protected $_auto = array (
        array('zone','闵行', 3),
        array('gender','男', 3),
    );
    protected $_validate = array(
        array('zone',array('闵行','徐汇'),"值的范围不对！",2,'in'),
        array('gender',array('男','女','不限'),"值的范围不对！",2,'in'),

    );

}