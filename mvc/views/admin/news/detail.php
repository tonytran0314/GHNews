<div class="col-10 workspace-container">
            <div class="control">
                <a href="#"><i class="fa fa-arrow-left"></i></a>
            </div>
            <div class="workspace">
                <div class="title"><h2>Chi tiết bài viết</h2></div>
                
                <div>
                    <?php $row = $data["news"]; ?>
                    <h1><?php echo $row["newsTitle"]; ?></h1>
                    <img src="images/<?php echo $row["newsImg"]; ?>" alt="">
                    <p>Ngày đăng: <?php echo $row["newsDate"]; ?></p>
                    <p>Lượt xem: <?php echo $row["newsView"]; ?></p>
                    <p><?php echo $row["newsDesc"]; ?></p>
                    <p><?php echo $row["newsContent"]; ?></p>
                </div>
                
            </div>
            
        </div>