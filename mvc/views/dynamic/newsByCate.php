<div class="container-fluid pb-4 pt-4 paddding">
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <div>
                    <?php 
                        $categoryName = $data["1CateName"]["categoryName"];
                        $categorySlug = $data["1CateName"]["categoryNameSlug"];
                    ?>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">
                        <?php echo $categoryName; ?>
                    </div>
                </div>
                <?php foreach($data["newsByCategory"] as $news) { ?>
                <div class="row pb-4">
                    <div class="col-md-5">
                        <div class="fh5co_hover_news_img">
                            <div class="fh5co_news_img"><img src="images/<?php echo $news["newsImg"]; ?>" alt=""/></div>
                            <div></div>
                        </div>
                    </div>
                    <div class="col-md-7 animate-box">
                        <a href="../news/detail/<?php echo $news["newsTitleSlug"]; ?>" class="fh5co_magna py-2">
                            <?php echo $news["newsTitle"]; ?>
                        </a>
                        <a href="#" class="fh5co_mini_time py-3">
                            <?php echo $news["newsDate"]; ?>
                        </a>
                        <div class="fh5co_consectetur">
                            <?php echo $news["newsDesc"]; ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
            <div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Tags</div>
                </div>
                <div class="clearfix"></div>
                <div class="fh5co_tags_all">
                    <?php foreach($data["category"] as $cate) { ?>
                    <a href="../news/category/<?php echo $cate["categoryNameSlug"]; ?>" class="fh5co_tagg"><?php echo $cate["categoryName"]; ?></a>
                    <?php } ?>
                </div>
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Most Popular</div>
                </div>
                <?php foreach($data["4MostViewed"] as $news) { ?>
                <div class="row pb-3">
                    <div class="col-5 align-self-center">
                        <img src="images/<?php echo $news["newsImg"]; ?>" alt="img" class="fh5co_most_trading"/>
                    </div>
                    <div class="col-7 paddding">
                        <div class="most_fh5co_treding_font"><?php echo $news["newsTitle"]; ?></div>
                        <div class="most_fh5co_treding_font_123"><?php echo $news["newsDate"]; ?></div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="row mx-0">
            <div class="col-12 text-center pb-4 pt-4">
                <a href="../news/category/<?php echo $categorySlug; ?>/<?php echo $data["thisPage"]-1; ?>" class="btn_mange_pagging"><i class="fa fa-long-arrow-left"></i>&nbsp;&nbsp; Previous</a>
                <?php 
                    $totalPage = $data["totalPage"];
                    for($currentPage = 1; $currentPage <= $totalPage; $currentPage++) { 
                ?>
                <a href="../news/category/<?php echo $categorySlug; ?>/<?php echo $currentPage; ?>" class="btn_pagging"><?php echo $currentPage; ?></a>
                <?php } ?>
                <a href="../news/category/<?php echo $categorySlug; ?>/<?php echo $data["thisPage"]+1; ?>" class="btn_mange_pagging">Next <i class="fa fa-long-arrow-right"></i>&nbsp;&nbsp; </a>
             </div>
        </div>
    </div>
</div>