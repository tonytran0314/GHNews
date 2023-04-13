<?php
class Helpers {
    function getModel($model) {
        require_once "./mvc/models/". $model .".php";
        return new $model;
    }

    function getView($view, $data = []) {
        require_once "./mvc/views/".$view.".php";
    }

    protected function adminCheck() {
        if(!isset($_SESSION["isAdmin"]) || $_SESSION["isAdmin"] == 0) {
            header('location: ./');
        }
    }

    protected function redirectIfLoggedIn() {
        // if client logged in, login+process and signup+process wont be executed
        if(isset($_SESSION["userID"])) {
            header('location: ../');
        }
    }

    protected function redirectIfNOTLoggedIn() {
        if( !isset($_SESSION["userID"]) ) {
            header('location: ./');
        }
    }

    protected function submitClickCheck($postBtn) {
        if(!isset($postBtn)) {
            header('location: ../');
        }
    }

    public function newFileNameGenerator($basename) {
        $fileName = pathinfo($basename, PATHINFO_FILENAME);
        $ext = pathinfo($basename, PATHINFO_EXTENSION);

        $this->strProcess($fileName);
        $newName = $fileName . "." .$ext;

        $this->fileExistCheck($fileName, $newName);
        $finalBaseName = $fileName . "." .$ext;

        return $finalBaseName;
    }

    public function fileExistCheck(&$fileName, $baseName) {

        $validSlug = false;
        do {
            $divider = '-';
            if(file_exists("./public/images/".$baseName)) {
                $fileName .= $divider . rand(1,999999);
            } else {
                $validSlug = true;
            }
        }
        while ($validSlug = false);

    }
    
    function pagination($arr, $page) {

        $newsPerPage = 3;
        $startIndex = $newsPerPage * ($page - 1);

        $totalNews = count($arr);
        $totalPage = ceil($totalNews / $newsPerPage);

        $resultArr = [];

        $resultArr["totalPage"] = $totalPage;
        $resultArr["prev"] = $page - 1;
        $resultArr["news"] = array_slice($arr, $startIndex, $newsPerPage);
        $resultArr["next"] = $page + 1;

        return $resultArr;

    }

    public function slugify($string, $divider = '-') {
        $this->strProcess($string);
        $this->strCheck($string);
        return $string;
    }

    public function strProcess(&$string) {
        $search = array(
            '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
            '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
            '#(ì|í|ị|ỉ|ĩ)#',
            '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
            '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
            '#(ỳ|ý|ỵ|ỷ|ỹ)#',
            '#(đ)#',
            '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
            '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
            '#(Ì|Í|Ị|Ỉ|Ĩ)#',
            '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
            '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
            '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
            '#(Đ)#',
            "/[^a-zA-Z0-9\-\_]/",
        );
        $replace = array(
            'a',
            'e',
            'i',
            'o',
            'u',
            'y',
            'd',
            'A',
            'E',
            'I',
            'O',
            'U',
            'Y',
            'D',
            '-',
        );
        $string = trim($string);
        $string = preg_replace($search, $replace, $string);
        $string = preg_replace('/(-)+/', '-', $string);
        $string = strtolower($string);
    }

    public function strCheck(&$string) {
        $validSlug = false;
        do {
            $this->getModel("CategoryModel");
            $cateModel = new CategoryModel;
            $slugExist = $cateModel->isSlugExist($string);
            
            $divider = '-';
            if($slugExist) {
                $string .= $divider . rand(1,999999);
            } else {
                $validSlug = true;
            }
        }
        while ($validSlug = false);
    }
}
?>