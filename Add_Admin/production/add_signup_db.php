<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
<?php
session_start();
require_once 'connection.php';

if (isset($_POST['signin'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];


    if (empty($email)) {
        $error_msg = 'กรุณากรอกอีเมล';
        header("location: index.php");
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_msg = 'รูปแบบอีเมลไม่ถูกต้อง';
        header("location: index.php");
    } else if (empty($password)) {
        $error_msg = 'กรุณากรอกรหัสผ่าน';
        header("location: index.php");
    } else if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
        $error_msg = 'รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร';
        header("location: index.php");
    } else {
        try {

            $check_data = $conn->prepare("SELECT * FROM users WHERE email = :email");
            $check_data->bindParam(":email", $email);
            $check_data->execute();
            $row = $check_data->fetch(PDO::FETCH_ASSOC);

            if ($check_data->rowCount() > 0) {

                if ($email == $row['email']) {
                    if (password_verify($password, $row['password'])) {
                        if ($row['urole'] == 'admin') {
                            $_SESSION['admin_login'] = $row['id'];
                            header("location: admin.php");
                        } else {
                            $_SESSION['user_login'] = $row['id'];
                            header("location: dashboard.php");
                        }
                    } else {
                        $_SESSION['error'] = 'รหัสผ่านผิด';
                        header("location: index.php");
                    }
                } else {
                    $_SESSION['error'] = 'อีเมลผิด';
                    header("location: index.php");
                }
            } else {
                $_SESSION['error'] = "ไม่มีข้อมูลในระบบ";
                header("location: index.php");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    if (isset($error_msg)) {
        echo '<script>
                setTimeout(function() {
                    Sval({
                        title: "Message Occurs",
                        Type: "Error",
                        message: "' . $error_msg . '"
                    }, function() {
                        window.location = "blog_add.php";
                    });
                }, 1000);
            </script>';
        exit;
    }
}
