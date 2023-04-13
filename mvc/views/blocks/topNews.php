<div class="container-fluid paddding mb-5">
    <div class="row mx-0">
        <div class="col-md-6 col-12 paddding animate-box" data-animate-effect="fadeIn">
            <!-- <div class="fh5co_suceefh5co_height"><img src="../public/images/nick-karvounis-78711.jpg" alt="img"/> -->
            <?php
                $latestNews = $data["latestNews"];
            ?>
            <div class="fh5co_suceefh5co_height"><img src="images/<?php echo $latestNews["newsImg"]; ?>" alt="img"/>

                <div class="fh5co_suceefh5co_height_position_absolute"></div>
                <div class="fh5co_suceefh5co_height_position_absolute_font">
                    <div class="">
                        <a href="#" class="color_fff"> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;
                        <?php 
                            echo $latestNews["newsDate"];
                        ?>
                        </a>
                    </div>
                    <div class="">
                        <a href="../news/detail/<?php echo $latestNews["newsTitleSlug"]; ?>" class="fh5co_good_font">
                        <?php 
                            echo $latestNews["newsTitle"];
                        ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row">
                <?php
                    foreach ($data["4LatestNews"] as $fourLatestNews) {
                ?>
                <div class="col-md-6 col-6 paddding animate-box" data-animate-effect="fadeIn">
                    <div class="fh5co_suceefh5co_height_2"><img src="images/<?php echo $fourLatestNews["newsImg"]; ?>" alt="img"/>
                        <div class="fh5co_suceefh5co_height_position_absolute"></div>
                        <div class="fh5co_suceefh5co_height_position_absolute_font_2">
                            <div class="">
                                <a href="#" class="color_fff"> <i class="fa fa-clock-o"></i>&nbsp;&nbsp;
                                    <?php
                                        echo $fourLatestNews["newsDate"];
                                    ?>
                                </a>
                            </div>
                            <div class="">
                                <a href="../news/detail/<?php echo $fourLatestNews["newsTitleSlug"]; ?>" class="fh5co_good_font_2">
                                    <?php
                                        echo $fourLatestNews["newsTitle"];
                                    ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>