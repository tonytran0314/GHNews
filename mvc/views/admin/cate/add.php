<div class="col-10 workspace-container">
            <div class="control">
                <a href="#"><i class="fa fa-arrow-left"></i></a>
            </div>
            <div class="workspace">
                <div class="title"><h2>Thêm thể loại</h2></div>
                <div class="d-flex justify-content-center">
                    <form action="../adminCate/addProcess" method="POST" class="row g-3">
                        
                        <div class="col-auto">
                            <label for="cateName" class="visually-hidden">Thể loại</label>
                            <input type="text" class="form-control" name="cateName" id="cateName" placeholder="Thể loại mới">
                            <?php if(isset($_SESSION["error"])) { ?>

                                <div class="alert alert-danger"><?php echo $_SESSION["error"]["cateName"]; ?></div>
                            
                            <?php 
                                unset($_SESSION["error"]);
                                } 
                                else if (isset($_SESSION["success"])) {
                            ?>

                                <div class="alert alert-success"><?php echo $_SESSION["success"]; ?></div>
                            
                            <?php
                                unset($_SESSION["success"]);
                                }
                            ?>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3" name="addCateBtn">Thêm</button>
                        </div>
                        
                    </form>
                </div>
                
                
            </div>
            
        </div>