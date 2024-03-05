<?php require_once 'head.php'; ?>

<body>
    <?php
    require_once 'navbar.php';
    ?>



    <!-- Class Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5"><span class="px-2">ห้องเรียนยอดนิยอม</span></p>
                <h1 class="mb-4">ชั้นเรียนสำหรับเด็ก</h1>
            </div>
            <div class="row">
                <?php
                require_once 'connection.php';
                $stmt = $conn->prepare("SELECT * FROM room");
                $stmt->execute();
                $results = $stmt->fetchAll();
                foreach ($results as $t4) {
                ?>
                    <div class="col-lg-4 mb-5">
                        <div class="card border-0 bg-light shadow-sm pb-2">
                            <img class="card-img-top mb-2" src="Add_Admin/production/upload/room/<?php echo $t4['img_file']; ?>">
                            <div class="card-body text-center">
                                <h4 class="card-title"><?= $t4['name_h']; ?></h4>
                                <p class="card-text"><?= $t4['name_d']; ?></p>
                            </div>
                            <div class="card-footer bg-transparent py-4 px-5">
                                <div class="row border-bottom">
                                    <div class="col-6 py-1 text-right border-right"><strong>อายุ</strong></div>
                                    <div class="col-6 py-1"><?= $t4['age']; ?></div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col-6 py-1 text-right border-right"><strong>จำนวนนักเรียน</strong></div>
                                    <div class="col-6 py-1"><?= $t4['num_sum']; ?></div>
                                </div>
                                <div class="row border-bottom">
                                    <div class="col-6 py-1 text-right border-right"><strong>เวลา</strong></div>
                                    <div class="col-6 py-1"><?= $t4['time']; ?></div>
                                </div>
                                <div class="row">
                                    <div class="col-6 py-1 text-right border-right"><strong>ค่าเทอม</strong></div>
                                    <div class="col-6 py-1"><?= $t4['buy_sum']; ?></div>
                                </div>
                            </div>
                            <a href="reg_childcare.php" class="btn btn-primary px-4 mx-auto mb-4">เข้าร่วมชั้นเรียน</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- Class End -->

    <?php require_once 'footer.php'; ?>


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary p-3 back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>