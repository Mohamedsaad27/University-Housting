<?php
include_once "../app/middleware/auth.php";
session_start();
// var_dump($_SESSION['admin']);die;
if(!isset($_SESSION['admin']))
    header("Location:../admin-login.php");
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin-Profile</title>
    <link rel="stylesheet" href="../Css/profile.css">
<!--    <link rel="stylesheet" href="../Css/bootstrap.min.css" />-->
<!--    <link rel="stylesheet" href="../Css/all.min.css" />-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500&display=swap" rel="stylesheet" />
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
                <li><a href="index-admin.php">
                        <span class="icon"><i class="fa fa-home"></i></span>
                        <span class="item">الرئيسية</span>
                    </a></li>
                <li><a href="student-accounts.php">
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
                                    <h3 id="user-name"><?= $_SESSION['admin']->First_Name . ' ' . $_SESSION['admin']->Last_name;    ?></h3>
                                </div>
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
                <h1>ملفي الشخصي</h1>
                <?php
                if(isset($_SESSION['update-success'])){
                    echo $_SESSION['update-success'];

                }
                ?>
            </div>
            <div class="content">
                <form method="post" id="UpdateFRM" action="../app/requests/UpdateAdminData.php">
                    <div class="read-only-info">
                        <div class="row1">
                            <label>اخر تحديث</label><br>
                            <input type="text" name="updated_at" placeholder="" readonly value="<?= $_SESSION['admin']->UpdatedAt; ?>">
                        </div>

                        <div class="row1">
                            <label>رقم المسؤل</label><br>
                            <input type="text" value="<?= $_SESSION['admin']->ID; ?>" name="NumOfStudent" placeholder="3" readonly>
                        </div>
                    </div>

                    <div class="info-wrap">
                        <div class="info">
                            <label>الاسم</label><br>
                            <input type="text" name="first_name" value="<?= $_SESSION['admin']->First_Name; ?>">
                            <?php
                                        if (!empty($_SESSION['update-errors']['first_name'])) {
                                            foreach ($_SESSION['update-errors']['first_name'] as $key => $value) {
                                                echo "<div class='alert alert-danger'>$value</div>";
                                            }
                                        }
                                        ?>
                        </div>

                        <div class="info">
                            <label>اسم الاب</label><br>
                            <input type="text" name="last_name" value="<?= $_SESSION['admin']->Last_name; ?>">
                            <?php
                                        if (!empty($_SESSION['update-errors']['last_name'])) {
                                            foreach ($_SESSION['update-errors']['last_name'] as $key => $value) {
                                                echo "<div class='alert alert-danger'>$value</div>";
                                            }
                                        }
                                        ?>
                        </div>


                        <div class="info">
                            <label>اسم الجد</label><br>
                            <input type="text" name="grand_name" value="<?= $_SESSION['admin']->Grand_Name; ?>">
                            <?php
                            if (!empty($_SESSION['update-errors']['grand_name'])) {
                                foreach ($_SESSION['update-errors']['grand_name'] as $key => $value) {
                                    echo "<div class='alert alert-danger'>$value</div>";
                                }
                            }
                            ?>
                        </div>


                        <div class="info">
                            <label>الجنس</label><br>
                            <select class="gender" name="gender">
                                <option <?= $_SESSION['admin']->Gender == 'Male' ? 'selected' : '' ?> value="Male">Male</option>
                                <option <?= $_SESSION['admin']->Gender == 'Female' ? 'selected' : '' ?> value="Female">Female</option>
                            </select>

                        </div>

                        <div class="info">
                            <label>البريدالالكتروني</label><br>
                            <input type="email" name="email" value="<?= $_SESSION['admin']->Email; ?>" readonly>
                        </div>


                        <div class="info">
                            <label>التليفون</label><br>
                            <input type="text" name="phone" value="<?= $_SESSION['admin']->Phone; ?>">
                            <?php
                            if (!empty($_SESSION['update-errors']['phone'])) {
                                foreach ($_SESSION['update-errors']['phone'] as $key => $value) {
                                    echo "<div class='alert alert-danger'>$value</div>";
                                }
                            }
                            ?>
                        </div>

                    </div>

                    <div class="button">
                        <input type="submit" value="تعديل" id="Update" >
                    </div>
                </form>
            </div>
        </div>
    </div>
<!--    <script src="../Js/jquery.js"></script>-->
    <script src="../Js/bootstrap.bundle.min.js"></script>
<!--    <script src="../Js/all.min.js"></script>-->
    <script src="../Js/index.js"></script>
</body>

</html>

<?php
unset($_SESSION['update-errors']);
unset($_SESSION['update-success']);
unset($_SESSION['update-failed']);
?>