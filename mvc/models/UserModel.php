<?php
class UserModel extends DB {

    public function addUser($username, $fname, $cover, $ava, $password) {
        $qr = "
            INSERT INTO user (userName, fullname, userCover, userAvatar, userPassword)
            VALUES ('{$username}', '{$fname}', '{$cover}', '{$ava}', '{$password}');
        ";
        $result = false;
        if(mysqli_query($this->conn, $qr)) {
            $result = true;
        }
        return json_encode($result);
    }

    public function editUser($userID, $userName, $fullname, $email, $gender, $birthday, $address, $cover, $avatar) {
        $qr = "
            UPDATE user
            SET userName = '{$userName}',
                fullname = '{$fullname}',
                email = '{$email}',
                gender = '{$gender}',
                birthday = '{$birthday}',
                address = '{$address}',
                userCover = '{$cover}',
                userAvatar = '{$avatar}'
            WHERE userID = '{$userID}'
        ";
        $result = mysqli_query($this->conn, $qr);
        return json_encode($result);
    }

    // AJAX
    public function checkUsername($username) {
        $qr = "SELECT userID FROM user WHERE userName = '{$username}'";
        $rows = mysqli_query($this->conn, $qr);
        $result = false;
        if (mysqli_num_rows($rows) == 1) {
            $result = true;
        } 
        return json_encode($result);
    }

    public function login($username) {
        $qr = "
            SELECT * FROM user
            WHERE userName = '{$username}'
        ";
        $row = mysqli_query($this->conn, $qr);
        $result = mysqli_fetch_assoc($row);
        return json_encode($result);
    }

    // public function getAvatar($userID) {
    //     $qr = "SELECT userAvatar FROM user WHERE userID = '{$userID}'";
    //     $row = mysqli_query($this->conn, $qr);
    //     $result = mysqli_fetch_assoc($row);
    //     return json_encode($result);
    // }

    public function logout() {
        session_destroy();
    }
}
?>