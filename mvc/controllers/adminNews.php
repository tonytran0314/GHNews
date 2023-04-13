<?php
class adminNews extends Helpers{

    public $newsModel;
    public $cateModel;
    public $userModel;

    public function __construct() {

        session_start();

        // middleware:  
        $this->adminCheck();

        // construct:
        $this->newsModel = $this->getModel("NewsModel");
        $this->cateModel = $this->getModel("CategoryModel");
        $this->userModel = $this->getModel("UserModel");

    }

    // ====================================== SHOW: ====================================== // 
    
    // show news list
    public function index($page = 1) {

        $allNews = json_decode($this->newsModel->getAllNews(),true);
        $paginatedNews = $this->pagination($allNews, $page);

        $this->getView("Admin", [
            "page" => "news/list",
            "prev" => $paginatedNews["prev"],
            "news" => $paginatedNews["news"],
            "next" => $paginatedNews["next"],
            "totalPage" => $paginatedNews["totalPage"]
        ]);
    }

    // show deleted news
    public function deleted($page = 1) {
        $allDeletedNews = json_decode($this->newsModel->getDeletedNews(), true);
        $paginatedNews = $this->pagination($allDeletedNews, $page);

        $this->getView("Admin", [
            "page" => "news/deleted",
            "prev" => $paginatedNews["prev"],
            "news" => $paginatedNews["news"],
            "next" => $paginatedNews["next"],
            "totalPage" => $paginatedNews["totalPage"]
        ]);
    }

    // show news detail
    public function detail($slug) {

        $newsDetail = json_decode($this->newsModel->getNewsDetail($slug),true);

        $this->getView("Admin", [
            "page" => "news/detail",
            "news" => $newsDetail
        ]);
    }

    // show add news form
    public function add() {

        $cate = json_decode($this->cateModel->getAllCategory(), true);

        $this->getView("Admin", [
            "page" => "news/add",
            "cate" => $cate
        ]);
    }

    // show edit news form
    public function edit($slug) {

        // get news detail
        $news = json_decode($this->newsModel->getNewsDetail($slug), true);

        // get news id
        $newsIDResult = json_decode($this->newsModel->getNewsID($slug), true);
        $newsID = $newsIDResult["newsID"];

        // get selected categories
        $selectedCates = json_decode($this->cateModel->getSelectedCategory($newsID), true);

        // get selected cate id
        $selectedCateIDs = [];
        foreach($selectedCates as $selectedCate) {
            $selectedCateIDs[] = $selectedCate["categoryID"];
        }

        $cates = json_decode($this->cateModel->getAllCategory(), true);
        
        foreach($selectedCateIDs as $selectedIndex => $selectedCateID) {
            foreach($cates as $cateIndex => $cate) {
                if($selectedCateID == $cate["categoryID"]) {
                    unset($cates[$cateIndex]);
                }
            }
        }


        $this->getView("Admin", [
            "page" => "news/edit",
            "news" => $news,
            "selectedCates" => $selectedCates,
            "allCate" => $cates
        ]);
    }


    // ====================================== PROCESS: ====================================== // 

    // add news process
    public function addProcess() {
            $this->submitClickCheck($_POST["addNewsBtn"]);

            $validate = new Validation($_POST,$_FILES["img"]);
            $error = $validate->newsValidate();
            $success = "Thêm bài viết mới thành công";

            if(!empty($error)) {
                $_SESSION["error"] = $error;
                header('location: ../adminNews/add');
            } else {
                
                $title = $_POST["title"];
                $slug = $this->slugify($title);
                $desc = $_POST["desc"];
                $content = $_POST["content"];
                $date = date("Y-m-d");
                $categoryIDs = $_POST["cate"];

                
                $file = $_FILES["img"];
                    $baseName = $file["name"];
                    $newBaseName = $this->newFileNameGenerator($baseName);
                    $fileTmpName = $file["tmp_name"];
                    $fileDestination = "./public/images/".$newBaseName;
                    // move img to server
                    move_uploaded_file($fileTmpName, $fileDestination);

                //add news
                $newsResult = json_decode($this->newsModel->addNews($title, $slug, $desc, $content, $newBaseName, $date), true);


                // add category for the news just added
                $newsID = json_decode($this->newsModel->getNewsID($slug), true);
                $cateResult = true;

                foreach($categoryIDs as $categoryID) {
                    $addCateResult = json_decode($this->cateModel->addCateForNews($categoryID, $newsID["newsID"]), true);
                    if(!$addCateResult) {
                        $cateResult = false;
                    }
                }

                $_SESSION["success"] = $success;
                header('location: ../adminNews/add');
            }
            
    }

    // edit news process
    public function editProcess($oldSlug) {
            $this->submitClickCheck($_POST["editNewsBtn"]);

            $validate = new Validation($_POST,$_FILES["img"]);
            $error = $validate->newsValidate();
            $success = "Cập nhật bài viết mới thành công";

            if(!empty($error)) {
                $_SESSION["error"] = $error;
                header("location: ../edit/{$oldSlug}");
            } else {
                
                $newsID = $_POST["id"];
                $title = $_POST["title"];
                $slug = $this->slugify($title);
                $desc = $_POST["desc"];
                $content = $_POST["content"];
                $date = date("Y-m-d");
                $cateIDs = $_POST["cate"];

                $file = $_FILES["img"];
                $baseName = $file["name"];
                if(!empty($baseName)) {
                    $newBaseName = $this->newFileNameGenerator($baseName);
                    $fileTmpName = $file["tmp_name"];
                    $fileDestination = "./public/images/".$newBaseName;
                    // move img to server
                    move_uploaded_file($fileTmpName, $fileDestination);
                } else {
                    $newBaseName = $_POST["old-image"];
                }


                // edit news
                $editResult = $this->newsModel->updateInNewsTbl($newsID, $title, $slug, $desc , $content, $newBaseName);

                // edit categories
                $cateResult = true;
                $this->cateModel->deleteInJoinTblByNewsID($newsID);
                foreach($cateIDs as $cateID) {
                    $addCateResult = json_decode($this->cateModel->addCateForNews($cateID, $newsID), true);
                    if(!$addCateResult) {
                        $cateResult = false;
                    }
                }

                $_SESSION["success"] = $success;
                header("location: ../edit/{$slug}");
            }
    }

    // restore news process
    public function restore() {
            $this->submitClickCheck($_POST["restore-id"]);
            $restoreResult = $this->newsModel->restore($_POST["restore-id"]);

            $_SESSION["message"] = ($restoreResult) ? "Khôi phục bài viết thành công!!!" : "Khôi phục bài viết thất bại" ;
            header('location: ./deleted');
    }   

    // delete news process
    public function delete() {
            $this->submitClickCheck($_POST["confirmDelNews"]);
            $newsID = $_POST["delete-news-id"];

            $deleteResult = $this->newsModel->delete($newsID);

            $_SESSION["message"] = ($deleteResult) ? "Xóa bài viết thành công!!!" : "Xóa bài viết thất bại" ;
            header('location: ./');
    }

    // permanently delete process
    public function permanentlyDelete() {
            $this->submitClickCheck($_POST["confirmPermDelNews"]);
            $newsID = $_POST["perm-delete-news-id"];

            $permDeleteResult = $this->newsModel->permanentlyDelete($newsID);
            $deleteInJoinTblResult = $this->newsModel->deleteInJoinTbl($newsID);

            $_SESSION["message"] = ($permDeleteResult && $deleteInJoinTblResult) ? "Đã xóa bài viết vĩnh viễn!!!" : "Xóa bài viết thất bại" ;
            header('location: ./deleted');
    }

}
?>