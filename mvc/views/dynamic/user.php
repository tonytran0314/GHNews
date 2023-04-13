<div id="fh5co-single-content" class="container-fluid pb-4 pt-4 paddding">
    
    <div class="container paddding">
        <div class="row mx-0 profile-container">
            <div class="user-cover-img">
                <img src="images/<?php echo $_SESSION["userCover"]; ?>" alt="">
            </div>
            <div class="user-avatar-img">
                <img src="images/<?php echo $_SESSION["userAvatar"]; ?>" alt="">
            </div>
            <div class="user-information-container">
                <h2>Thông tin người dùng</h2>
                <a href="../user/edit" class="btn btn-primary">Sửa thông tin cá nhân</a>
                <?php if(isset($_SESSION["message"])) { ?>
                    <p><?php echo $_SESSION["message"]; ?></p>
                <?php 
                    }
                    unset($_SESSION["message"]);
                ?>
                <table>
                    <tr>
                        <th>Tên tài khoản:</th>
                        <td><?php echo $_SESSION["userName"]; ?></td>
                    </tr>
                    <tr>
                        <th>Tên đầy đủ:</th>
                        <td><?php echo $_SESSION["fullname"]; ?></td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td><?php echo $_SESSION["email"]; ?></td>
                    </tr>
                    <tr>
                        <th>Giới tính:</th>
                        <td><?php echo $_SESSION["gender"]; ?></td>
                    </tr>
                    <tr>
                        <th>Ngày sinh:</th>
                        <td><?php echo $_SESSION["birthday"]; ?></td>
                    </tr>
                    <tr>
                        <th>Địa chỉ:</th>
                        <td><?php echo $_SESSION["address"]; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>