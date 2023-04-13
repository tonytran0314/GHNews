<?php
class Home extends Helpers {

    public $newsModel;
    public $categoryModel;

    public function __construct(){

        session_start();

        // load models
        $this->newsModel = $this->getModel("NewsModel");
        $this->categoryModel = $this->getModel("CategoryModel");
    }

    public function index($page = 1) {
        // Load model and view in here

        // FROM NEWS MODEL
        $latestNews = json_decode($this->newsModel->getLatestNews(), true);
        $fourLatestNews = json_decode($this->newsModel->get4LatestNews(), true); // skip the LATEST news

        // trending
        $sixMostViewNews = json_decode($this->newsModel->get6MostViewed(), true);

        // news
        $sevenLatestNews = json_decode($this->newsModel->get7LatestNews(), true);

        // most popular
        $fourMostViewed = json_decode($this->newsModel->get4MostViewed(), true);

        $newsArr = json_decode($this->newsModel->getAllNews($page), true);
        $paginatedNews = $this->pagination($newsArr, $page);

        // FROM CATEGORY MODEL
        $allCategory = json_decode($this->categoryModel->getAllCategory(), true);


        // Load the view:
        $this->getView("MainLayout", [
            "page" => "home",
            "latestNews" => $latestNews,
            "4LatestNews" => $fourLatestNews,
            "6MostViewed" => $sixMostViewNews,
            "7LatestNews" => $sevenLatestNews,
            // ==============================
            "prevPage" => $paginatedNews["prev"],
            "totalPage" => $paginatedNews["totalPage"],
            "nextPage" => $paginatedNews["next"],
            // ==============================
            "allCategory" => $allCategory,
            "4MostViewNews" => $fourMostViewed,
            "newsArr" => $paginatedNews["news"]
        ]);
    }

}
?>