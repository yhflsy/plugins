<?php
/**
 * 51book机票
 * User: yhf
 * Date: 2018/6/6
 * Time: 9:52
 */
class Controller_Flight extends Controller {

    public function action_index(){
        @session_start();
        $user = Session::instance()->get('TRIPB2BCOM_USER');
        if(!$user){
            header("Location: passport.html");
            exit;
        }
        $this->response->body(View::factory('flight/index', array('user' => $user)));
    }
}