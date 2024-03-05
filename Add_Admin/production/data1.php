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
                                                    <!-- start form for validation -->
                                                    <form id="demo-form" data-parsley-validate>
                                                        <?php
                                                        if (isset($_GET['id'])) {
                                                            require_once 'connection.php';
                                                            $stmt = $conn->prepare("SELECT* FROM childcare WHERE id=?");
                                                            $stmt->execute([$_GET['id']]);
                                                            $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                                            if ($stmt->rowCount() < 1) {
                                                                header('Location: index.php');
                                                                exit();
                                                            }
                                                        } //isset
                                                        ?>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <h3>ลำดับ การจอง : <?= $row['id']; ?></h3>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <h3>วันที่/เดือน/ปี การจอง : <?= date("d/m/Y", strtotime($row['rec_date'])); ?></h3>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="name_parent">ชื่อผู้ขอจองสิทธิ์</label>
                                                                <input type="text" id="name_parent" class="form-control" name="name_parent" value="<?= $row['name_parent']; ?>" readonly />
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="tel_parent">เบอร์โทรศัพท์ผู้ขอจองสิทธิ์</label>
                                                                <input type="text" id="tel_parent" class="form-control" name="tel_parent" value="<?= $row['tel_parent']; ?>" readonly />
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="province">ที่อยู่: จังหวัด</label>
                                                                <input type="text" id="province" class="form-control" name="province" value="<?= $row['province']; ?>" readonly />
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="district">ที่อยู่: อำเภอ</label>
                                                                <input type="text" id="district" class="form-control" name="district" value="<?= $row['district']; ?>" readonly />
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="parish">ที่อยู่: ตำบล</label>
                                                                <input type="text" id="parish" class="form-control" name="parish" value="<?= $row['parish']; ?>" readonly />
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="name_father">ชื่อ-นามสกุลบิดา</label>
                                                                <input type="text" id="name_father" class="form-control" name="name_father" value="<?= $row['name_father']; ?>" readonly />
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="work_father">สถานที่ทำงานของบิดา:</label>
                                                                <input type="text" id="work_father" class="form-control" name="work_father" value="<?= $row['work_father']; ?>" readonly />
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="databirth">ข้อมูลการเกิด</label>
                                                                <input type="text" id="databirth" class="form-control" name="databirth" value="<?= $row['title']; ?>" readonly />
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="title">คำนำหน้า</label>
                                                                <input type="text" id="title" class="form-control" name="title" value="<?= $row['name_child']; ?>" readonly />
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="name_child">ชื่อ-นามสกุล</label>
                                                                <input type="text" id="name_child" class="form-control" name="name_child" value="<?= $row['nickname']; ?>" readonly />
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="nickname">ชื่อเล่น</label>
                                                                <input type="text" id="nickname" class="form-control" name="nickname" value="<?= $row['birthday']; ?>" readonly />
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="birthday">วันเกิด</label>
                                                                <input type="text" id="birthday" class="form-control" name="birthday" value="<?= $row['date']; ?>" readonly />
                                                            </div>

                                                        </div>
                                                    </form>

                                                    <!-- end form for validations -->
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

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

</body>

</html>