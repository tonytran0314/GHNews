<div class="col-10 workspace-container">
            <div class="control">
                <a href="#"><i class="fa fa-arrow-left"></i></a>
            </div>
            <div class="workspace">
                <div class="title"><h2>Bài viết</h2></div>
                <a href="../adminNews/add" class="btn btn-success">Thêm bài viết</a>
                <?php if(isset($_SESSION["message"])) { ?>
                <p><?php echo $_SESSION["message"]; ?></p>
                <?php 
                    }
                    unset($_SESSION["message"]);
                ?>
                <div class="data-table-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Nội dung</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Ngày đăng</th>
                                <th scope="col">Lượt xem</th>
                                <th scope="col" colspan="2">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data["news"] as $row) { ?>
                            <tr>
                                <th scope="row"><?php echo $row["newsID"]; ?></th>
                                <td><a href="../adminNews/detail/<?php echo $row["newsTitleSlug"]; ?>"><?php echo $row["newsTitle"]; ?></a></td>
                                <td><?php echo $row["newsDesc"]; ?></td>
                                <td><?php echo $row["newsContent"]; ?></td>
                                <td><img src="images/<?php echo $row["newsImg"]; ?>" alt=""></td>
                                <td><?php echo $row["newsDate"]; ?></td>
                                <td><?php echo $row["newsView"]; ?></td>
                                <td><a href="../adminNews/edit/<?php echo $row["newsTitleSlug"]; ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>
                                
                                
<!-- ================================== MODAL to confirm delete category ================================== -->
                            
<!-- Button trigger modal -->

                            <td><button type="button" class="btn btn-danger deleteNewsBtn" data-bs-toggle="modal" data-bs-target="#exampleModal" value="<?php echo $row["newsID"]; ?>">
                            <i class="fa fa-trash"></i>
                            </button></td>
                            <?php } ?>


<!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa bài viết</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Bạn có muốn xóa bài viết này không ?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                        <form action="../adminNews/delete" method="POST">
                                            <input type="hidden" name="delete-news-id" id="delete-news-id">
                                            <button type="submit" class="btn btn-danger" name="confirmDelNews">Xóa</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            </div>



                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                
            </div>
            <div class="pagination-container">
                    <nav aria-label="...">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="../adminNews/page/<?php echo $data["prev"]; ?>">Previous</a>
                            </li>
                            <?php for($currentPage = 1; $currentPage <= $data["totalPage"]; $currentPage++) { ?>
                            <li class="page-item">
                                <a class="page-link" href="../adminNews/page/<?php echo $currentPage; ?>">
                                    <?php echo $currentPage; ?>
                                </a>
                            </li>
                            <?php } ?>
                            <li class="page-item">
                                <a class="page-link" href="../adminNews/page/<?php echo $data["next"]; ?>">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
        </div>