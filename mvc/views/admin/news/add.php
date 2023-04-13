<div class="col-10 workspace-container">
            <div class="control">
                <a href="#"><i class="fa fa-arrow-left"></i></a>
            </div>
            <div class="workspace">
                <div class="title"><h2>Thêm bài viết</h2></div>
                <?php if(isset($_SESSION["success"])) { ?>
                    <div class="alert alert-success"><?php echo $_SESSION["success"]; ?></div>
                <?php }
                    unset($_SESSION["success"]);
                ?>
                <div class="d-flex justify-content-center">


                    <form action="../adminNews/addProcess" method="POST" class="row g-3" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Tiêu đề</label>
                            <input type="text" class="form-control" id="title" name="title">
                            <?php if(isset($_SESSION["error"]["title"])) { ?>
                                <div class="alert alert-danger"><?php echo $_SESSION["error"]["title"]; ?></div>
                            <?php }
                                unset($_SESSION["error"]["title"]);
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="desc">Mô tả</label>
                            <input type="text" class="form-control" id="desc" name="desc">
                            <?php if(isset($_SESSION["error"]["desc"])) { ?>
                                <div class="alert alert-danger"><?php echo $_SESSION["error"]["desc"]; ?></div>
                            <?php }
                                unset($_SESSION["error"]["desc"]);
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="cate[]">Thể loại</label>
                            <select multiple class="form-select" id="cate" name="cate[]" style="padding: 20px;">
                                <?php foreach($data["cate"] as $row) { ?>
                                <option value="<?php echo $row["categoryID"]; ?>"><?php echo $row["categoryName"]; ?></option>
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
                            <textarea class="form-control" id="content" rows="3" name="content"></textarea>
                            <?php if(isset($_SESSION["error"]["content"])) { ?>
                                <div class="alert alert-danger"><?php echo $_SESSION["error"]["content"]; ?></div>
                            <?php }
                                unset($_SESSION["error"]["content"]);
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Chọn 1 ảnh bìa</label>
                            <input class="form-control" type="file" id="img" name="img">
                            <?php if(isset($_SESSION["error"]["img"])) { ?>
                                <div class="alert alert-danger"><?php echo $_SESSION["error"]["img"]; ?></div>
                            <?php }
                                unset($_SESSION["error"]["img"]);
                            ?>
                        </div>
                        <div class="col-auto">
                                <button type="submit" class="btn btn-primary mb-3" name="addNewsBtn">Thêm</button>
                            </div>     
                    </form>


                    
                </div>
                
                
            </div>
            
        </div>