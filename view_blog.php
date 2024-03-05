<?php require_once 'head.php'; ?>

<body>
    <?php
    require_once 'navbar.php';
    ?>



    <!-- Blog Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="container py-5">
                <div class="row pt-5">
                    <?php
                    if (isset($_GET['id'])) {
                        require_once 'connection.php';
                        $stmt = $conn->prepare("SELECT * FROM blog WHERE id=?");
                        $stmt->execute([$_GET['id']]);
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    }
                    ?>
                    <div class="col-lg-12">
                        <div class="d-flex flex-column text-left mb-3">
                            <p class="section-title pr-5"><span class="pr-2">Blog Detail Page</span></p>
                            <h1 class="mb-3"><?= $row['blog_name']; ?></h1>
                        </div>
                        <div class="mb-5">
                            <img src="Add_Admin/production/upload/<?= $row['img_file']; ?>" class="about-image ms-lg-auto bg-light shadow-lg img-fluid d-block mx-auto" width="700" height="700" alt="">
                            <br>
                            <p><?= $row['blog_details']; ?></p>
                            <h2 class="mb-4"><?= $row['blog_name_b2']; ?></h2>
                            <p><?= $row['detail_b2']; ?></p>
                            <h3 class="mb-4"><?= $row['blog_name_b3']; ?></h3>
                            <p><?= $row['detail_b3']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End -->

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