<?php
class Auth extends Helpers{

    public $userModel;

    public function __construct() {
        session_start();

        // middleware:
        $this->redirectIfLoggedIn();
        $this->userModel = $this->getModel("UserModel");
    }

    private function index() {
        echo "404 ERROR - NOT FOUND";
    }

    // ============================================ SHOW ============================================ //
    // show login form
    public function login() {
        $this->getView("Auth", [
            "page" => "login"
        ]);
    }

    // show sign up form
    public function signup() {
        $this->getView("Auth", [
            "page" => "signup"
        ]);
    }


    // ============================================ PROCESS ============================================ //
    // login process
    public function loginProcess() {
            $this->submitClickCheck($_POST["loginBtn"]);

            $validate = new Validation($_POST);
            $error = $validate->loginValidate();
    
            if(!empty($error)) {
                $_SESSION["error"] = $error;
                header('location: ../auth/login');
            } else {
                $username = $_POST["userName"];
                $password = $_POST["password"];
                
                $loginResult = json_decode($this->userModel->login($username), true);
                $hashPassword = $loginResult["userPassword"];

                if(password_verify($password, $hashPassword)) {
                    $_SESSION["userID"] = $loginResult["userID"];
                    $_SESSION["userName"] = $loginResult["userName"];
                    $_SESSION["fullname"] = $loginResult["fullname"];
                    $_SESSION["email"] = $loginResult["email"];
                    $_SESSION["gender"] = $loginResult["gender"];
                    $_SESSION["address"] = $loginResult["address"];
                    $_SESSION["birthday"] = $loginResult["birthday"];
                    $_SESSION["userAvatar"] = $loginResult["userAvatar"];
                    $_SESSION["userCover"] = $loginResult["userCover"];
                    $_SESSION["isAdmin"] = $loginResult["isAdmin"];
                    header('location: ../');
                } else {
                    $_SESSION["authFail"] = "Đăng nhập không thành công";
                    header('location: ../auth/login');
                }
            } 
    }

    // sign up process
    public function signupProcess() {  
            $this->submitClickCheck($_POST["signupBtn"]);

            $validate = new Validation($_POST);
            $error = $validate->signupValidate();
    
            if(!empty($error)) {
                $_SESSION["error"] = $error;
                header('location: ../auth/signup');
            } else {

                $username = $_POST["userName"];
                $fullname = $_POST["fullname"];
                $defaultCover = "camila-cordeiro-114636.jpg";
                $defaultAva = "clipart2572603.png";
                $password = $_POST["password"];
                
                    $password = password_hash($password, PASSWORD_DEFAULT);
                    $kq = $this->userModel->addUser($username, $fullname, $defaultCover, $defaultAva, $password);
                    if($kq) {
                        $_SESSION["authSuccess"] = "Đăng ký thành công";
                    } else {
                        $_SESSION["authFail"] = "Đăng ký thất bại";
                    }
                    header('location: ../auth/signup');
            } 
    }

    // logout process
    public function logout() {
        $this->userModel->logout();
        header('location: ../'); 
    }

}
?>