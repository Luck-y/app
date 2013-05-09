<?php
/**
 * Created by JetBrains PhpStorm.
 * User: chengs
 * Date: 13-4-5
 * Time: 下午1:52
 * To change this template use File | Settings | File Templates.
 */

class InfoAction extends Action
{
//students module
    //READ
    function Students_get() {

        $model = M('Students');
        if ($id = $this->_get('id')) {
            $data = $model->find($id);
            if ($data) {
                $this->response($data);
            } else {
                //NOT FOUND
                $this->response(NULL, NULL, 404);
            }
        } else {
            $data = $model->select();
            $this->response($data);
        }

    }

    function Students_post(){
        $info = file_get_contents('php://input');
        $data = json_decode($info);

        $model = M('Students');
        if(isset($data->id)){
            $id =$data->id;
        }
        else $id = NULL;
        if($model->find($id)){
            $this->Students_post_edit($data);
        }else{
            $this->Students_post_add($data);
        }

    }
    //CREATE
    function Students_post_add($data){
        $model = M('Students');
        if ($model->create($data)) {
            if ($id = $model->add()) {
                $this->response($model->find($id), 'json', 201);
            } else {
                $this->response($model->getDbError(), 'json', 500);
            }
        } else {
            $this->response($model->getError(), 'json', 500);
        }
    }

    //UPDATE
    function Students_post_edit($data){
        $model = M('Students');
        if ($model->create($data)) {
            if ($id = $model->save()) {
                $this->response($model->find($id), 'json', 202);
            } else {
                $this->response($model->getDbError(), 'json', 500);
            }
        } else {
            $this->response($model->getError(), 'json', 500);
        }
    }
    //DELETE
    function Students_delete(){
        $model = M('Students');
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        else $id = NULL;
        if ( $model->find($id)) {
            $model->where(array('id' => "$id"))->delete();
            $this->response('Success', NULL, 202);
        } else {
            //NOT FOUND
            $this->response(NULL, NULL, 404);
        }
    }
//buildings module
////READ
//we can get the responsible data by name or id
    function Buildings_get() {

        $model = M('Buildings');
        if ($id = $this->_get('id')) {
            $data = $model->find($id);
            if ($data) {
                $this->response($data);
            } else {
                //NOT FOUND
                $this->response(NULL, NULL, 404);
            }
        }
        else if($name=$this->_get('name')){
            $data = $model->where(array("name"=>$name))->select();
            if($data){
                $this->response($data);
            }else{
                $this->response(NULL,NULL,404);
            }
        }
        else  {
            $data = $model->select();
            $this->response($data);
        }
    }

    function Buildings_post(){
        $info = file_get_contents('php://input');
        $data = json_decode($info);
        $model = M('Buildings');
        if(isset($data->id)){
            $id =$data->id;
        }
        else $id = -1;

        if($model->find($id)){
            $this->Buildings_post_edit($data);
        }
        else{
            $this->Buildings_post_add($data);
        }


    }
    //CREATE
    function Buildings_post_add($data){
        $model = M('Buildings');
        if ($model->create($data)) {
            if ($id = $model->add()) {
                $this->response($model->find($id), 'json', 201);
            } else {
                $this->response($model->getDbError(), 'json', 500);
            }
        } else {
            $this->response($model->getError(), 'json', 500);
        }
    }

    //UPDATE
    function Buildings_post_edit($data){
        $model = M('Buildings');
        if ($model->create($data)) {
            if ($id = $model->save()) {
                $this->response($model->find($id), 'json', 202);
            } else {
                $this->response($model->getDbError(), 'json', 500);
            }
        } else {
            $this->response($model->getError(), 'json', 500);
        }
    }
    //REMOVE
    function Buildings_delete(){
        $model = M('Buildings');
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        else $id = -1;
        if ( $model->find($id)) {
            $model->where(array('id' => "$id"))->delete();
            $this->response('Success', NULL, 202);
        }
        else {
            //NOT FOUND
            $this->response(NULL, NULL, 404);
        }
    }


//rooms module
//READ
    function Rooms_get() {

        $model = M('Rooms');
        if ($id = $this->_get('id')) {
            $data = $model->find($id);
            if ($data) {
                $this->response($data);
            } else {
                //NOT FOUND
                $this->response(NULL, NULL, 404);
            }
        } else {
            $data = $model->select();
            $this->response($data);
        }
    }


    function Rooms_post(){
        $info = file_get_contents('php://input');
        $data = json_decode($info);

        $model = M('Rooms');
        if(isset($data->id)){
            $id =$data->id;
        }
        else $id = -1;
        if($model->find($id)){
            $this->Students_post_edit($data);
        }else{
            $this->Students_post_add($data);
        }

    }
 //CREATE
    function Rooms_post_add($data){
        $model = M('Rooms');
        if ($model->create($data)) {
            if ($id = $model->add()) {
                $this->response($model->find($id), 'json', 201);
            } else {
                $this->response($model->getDbError(), 'json', 500);
            }
        } else {
            $this->response($model->getError(), 'json', 500);
        }
    }

//UPDATE
    function Rooms_post_edit($data){
        $model = M('Rooms');
        if ($model->create($data)) {
            if ($id = $model->save()) {
                $this->response($model->find($id), 'json', 202);
            } else {
                $this->response($model->getDbError(), 'json', 500);
            }
        } else {
            $this->response($model->getError(), 'json', 500);
        }
    }
//DELETE
    function Rooms_delete(){
        $model = M('Rooms');
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        else $id = -1;
        if ( $model->find($id)) {
            $model->where(array('id' => "$id"))->delete();
            $this->response('Success', NULL, 202);
        } else {
            //NOT FOUND
            $this->response(NULL, NULL, 404);
        }
    }
}
