<div id="fh5co-single-content" class="container-fluid pb-4 pt-4 paddding">
    
    <div class="container paddding">
        <div class="profile-container">
            <h1 class="d-block text-center">Chỉnh sửa thông tin cá nhân</h1>
            <div class="user-information-container">
                <form action="../user/editProcess" method="POST" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <th>Tên tài khoản:</th>
                            <td>
                                <input 
                                    type="text" 
                                    value="<?php echo $_SESSION["userName"]; ?>"
                                    name="userName"
                                    class="form-control" disabled>
                            </td>
                        </tr>
                        <tr>
                            <th>Tên đầy đủ:</th>
                            <td>
                                <input 
                                    type="text" 
                                    value="<?php echo $_SESSION["fullname"]; ?>"
                                    name="fullname"
                                    class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>
                                <input 
                                    type="text" 
                                    value="<?php echo $_SESSION["email"]; ?>"
                                    name="email"
                                    class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <th>Giới tính:</th>
                            <td>
                                <input 
                                    type="text" 
                                    value="<?php echo $_SESSION["gender"]; ?>"
                                    name="gender"
                                    class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <th>Ngày sinh:</th>
                            <td>
                                <input 
                                    type="text" 
                                    value="<?php echo $_SESSION["birthday"]; ?>"
                                    name="birthday"
                                    class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <th>Địa chỉ:</th>
                            <td>
                                <input 
                                    type="text" 
                                    value="<?php echo $_SESSION["address"]; ?>"
                                    name="address"
                                    class="form-control">
                            </td>
                        </tr>
                        <tr>
                            <th>Ảnh bìa:</th>
                            <td>
                                <img class="cover" src="images/<?php echo $_SESSION["userCover"]; ?>" alt="cover">
                                <input type="file" name="newCover" id="newCover" class="form-control">
                            </td>
                        </tr><tr>
                            <th>Ảnh đại diện:</th>
                            <td>
                                <img class="avatar" src="images/<?php echo $_SESSION["userAvatar"]; ?>" alt="avatar">
                                <br/>
                                <input type="file" name="newAvatar" id="newAvatar" class="form-control">
                            </td>
                        </tr>
                    </table>
                    <button type="submit" name="editProfileBtn" class="btn btn-primary w-50">Lưu thay đổi</button>
                </form>
            </div>
        </div>
    </div>
</div>