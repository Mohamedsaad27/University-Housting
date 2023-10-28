<?php
session_start();
include_once'app/models/Room.php';
$room = new Room();
$roomNumbers = $room->getRoomNumbers()->fetch_all(MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room details</title>
    <link rel="stylesheet" href="Css/book.room.css">
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
                <li><a href="Room-details.php" >
                        <span class="icon"><i class="fa fa-bed"></i></span>
                        <span class="item">تفاصيل غرفتك</span>
                    </a></li>
                <li><a href="Book-room.php" class="active">
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
                                        <a href="help.php" class="sub-menu-link" target="_blank">
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
                <h1>حجز الغرفة</h1>
            </div>
            <div class="content">
                <form action="">
                    <div class="room-info">
                        <div class="info">
                            <h3>رقم الغرفة</h3>
                            <select name="roomNumber" id="roomNumber" required>
                                <option value="" disabled selected>اختر...</option>
                                <?PHP 
                                if($roomNumbers){
                                    foreach ($roomNumbers as $key => $number) {
                                        ?>
                                        <option value="<?= $number['ID']?>" ><?=$number['Room_Id'] ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="info">
                            <h3>تاريخ الحجز</h3>
                            <input type="date" name = "startDate">
                        </div>
                        <div class="info">
                            <h3>عدد الاشخاص في الغرفة</h3>
                            <input type="text" name="NumberOfBeds" id="NumberOfBeds" placeholder="عدد الاشخاص في الغرفة" readonly>
                        </div>
                        <div class="info">
                            <h3>المدة الاجمالية للسكن</h3>
                            <select name="duration" id="" required>
                                <option value="" selected disabled>اختر...</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </div>
                        <div class="info">
                            <h3>حالة الغذاء</h3>
                            <input type="radio" name="FoodStatus" value="Included" id="m"> 
                            <label for="m">مطلوب (سوف يتم اضافة الف جنيه شهريا)</label>
                            <br>
                            <input type="radio" name="FoodStatus" value="Not Included" id="n" checked>
                            <label for="n">غير مطلوب</label>
                        </div>
                        <div class="info">
                            <h3>اجمالي الرسوم في الشهر</h3>
                            <input type="text" placeholder="اجمالي الرسوم في الشهر" readonly id="price">
                        </div>
                        <div class="info">
                            <h3>المجموع الكامل لمدة السكن المحددة</h3>
                            <input type="text" class="dif-txt" placeholder="اكتب المجموع الكامل لمدة السكن المحددة" id="totalPrice">
                        </div>
                    </div>
                    <h4>المعلومات الشخصية للطالب</h4>
                    <div class="personal-info">
                        <div class="info">
                            <h3>رقم تسجيل الطالب</h3>
                            <input type="text" class="dif-txt" placeholder="الرقم الخاص بالطالب">
                        </div>
                        <div class="info">
                            <h3>الاسم</h3>
                            <input type="text" class="dif-txt" placeholder="الاسم">
                        </div>
                        <div class="info">
                            <h3>اسم الاب</h3>
                            <input type="text" class="dif-txt" placeholder="اسم الاب">
                        </div>
                        <div class="info">
                            <h3>اللقب</h3>
                            <input type="text" class="dif-txt" placeholder="اللقب">
                        </div>
                        <div class="info">
                            <h3>البريد الالكتروني</h3>
                            <input type="text" class="dif-txt" placeholder="البريد الالكتروني">
                        </div>
                        <div class="info">
                            <h3>الجنس</h3>
                            <select name="" id="" required>
                                <option value="" disabled selected>اختار</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <div class="info">
                            <h3>رقم الهاتف</h3>
                            <input type="text" class="dif-txt" placeholder="رقم الهاتف">
                        </div>
                        <div class="info">
                            <h3>رقم الاتصال في حالات الطوارئ</h3>
                            <input type="text" class="dif-txt" placeholder="رقم الاتصال في حالات الطوارئ">
                        </div>
                        <div class="info">
                            <h3>المرحلة الدراسية</h3>
                            <select name="" id="" required>
                                <option value="" disabled selected>اختار</option>
                                <option value="">الفرقة الاولي</option>
                                <option value="">الفرقة الثانية</option>
                                <option value="">الفرقة الثالثة</option>
                                <option value="">الفرقة الرابعة</option>
                                <option value="">الفرقة الخامسه</option>
                            </select>
                        </div>
                    </div>
                    <h4>معلومات ولي الامر</h4>
                    <div class="parents-info">
                        <div class="info">
                            <h3>اسم ولي الامر</h3>
                            <input type="text" class="dif-txt" placeholder="اسم ولي الامر(رباعي)">
                        </div>
                        <div class="info">
                            <h3>العلاقة</h3>
                            <input type="text" class="dif-txt" placeholder="اب /ام /اخ....">
                        </div>
                        <div class="info">
                            <h3>رقم الهاتف</h3>
                            <input type="text" class="dif-txt" placeholder="رقم الهاتف">
                        </div>
                    </div>
                    <h4>معلومات العنوان الحالي</h4>
                    <div class="address-info">
                        <div class="info">
                            <h3>عنوان سكن الطالب</h3>
                            <input type="text" class="dif-txt" placeholder="العنوان الرسمي للطالب">
                        </div>
                        <div class="info">
                            <h3>المدينة</h3>
                            <input type="text" class="dif-txt" placeholder="المدينة">
                        </div>
                        <div class="info">
                            <h3>الرمز البريدي</h3>
                            <input type="text" class="dif-txt" placeholder="الرمز البريدي">
                        </div>
                    </div>
                    <h4>معلومات العنوان الدائم</h4>
                    <div class="var-address">
                        <p>تجاهل هذا المربع اذا كان لديك عنوان دائم مختلف</p>
                        <input type="checkbox">
                        <label for="">عنواني الدائم هو نفس العنوان اعلاه</label>
                    </div>
                    <h4>يرجي ملء النموذج "فقط اذا " كان لديك عنوان دائم مختلف</h4>
                    <div class="address-info">
                        <div class="info">
                            <h3>العنوان</h3>
                            <input type="text" class="dif-txt" placeholder="العنوان ">
                        </div>
                        <div class="info">
                            <h3>المدينة</h3>
                            <input type="text" class="dif-txt" placeholder="المدينة">
                        </div>
                        <div class="info">
                            <h3>الرمز البريدي</h3>
                            <input type="text" class="dif-txt" placeholder="الرمز البريدي">
                        </div>
                    </div>

                    <div class="buttons">
                        <input type="reset" value="الغاء" class="reset-btn">
                        <input type="submit" value="تسجيل" class="submit-btn">
                    </div>
                </form>
               
                
            </div>
        </div>

    </div>

    <script src="Js/index.js"></script>
</body>

</html>