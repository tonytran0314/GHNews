<div class="col-md-3 animate-box" data-animate-effect="fadeInRight">
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Thể loại</div>
                </div>
                <div class="clearfix"></div>
                <div class="fh5co_tags_all">
                    <?php
                        foreach($data["allCategory"] as $news) {
                    ?>
                    <a href="../news/category/<?php echo $news["categoryNameSlug"]; ?>" class="fh5co_tagg">
                    <?php
                        echo $news["categoryName"];
                    ?>
                    </a>
                    <?php } ?>
                </div>
                <div>
                    <div class="fh5co_heading fh5co_heading_border_bottom pt-3 py-2 mb-4">Thịnh hành</div>
                </div>
                <?php
                    foreach($data["4MostViewNews"] as $news) {
                ?>
                <div class="row pb-3">
                    <div class="col-5 align-self-center">
                        <img src="images/<?php echo $news["newsImg"]; ?>" alt="img" class="fh5co_most_trading"/>
                    </div>
                    <div class="col-7 paddding">
                        <div class="most_fh5co_treding_font">
                        <?php
                            echo $news["newsTitle"];
                        ?>
                        </div>
                        <div class="most_fh5co_treding_font_123">
                        <?php
                            echo $news["newsDate"];
                        ?></div>
                    </div>
                </div>
                <?php } ?>
            </div>