<div id="fh5co-single-content" class="container-fluid pb-4 pt-4 paddding">
    
    <div class="container paddding">
        <div class="row mx-0">
            <div class="col-md-8 animate-box" data-animate-effect="fadeInLeft">
                <?php $news = $data["newsDetail"]; ?>
                <div><img  class="col-md-12" src="images/<?php echo $news["newsImg"]; ?>" alt=""></div>
                <span><?php echo $news["newsDate"]; ?></span>
                <h1><?php echo $news["newsTitle"]; ?></h1>
                <p><?php echo $news["newsContent"]; ?></p>
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
                <?php foreach($data["4MostViewed"] as $fmv) { ?>
                <div class="row pb-3">
                    <div class="col-5 align-self-center">
                        <img src="images/<?php echo $fmv["newsImg"]; ?>" alt="img" class="fh5co_most_trading"/>
                    </div>
                    <div class="col-7 paddding">
                        <div class="most_fh5co_treding_font"><?php echo $fmv["newsTitle"]; ?></div>
                        <div class="most_fh5co_treding_font_123"><?php echo $fmv["newsDate"]; ?></div>
                    </div>
                </div>
                <?php } ?>
                
            </div>
        </div>
    </div>
</div>