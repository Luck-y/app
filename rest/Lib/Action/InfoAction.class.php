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
}
    ////////////////////////////////            students            ////////////////////////////////////
 /*   public function students()
{
    //Model


    $StudentModel = M('Students');

    $id = $this->_get('id');
    if($id){
        // Info/students/:id
        if($student = $StudentModel->find(id)){
            $this->response($student);
        }else{
            //not found
            $this->response(NULL,NULL,404);
        }
    }else{
        // Info/students/
        $total = $StudentModel->count('id');
        $data = $StudentModel->select();
        // return
        $this->response(array('total'=>$total,'data'=>$data));
    }
    */


/*
    public function students_post()
    {
        //Model
        $StudentModel = D('Students');

        //Create
        if($data = $StudentModel->create()){
            if($StudentModel->add()){
                //student id
                $id = $this->_post('id');
                $data = $StudentModel->find($id);
                $this->response($data,NULL,201);
            }else{
                $this->response(array('errmsg'=>$StudentModel->getDbError()),NULL,500);
            }
        }else{
            $this->response(array('errmsg'=>$StudentModel->getError()),NULL,500);
        }
    }

    public function students_put()
    {
        //Model
        $StudentModel = D('Students');

        //id
        $id = $this->_post('id');
        if($id && $data = $StudentModel->find($id)){
            if($StudentModel->create()){
                if($StudentModel->save()){
                    //student id
                    $id = $this->_post('id');
                    $data = $StudentModel->find($id);
                    $this->response($data,NULL,202);
                }else{
                    $this->response(array('errmsg'=>$StudentModel->getDbError()),NULL,500);
                }
            }else{
                //Error
                $this->response(array('errmsg'=>$StudentModel->getError()),NULL,500);
            }

        }else{
            // return
            $this->response(NULL,NULL,404);
        }
    }

    public function students_delete()
    {
        //Model
        $StudentModel = D('Students');

        //id
        $id = $this->_post('id');
        if($id && $data = $StudentModel->find($id)){
            $StudentModel->where(array('id'=>$id))->delete();
            $this->response(NULL,NULL,202);
        }else{
            // return
            $this->response(NULL,NULL,404);
        }
    }
/*
    ////////////////////////////////           buildings           ////////////////////////////////////
    public function buildings_get()
    {
        //Model
        $BuildingModel = D('Buildings');

        $id = $this->_get('id');
        if($id){
            // Info/buildings/:id
            if($building = $BuildingModel->find(id)){
                $this->response($building);
            }else{
                //not found
                $this->response(NULL,NULL,404);
            }
        }else{
            // Info/buildings/
            $total = $BuildingModel->count('id');
            $data = $BuildingModel->select();
            // return
            $this->response(array('total'=>$total,'data'=>$data));
        }
    }

    public function buildings_post()
    {
        //Model
        $BuildingModel = D("Buildings");

        //Create
        if($data = $BuildingModel->create()){
            if($BuildingModel->add()){
                //student id
                $id = $this->_post('id');
                $data = $BuildingModel->find($id);
                $this->response($data,NULL,201);
            }else{
                $this->response(array('errmsg'=>$BuildingModel->getDbError()),NULL,500);
            }
        }else{
            $this->response(array('errmsg'=>$BuildingModel->getError()),NULL,500);
        }
    }

    public function buildings_put()
    {
        //Model
        $BuildingModel = D('Buildings');

        //id
        $id = $this->_post('id');
        if($id && $data = $BuildingModel->find($id)){
            if($BuildingModel->create()){
                if($BuildingModel->save()){
                    //building id
                    $id = $this->_post('id');
                    $data = $BuildingModel->find($id);
                    $this->response($data,NULL,202);
                }else{
                    $this->response(array('errmsg'=>$BuildingModel->getDbError()),NULL,500);
                }
            }else{
                //Error
                $this->response(array('errmsg'=>$BuildingModel->getError()),NULL,500);
            }

        }else{
            // return
            $this->response(NULL,NULL,404);
        }
    }

    public function buildings_delete()
    {
        //Model
        $BuildingModel = D('Buildings');

        //id
        $id = $this->_post('id');
        if($id && $data = $BuildingModel->find($id)){
            $BuildingModel->where(array('id'=>$id))->delete();
            $this->response(NULL,NULL,202);
        }else{
            // return
            $this->response(NULL,NULL,404);
        }
    }

    ////////////////////////////////            rooms            ////////////////////////////////////

    public function rooms_get()
    {
        //Model
        $RoomModel = D('Rooms');

        $id = $this->_get('id');
        if($id){
            // Info/rooms/:id
            if($room = $RoomModel->find(id)){
                $this->response($room);
            }else{
                //not found
                $this->response(NULL,NULL,404);
            }
        }else{
            // Info/rooms/
            $total = $RoomModel->count('id');
            $data = $RoomModel->select();
            // return
            $this->response(array('total'=>$total,'data'=>$data));
        }
    }

    public function rooms_post()
    {
        //Model
        $RoomModel = D('Rooms');

        //Create
        if($data = $RoomModel->create()){
            if($RoomModel->add()){
                //room id
                $id = $this->_post('id');
                $data = $RoomModel->find($id);
                $this->response($data,NULL,201);
            }else{
                $this->response(array('errmsg'=>$RoomModel->getDbError()),NULL,500);
            }
        }else{
            $this->response(array('errmsg'=>$RoomModel->getError()),NULL,500);
        }
    }

    public function rooms_put()
    {
        //Model
        $RoomModel = D('Rooms');

        //id
        $id = $this->_post('id');
        if($id && $data = $RoomModel->find($id)){
            if($RoomModel->create()){
                if($RoomModel->save()){
                    //room id
                    $id = $this->_post('id');
                    $data = $RoomModel->find($id);
                    $this->response($data,NULL,202);
                }else{
                    $this->response(array('errmsg'=>$RoomModel->getDbError()),NULL,500);
                }
            }else{
                //Error
                $this->response(array('errmsg'=>$RoomModel->getError()),NULL,500);
            }

        }else{
            // return
            $this->response(NULL,NULL,404);
        }
    }

    public function rooms_delete()
    {
        //Model
        $RoomModel = D('Rooms');

        //id
        $id = $this->_post('id');
        if($id && $data = $RoomModel->find($id)){
            $RoomModel->where(array('id'=>$id))->delete();
            $this->response(NULL,NULL,202);
        }else{
            // return
            $this->response(NULL,NULL,404);
        }
    }
*/
