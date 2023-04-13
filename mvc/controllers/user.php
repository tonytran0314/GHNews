<?php
class User extends Helpers {
    public $userModel;

    public function __construct(){
        // load models
        session_start();
        $this->redirectIfNOTLoggedIn();
        $this->userModel = $this->getModel("UserModel");
    }

    // show profile
    public function index() {
        $this->getView("UserLayout", [
            "page" => "user"
        ]);
    }

    // show edit profile form
    public function edit() {
        $this->getView("UserLayout", [
            "page" => "editUser"
        ]);
    }

    // edit profile process
    public function editProcess() {

        $this->submitClickCheck($_POST["editProfileBtn"]);

            $userID = $_SESSION["userID"];
            $userName = $_POST["userName"];
            $fullname = $_POST["fullname"];
            $email = $_POST["email"];
            $gender = $_POST["gender"];
            $birthday = $_POST["birthday"];
            $address = $_POST["address"];

            $fileCover = $_FILES["newCover"];
            $coverName = ($fileCover["name"]) ? $fileCover["name"] : $_SESSION["userCover"];
            $coverTmpName = $fileCover["tmp_name"];
            $coverDestination = "./public/images/".$coverName;
            move_uploaded_file($coverTmpName, $coverDestination);


            $fileAvatar = $_FILES["newAvatar"];
            $avaName = ($fileAvatar["name"]) ? $fileAvatar["name"] : $_SESSION["userAvatar"];
            $avaTmpName = $fileAvatar["tmp_name"];
            $avaDestination = "./public/images/".$avaName;
            move_uploaded_file($avaTmpName, $avaDestination);


            $editResult = $this->userModel->editUser(
                $userID, 
                $userName, 
                $fullname, 
                $email, 
                $gender, 
                $birthday, 
                $address,
                $coverName,
                $avaName
            );

            if($editResult) {
                $_SESSION["userName"] = $userName;
                $_SESSION["fullname"] = $fullname;
                $_SESSION["email"] = $email;
                $_SESSION["gender"] = $gender;
                $_SESSION["address"] = $address;
                $_SESSION["birthday"] = $birthday;
                $_SESSION["userAvatar"] = $avaName;
                $_SESSION["userCover"] = $coverName;

                $_SESSION["message"] = "Cập nhật thông tin cá nhân THÀNH CÔNG!!!";
            } else {
                $_SESSION["message"] = "Cập nhật thông tin cá nhân THẤT BẠI :<" ;
            }

            header('location: ../user');

    }
}
?>