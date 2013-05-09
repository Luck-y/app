<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Jun
 * Date: 13-5-9
 * Time: 下午8:23
 * To change this template use File | Settings | File Templates.
 */

class StudentsModel extends Model {

    protected $_validate = array(
        array('gender',array('男','女','不限'),"值的范围不对！",2,'in'),
        array('type',array('本科生','研究生','临时'),"值的范围不对！",2,'in'),
        array('status',array('在校','离校'),"值的范围不对！",2,'in'),
    );

    protected $_auto = array(
        array('gender','男', 3),
        array('type','本科生', 3),
        array('status','在校', 3),

    );
}