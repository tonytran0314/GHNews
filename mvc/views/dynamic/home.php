<div class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Tin tức</div>
                </div>
                <?php
                    foreach ($data["newsArr"] as $news) {
                ?>
                <div class="row pb-4">
                    <div class="col-md-5">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_news_img"><img src="images/<?php echo $news["newsImg"]; ?>" alt=""/></div>
                            <div></div>
                        </div>
                    </div>
                    <div class="col-md-7 animate-box">
                        <a href="../news/detail/<?php echo $news["newsTitleSlug"]; ?>" class="fh5co_magna py-2">
                        <?php
                            echo $news["newsTitle"];
                        ?>
                        </a> 
                        <a href="single.html" class="fh5co_mini_time py-3">
                        <?php
                            echo $news["newsDate"];
                        ?>
                        </a>
                        <div class="fh5co_consectetur">
                        <?php
                            echo $news["newsDesc"];
                        ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>

            <!-- CATEGORIES AND MOST POPULAR NEWS -->
            <?php require_once "./mvc/views/blocks/cateAndpopular.php"; ?>

            
        </div>
        <div class="row mx-0 animate-box" data-animate-effect="fadeInUp">
            <div class="col-12 text-center pb-4 pt-4">
                <a href="../home/page/<?php echo $data["prevPage"] ?>" class="btn_mange_pagging"><i class="fa fa-long-arrow-left"></i>&nbsp;&nbsp; Previous</a>

                <?php
                    $totalPage = $data["totalPage"];
                    for($currentPage = 1; $currentPage <= $totalPage; $currentPage++) {
                ?>
                <a href="../home/page/<?php echo $currentPage; ?>" class="btn_pagging"><?php echo $currentPage; ?></a>
                <?php } ?>

                <a href="../home/page/<?php echo $data["nextPage"] ?>" class="btn_mange_pagging">Next <i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp; </a>
             </div>
        </div>
    </div>
</div>

