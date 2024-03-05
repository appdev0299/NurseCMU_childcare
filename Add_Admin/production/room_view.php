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
                                                                $stmt = $conn->prepare("SELECT* FROM room WHERE id=?");
                                                                $stmt->execute([$_GET['id']]);
                                                                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                                                if ($stmt->rowCount() < 1) {
                                                                    header('Location: index.php');
                                                                    exit();
                                                                }
                                                            } //isset
                                                            ?>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="name_h">ชื่อห้องเลย :</label>
                                                                <input type="text" id="name_h" class="form-control" name="name_h" value="<?= $row['name_h']; ?>" readonly />
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="name_d">รายละเอียดห้องเรียน :</label>
                                                                <input type="text" id="name_d" class="form-control" name="name_d" value="<?= $row['name_d']; ?>" readonly />
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="age">อายุ :</label>
                                                                <input type="text" id="age" class="form-control" name="age" value="<?= $row['age']; ?>" readonly />
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="num_sum">จำนวนนักเรียน :</label>
                                                                <input type="text" id="num_sum" class="form-control" name="num_sum" value="<?= $row['num_sum']; ?>" readonly />
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="time">เวลาเปิด/ปิด :</label>
                                                                <input type="text" id="time" class="form-control" name="time" value="<?= $row['time']; ?>" readonly />
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="buy_sum">ค่าเทอม :</label>
                                                                <input type="text" id="buy_sum" class="form-control" name="buy_sum" value="<?= $row['buy_sum']; ?>" readonly />
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <label for="blog_name">รูปภาพ :</label>
                                                                <input type="file" name="img_file" required class="form-control" accept="image/jpeg, image/png, image/jpg">
                                                            </div>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
</body>

</html>