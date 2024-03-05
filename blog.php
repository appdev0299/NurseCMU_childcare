<?php require_once 'head.php'; ?>

<body>
    <?php
    require_once 'navbar.php';
    ?>



    <!-- Blog Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <p class="section-title px-5"><span class="px-2">บทความ</span></p>
                <h1 class="mb-4">เนื้อหาบทความต่างๆ</h1>
            </div>
            <div class="row pb-3">
                <?php
                require_once 'connection.php';
                $stmt = $conn->prepare("SELECT* FROM blog");
                $stmt->execute();
                $result = $stmt->fetchAll();
                foreach ($result as $t1) {
                ?>
                    <div class="col-lg-4 mb-4">
                        <div class="card border-0 shadow-sm mb-2">
                            <img src="Add_Admin/production/upload/<?php echo $t1['img_file']; ?>" class="about-image ms-lg-auto bg-light shadow-lg img-fluid mx-auto" alt="">
                            <div class="card-body bg-light text-center p-4">
                                <h4 class=""><?= $t1['blog_name']; ?></h4>
                                <p><?= $t1['blog_details']; ?></p>
                                <a href="view_blog.php?id=<?= $t1['id']; ?>"" class=" btn btn-primary px-4 mx-auto my-2">อ่านฉบับเต็ม</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
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