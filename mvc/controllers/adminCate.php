<?php
class adminCate extends Helpers {
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

    // show cates list
    public function index($page = 1) {

        $cate = json_decode($this->cateModel->getAllCategory($page),true);
        $paginatedCate = $this->pagination($cate, $page);

        $this->getView("Admin", [
            "page" => "cate/list",
            "prev" => $paginatedCate["prev"],
            "cate" => $paginatedCate["news"],
            "next" => $paginatedCate["next"],
            "totalPage" => $paginatedCate["totalPage"]
        ]);
    }

    // show add cate form
    public function add() {
        $this->getView("Admin", [
            "page" => "cate/add"
        ]);
    }

    // show edit cate form
    public function edit($cateSlug) {

        $category = json_decode($this->cateModel->getCategoryName($cateSlug), true);

        $this->getView("Admin", [
            "page" => "cate/edit",
            "slug" => $cateSlug,
            "category" => $category
        ]);
    }

    // ====================================== PROCESS: ====================================== // 

    // delete cate process
    public function delete() {

        $this->submitClickCheck($_POST["confirmDelCate"]);

        $cateID = $_POST["delete-cate-id"];
            
        // delete in category table:
        $cateTblResult = $this->cateModel->deleteInCateTbl($cateID);
        // delete in news_category table:
        $joinTblResult = $this->cateModel->deleteInJoinTbl($cateID);

        $_SESSION["message"] = ($cateTblResult && $joinTblResult) ? "Xóa thể loại thành công!!!" : "Xóa thể loại thất bại" ;
        header('location: ./');
    }

    // add cate process
    public function addProcess() {
        $this->submitClickCheck($_POST["addCateBtn"]);

        $validate = new Validation($_POST);
        $error = $validate->cateValidate();
        $success = "Thêm thể loại mới thành công";

        if(!empty($error)) {
            $_SESSION["error"] = $error;
            header('location: ../adminCate/add');
        } else {
            $cateName = $_POST["cateName"];
            $slug = $this->slugify($cateName);

            $result = $this->cateModel->addCate($cateName, $slug);

            $_SESSION["success"] = $success;
            header('location: ../adminCate/add');
        }
    }

    // edit cate process
    public function editProcess($oldSlug) {
        $this->submitClickCheck($_POST["editCateBtn"]);

        $validate = new Validation($_POST);
        $error = $validate->cateValidate();
        $success = "Cập nhật thể loại tin thành công!";

        if(!empty($error)) {
            $_SESSION["error"] = $error;
            header("location: ../edit/{$oldSlug}");
        } else {
            $cateName = $_POST["cateName"];
            $slug = $this->slugify($cateName);
            $id = $_POST["cateID"];
            
            $result = $this->cateModel->update($id, $cateName, $slug);

            $_SESSION["success"] = $success;
            header("location: ../edit/{$slug}");
        }
    }
}
?>