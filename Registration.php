<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>University Housing</title>
    <link rel="stylesheet" href="./Css/Registration.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container">
        <div class="register-box">
            <h1>Create Account</h1>
            <form action="#" class="form-style">
                <div class="first">
                    <input type="text" value="" placeholder="First Name" required>
                    <input type="text" value="" placeholder="Last Name" required>
                </div>
                <div class="email-style">
                    <input type="email" value="" placeholder="E-mail" required>
                    <i class="material-icons">email</i>
                </div>
                <select name="gender" id="gender" required>
                    <option value="" disabled selected>Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
                <div class="phone-style" >
                    <input type="text" placeholder="0000 000 0000" required>
                    <i class="material-icons">phone</i>
                </div>
                <div class="pass-style">
                    <input type="password" placeholder="Password" required>
                    <i class="material-icons">lock_outline</i>
                </div>
                <div class="c-pass-style">
                    <input type="password" placeholder="Confirm Password" class="c-pass-npt" required>
                    <i class="material-icons">lock_outline</i>
                </div>
                <div class="submit">
                    <input type="submit" value="Sign-up" >
                </div>
                
            </form>
        </div>

        <div class="logo">
            <div class="head">
               <a href="welcome-page.html"><i class="fa fa-arrow-circle-right"></i></a>
            </div>
            <div class="img">
            </div>

        </div>
    </div>
</body>

</html>