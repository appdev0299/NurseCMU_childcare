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
                                                        <div class="row">
                                                            <div class="col-md-6 mb-3">
                                                                <label for="blog_name">ชื่อเรื่อง ส่วนที่ 1 :</label>
                                                                <input type="text" id="blog_name" class="form-control" value="<?= $row['blog_name']; ?>" name="blog_name"  />
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="blog_name">รายละเอียด ส่วนที่ 1 :</label>
                                                                <input type="text" id="blog_details" class="form-control" value="<?= $row['blog_details']; ?>" name="blog_details"  />
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="blog_name_b2">ชื่อเรื่อง ส่วนที่ 2 :</label>
                                                                <input type="text" id="blog_name_b2" class="form-control" value="<?= $row['blog_name_b2']; ?>" name="blog_name_b2"  />
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="detail_b2">รายละเอียด ส่วนที่ 2 :</label>
                                                                <input type="text" id="detail_b2" class="form-control" value="<?= $row['detail_b2']; ?>" name="detail_b2"  />
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="blog_name_b3">ชื่อเรื่อง ส่วนที่ 3 :</label>
                                                                <input type="text" id="blog_name_b3" class="form-control" value="<?= $row['blog_name_b3']; ?>" name="blog_name_b3"  />
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="detail_b3">รายละเอียด ส่วนที่ 3 :</label>
                                                                <input type="text" id="detail_b3" class="form-control" value="<?= $row['detail_b3']; ?>" name="detail_b3"  />
                                                            </div>
                                                        </div>
                                                        <div class="ln_solid"></div>
                                                        <div class="item form-group">
                                                            <button type="submit" class="btn btn-success">แก้ไข</button>
                                                        </div>
                                                    </form>
                                                    <?php
                                                    if (isset($_POST['blog_name'])) {
                                                        require_once 'connection.php';
                                                        //สร้างตัวแปรวันที่เพื่อเอาไปตั้งชื่อไฟล์ใหม่
                                                        $date1 = date("Ymd_His");
                                                        //สร้างตัวแปรสุ่มตัวเลขเพื่อเอาไปตั้งชื่อไฟล์ที่อัพโหลดไม่ให้ชื่อไฟล์ซ้ำกัน
                                                        $numrand = (mt_rand());
                                                        $img_file = (isset($_POST['img_file']) ? $_POST['img_file'] : '');
                                                        $upload = $_FILES['img_file']['name'];

                                                        //มีการอัพโหลดไฟล์
                                                        if ($upload != '') {
                                                            //ตัดขื่อเอาเฉพาะนามสกุล
                                                            $typefile = strrchr($_FILES['img_file']['name'], ".");

                                                            //สร้างเงื่อนไขตรวจสอบนามสกุลของไฟล์ที่อัพโหลดเข้ามา
                                                            if ($typefile == '.jpg' || $typefile  == '.jpeg' || $typefile  == '.png') {

                                                                //โฟลเดอร์ที่เก็บไฟล์
                                                                $path = "upload/";
                                                                //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
                                                                $newname = $numrand . $date1 . $typefile;
                                                                $path_copy = $path . $newname;
                                                                //คัดลอกไฟล์ไปยังโฟลเดอร์
                                                                move_uploaded_file($_FILES['img_file']['tmp_name'], $path_copy);

                                                                //ประกาศตัวแปรรับค่าจากฟอร์ม
                                                                $blog_name = $_POST['blog_name'];
                                                                $blog_details = $_POST['blog_details'];
                                                                $blog_name_b2 = $_POST['blog_name_b2'];
                                                                $detail_b2 = $_POST['detail_b2'];
                                                                $blog_name_b3 = $_POST['blog_name_b3'];
                                                                $detail_b3 = $_POST['detail_b3'];

                                                                //sql insert
                                                                $stmt = $conn->prepare("INSERT INTO blog (blog_name,blog_details, blog_name_b2, blog_name_b3, detail_b2, detail_b3, img_file)
                                                                VALUES (:blog_name, :blog_details, :blog_name_b2, :blog_name_b3, :detail_b2, :detail_b3,'$newname')");
                                                                $stmt->bindParam(':blog_name', $blog_name, PDO::PARAM_STR);
                                                                $stmt->bindParam(':blog_details', $blog_details, PDO::PARAM_STR);
                                                                $stmt->bindParam(':blog_name_b2', $blog_name_b2, PDO::PARAM_STR);
                                                                $stmt->bindParam(':detail_b2', $detail_b2, PDO::PARAM_STR);
                                                                $stmt->bindParam(':blog_name_b3', $blog_name_b3, PDO::PARAM_STR);
                                                                $stmt->bindParam(':detail_b3', $detail_b3, PDO::PARAM_STR);
                                                                $result = $stmt->execute();
                                                                //เงื่อนไขตรวจสอบการเพิ่มข้อมูล
                                                                if ($result) {
                                                                    echo '<script>
                                                                    setTimeout(function() {
                                                                    swal({
                                                                        title: "อัพโหลดภาพสำเร็จ",
                                                                        type: "success"
                                                                    }, function() {
                                                                        window.location = "upload.php"; //หน้าที่ต้องการให้กระโดดไป
                                                                    });
                                                                    }, 1000);
                                                                </script>';
                                                                } else {
                                                                    echo '<script>
                                                                    setTimeout(function() {
                                                                    swal({
                                                                        title: "เกิดข้อผิดพลาด",
                                                                        type: "error"
                                                                    }, function() {
                                                                        window.location = "blog_add.php"; //หน้าที่ต้องการให้กระโดดไป
                                                                    });
                                                                    }, 1000);
                                                                </script>';
                                                                } //else ของ if result


                                                            } else { //ถ้าไฟล์ที่อัพโหลดไม่ตรงตามที่กำหนด
                                                                echo '<script>
                                                                setTimeout(function() {
                                                                swal({
                                                                    title: "คุณอัพโหลดไฟล์ไม่ถูกต้อง",
                                                                    type: "error"
                                                                }, function() {
                                                                    window.location = "blog_add.php"; //หน้าที่ต้องการให้กระโดดไป
                                                                });
                                                                }, 1000);
                                                            </script>';
                                                            } //else ของเช็คนามสกุลไฟล์

                                                        } // if($upload !='') {

                                                        $conn = null; //close connect db
                                                    } //isset
                                                    ?>
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