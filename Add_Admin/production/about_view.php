<!DOCTYPE html>
<html lang="en">
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
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <!-- sidebar menu -->
                    <?php require_once 'sidebar.php'; ?>
                    <!-- /sidebar menu -->
                </div>
            </div>

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
                                            <div class="card-box table-responsive">
                                                <td><a href="blog_add.php" class="btn btn-success btn-sm">เพิ่ม</a>
                                                    <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>หัวข้อ</th>
                                                                <th>รายละเอียด</th>
                                                                <th>รายละเอียดส่วนที่1</th>
                                                                <th>รายละเอียดส่วนที่2</th>
                                                                <th>รายละเอียดส่วนที่3</th>
                                                                <th>การจัดการ</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                            require_once 'connection.php';
                                                            $stmt = $conn->prepare("SELECT* FROM about");
                                                            $stmt->execute();
                                                            $result = $stmt->fetchAll();
                                                            $countrow = 1;
                                                            foreach ($result as $t2) {
                                                            ?>
                                                                <tr>
                                                                    <td><?= $countrow ?></td>
                                                                    <td><?= $t2['name']; ?></td>
                                                                    <td><?= $t2['details']; ?></td>
                                                                    <td><?= $t2['details1']; ?></td>
                                                                    <td><?= $t2['details2']; ?></td>
                                                                    <td><?= $t2['details3']; ?></td>
                                                                    <td> <a href="blog_edit.php?id=<?= $t2['id']; ?>" class="btn btn-success btn-sm">แก้ไข</a>
                                                                        <a href="del.php?id=<?= $t2['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Confirm Data Deletion !!');">ลบ</a>
                                                                    </td>
                                                                </tr>

                                                            <?php $countrow++;
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
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
    </div>
    <!-- /page content -->
    <?php require_once 'script.php'; ?>

</body>

</html>