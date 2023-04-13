
<div class="container-fluid pt-3">
    <div class="container animate-box" data-animate-effect="fadeIn">
        <div>
            <div class="fh5co_heading fh5co_heading_border_bottom py-2 mb-4">Bình luận</div>
        </div>

        <div id="add-comment-container">
            <div id="my-avatar">
                <img src="images/<?php echo $_SESSION["userAvatar"]; ?>" alt="">
            </div>
            <div id="add-comment">
                <?php  ?>
                <form action="../comment/addComm" method="POST">
                    <input type="hidden" name="newsID" value="<?php echo $news["newsID"]; ?>">
                    <input type="hidden" name="slug" value="<?php echo $data["slug"]; ?>">
                    <textarea name="commentContent" id="" class="form-control" cols="30" rows="10"></textarea>
                    <button type="submit" name="addCommBtn" class="btn btn-primary">Bình luận</button>
                </form>
            </div>
        </div>
        <div id="comments">
            <?php foreach($data["comments"] as $comment) {?>
            <div id="comment-tag-container">
                <div id="user-avatar"><img src="images/<?php echo $comment["userAvatar"]; ?>" alt=""></div>
                <div id="comment-content">
                    <p><?php echo $comment["fullname"]; ?></p>
                    <p><?php echo $comment["commentContent"]; ?></p>
                    
                    
                    <?php if($comment["userName"] == $_SESSION["userName"]) { ?>
                        <!-- Button trigger modal -->
                        <button 
                            style="width: 100px;" 
                            class="btn btn-success editCmtBtn"
                            name="editCommBtn" 
                            data-bs-toggle="modal" 
                            data-bs-target="#editCommentModal"
                            id="<?php echo $comment["commentID"]; ?>"
                            value="<?php echo $comment["commentContent"]; ?>">Sửa</button>
                        <button 
                            style="width: 100px;" 
                            class="btn btn-danger deleteCmtBtn" 
                            name="deleteCommBtn" 
                            data-bs-toggle="modal" 
                            data-bs-target="#deleteCommentModal"
                            id="<?php echo $comment["commentID"]; ?>">Xóa</button>
                    <?php } ?>

                    
                    <p>Likes: <?php echo $comment["likesCount"]; ?></p>
                </div>
            </div>
            <?php } ?>

        </div>  
    </div>
</div>

            <!-- ================================== MODALS ================================== -->


<!-- ================================== MODAL to confirm delete comment ================================== -->
                        <div class="modal fade" id="deleteCommentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa bình luận</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Bạn có muốn xóa bình luận này không ?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                        <form action="../comment/deleteComm" method="POST">
                                            <input type="hidden" name="cmtID" id="cmtID">
                                            <input type="hidden" name="slug" value="<?php echo $data["slug"]; ?>">
                                            <button type="submit" class="btn btn-danger" name="deleteCommBtn">Xóa</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

<!-- ================================== MODAL to edit comment ================================== -->
                        <div class="modal fade" id="editCommentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Chỉnh sửa bình luận</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="../comment/editComm" method="POST">
                                            <textarea 
                                                name="newCommentContent" id="newCommentContent" 
                                                cols="30" rows="10"></textarea>
                                            <input type="hidden" name="commentID" id="commentID">
                                            <input type="hidden" name="slug" value="<?php echo $data["slug"]; ?>">
                                            <button type="submit" class="btn btn-success" name="editCommBtn">Lưu thay đổi</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>