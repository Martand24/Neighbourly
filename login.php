<?php

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neighbourly</title>
    <link rel="icon" href="./assets/images/logo.png">
    <link rel="stylesheet" href="./assets/css/login.css">
</head>

<body>
    <div class="main-container">
        <div class="logo-box">
            <div class="inner-logo-box">
		<div >
			<img src="assets/images/logo.png" alt="logo image" class="logo-img"></img>
		</div>
                <div class="logo-up-text">neighbourly</div>
                <div class="logo-down-text">from your hearts to your neighbours</div>
            </div>
        </div>
        <div class="signin-box">
            <div class="inner-signin">
                <div class="choice">
                    <div class="slider"></div>
                    <div class="btn">
                        <button class="login">Login</button>
                        <button class="signin">Sign in</button>
                        <!-- <div class="crt-acc-text">Create your account</div> -->
                    </div>
		</div>


<?php
      include "connection.php";

      if (isset($_POST['login-btn'])) {

        $email = $_POST['email'];
        $pass = $_POST['password'];

        $sql = "select * from users where email='$email'";

        $res = mysqli_query($conn, $sql);

        if (mysqli_num_rows($res) > 0) {

          $row = mysqli_fetch_assoc($res);

          $password = $row['password'];

          $decrypt = password_verify($pass, $password);


          if ($decrypt) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            header("location: index.php");


          } else {
            echo "<div class='message'>
                    <p>Wrong Password</p>
                    </div><br>";
          }

        } else {
          echo "<div class='message'>
                    <p>Wrong Email or Password</p>
                    </div><br>";

        }


      } else {}


?>
 <?php

    

          include "connection.php";

          if (isset($_POST['signup-btn'])) {

            $name = $_POST['susername'];
            $email = $_POST['semail'];
            $pass = $_POST['pass'];
	    $cpass = $_POST['cpass'];
	    $phone = $_POST['phone'];


            $check = "select * from users where email='{$email}'";

            $res = mysqli_query($conn, $check);

            $passwd = password_hash($pass, PASSWORD_DEFAULT);

            $key = bin2hex(random_bytes(12));




            if (mysqli_num_rows($res) > 0) {
              echo "<div class='message'>
        <p>This email is used, Try another One Please!</p>
        </div><br>";

              //echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";


            } else {

              if ($pass === $cpass) {

                $sql = "insert into users(username,email,password,phone_number) values('$name','$email','$passwd','$phone')";

                $result = mysqli_query($conn, $sql);

                if ($result) {

                  echo "<div class='message'>
      <p>You are registered successfully!</p>
      </div><br>";

                 // echo "<a href='login.php'><button class='btn'>Login Now</button></a>";

                } else {
                  echo "<div class='message'>
        <p>This email is used, Try another One Please!</p>
        </div><br>";

                  //echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button></a>";
                }

              } else {
                echo "<div class='message'>
      <p>Password does not match.</p>
      </div><br>";

                //echo "<a href='login.php'><button class='btn'>Go Back</button></a>";
              }
            }
          } else {}

            ?>




                <div class="form-section">
                    <form action="login.php" class="login-form " method="post">
                        <input type="text" class="form-input" name="email" placeholder="Email">
                        <input type="password" class="form-input" name="password" placeholder="Password">
                        <button class="submit-button" name="login-btn">Login</button>
                    </form>


                    <form action="login.php" class="signin-form hide" method="post">
                        <input class="form-input" type="text" placeholder="Username" id="username" name="susername">
                        <input class="form-input" type="email" placeholder="Email" id="email" name="semail">
			<input class="form-input" type="password" placeholder="Password" id="password" name="pass"> 
			<input class="form-input" type="password" placeholder="Confirm Password" id="password" name="cpass">
                        <input class="form-input" type="text" placeholder="Phone number" id="phone-number" name="phone">
                        <button class="submit-button" name="signup-btn">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="./assets/js/login.js"></script>
</body>

</html>

