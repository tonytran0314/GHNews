<?php
class Comment extends Helpers {

    public $commentModel;

    public function __construct() {

        session_start();

        // middleware:
        $this->redirectIfNOTLoggedIn();

        $this->commentModel = $this->getModel("CommentModel");
    }

    // add comment process
    public function addComm() {

            $this->submitClickCheck($_POST["addCommBtn"]);

            $newsID = $_POST["newsID"];
                $userID = $_SESSION["userID"];
                $commentContent = $_POST["commentContent"];
                $slug = $_POST["slug"];

                $addCommResult = $this->commentModel->addComment($commentContent, $userID, $newsID);

                if($addCommResult) {
                    header('location: ../news/detail/'.$slug);
                }
    }

    // delete comment process
    public function deleteComm() {
            $this->submitClickCheck($_POST["deleteCommBtn"]);

            $commID = $_POST["cmtID"];
            $slug = $_POST["slug"];
            $delCommResult = $this->commentModel->deleteComment($commID);

            if($delCommResult) {
                header('location: ../news/detail/'.$slug);
            }
        
    }

    // edit comment process
    public function editComm() {
        $this->submitClickCheck($_POST["editCommBtn"]);
            $newCommentContent = $_POST["newCommentContent"];
            $commentID = $_POST["commentID"];
            $slug = $_POST["slug"];

            $editCommResult = $this->commentModel->editComment($commentID, $newCommentContent);

            if($editCommResult) {
                header('location: ../news/detail/'.$slug);
            }
        
    }

}
?>