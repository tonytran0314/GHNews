<?php
class NewsModel extends DB {

    // ============================================ SHOW ============================================ //

    public function getAllNews() {
        $qr = "
            SELECT * FROM news 
            WHERE isDeleted = '0'
            ORDER BY newsID DESC
        ";
        $rows = mysqli_query($this->conn,$qr);
        $result = array();
        while($row = mysqli_fetch_assoc($rows)) {
            $result[] = $row;
        }

        return json_encode($result);
    }  

    public function getNewsDetail($slug) {
        $qr = "
            SELECT * FROM news 
            WHERE newsTitleSlug = '{$slug}'
            AND isDeleted = '0'
        ";
        $rows = mysqli_query($this->conn,$qr);
        $result = mysqli_fetch_assoc($rows);
        return json_encode($result);
    }

    public function getNewsID($slug) {
        $qr = "
            SELECT newsID FROM news 
            WHERE newsTitleSlug = '{$slug}'
            AND isDeleted = '0'
        ";
        $rows = mysqli_query($this->conn,$qr);
        $result = mysqli_fetch_assoc($rows);
        return json_encode($result);
    }

    public function getLatestNews() {
        $qr = "SELECT * FROM news WHERE isDeleted = '0' LIMIT 1";
        $rows = mysqli_query($this->conn,$qr);
        $result = mysqli_fetch_assoc($rows);
        return json_encode($result);
    }

    public function get4LatestNews() {
        // This function will skip the most latest news (2th, 3th, 4th and 5th)
        $qr = "SELECT * FROM news WHERE isDeleted = '0' LIMIT 4 OFFSET 1";
        $rows = mysqli_query($this->conn,$qr);
        $result = array();
        while($row = mysqli_fetch_assoc($rows)) {
            $result[] = $row;
        }
        return json_encode($result);
    }

    public function get6MostViewed() {
        $qr = "SELECT * FROM news WHERE isDeleted = '0' ORDER BY newsView DESC LIMIT 6";
        $rows = mysqli_query($this->conn,$qr);
        $result = array();
        while($row = mysqli_fetch_assoc($rows)) {
            $result[] = $row;
        }
        return json_encode($result);
    }

    public function get7LatestNews() {
        $qr = "SELECT * FROM news WHERE isDeleted = '0' LIMIT 7";
        $rows = mysqli_query($this->conn,$qr);
        $result = array();
        while($row = mysqli_fetch_assoc($rows)) {
            $result[] = $row;
        }
        return json_encode($result);
    }

    public function get5LatestNews() {
        $qr = "SELECT * FROM news WHERE isDeleted = '0' LIMIT 5";
        $rows = mysqli_query($this->conn,$qr);
        $result = array();
        while($row = mysqli_fetch_assoc($rows)) {
            $result[] = $row;
        }
        return json_encode($result);
    }

    public function get4MostViewed() {
        $qr = "SELECT * FROM news WHERE isDeleted = '0' ORDER BY newsView DESC LIMIT 4";
        $rows = mysqli_query($this->conn,$qr);
        $result = array();
        while($row = mysqli_fetch_assoc($rows)) {
            $result[] = $row;
        }
        return json_encode($result);
    }

    public function getNewsByCategory($cateName, $page) {
        $qr = "
            SELECT n.newsTitle, n.newsTitleSlug, n.newsDesc, n.newsImg, n.newsDate, c.categoryName, c.categoryNameSlug
            FROM category c
            JOIN news_category nc ON c.categoryID = nc.categoryID
            JOIN news n ON n.newsID = nc.newsID
            WHERE c.categoryNameSlug = '{$cateName}'
            AND n.isDeleted = '0'
        ";
        $rows = mysqli_query($this->conn,$qr);
        $result = array();
        while($row = mysqli_fetch_assoc($rows)) {
            $result[] = $row;
        }
        return json_encode($result);
    }

    public function getNewsByKeyword($keyword, $page) {
        $qr = "
            SELECT * FROM news 
            WHERE newsTitle LIKE '%{$keyword}%'
            AND isDeleted = '0'
        ";
        $rows = mysqli_query($this->conn,$qr);
        $result = array();
        while($row = mysqli_fetch_assoc($rows)) {
            $result[] = $row;
        }
        return json_encode($result);
    }


    // ============================================ ADD ============================================ //

    
    public function addNews($title, $slug, $desc, $content, $image, $date) {
        $qr = "
            INSERT INTO news (newsTitle, newsTitleSlug, newsDesc, newsContent, newsImg, newsDate)
            VALUES ('{$title}', '{$slug}', '{$desc}', '{$content}', '{$image}', '{$date}')
        ";
        $result = mysqli_query($this->conn, $qr);
        return json_encode($result);
    }

    // ============================================ SOFT DELETE ============================================ //

    public function delete($newsID) {
        $qr = "
            UPDATE news
            SET isDeleted = '1'
            WHERE newsID = '{$newsID}'
        ";
        $result = mysqli_query($this->conn, $qr);
        return json_encode($result);
    }

    public function getDeletedNews() {
        $qr = "
            SELECT * FROM news
            WHERE isDeleted = '1'
        ";
        $rows = mysqli_query($this->conn, $qr);
        $result = array();
        while ($row = mysqli_fetch_assoc($rows)) {
            $result[] = $row;
        }
        return json_encode($result);
    }

    // ============================================ RESTORE ============================================ //
    public function restore($newsID) {
        $qr = "
            UPDATE news
            SET isDeleted = '0'
            WHERE newsID = '{$newsID}'
        ";
        $result = mysqli_query($this->conn, $qr);
        return json_encode($result);
    }

    // ============================================ PERMANENTLY DELETE ============================================ //
    // in news table
    public function permanentlyDelete($newsID) {
        $qr = "
            DELETE FROM news
            WHERE newsID = '{$newsID}'
        ";
        $result = mysqli_query($this->conn, $qr);
        return json_encode($result);
    }

    // in the join table
    public function deleteInJoinTbl($newsID) {
        $qr = "
            DELETE FROM news_category
            WHERE newsID = '{$newsID}'
        ";
        $result = mysqli_query($this->conn, $qr);
        return json_encode($result);
    }

    // ============================================ UPDATE ============================================ //
    public function updateInNewsTbl($id, $title, $slug, $desc, $content, $image) {
        $qr = "
            UPDATE news
            SET newsTitle = '{$title}', 
                newsTitleSlug = '{$slug}',
                newsDesc = '{$desc}', 
                newsContent = '{$content}',
                newsImg = '{$image}'
            WHERE newsID = '{$id}'
        ";
        $result = mysqli_query($this->conn, $qr);
        return json_encode($result);
    }

}
?>