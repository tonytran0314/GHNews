<?php
class News extends Helpers {

    public $newsModel;
    public $categoryModel;
    public $commentModel;
    public $userModel;

    public function __construct(){
        // load models
        session_start();
        $this->newsModel = $this->getModel("NewsModel");
        $this->categoryModel = $this->getModel("CategoryModel");
        $this->commentModel = $this->getModel("CommentModel");
        $this->userModel = $this->getModel("UserModel");
    }

    function index() {
        echo "404 ERROR - NOT FOUND";
    }

    function detail($slug) {
        
        //FROM NEWS MODEL
        $newsDetail = json_decode($this->newsModel->getNewsDetail($slug), true);
        $fourMostViewed = json_decode($this->newsModel->get4MostViewed(), true);
        $sixMostViewed = json_decode($this->newsModel->get6MostViewed(), true);

        // FROM CATEGORY MODEL
        $category = json_decode($this->categoryModel->getAllCategory(), true);

        // FROM COMMENT MODEL
        $newsid = $newsDetail["newsID"];
        $comments = json_decode($this->commentModel->getComment($newsid), true);

        $this->getView("SubLayout", [
            "page" => "newsDetail",
            "newsDetail" => $newsDetail,
            "4MostViewed" => $fourMostViewed,
            "6MostViewed" => $sixMostViewed,
            "category" => $category,
            "comments" => $comments,
            "slug" => $slug
        ]);
    }

    function category($categoryName, $page = 1) {

        $fourMostViewed = json_decode($this->newsModel->get4MostViewed(), true);
        $sixMostViewed = json_decode($this->newsModel->get6MostViewed(), true);

        $newsByCategory = json_decode($this->newsModel->getNewsByCategory($categoryName, $page), true);
        $paginatedNews = $this->pagination($newsByCategory, $page);

        $category = json_decode($this->categoryModel->getAllCategory(), true);
        $oneCateName = json_decode($this->categoryModel->getCategoryName($categoryName), true);

        $this->getView("SubLayout", [
            "page" => "newsByCate",
            "4MostViewed" => $fourMostViewed,
            "6MostViewed" => $sixMostViewed,
            // =================================
            "prev" => $paginatedNews["prev"],
            "next" => $paginatedNews["next"],
            "newsByCategory" => $paginatedNews["news"],
            "totalPage" =>$paginatedNews["totalPage"],
            "thisPage" => $page,
            // =================================
            "category" => $category,
            "1CateName" => $oneCateName
        ]);
    }

    // show search result page
    public function search($keyword, $page = 1) {


        $fourMostViewed = json_decode($this->newsModel->get4MostViewed(), true);
        $sixMostViewed = json_decode($this->newsModel->get6MostViewed(), true);

        $newsByKeyword = json_decode($this->newsModel->getNewsByKeyword($keyword, $page), true);
        $paginatedNews = $this->pagination($newsByKeyword, $page);

        $category = json_decode($this->categoryModel->getAllCategory(), true);

        $this->getView("SubLayout", [
            "page" => "searchResult",
            "4MostViewed" => $fourMostViewed,
            "6MostViewed" => $sixMostViewed,
            // =================================
            "prev" => $paginatedNews["prev"],
            "next" => $paginatedNews["next"],
            "newsByKeyword" => $paginatedNews["news"],
            "totalPage" =>$paginatedNews["totalPage"],
            "thisPage" => $page,
            "keyword" => $keyword,
            // =================================
            "category" => $category
        ]);
    }

    public function searchProcess($keyword = null, $page = 1) {
            $this->submitClickCheck($_POST["keyword"]);
            $keyword = $_POST["keyword"];
            if(!empty($keyword)) {
                header("Location: search/{$keyword}");
            } else {
                header("location: ../");
            }
            
        
    }

}
?>