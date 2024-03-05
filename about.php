<?php require_once 'head.php'; ?>

<body>
    <?php
    require_once 'navbar.php';
    ?>



    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <?php
            require_once 'connection.php';
            $stmt = $conn->prepare("SELECT* FROM about");
            $stmt->execute();
            $result = $stmt->fetchAll();
            foreach ($result as $t1) {
            ?>
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <img class="img-fluid rounded mb-5 mb-lg-0" src="img/about-1.jpg" alt="">
                    </div>
                    <div class="col-lg-7">
                        <p class="section-title pr-5"><span class="pr-2">เกี่ยวกับเรา</span></p>
                        <h1 class="mb-4"><?= $t1['name']; ?></h1>
                        <p><?= $t1['details']; ?></p>
                        <div class="row pt-2 pb-4">
                            <div class="col-6 col-md-4">
                                <img class="img-fluid rounded" src="img/about-2.jpg" alt="">
                            </div>
                            <div class="col-6 col-md-8">
                                <ul class="list-inline m-0">
                                    <li class="py-2 border-top border-bottom"><i class="fa fa-check text-primary
                                        mr-3"></i><?= $t1['details1']; ?></li>
                                    <li class="py-2 border-bottom"><i class="fa
                                        fa-check text-primary mr-3"></i><?= $t1['details2']; ?></li>
                                    <li class="py-2 border-bottom"><i class="fa
                                        fa-check text-primary mr-3"></i><?= $t1['details3']; ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <!-- About End -->

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