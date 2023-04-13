<div class="col-10 workspace-container">
            <div class="control">
                <a href="#"><i class="fa fa-arrow-left"></i></a>
            </div>
            <div class="workspace">
                <div class="title"><h2>Thể loại</h2></div>
                <div class="data-table-container">
                    <a href="../adminCate/add" class="btn btn-success">Thêm thể loại</a>
                    <?php
                        if(isset($_SESSION["success"])) {
                    ?>
                    <p><?php echo $_SESSION["success"]; ?></p>
                    <?php
                        }
                        unset($_SESSION["success"]);
                    ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên thể loại</th>
                                <th scope="col" colspan="2">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($data["cate"] as $row) { ?>
                            <tr>
                                <th scope="row"><?php echo $row["categoryID"]; ?></th>
                                <td><a href="#"><?php echo $row["categoryName"]; ?></a></td>

                                <td><a href="../adminCate/edit/<?php echo $row["categoryNameSlug"]; ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a></td>

<!-- ================================== MODAL to confirm delete category ================================== -->
                            <!-- Button trigger modal -->
                            <td><button type="button" class="btn btn-danger deleteCateBtn" data-bs-toggle="modal" data-bs-target="#exampleModal" value="<?php echo $row["categoryID"]; ?>">
                            <i class="fa fa-trash"></i>
                            </button></td>
                            <?php } ?>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa thể loại</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Bạn có muốn xóa thể loại này không ?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                        <form action="../adminCate/delete" method="POST">
                                            <input type="hidden" name="delete-cate-id" id="delete-cate-id">
                                            <button type="submit" class="btn btn-danger" name="confirmDelCate">Xóa</button>
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
                                <a class="page-link" href="../adminCate/page/<?php echo $data["prev"]; ?>">Previous</a>
                            </li>
                            <?php for($currentPage = 1; $currentPage <= $data["totalPage"]; $currentPage++) { ?>
                            <li class="page-item">
                                <a class="page-link" href="../adminCate/page/<?php echo $currentPage; ?>">
                                    <?php echo $currentPage; ?>
                                </a>
                            </li>
                            <?php } ?>
                            <li class="page-item">
                                <a class="page-link" href="../adminCate/page/<?php echo $data["next"]; ?>">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
        </div>