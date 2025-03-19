
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start session only if it's not already started
}
?>

<div class="nav-bar">
    <div class="no-collapse">
        <div>
            <img src="./assets/images/logo.png" class="logo" alt="logo">
        </div>
        <a class="nav-share" href="./post.php">Share</a>
        <a class="nav-explore" href="./explore.php">Explore</a>
        <div class="search-bar">
            <form  class="search-bar-inner" action="/neighbourly/explore.php" method="get">
                <input type="text" placeholder="Search items" name="query" class="search-box" id="search_input">
                <button class="search-button" type="submit" ><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
    </div>
    <div class="myCollapse">
<!--         bell-icon -->
         <i class="fa-solid fa-bell notif_bell" id="bell_icon" style="font-size:30px; cursor: pointer; color:white;margin-top: 7px; margin-right:10px;"></i>

<!--         notification box -->
            <div class="notif-pop-up-box hidden">
              <div class="notif-card-request">
                <div class="text-section">
                  <a href="" class="user-name">user123</a>
                  <p>wants to chat</p>
                  <p>regarding <a href="">book</a></p>
                </div>
                <div class="choice-section">
                  <a  href="" class="accept"><i class="fa-solid fa-check"></i></a>
                  <a href="" class="reject"><i class="fa-solid fa-xmark"></i></a>
                </div>
                <p class="notif-time">21:13</p>
              </div>
              <div class="notif-card-received">
                <div class="text-section">                  
                  <p><a href="" class="user-name">user123</a> has received your <a href="">book!</a></p>
                  <p class="notif-time">21:13</p>
                </div>
              </div>
              <div class="notif-card-shared">
                <div class="text-section">                  
                  <p><a href="" class="user-name">user123</a> has shared <a href="">book</a> with you!</p>
                  <button class="verify-receive">Recieved</button>
                  <p class="notif-time">21:13</p>
                </div>
              </div>
            </div>
        <a class="nav-about" href="/aboutUs.html">About us</a>
        <!-- <a class="nav-contact" href="/contactUs.php">Contact Us</a> -->
        <?php if (isset($_SESSION['id'])): 
    $id = $_SESSION['id'];
    include("connection.php"); // Ensure database connection is included
    $query = mysqli_query($conn, "SELECT photo FROM users WHERE id = $id") or die("Error occurs");

    $res_photo = ""; // Default empty
    if ($result = mysqli_fetch_assoc($query)) {
        $res_photo = $result['photo'];
    }
?>
    <a class="nav-profile" href="./profile.php">
        <img style="height:3rem; width:3rem; border-radius: 50%;" 
             src="<?php echo !empty($res_photo) ? $res_photo : './assets/images/logo.png'; ?>" 
             class="nav-profile" 
             alt="User Photo">
    </a>
<?php else: ?>
    <a href="./login.php">Login</a>
<?php endif; ?>






        
    </div>
</div>

