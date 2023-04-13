<?php
class Ajax extends Helpers {

    public $userModel;

    public function __construct() {
        session_start();
        $this->userModel = $this->getModel("UserModel");
    }

    // check if the username exists in the db before signing up
    public function checkUsername() {
        $username = $_POST["userName"];
        echo $this->userModel->checkUsername($username);
    }
}
?>