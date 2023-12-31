<?php
session_start();
include_once "../app/middleware/auth.php";
include_once '../app/models/Room.php';

if(!isset($_SESSION['admin']))
    header("Location:../admin-login.php");


$roomObject = new Room();
$result = $roomObject->getRoomsData();
$roomData = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ادارة الغرف</title>
    <link rel="stylesheet" href="../Css/room-management.css">
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
                <li><a href="room-management.php"  class="active">
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
                                    </h3>
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
                <h1>ادارة الغرف</h1>
            </div>
            <div class="content">
                <div class="box">
                    <div class="add-room">
                        <a href="new-room.php"><button> اضافة غرفة جديدة</button></a>
                    </div>
                    <div class="search-bar">
                        <form action="">
                            <div>
                                <label for="">عرض</label>
                            <select name="" id="">
                                <option value="10" selected>10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="40">40</option>
                                <option value="50">50</option>
                            </select> 
                            </div>
                            <div >
                                <label for="">بحث :</label>
                                <input type="search" name="" id="">
                            </div>
                        </form>
                    </div>
                    <table>
                        <tr>
                            <td>
                                <span>التسلسل</span>
                                <span><i class="fa fa-sort"></i></span>
                            </td>
                            <td>
                                <span>رقم الغرفة</span>
                                <span><i class="fa fa-sort"></i></span>
                            </td>
                            <td>
                                <span>عدد الاشخاص في الغرفة</span>
                                <span><i class="fa fa-sort"></i></span>
                            </td>
                            <td>
                                <span>الاجور في الشهر</span>
                                <span><i class="fa fa-sort"></i></span>
                            </td>
                            <td>
                                <span> حالة الطعام </span>
                                <span><i class="fa fa-sort"></i></span>
                            </td>
                            <td>
                                <span>تاريخ اضافة الغرفة</span>
                                <span><i class="fa fa-sort"></i></span>
                            </td>
                            <td>
                                <span>اجراءات</span>
                                <span><i class="fa fa-sort"></i></span>
                            </td>
                        </tr>
                        <?php
                        if($roomData){
                            foreach ($roomData as $key=>$room){
                                ?>
                                <tr>
                                    <td><?php echo $room['ID'] ?></td>
                                    <td><?php echo $room['Room_Id'] ?></td>
                                    <td><?php echo $room['NumberOfBeds'] ?></td>
                                    <td><?php echo $room['Price'] ?></td>
                                    <td><?php echo $room['FoodStatus'] ?></td>
                                    <td><?php echo $room['created_at'] ?></td>
                                    <td><i class="fa fa-times-circle-o dlt">
                                            <i class="fa fa-edit scale"></i>
                                        </i></td>
                                </tr>
                        <?php
                            }
                        }
                        ?>

                    </table>
                    <div class="box-footer">
                        <div class="pages">
                            <span>عرض</span>
                            <span id="f-num">1</span>
                            <span>من</span>
                            <span id="l-num">4</span> 
                        </div>
                        <div class="buttons">
                            <button class="prev">السابق</button>
                            <span id="f-num">1</span>
                            <button class="next">التالي</button>
                        </div>
                    </div> 
                </div>
            </div>
            
        </div>
    </div>

    <script src="../Js/index.js"></script>
</body>

</html>