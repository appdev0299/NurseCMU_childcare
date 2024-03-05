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
                                                    <form action="add_signup_db.php" method="post">
                                                        <?php if (isset($_SESSION['error'])) { ?>
                                                            <div class="alert alert-danger" role="alert">
                                                                <?php
                                                                echo $_SESSION['error'];
                                                                unset($_SESSION['error']);
                                                                ?>
                                                            </div>
                                                        <?php } ?>
                                                        <?php if (isset($_SESSION['success'])) { ?>
                                                            <div class="alert alert-success" role="alert">
                                                                <?php
                                                                echo $_SESSION['success'];
                                                                unset($_SESSION['success']);
                                                                ?>
                                                            </div>
                                                        <?php } ?>
                                                        <?php if (isset($_SESSION['warning'])) { ?>
                                                            <div class="alert alert-warning" role="alert">
                                                                <?php
                                                                echo $_SESSION['warning'];
                                                                unset($_SESSION['warning']);
                                                                ?>
                                                            </div>
                                                        <?php } ?>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="firstname">Firstname</label>
                                                                <input type="text" id="firstname" class="form-control" name="firstname" />
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="lastname">Lastname</label>
                                                                <input type="text" id="lastname" class="form-control" name="lastname" />
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="email">Email</label>
                                                                <input type="text" id="email" class="form-control" name="email" />
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="password">Password</label>
                                                                <input type="text" id="password" class="form-control" name="password" />
                                                            </div>
                                                        </div>
                                                        <div class="ln_solid"></div>
                                                        <div class="form-group row">
                                                            <div class="col-md-6 col-sm-6">
                                                                <button type="submit" name="signup" class="btn btn-success">Submit</button>
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