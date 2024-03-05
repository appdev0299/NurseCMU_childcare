<?php require_once 'head.php';

session_start();
require_once 'connection.php';
if (!isset($_SESSION['admin_login'])) {
  $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ!';
  header('location: index.php');
}

?>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <?php require_once 'sidebar.php';
      require_once 'topbar.php';
      ?>
      <!-- page content -->

      <div class="right_col" role="main">
        <div class="row" style="display: inline-block;">

        </div>
      </div>
      <!-- /page content -->
    </div>
  </div>
  <?php require_once 'script.php'; ?>
</body>

</html>