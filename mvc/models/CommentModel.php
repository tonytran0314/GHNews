<?php
class CommentModel extends DB {

    // show comments query
    public function getComment($newsid) {
        $qr = "
            SELECT n.newsID, n.newsTitleSlug, u.userName, u.fullname, u.userAvatar, c.*
            FROM news n
            JOIN comment c ON n.newsID = c.newsID
            JOIN user u ON u.userID = c.userID
            WHERE c.newsID = '{$newsid}'
            AND c.isDeleted = 0
            ORDER BY commentID DESC;
        ";
        $rows = mysqli_query($this->conn, $qr);
        $result = [];
        while ($row = mysqli_fetch_assoc($rows)) {
            $result[] = $row;
        }
        return json_encode($result);
    }

    // add comment query
    public function addComment($content, $uid, $nid) {
        $qr = "
            INSERT INTO comment (commentContent, userID, newsID)
            VALUES ('{$content}', '{$uid}', '{$nid}')
        ";
        $result = mysqli_query($this->conn, $qr);
        return json_encode($result); 
    }

    // delete comment query
    public function deleteComment($commentID) {
        $qr = "
            UPDATE comment
            SET isDeleted = '1'
            WHERE commentID = '{$commentID}'
        ";
        $result = mysqli_query($this->conn, $qr);
        return json_encode($result); 
    }

    // edit comment query
    public function editComment($id, $content) {
        $qr = "
            UPDATE comment
            SET commentContent = '{$content}'
            WHERE commentID = '{$id}'
        ";
        $result = mysqli_query($this->conn, $qr);
        return json_encode($result); 
    }
}
?>