<?php require_once 'head.php'; ?>

<body>
    <?php
    require_once 'navbar.php';
    ?>
    <!-- Registration Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="card border-0">
                        <div class="card-header bg-secondary text-center p-4">
                            <h1 class="text-white m-0">แบบฟอร์มการจองสิทธิ์</h1>
                        </div>
                        <div class="card-body rounded-bottom bg-primary p-12">
                            <form  method="POST" role="form">
                                <h5>แบบฟอร์มสำหรับผู้ปกครอง</h5>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="text" name="name_parent" class="form-control border-0 p-4" placeholder="ชื่อผู้ขอจองสิทธิ์" required="required" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="text" name="tel_parent" class="form-control border-0 p-4" placeholder="เบอร์โทรศัพท์ผู้ขอจองสิทธิ์" required="required" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <select name="province" class="custom-select border-0 px-4" style="height: 47px;">
                                                <option selected>ที่อยู่: จังหวัด</option>
                                                <option value="เชียงใหม่">เชียงใหม่</option>
                                                <option value="ลำพูน">ลำพูน</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="text" name="district" class="form-control border-0 p-4" placeholder="ที่อยู่: อำเภอ" required="required" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="text" name="parish" class="form-control border-0 p-4" placeholder="ที่อยู่: ตำบล" required="required" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="text" name="name_father" class="form-control border-0 p-4" placeholder="ชื่อ-นามสกุลบิดา" required="required" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="text" name="work_father" class="form-control border-0 p-4" placeholder="สถานที่ทำงานของบิดา" required="required" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <select class="custom-select border-0 px-4" name="databirth" style="height: 47px;">
                                                <option selected>ข้อมูลการเกิด</option>
                                                <option value="เกิดก่อนวันจองสอทธิ์">เกิดก่อนวันจองสอทธิ์</option>
                                                <option value="เกิดหลังวันจองสอทธิ์">เกิดหลังวันจองสอทธิ์</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <h5>แบบฟอร์มสำหรับนักเรียน</h5>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <select class="custom-select border-0 px-4" name="title" style="height: 47px;">
                                                <option selected>คำนำหน้า</option>
                                                <option value="เด็กชาย">เด็กชาย</option>
                                                <option value="เด็กหญิง">เด็กหญิง</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="text" name="name_child" class="form-control border-0 p-4" placeholder="ชื่อ-นามสกุล" required="required" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="text" name="nickname" class="form-control border-0 p-4" placeholder="ชื่อเล่น" required="required" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="text" name="birthday" class="form-control border-0 p-4" placeholder="วันเกิด" required=" required" />
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <input type="text" name="date" class="form-control border-0 p-4" placeholder="ระบุวัน เดือน ปี ที่จะนำบุตรมารับบริการ" required="required" />
                                        </div>
                                    </div>
                                </div>

                                <div>
                                    <button class="btn btn-secondary btn-block border-0 py-3" type="submit">ลงทะเบียน</button>
                                    <!-- <?php echo '<pre>';
                                    print_r($_POST);
                                    echo '</pre>';
                                    ?> -->
                                </div>
                            </form>
                        </div>
                        <?php require_once 'reg_childcare_db.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Registration End -->

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