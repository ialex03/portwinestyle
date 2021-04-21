<?php
require 'includes/settings.inc.php';
include $arrSETTINGS['dir_site'].'/includes/db.inc.php';
db_connect();
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Cake Template">
    <meta name="keywords" content="Cake, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cake | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/barfiller.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <?php include $arrSETTINGS['dir_site'].'/includes/offcanvasmenu.inc.php'; ?>
    <header class="header">
        <?php include $arrSETTINGS['dir_site'].'/includes/headertop.inc.php'; ?>
        <?php include $arrSETTINGS['dir_site'].'/includes/menu.inc.php'; ?>
    </header>

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__text">
                        <h2>Class</h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="breadcrumb__links">
                        <a href="./index.html">Home</a>
                        <span>Class</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Class Section Begin -->
    <section class="class-page spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="class__item">
                                <div class="class__item__pic set-bg" data-setbg="img/class/class-1.jpg">
                                    <div class="label">$35.00</div>
                                </div>
                                <div class="class__item__text">
                                    <h5><a href="#">ADVANCED BAKING COURSE</a></h5>
                                    <span>Wed 08 Apr 2020; 6.30pm - 9.30pm</span>
                                    <p>Professional course: cook’s certificate in food & wine (six weeks full-time)</p>
                                    <a href="#" class="read_more">Read more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="class__item">
                                <div class="class__item__pic set-bg" data-setbg="img/class/class-2.jpg">
                                    <div class="label">$35.00</div>
                                </div>
                                <div class="class__item__text">
                                    <h5><a href="#">TEEN COOKING CAMP</a></h5>
                                    <span>Wed 08 Apr 2020; 6.30pm - 9.30pm</span>
                                    <p>Professional course: cook’s certificate in food & wine (six weeks full-time)</p>
                                    <a href="#" class="read_more">Read more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="class__item">
                                <div class="class__item__pic set-bg" data-setbg="img/class/class-3.jpg">
                                    <div class="label">$35.00</div>
                                </div>
                                <div class="class__item__text">
                                    <h5><a href="#">THE ULTIMATE BAKING COURSE</a></h5>
                                    <span>Wed 08 Apr 2020; 6.30pm - 9.30pm</span>
                                    <p>Professional course: cook’s certificate in food & wine (six weeks full-time)</p>
                                    <a href="#" class="read_more">Read more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="class__item">
                                <div class="class__item__pic set-bg" data-setbg="img/class/class-4.jpg">
                                    <div class="label">$35.00</div>
                                </div>
                                <div class="class__item__text">
                                    <h5><a href="#">KIDS BAKING COURSE</a></h5>
                                    <span>Wed 08 Apr 2020; 6.30pm - 9.30pm</span>
                                    <p>Professional course: cook’s certificate in food & wine (six weeks full-time)</p>
                                    <a href="#" class="read_more">Read more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="class__item">
                                <div class="class__item__pic set-bg" data-setbg="img/class/class-5.jpg">
                                    <div class="label">$35.00</div>
                                </div>
                                <div class="class__item__text">
                                    <h5><a href="#">THE ULTIMATE BAKING COURSE</a></h5>
                                    <span>Wed 08 Apr 2020; 6.30pm - 9.30pm</span>
                                    <p>Professional course: cook’s certificate in food & wine (six weeks full-time)</p>
                                    <a href="#" class="read_more">Read more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="class__item">
                                <div class="class__item__pic set-bg" data-setbg="img/class/class-6.jpg">
                                    <div class="label">$35.00</div>
                                </div>
                                <div class="class__item__text">
                                    <h5><a href="#">KIDS BAKING COURSE</a></h5>
                                    <span>Wed 08 Apr 2020; 6.30pm - 9.30pm</span>
                                    <p>Professional course: cook’s certificate in food & wine (six weeks full-time)</p>
                                    <a href="#" class="read_more">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="shop__pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><span class="arrow_carrot-right"></span></a>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="class__sidebar">
                        <h5>Made from your own hands</h5>
                        <form action="#">
                            <input type="text" placeholder="Name">
                            <input type="text" placeholder="Phone">
                            <select>
                                <option value="">Studying Class</option>
                                <option value="">Writting Class</option>
                                <option value="">Reading Class</option>
                            </select>
                            <input type="text" placeholder="Type your requirements">
                            <button type="submit" class="site-btn">registration</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Class Section End -->

    <!-- FOOTER -->
    <?php include $arrSETTINGS['dir_site'].'/includes/footer.inc.php'; ?>

<!-- Search Begin -->
<?php include $arrSETTINGS['dir_site'].'/includes/search.inc.php'; ?>
<!-- Search End -->

<!-- Js Plugins -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/jquery.barfiller.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.nicescroll.min.js"></script>
<script src="js/main.js"></script>
</body>

</html>