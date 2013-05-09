<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Jun
 * Date: 13-5-9
 * Time: 下午10:53
 * To change this template use File | Settings | File Templates.
 */
class QueryAction extends Action {
    //query function for looking for some special data, and the return is an array
    function Students_post(){
        $info = file_get_contents('php://input');
        $data = json_decode($info);
        $model = M('Students');
        $res = $model->where($data)->select();
        $this->response($res);
    }
    function Buildings_post(){
        $info = file_get_contents('php://input');
        $data = json_decode($info);
        $model = M('Buildings');
        $res = $model->where($data)->select();
        $this->response($res);
    }
    function Rooms_post(){
        $info = file_get_contents('php://input');
        $data = json_decode($info);
        $model = M('Rooms');
        $res = $model->where($data)->select();
        $this->response($res);
    }
}