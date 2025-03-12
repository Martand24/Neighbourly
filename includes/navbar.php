
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

