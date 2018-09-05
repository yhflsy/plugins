<?php
/**
 * Created by PhpStorm.
 * User: xszs1
 * Date: 2017/5/23
 * Time: 16:53
 */
class Controller_Eboly extends Controller {

    public function action_index(){
        @session_start();
        $user = Session::instance()->get('TRIPB2BCOM_USER');
        if(!$user){
            header("Location: passport.html");
            exit;
        }
        $this->response->body(View::factory('eboly/index', array('user' => $user)));
    }
}