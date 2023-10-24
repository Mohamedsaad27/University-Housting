<?php 

session_start();
include_once 'app/models/Room.php';
include_once 'app/models/Student.php';
$roomObject = new Room();
$studentObject = new Student();
$studentObject->setEmail($_SESSION['user']->Email);
$result = $studentObject->getRoomDetails();
$roomDetails = $result->fetch_object();

$moreInforamtion = $studentObject->getMoreInformatio();
$studentInforamtion = $moreInforamtion->fetch_object();
echo "<pre>";
print_r($studentInforamtion);
echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room details</title>
    <link rel="stylesheet" href="Css/room-details.css">
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
                <li><a href="Room-details.php" class="active">
                        <span class="icon"><i class="fa fa-bed"></i></span>
                        <span class="item">تفاصيل غرفتك</span>
                    </a></li>
                <li><a href="Book-room.php">
                        <span class="icon"><i class="fa fa-calendar"></i></span>
                        <span class="item">حجز الغرفة</span>
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
                                    <h3 id="user-name"><?= $_SESSION['user']->First_Name .' '.$_SESSION['user']->Last_Name ?></h3>
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
                                        <a href="app/requests/StudentLogout.php" class="sub-menu-link">
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
                <h1>تفاصيل الغرفة</h1>
            </div>
            <div class="content">
               
                <table>
                    <tr>
                        <td colspan="2">
                            <div class="date-time">
                                <p>تاريخ ووقت تسجيل الدخول</p>
                                <p id="login-time"><?php echo date('H:i:s d-m-y ') ?> </p>
                            </div>
                        </td>
                        <td colspan="4" style="background-color: transparent; border: none;">

                        </td>
                    </tr>
                    <tr>
                        <td>رقم الغرفة</td>
                        <td><?= $roomDetails->Room_Id;?></td>
                        <td>تاريخ الحجز</td>
                        <td><?= date('d-m-Y', strtotime($roomDetails->created_at)); ?></td>

                        <td>عدد الاشخاص في الغرفة</td>
                        <td><?= $roomDetails->NumberOfBeds;?></td>
                    </tr>
                    <tr>
                        <td>مدة السكن</td>
                        <td><?= $roomDetails->duration;?> اشهر</td>
                        <td>حالة الطعام</td>
                        <td><?= ($roomDetails->FoodStatus) == 'Included' ? 'مطلوب ' : 'غير مطلوب ' ?></td>
                        <td>الرسوم في الشهر</td>
                        <td><?= $roomDetails->Price;?></td>
                    </tr>
                    <tr>
                        <td colspan="6" style="font-size: 20px; ">اجمالي الرسوم التي سوف يدفعها( 3اشهر ) :
                            <span id="money-cost">30 الف جنيه</span>
                            <p>هذا الاجراء مضاف عليه اجور الطعام ومدة السكن (اذا كان موجود)</p>
                        </td>
                        <!-- <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td> -->
                    </tr>
                    <tr>
                        <td>رقم الغرفة</td>
                        <td>2</td>
                        <td>الاسم بالكامل</td>
                        <td>abdo ahmed</td>
                        <td>البريد الالكتروني</td>
                        <td>a@gmail.com</td>
                    </tr>
                    <tr>
                        <td>رقم الهاتف</td>
                        <td>01017082519</td>
                        <td>الجنس</td>
                        <td>ذكر</td>
                        <td>المرحلة الدراسية</td>
                        <td>هندسة حاسوب</td>
                    </tr>
                    <tr>
                        <td>رقم الاتصال في حالة الطوارئ</td>
                        <td>#########</td>
                        <td>اسم ولي الامر</td>
                        <td>ahmed</td>
                        <td>علاقة ولي الامر</td>
                        <td>اب</td>
                    </tr>
                    <tr>
                        <td>رقم هاتف ولي الامر</td>
                        <td colspan="5">$$$$$$$$</td>
                        <!-- <td></td>
                    <td></td>
                    <td></td>
                    <td></td> -->
                    </tr>
                    <tr>
                        <td>العنوان الحالي</td>
                        <td colspan="2">nagg hammadi ,qena</td>
                        <!-- <td></td> -->
                        <td>العنوان الثابت</td>
                        <td colspan="2">nagg hammadi ,qena ,233</td>
                        <!-- <td></td> -->
                    </tr>
                </table>
            </div>
        </div>

    </div>

    <script src="Js/index.js"></script>
</body>

</html>