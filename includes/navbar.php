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
        <a class="nav-share" href="/post.php">Share</a>
        <a class="nav-explore" href="/items.php">Explore</a>
        <div class="search-bar">
            <form  class="search-bar-inner" action="search_results.php" method="get">
                <input type="text" placeholder="Search items" class="search-box">
                <button class="search-button" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
    </div>
    <div class="myCollapse">
        <a class="nav-about" href="/aboutUs.html">About us</a>
        <!-- <a class="nav-contact" href="/contactUs.php">Contact Us</a> -->
        <?php if (isset($_SESSION['id'])): ?>
		<a class="nav-profile" href="./profile.php">
	            <img style="height:2rem; width:2rem" src="/profile.png" class="nav-profile" alt="">
		</a>
        <?php else: ?>
		<a href="./login.php">Login In</a>
        <?php endif; ?>
    </div>
</div>
