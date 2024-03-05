<?php require_once 'head.php'; ?>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="signin_db.php" method="post">
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
                        <h1>Login Form</h1>
                        <div>
                            <input type="text" class="form-control" name="email" placeholder="email" required="" />
                        </div>
                        <div>
                            <input type="password" class="form-control" name="password" placeholder="password" required="" />
                        </div>
                        <div>
                            <button type="submit" name="signin" class="btn btn-default submit">Login</button>
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">
                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1></i>NurseCMUchildcare</h1>
                                <p>เว็บไซต์ของหน่วยสาธิตการสร้างเสริมสุขภาพเด็กเล็กคณะพยาบาลศาสตร์ มหาวิทยาลัยเชียงใหม่</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>

</html>