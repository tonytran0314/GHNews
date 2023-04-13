<div class="container-fluid pb-4 pt-5">
    <div class="container animate-box">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Tin tức</div>
        </div>
        <div class="owl-carousel owl-theme" id="slider2">
            <?php
                foreach($data["7LatestNews"] as $news) {
            ?>
            <div class="item px-2">
                <div class="fh5co_hover_news_img">
                    <div class="fh5co_news_img"><img src="images/<?php echo $news["newsImg"] ?>" alt=""/></div>
                    <div>
                        <a href="../news/detail/<?php echo $news["newsTitleSlug"]; ?>" class="d-block fh5co_small_post_heading"><span class="">
                        <?php
                            echo $news["newsTitle"];
                        ?>
                        </span></a>
                        <div class="c_g"><i class="fa fa-clock-o"></i>
                        <?php
                            echo $news["newsDate"];
                        ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>