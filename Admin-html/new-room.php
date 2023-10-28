<?php
session_start();
include_once "../app/middleware/auth.php";
include_once '../app/models/Student.php';

if(!isset($_SESSION['admin']))
    header("Location:../admin-login.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اضافة غرفة</title>
    <link rel="stylesheet" href="../Css/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <aside class="sidebar">
            <!--profile image  -->
            <div class="logo">
                <img src="../images/logo.jpg" alt="">
                <h1> University Housing</h1>
            </div>
            <!-- Sidebar Menu items -->
            <ul>
                <li><a href="index-admin.php" >
                        <span class="icon"><i class="fa fa-home"></i></span>
                        <span class="item">الرئيسية</span>
                    </a></li>
                <li><a href="student-accounts.php" >
                        <span class="icon"><i class="fa fa-user-circle"></i></span>
                        <span class="item">حسابات الطلاب المسجلين</span>
                    </a></li>
                <li><a href="student-register.php">
                        <span class="icon"><i class="fa fa-users"></i></span>
                        <span class="item">حجوزات الطلاب</span>
                    </a></li>
                <li><a href="room-management.php">
                        <span class="icon"><i class="fa fa-bed"></i></span>
                        <span class="item">ادارة الغرف</span>
                    </a></li>
                <li><a href="levels-management.php">
                        <span class="icon"><i class="fa fa-book"></i></span>
                        <span class="item">ادارة المراحل الدراسية</span>
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
                        <img src="../images/avatar.png" class="avatar-img" onclick="toggleMenu()">
                        <div class="sub-menu-wrap" id="subMenu">
                            <div class="sub-menu">
                                <div class="user-info">
                                    <img src="../images/avatar.png">
                                    <h3 id="user-name">
                                        <?=
                                        $_SESSION['admin']->First_Name .' '.$_SESSION['admin']->Last_name;
                                        ?>
                                    </h3>                                </div>
                                <hr>
                                <a href="profile-admin.php" class="sub-menu-link">
                                    <img src="../images/profile.png">
                                    <p>ادارة الملف الشخصي</p>
                                    <span>&gt;</span>
                                </a>
                                <a href="settings-admin.php" class="sub-menu-link">
                                    <img src="../images/setting.png">
                                    <p>اعدادت الحساب</p>
                                    <span>&gt;</span>
                                    <a>
                                        <a href="../help.php" target="_blank" class="sub-menu-link">
                                            <img src="../images/help.png">
                                            <p>المساعدة والدعم</p>
                                            <span>&gt;</span>
                                        </a>
                                        <a href="../app/requests/adminLogout.php" class="sub-menu-link">
                                            <img src="../images/logout.png ">
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
                <h1>اضافة غرفة</h1>
            </div>
            <div class="content">
                <form method="post" id="NewRoomFRM">
                    <div class="info-wrap">
                        <div class="info">
                            <label for="">رقم الغرفة</label><br>
                            <input type="text" placeholder="اكتب رقم الغرفة" required name="roomNumber">
                        </div>
                        <div class="info">
                            <label for="">المقاعد في الغرفة</label><br>
                            <input type="number" placeholder="عدد المقاعد في الغرفة" required name="numberOfBeds">
                        </div>
                        <div class="info">
                            <label for="">الرسوم الشهرية</label><br>
                            <input type="number" placeholder="الرسوم الشهرية" required name="Price">
                        </div>
                        <div class="info">
                            <label for=""> حالة الغرفة </label><br>
                            <select name="AvailabilityStatus" id="">
                                <option value="Available">متاحة</option>
                                <option value="Occupied">مشغولة</option>
                            </select>
                        </div>
                        <div class="info">
                            <label for="">حالة الطعام</label><br>
                            <select name="FoodStatus" id="">
                                <option value="Included">شامل</option>
                                <option value="Not Included">غير شامل</option>
                            </select>
                        </div>
                    </div>
                    <?php
                                        if (!empty($_SESSION['errors'])) {
                                            foreach ($_SESSION['errors']as $key => $value) {
                                                echo "<div class='alert alert-danger'>$value</div>";
                                            }
                                        }
                                        ?>
                    <div class="button">
                        <input type="reset" value="حذف" class="dlt">
                        <input type="submit" value="اضافة">
                    </div>
                </form>
            </div>
            
        </div>
    </div>

    <script src="../Js/jquery.js"></script>
    <script src="../Js/index.js"></script>
</body>

</html>
<?php
unset($_SESSION['errors']);
?>