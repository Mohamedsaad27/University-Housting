<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
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
                <li><a href="index-user.html">
                        <span class="icon"><i class="fa fa-home"></i></span>
                        <span class="item">الرئيسية</span>
                    </a></li>

                <li><a href="Room-details.html">
                        <span class="icon"><i class="fa fa-bed"></i></span>
                        <span class="item">تفاصيل غرفتك</span>
                    </a></li>
                <li><a href="Book-room.html">
                        <span class="icon"><i class="fa fa-calendar"></i></span>
                        <span class="item">حجز الغرفة</span>
                    </a></li>
                <li><a href="activity.html">
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
                                <a href="profile.html" class="sub-menu-link">
                                    <img src="images/profile.png">
                                    <p>ادارة الملف الشخصي</p>
                                    <span>&gt;</span>
                                </a>
                                <a href="settings.html" class="sub-menu-link">
                                    <img src="images/setting.png">
                                    <p>اعدادت الحساب</p>
                                    <span>&gt;</span>
                                    <a>
                                        <a href="help.html" target="_blank" class="sub-menu-link">
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
                <h1>ملفي الشخصي</h1>
            </div>
            <div class="content">
                <form action="">
                    <div class="read-only-info">
                        <div class="row1">
                            <label>اخر تحديث</label><br>
                            <input type="text" name="lastupdate" placeholder="" readonly>
                        </div>

                        <div class="row1">
                            <label>رقم الطالب</label><br>
                            <input type="text" name="NumOfStudent" placeholder="3" readonly>
                        </div>
                    </div>

                    <div class="info-wrap">
                        <div class="info">
                            <label>الاسم</label><br>
                            <input type="text">
                        </div>

                        <div class="info">
                            <label>اسم الاب</label><br>
                            <input type="text">
                        </div>


                        <div class="info">
                            <label>اسم الجد</label><br>
                            <input type="text">
                        </div>


                        <div class="info">
                            <label>الجنس</label><br>
                            <select class="gender">
                                <option>male</option>
                                <option>female</option>
                            </select>

                        </div>

                        <div class="info">
                            <label>البريدالالكتروني</label><br>
                            <input type="email" >
                        </div>


                        <div class="info">
                            <label>التليفون</label><br>
                            <input type="text" >
                        </div>

                    </div>

                    <div class="button">
                        <input type="submit" value="تحديث">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="Js/index.js"></script>
</body>

</html>