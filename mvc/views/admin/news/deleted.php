<div class="col-10 workspace-container">
            <div class="control">
                <a href="#"><i class="fa fa-arrow-left"></i></a>
            </div>
            <div class="workspace">
                <div class="title"><h2>Bài viết đã xóa</h2></div>
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
                                <th scope="col">Khôi phục</th>
                                <th scope="col">Xóa vĩnh viễn</th>
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
                                
                                
<!-- ================================== MODAL to confirm delete category ================================== -->
                            
<!-- RESTORE -->

                            <td>
                                <button type="button" class="btn btn-primary restoreNewsBtn" value="<?php echo $row["newsID"]; ?>">
                                    <i class="fa fa-undo"></i>
                                </button>
                            </td>
<!-- DELETE -->
                            <td>
                                <button type="button" class="btn btn-primary PermDelNewsBtn" data-bs-toggle="modal" data-bs-target="#exampleModal" value="<?php echo $row["newsID"]; ?>">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                            <?php } ?>
<!-- RESTORE FORM -->
                            <form action="../adminNews/restore" id="restore-form" method="POST">
                                <input type="hidden" name="restore-id" id="restore-id">
                            </form>

<!-- PERMANENTLY DELETE MODAL + FORM -->

                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa bài viết VĨNH VIỄN</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>BẠN CÓ CHẮC MUỐN XÓA BÀI VIẾT NÀY VĨNH VIỄN KHÔNG ? SAU KHI XÓA BẠN KHÔNG THỂ KHÔI PHỤC NÓ !!!</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                            <form action="../adminNews/permanentlyDelete" method="POST">
                                                <input type="hidden" name="perm-delete-news-id" id="perm-delete-news-id">
                                                <button type="submit" class="btn btn-danger" name="confirmPermDelNews">XÓA VĨNH VIỄN</button>
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
                                <a class="page-link" href="../adminNews/deleted/<?php echo $data["prev"]; ?>">Previous</a>
                            </li>
                            <?php for($currentPage = 1; $currentPage <= $data["totalPage"]; $currentPage++) { ?>
                            <li class="page-item">
                                <a class="page-link" href="../adminNews/deleted/<?php echo $currentPage; ?>">
                                    <?php echo $currentPage; ?>
                                </a>
                            </li>
                            <?php } ?>
                            <li class="page-item">
                                <a class="page-link" href="../adminNews/deleted/<?php echo $data["next"]; ?>">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
        </div>