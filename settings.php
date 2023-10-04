<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" href="./Css/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <aside class="sidebar">
            <!--profile image  -->
            <div class="logo">
                <img src="images/logo.jpg" alt="">
                <h1> University Housing</h1>
            </div>
            <!-- Sidebar Menu items -->
            <ul>
                <li><a href="index-user.php">
                        <span class="icon"><i class="fa fa-home"></i></span>
                        <span class="item">الرئيسية</span>
                    </a></li>

                <li><a href="Room-details.php">
                        <span class="icon"><i class="fa fa-bed"></i></span>
                        <span class="item">تفاصيل غرفتك</span>
                    </a></li>
                <li><a href="Book-room.php">
                        <span class="icon"><i class="fa fa-calendar"></i></span>
                        <span class="item">حجز الغرفة</span>
                    </a></li>
                <li><a href="activity.php">
                        <span class="icon"><i class="fa fa-gears"></i></span>
                        <span class="item">انشطة تسجيل الدخول</span>
                    </a></li>
            </ul>
        </aside>

        <section class="section">
            <nav class="top-navbar">
                <div class="hamburger">
                    <a href="#"><i class="fa fa-bars"></i></a>
                </div>
                <div class="profile">
                    <div class="avatar">
                        <img src="images/avatar.png" class="avatar-img" onclick="toggleMenu()">
                        <div class="sub-menu-wrap" id="subMenu">
                            <div class="sub-menu">
                                <div class="user-info">
                                    <img src="images/avatar.png">
                                    <h3 id="user-name">Abdo Ahmed</h3>
                                </div>
                                <hr>
                                <a href="profile.php" class="sub-menu-link">
                                    <img src="images/profile.png">
                                    <p>ادارة الملف الشخصي</p>
                                    <span>&gt;</span>
                                </a>
                                <a href="settings.php" class="sub-menu-link">
                                    <img src="images/setting.png">
                                    <p>اعدادت الحساب</p>
                                    <span>&gt;</span>
                                    <a>
                                        <a href="help.php" target="_blank" class="sub-menu-link">
                                            <img src="images/help.png">
                                            <p>المساعدة والدعم</p>
                                            <span>&gt;</span>
                                        </a>
                                        <a href="#" class="sub-menu-link">
                                            <img src="images/logout.png ">
                                            <p>تسجيل الخروج</p>
                                            <span>&gt;</span>
                                        </a>
                            </div>
                        </div>
                    </div>

                </div>
        </section>

        <div class="main-content">
            <div class="page-content-header">
                <h1>اعدادات الحساب</h1>
            </div>
            <div class="content">
                <h3>تغيير كلمة السر</h3>
                <form action="">
                    <div class="last-update">
                        <div class="pass">
                            <label>اخر تحديث :</label>
                            <input type="text" readonly>
                        </div>
                    </div>

                    <div class="info-wrap">
                        <div class="info">
                            <label>كلمه السر الحاليه</label><br>
                            <input type="password">
                        </div>

                        <div class="info">
                            <label>كلمه السر الجديده</label><br>
                            <input type="password">
                        </div>

                        <div class="info">
                            <label>تأكيد كلمه السر </label><br>
                            <input type="password">
                        </div>
                    </div>
                    <div class="button">
                        <input type="submit" value="الغاء" class="canel">
                        <input type="submit" value="تحديث">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="Js/index.js"></script>
</body>

</html>