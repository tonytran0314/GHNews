<div class="col-10 workspace-container">
    <div class="control">
        <a href="#"><i class="fa fa-arrow-left"></i></a>
    </div>
    <div class="workspace">
        <div class="title"><h2>Chỉnh sửa bài viết</h2></div>
                <?php if(isset($_SESSION["success"])) { ?>
                    <div class="alert alert-success"><?php echo $_SESSION["success"]; ?></div>
                <?php }
                    unset($_SESSION["success"]);
                ?>
        <div class="d-flex justify-content-center">
            <?php $row = $data["news"]; ?>
            <form action="../adminNews/editProcess/<?php echo $row["newsTitleSlug"]; ?>" method="POST" class="row g-3" enctype="multipart/form-data">
                
                <input type="hidden" value="<?php echo $row["newsID"]; ?>" name="id">
                <div class="form-group">
                    <label for="title">Tiêu đề</label>
                    <input 
                        type="text" class="form-control" id="title" name="title"
                        value="<?php echo $row["newsTitle"]; ?>">

                        <?php if(isset($_SESSION["error"]["title"])) { ?>
                                <div class="alert alert-danger"><?php echo $_SESSION["error"]["title"]; ?></div>
                            <?php }
                                unset($_SESSION["error"]["title"]);
                            ?>
                </div>
                <div class="form-group">
                    <label for="desc">Mô tả</label>
                    <input 
                        type="text" class="form-control" id="desc" name="desc"
                        value="<?php echo $row["newsDesc"]; ?>">

                        <?php if(isset($_SESSION["error"]["desc"])) { ?>
                                <div class="alert alert-danger"><?php echo $_SESSION["error"]["desc"]; ?></div>
                            <?php }
                                unset($_SESSION["error"]["desc"]);
                            ?>
                </div>
                <div class="form-group">
                    <label for="cate[]">Thể loại</label>
                    <select name="cate[]" id="cate" multiple>

                        <?php foreach($data["selectedCates"] as $selectedCates) { ?>
                        <option selected value="<?php echo $selectedCates["categoryID"] ?>"><?php echo $selectedCates["categoryName"]; ?></option>
                        <?php } ?>

                        <?php foreach($data["allCate"] as $allCate) { ?>
                        <option value="<?php echo $allCate["categoryID"] ?>"><?php echo $allCate["categoryName"]; ?></option>
                        <?php } ?>

                    </select>

                            <?php if(isset($_SESSION["error"]["cate"])) { ?>
                                <div class="alert alert-danger"><?php echo $_SESSION["error"]["cate"]; ?></div>
                            <?php }
                                unset($_SESSION["error"]["cate"]);
                            ?>
                </div>
                <div class="form-group">
                    <label for="content">Nội dung</label>
                    <textarea class="form-control" id="content" rows="3" name="content">
                        <?php echo $row["newsContent"]; ?>
                    </textarea>

                            <?php if(isset($_SESSION["error"]["content"])) { ?>
                                <div class="alert alert-danger"><?php echo $_SESSION["error"]["content"]; ?></div>
                            <?php }
                                unset($_SESSION["error"]["content"]);
                            ?>
                </div>
                <img src="images/<?php echo $row["newsImg"]; ?>">
                <input type="hidden" name="old-image" value="<?php echo $row["newsImg"]; ?>">
                <div class="mb-3">
                    <label for="image" class="form-label">Thay đổi ảnh bìa của tin tức:</label>
                    <input type="file" id="img" name="img" class="form-control">

                            <?php if(isset($_SESSION["error"]["img"])) { ?>
                                <div class="alert alert-danger"><?php echo $_SESSION["error"]["img"]; ?></div>
                            <?php }
                                unset($_SESSION["error"]["img"]);
                            ?>
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3" name="editNewsBtn">Lưu thay đổi</button>
                </div>     
            </form>
        </div>
    </div>
</div>