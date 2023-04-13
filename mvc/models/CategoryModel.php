<?php
class CategoryModel extends DB {

    public function getAllCategory() {
        $qr = "SELECT * FROM category";
        $rows = mysqli_query($this->conn,$qr);
        $result = array();
        while($row = mysqli_fetch_assoc($rows)) {
            $result[] = $row;
        }
        return json_encode($result);
    }

    public function getCateID($cateName) {
        $qr = " SELECT categoryID FROM category WHERE categoryName = '{$cateName}'";
        $rows = mysqli_query($this->conn,$qr);
        $result = mysqli_fetch_assoc($rows);
        return json_encode($result);
    }

    public function getCategoryName($categoryNameSlug) {
        $qr = "SELECT * FROM category WHERE categoryNameSlug = '{$categoryNameSlug}'";
        $rows = mysqli_query($this->conn,$qr);
        $result = mysqli_fetch_assoc($rows);
        return json_encode($result);
    }

    // ============================================ ADMIN ============================================ // 

    // ========== SHOW ========== //
    public function getSelectedCategory($newsID) {
        $qr = "
            SELECT c.*
            FROM news_category nc
            JOIN category c ON c.categoryID = nc.categoryID
            WHERE nc.newsID = '{$newsID}';
        ";
        $rows = mysqli_query($this->conn, $qr);
        $result = [];
        while($row = mysqli_fetch_assoc($rows)) {
            $result[] = $row;
        }
        return json_encode($result);
    }

    // public function adminGetAllCategory() {
    //     $qr = "
    //         SELECT category.categoryID, category.categoryName, COUNT(news_category.categoryID) AS numOfNews
    //         FROM category 
    //         JOIN news_category ON category.categoryID = news_category.categoryID
    //         GROUP BY categoryName
    //         ORDER BY categoryID ASC;
    //     ";
    //     $rows = mysqli_query($this->conn,$qr);
    //     $result = array();
    //     while($row = mysqli_fetch_assoc($rows)) {
    //         $result[] = $row;
    //     }
    //     return json_encode($result);
    // }   

    // ========== ADD ========== //
    public function addCate($cateName, $slug) {
        // return boolean
        $qr = "
            INSERT INTO category(categoryName, categoryNameSlug) 
            VALUES ('{$cateName}', '{$slug}')
        ";
        $result = mysqli_query($this->conn, $qr);
        return json_encode($result);   
    }

    public function addCateForNews($cateID, $newsID) {
        $qr = "
            INSERT INTO news_category (newsID, categoryID)
            VALUES ('{$newsID}', '{$cateID}')
        ";
        $result = mysqli_query($this->conn, $qr);
        return json_encode($result);
    }

    public function isSlugExist($slug) {
        // return boolean

        $qr = "SELECT categoryID FROM category WHERE categoryNameSlug = '{$slug}'";
        $row = mysqli_query($this->conn, $qr);
        $result = mysqli_num_rows($row);
        return json_encode($result);
    }

    // ========== DELETE ========== //

    public function deleteInCateTbl($cateID) {
        $qr = "
            DELETE FROM category
            WHERE categoryID = '{$cateID}'
        ";
        $result = mysqli_query($this->conn, $qr);
        return json_encode($result);
    }

    public function deleteInJoinTbl($cateID) {
        $qr = "
            DELETE FROM news_category
            WHERE categoryID = '{$cateID}'
        ";
        $result = mysqli_query($this->conn, $qr);
        return json_encode($result);
    }

    public function deleteInJoinTblByNewsID($newsID) {
        $qr = "
            DELETE FROM news_category
            WHERE newsID = '{$newsID}'
        ";
        $result = mysqli_query($this->conn, $qr);
        return json_encode($result);
    }


    // ========== UPDATE ========== //
    public function update($id, $name, $slug) {
        $qr = "
            UPDATE category
            SET categoryName = '{$name}', categoryNameSlug = '{$slug}'
            WHERE categoryID = '{$id}'
        ";
        $result = mysqli_query($this->conn, $qr);
        return json_encode($result);
    }

}
?>