<div class="container-fluid pt-3">
    <div class="container animate-box" data-animate-effect="fadeIn">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Xu hướng</div>
        </div>
        <div class="owl-carousel owl-theme js" id="slider1">
            <?php
                foreach($data["6MostViewed"] as $smv) {
            ?>
            <div class="item px-2">
                <div class="fh5co_latest_trading_img_position_relative">
                    <div class="fh5co_latest_trading_img"><img src="images/<?php echo $smv["newsImg"]; ?>" alt=""
                                                           class="fh5co_img_special_relative"/></div>
                    <div class="fh5co_latest_trading_img_position_absolute"></div>
                    <div class="fh5co_latest_trading_img_position_absolute_1">
                        <a href="../news/detail/<?php echo $smv["newsTitleSlug"]; ?>" class="text-white">
                            <?php
                                echo $smv["newsTitle"];
                            ?>
                        </a>
                        <div class="fh5co_latest_trading_date_and_name_color">
                            <?php
                                echo $smv["newsDate"];
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>