<?php
session_start();

include("connection.php");

if (!isset($_SESSION['username'])) {
    header("location: login.php");
}
?>

<!DOCTYPE html>
<head>   
    <link rel="icon"  href="./assets/images/logo.png">
    <link rel="stylesheet" href="./assets/css/navbar.css">
    <link rel="stylesheet" href="./assets/css/profile.css">
    <link rel="stylesheet" href="./assets/css/footer.css" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
    <title class="title">user profile</title>
</head>
<body>
    <?php require './includes/navbar.php'; ?>
    <div class="main_content">
    <div class="sidebar">
        <h2>neighbourly</h2>

        <ul class="sidebar-list">

            <a  href="./itemShared.php" > Items shared</a>
	 <a  href="./itemReceived.php" >Items Received</a>

        </ul>
       
        <button class="sign-out" onclick="window.location.href='./includes/logout.php';">Sign out</button>
    </div>
	





<?php

            if (isset($_POST['profileForm'])){
                $username = $_POST['username'];
		$email = $_POST['email'];
		$fname = $_POST['firstName'];
		$lname = $_POST['lastName'];
		$phone = $_POST['phone'];
		$addr = $_POST['addr'];
		$city = $_POST['city'];
		$state = $_POST['state'];
		$pincode = $_POST['pincode'];
        $photoPath = './assets/images/logo.png';

        if (!empty($_FILES['photo']['name'])) {
    $photoName = basename($_FILES['photo']['name']);
    $targetDir = "./uploads/";

    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }

    $targetFile = $targetDir . time() . "_" . $photoName;

    if (move_uploaded_file($_FILES['photo']['tmp_name'], $targetFile)) {
        $photoPath = $targetFile;
        echo "Image uploaded successfully!"; // Debug message
    } else {
        echo "Error uploading the image!";
    }
}





                $id = $_SESSION['id'];
		$edit_query = mysqli_query($conn, "UPDATE users SET username='$username', email='$email', first_name='$fname', last_name='$lname', phone_number='$phone', 
		      address='$addr', city='$city', state='$state' ,photo='$photoPath' ,pincode='$pincode' 	WHERE id = $id");

                if ($edit_query) {
                    echo "<div class='message'>
                	<p>Profile Updated!</p>
                	</div><br>";
                    header('location: profile.php');
                }
            } else {

                $id = $_SESSION['id'];
                $query = mysqli_query($conn, "SELECT * FROM users WHERE id = $id") or die("error occurs");

                while ($result = mysqli_fetch_assoc($query)) {
                    $res_username = $result['username'];
                    $res_email = $result['email'];
		    $res_id = $result['id'];
		
		    $res_fname = $result['first_name'];
		    $res_lname = $result['last_name'];
             
                $res_phone = $result['phone_number'];
                $res_addr = $result['address'];
                $res_city = $result['city'];
                $res_state = $result['state'];
                $res_pincode = $result['pincode'];
                $res_photo = $result['photo'];

                }

                ?>
    <div class="main">
        <h1 style="text-decoration: underline;">User Profile</h1>
        
            <div class="profile-container">
            <form id="profileForm" method="post" enctype="multipart/form-data">
                
                <label>
                    <img src="<?php echo $res_photo ? $res_photo : './assets/images/logo.png'; ?>" alt="User Profile" style="width: 100px; height: 100px; object-fit: cover; border-radius: 50%;">
                </label>
                <input type="file" name="photo" id="photo" accept="image/*" style="display: block; margin-top: 10px;" >
                

                <label>Username</label>
                <input type="text"  name="username" value="<?php echo $res_username; ?>" required>

                <label>First Name</label>
                <input type="text"  name="firstName" value="<?php echo $res_fname; ?>" required>
                <label>Last Name</label>
                <input type="text"  name="lastName" value="<?php echo $res_lname; ?>" required>
                
                <label>Email Address </label>
                <input type="email"  name="email" value="<?php echo $res_email; ?>" required>
                <label>Phone Number</label>
                <input type="tel"  name="phone" value="<?php echo $res_phone; ?>" required>
                <label>Address</label>
                <input type="text" name="addr" value="<?php echo $res_addr; ?>" required>
                <label>city</label>
                <input type="text" name="city" value="<?php echo $res_city; ?>" required>
                <label>state</label>
                <input type="text" name="state" value="<?php echo $res_state; ?>" required>
                <label>pincode</label>
                <input type="tel" name="pincode" value="<?php echo $res_pincode; ?>" required>
                <br>
                <button type="submit" name="profileForm">Save Changes</button>
                <br>
                <button type="reset">Cancel</button>
            </form>
        </div>
    </div>

   </div>

<?php } ?>
    </div>
    <?php require './includes/footer.php'; ?>
	<script src="./assets/js/navbar.js"></script>
    </body>
    </html>
