<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Housing</title>
    <style>
        .alert {
            padding: 20px;
            margin-bottom: 10px;
            border: 1px solid transparent;
            border-radius: 4px;
        }

        /* Styles for error alerts */
        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        /* Style for the text inside the alert */
        .alert-text {
            color: #721c24;
        }er-radius: 5px;
        }
    </style>
    <link rel="stylesheet" href="./Css/Registration.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <div class="register-box">
            <h1>Create Account</h1>

            <form action="app/requests/studentRegister.php" method="post" class="form-style">
                <div class="first">
                    <input type="text"  placeholder="First Name" name="first_name"  value="<?php if(isset($_POST['first_name'])){echo $_POST['first_name'];} ?>" >
                    <?php
                    if(!empty($_SESSION['registration']['first_name'])){
                        foreach ($_SESSION['registration']['first_name'] as $key=>$error){
                            echo '<div class="alert alert-danger" role="alert"><p class="alert-text">' . $error . '</p></div>';
                        }
                    }
                    ?>
                    <input type="text" value="" placeholder="Last Name"  name="last_name" >
                    <?php
                    if(!empty($_SESSION['registration']['last_name'])){
                        foreach ($_SESSION['registration']['last_name'] as $key=>$error){
                            echo '<div class="alert alert-danger" role="alert"><p class="alert-text">' . $error . '</p></div>';
                        }
                    }
                    ?>
                </div>
                <div class="email-style">
                    <input type="email" value="" placeholder="E-mail" name="email" >
                    <i class="material-icons">email</i>
                    <?php
                    if(!empty($_SESSION['registration']['email'])){
                        foreach ($_SESSION['registration']['email'] as $key=>$error){
                            echo '<div class="alert alert-danger" role="alert"><p class="alert-text">' . $error . '</p></div>';
                        }
                    }
                    ?>
                </div>
                <select name="gender" id="gender" >
                    <option value="" disabled selected>Gender</option>
                    <option value="m">Male</option>
                    <option value="f">Female</option>
                </select>
                <div class="phone-style" >
                    <input type="text" placeholder="Phone" name="phone" >
                    <i class="material-icons">phone</i>
                    <?php
                    if(!empty($_SESSION['registration']['phone'])){
                        foreach ($_SESSION['registration']['phone'] as $key=>$error){
                            echo '<div class="alert alert-danger" role="alert"><p class="alert-text">' . $error . '</p></div>';
                        }
                    }
                    ?>
                </div>
                <div class="pass-style">
                    <input type="password" placeholder="Password" name="password" >
                    <i class="material-icons">lock_outline</i>
                    <?php
                    if(!empty($_SESSION['registration']['password'])){
                        foreach ($_SESSION['registration']['password'] as $key=>$error){
                            echo '<div class="alert alert-danger" role="alert"><p class="alert-text">' . $error . '</p></div>';
                        }
                    }
                    ?>
                </div>
                <div class="c-pass-style">
                    <input type="password" placeholder="Confirm Password" name="confirm-password" class="c-pass-npt" >
                    <i class="material-icons">lock_outline</i>
                    <?php
                    if(!empty($_SESSION['registration']['NewPasswordConfirm'])){
                        foreach ($_SESSION['registration']['NewPasswordConfirm'] as $key=>$error){
                            echo '<div class="alert alert-danger" role="alert"><p class="alert-text">' . $error . '</p></div>';
                        }
                    }
                    ?>
                </div>
                <div class="submit">
                    <input type="submit" value="Sign-up" >
                </div>
                
            </form>
        </div>

        <div class="logo">
            <div class="head">
               <a href="welcome-page.php"><i class="fa fa-arrow-circle-right"></i></a>
            </div>
            <div class="img">
            </div>

        </div>
    </div>
</body>

</html>
<?php
unset($_SESSION['registration']);

?>