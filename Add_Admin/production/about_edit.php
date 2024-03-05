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
                                                            <div class="col-md-6 mb-3">
                                                                <label for="name_h">ชื่อห้องเรียน :</label>
                                                                <input type="text" id="name_h" class="form-control" name="name_h" />
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="name_d">รายละเอียดห้องเรียน :</label>
                                                                <input type="text" id="name_d" class="form-control" name="name_d" />
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="age">อายุ :</label>
                                                                <input type="text" id="age" class="form-control" name="age" />
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="num_sum">จำนวนนักเรียน :</label>
                                                                <input type="text" id="num_sum" class="form-control" name="num_sum" />
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="time">เวลาเปิด/ปิด :</label>
                                                                <input type="text" id="time" class="form-control" name="time" />
                                                            </div>
                                                            <div class="col-md-6 mb-3">
                                                                <label for="buy_sum">ค่าเทอม :</label>
                                                                <input type="text" id="buy_sum" class="form-control" name="buy_sum" />
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <label for="blog_name">รูปภาพ :</label>
                                                                <input type="file" name="img_file" required class="form-control" accept="image/jpeg, image/png, image/jpg">
                                                            </div>
                                                        </div>
                                                        <div class="ln_solid"></div>
                                                        <div class="item form-group">
                                                            <button type="submit" class="btn btn-success">โพสต์</button>
                                                            <!-- <?php echo '<pre>';
                                                                    print_r($_POST);
                                                                    echo '</pre>';
                                                                    ?> -->
                                                        </div>
                                                    </form>
                                                    <?php
                                                    if (isset($_POST['name_h'])) {
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
                                                                $path = "upload/room/";
                                                                //ตั้งชื่อไฟล์ใหม่เป็น สุ่มตัวเลข+วันที่
                                                                $newname = $numrand . $date1 . $typefile;
                                                                $path_copy = $path . $newname;
                                                                //คัดลอกไฟล์ไปยังโฟลเดอร์
                                                                move_uploaded_file($_FILES['img_file']['tmp_name'], $path_copy);

                                                                //ประกาศตัวแปรรับค่าจากฟอร์ม
                                                                $name_h = $_POST['name_h'];
                                                                $name_d = $_POST['name_d'];
                                                                $age = $_POST['age'];
                                                                $num_sum = $_POST['num_sum'];
                                                                $time = $_POST['time'];
                                                                $buy_sum = $_POST['buy_sum'];

                                                                //sql insert
                                                                $stmt = $conn->prepare("INSERT INTO room (name_h,name_d, age, num_sum, time, buy_sum, img_file)
                                                                 VALUES (:name_h, :name_d, :age, :num_sum, :time, :buy_sum, :img_file)");
                                                                $stmt->bindParam(':name_h', $name_h, PDO::PARAM_STR);
                                                                $stmt->bindParam(':name_d', $name_d, PDO::PARAM_STR);
                                                                $stmt->bindParam(':age', $age, PDO::PARAM_STR);
                                                                $stmt->bindParam(':num_sum', $num_sum, PDO::PARAM_STR);
                                                                $stmt->bindParam(':time', $time, PDO::PARAM_STR);
                                                                $stmt->bindParam(':buy_sum', $buy_sum, PDO::PARAM_STR);
                                                                $stmt->bindParam(':img_file', $newname, PDO::PARAM_STR);
                                                                $result = $stmt->execute();

                                                                //เงื่อนไขตรวจสอบการเพิ่มข้อมูล
                                                                if ($result) {
                                                                    echo '<script>
                                                                    setTimeout(function() {
                                                                    swal({
                                                                        title: "อัพโหลดภาพสำเร็จ",
                                                                        type: "success"
                                                                    }, function() {
                                                                        window.location = "room_add.php"; //หน้าที่ต้องการให้กระโดดไป
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
                                                                        window.location = "room_add.php"; //หน้าที่ต้องการให้กระโดดไป
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
                                                                    window.location = "room_add.php"; //หน้าที่ต้องการให้กระโดดไป
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