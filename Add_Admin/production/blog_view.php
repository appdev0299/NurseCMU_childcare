<!DOCTYPE html>
<?php
session_start();
require_once 'connection.php';
if (!isset($_SESSION['admin_login'])) {
    $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
    header('location: index.php');
}
require_once 'head.php';
require_once 'topbar.php'; ?>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <?php require_once 'sidebar.php'; ?>

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12 ">
                            <div class="x_panel">
                                <div class="x_content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="x_panel">
                                                <div class="x_content">
                                                    <form action="" method="post" enctype="multipart/form-data">
                                                        <div class="row">
                                                            <?php
                                                            if (isset($_GET['id'])) {
                                                                require_once 'connection.php';
                                                                $stmt = $conn->prepare("SELECT* FROM blog WHERE id=?");
                                                                $stmt->execute([$_GET['id']]);
                                                                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                                                if ($stmt->rowCount() < 1) {
                                                                    header('Location: index.php');
                                                                    exit();
                                                                }
                                                            } //isset
                                                            ?>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="blog_name">ชื่อเรื่อง ส่วนที่ 1 :</label>
                                                                <input type="text" id="blog_name" class="form-control" value="<?= $row['blog_name']; ?>" name="blog_name" readonly />
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="blog_name">รายละเอียด ส่วนที่ 1 :</label>
                                                                <input type="text" id="blog_details" class="form-control" value="<?= $row['blog_details']; ?>" name="blog_details" readonly />
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="blog_name_b2">ชื่อเรื่อง ส่วนที่ 2 :</label>
                                                                <input type="text" id="blog_name_b2" class="form-control" value="<?= $row['blog_name_b2']; ?>" name="blog_name_b2" readonly />
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="detail_b2">รายละเอียด ส่วนที่ 2 :</label>
                                                                <input type="text" id="detail_b2" class="form-control" value="<?= $row['detail_b2']; ?>" name="detail_b2" readonly />
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="blog_name_b3">ชื่อเรื่อง ส่วนที่ 3 :</label>
                                                                <input type="text" id="blog_name_b3" class="form-control" value="<?= $row['blog_name_b3']; ?>" name="blog_name_b3" readonly />
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="detail_b3">รายละเอียด ส่วนที่ 3 :</label>
                                                                <input type="text" id="detail_b3" class="form-control" value="<?= $row['detail_b3']; ?>" name="detail_b3" readonly />
                                                            </div>
                                                        </div>
                                                        <div class="ln_solid"></div>
                                                        <div class="item form-group">
                                                            <button type="submit" class="btn btn-success">แก้ไข</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->
        </div>
    </div>
    <?php require_once 'script.php'; ?>

    </html>