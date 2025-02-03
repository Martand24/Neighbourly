<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">    
        <link rel="icon"  href="./assets/images/logo.png">
        <link rel="stylesheet" href="./assets/css/explore.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
      </head>
        <title>Neighbourly</title>
    </head>    
<body>
  <div class="nav-bar">
    <div class="no-collapse">
        <div>
            <img src="./assets/images/logo.png" class="logo" alt="logo">
        </div>
        <a class="nav-share" href="/post.php">Share</a>
        <a class="nav-explore" href="/index1.html">Home</a>
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
        <!-- <a class="nav-profile" href="/user.php"> -->
            <!-- <img src="/profile.png" class="nav-profile" alt=""> -->
        <!-- </a> -->
        <p><a class="lgn-sgn" href="/login.php">Login</a> or <a href="/sigin.php"> Sign up</a></p>
    </div>
</div>

<!--location-->
<div class="location-bar"><i class="fa-solid fa-location-dot"></i> <span> </span> City, State</div>

<!-- category box -->
 <!-- <div class="category-box">
  <div class="dropdown-box">
    <p>All Category</p> <i class="fa-solid fa-caret-down down-arrow"></i>
    <div class="categories">
      <a href="">Clothes</a>
      <a href="">Books</a>
      <a href="">Electronic</a>
    </div>
  </div>
 </div> -->

 <!-- filter section -->
<form action="" class="filter-categories">
    <div class="select-category dropdown-box">
      <p class="dropbtn">All categories <i class="fa-solid fa-caret-down down-arrow" style="font-size: large;"></i></p>
      <div class="categories">
        <p>Books</p>
        <p>Electronic</p>
        <p>Stationary</p>
        <p>Home appliances</p>
        <p>Clothes</p>
      </div>
    </div>
    <input type="text" class="search-box-filter dropdown-box" placeholder="Search item">
    <div class="select-category dropdown-box">
      <p class="dropbtn">--Select condition-- <i class="fa-solid fa-caret-down down-arrow" style="font-size: large;"></i></p>
      <div class="categories">
        <p>Very Good</p>
        <p>Good</p>
        <p>Moderate</p>
        <p>Bad</p>
      </div>
    </div>
    <button class="filter-button" type="submit">Filter</button>
</form>
 <!-- main-content -->
  <div class="item-box">
    <div class="item-container">
      <div class="image-box">
        <img src="/bag.png" class="image" alt="">
      </div>
      <a class="item-category">Stationary</a>
      <div class="item-title">School Bag</div>
      <div class="item-desc">Skybag Nave blue shcool bag | 4 compartments lightweight waterpro...</div>
      <div class="horizontal-line"></div>
      <div class="posted-on"> <b>Posted on:</b> dd/mm/yyyy</div>
      <div class="condition"> <b>Condition:</b> Good</div>
      <div class="view-button">View</div>
      
    </div>
    <div class="item-container">
      <div class="image-box">
        <img src="/penstand.png" class="image" alt="">
      </div>
      <a class="item-category">Stationary</a>
      <div class="item-title">School Bag</div>
      <div class="item-desc">Skybag Nave blue shcool bag | 4 compartments lightweight waterpro...</div>
      <div class="horizontal-line"></div>
      <div class="posted-on"> <b>Posted on:</b> dd/mm/yyyy</div>
      <div class="condition"> <b>Condition:</b> Good</div>
      <div class="view-button">View</div>
    </div>
    <div class="item-container">
      <div class="image-box">
        <img src="/bottle.png" class="image" alt="">
      </div>
      <a class="item-category">Stationary</a>
      <div class="item-title">School Bag</div>
      <div class="item-desc">Skybag Nave blue shcool bag | 4 compartments lightweight waterpro...</div>
      <div class="horizontal-line"></div>
      <div class="posted-on"> <b>Posted on:</b> dd/mm/yyyy</div>
      <div class="condition"> <b>Condition:</b> Good</div>
      <div class="view-button">View</div>
    </div>
    <div class="item-container">
      <div class="image-box">
        <img src="/bag.png" class="image" alt="">
      </div>
      <a class="item-category">Stationary</a>
      <div class="item-title">School Bag</div>
      <div class="item-desc">Skybag Nave blue shcool bag | 4 compartments lightweight waterpro...</div>
      <div class="horizontal-line"></div>
      <div class="posted-on"> <b>Posted on:</b> dd/mm/yyyy</div>
      <div class="condition"> <b>Condition:</b> Good</div>
      <div class="view-button">View</div>
      
    </div>
    <div class="item-container">
      <div class="image-box">
        <img src="/penstand.png" class="image" alt="">
      </div>
      <a class="item-category">Stationary</a>
      <div class="item-title">School Bag</div>
      <div class="item-desc">Skybag Nave blue shcool bag | 4 compartments lightweight waterpro...</div>
      <div class="horizontal-line"></div>
      <div class="posted-on"> <b>Posted on:</b> dd/mm/yyyy</div>
      <div class="condition"> <b>Condition:</b> Good</div>
      <div class="view-button">View</div>
    </div>
    <div class="item-container">
      <div class="image-box">
        <img src="/bottle.png" class="image" alt="">
      </div>
      <a class="item-category">Stationary</a>
      <div class="item-title">School Bag</div>
      <div class="item-desc">Skybag Nave blue shcool bag | 4 compartments lightweight waterpro...</div>
      <div class="horizontal-line"></div>
      <div class="posted-on"> <b>Posted on:</b> dd/mm/yyyy</div>
      <div class="condition"> <b>Condition:</b> Good</div>
      <div class="view-button">View</div>
    </div>

    <div class="item-container">
      <div class="image-box">
        <img src="/bag.png" class="image" alt="">
      </div>
      <a class="item-category">Stationary</a>
      <div class="item-title">School Bag</div>
      <div class="item-desc">Skybag Nave blue shcool bag | 4 compartments lightweight waterpro...</div>
      <div class="horizontal-line"></div>
      <div class="posted-on"> <b>Posted on:</b> dd/mm/yyyy</div>
      <div class="condition"> <b>Condition:</b> Good</div>
      <div class="view-button">View</div>
      
    </div>
    <div class="item-container">
      <div class="image-box">
        <img src="/penstand.png" class="image" alt="">
      </div>
      <a class="item-category">Stationary</a>
      <div class="item-title">School Bag</div>
      <div class="item-desc">Skybag Nave blue shcool bag | 4 compartments lightweight waterpro...</div>
      <div class="horizontal-line"></div>
      <div class="posted-on"> <b>Posted on:</b> dd/mm/yyyy</div>
      <div class="condition"> <b>Condition:</b> Good</div>
      <div class="view-button">View</div>
    </div>
    <div class="item-container">
      <div class="image-box">
        <img src="/bottle.png" class="image" alt="">
      </div>
      <a class="item-category">Stationary</a>
      <div class="item-title">School Bag</div>
      <div class="item-desc">Skybag Nave blue shcool bag | 4 compartments lightweight waterpro...</div>
      <div class="horizontal-line"></div>
      <div class="posted-on"> <b>Posted on:</b> dd/mm/yyyy</div>
      <div class="condition"> <b>Condition:</b> Good</div>
      <div class="view-button">View</div>
    </div>

    <div class="item-container">
      <div class="image-box">
        <img src="/bag.png" class="image" alt="">
      </div>
      <a class="item-category">Stationary</a>
      <div class="item-title">School Bag</div>
      <div class="item-desc">Skybag Nave blue shcool bag | 4 compartments lightweight waterpro...</div>
      <div class="horizontal-line"></div>
      <div class="posted-on"> <b>Posted on:</b> dd/mm/yyyy</div>
      <div class="condition"> <b>Condition:</b> Good</div>
      <div class="view-button">View</div>
      
    </div>
    <div class="item-container">
      <div class="image-box">
        <img src="/penstand.png" class="image" alt="">
      </div>
      <a class="item-category">Stationary</a>
      <div class="item-title">School Bag</div>
      <div class="item-desc">Skybag Nave blue shcool bag | 4 compartments lightweight waterpro...</div>
      <div class="horizontal-line"></div>
      <div class="posted-on"> <b>Posted on:</b> dd/mm/yyyy</div>
      <div class="condition"> <b>Condition:</b> Good</div>
      <div class="view-button">View</div>
    </div>
    <div class="item-container">
      <div class="image-box">
        <img src="/bottle.png" class="image" alt="">
      </div>
      <a class="item-category">Stationary</a>
      <div class="item-title">School Bag</div>
      <div class="item-desc">Skybag Nave blue shcool bag | 4 compartments lightweight waterpro...</div>
      <div class="horizontal-line"></div>
      <div class="posted-on"> <b>Posted on:</b> dd/mm/yyyy</div>
      <div class="condition"> <b>Condition:</b> Good</div>
      <div class="view-button">View</div>
    </div>
  </div>

  <!-- pages -->
   <div class="pages">
    <a href="">1</a>
    <a href="">2</a>
    <a href="">3</a>
    <a href="">4</a>
    <p>. . .</p>
    <a href="">10</a>
   </div>


  <!-- footer -->
  <div class="footer">
    <p>&copy; 2025 Neighbourly <img src="/logo.png" class="footer-logo" alt="">. All rights reserved.</p>
    <nav>
        <a href="/privacy-policy">Privacy Policy</a> | 
        <a href="/terms-of-service">Terms of Service</a> | 
        <a href="/contact">Contact Us</a>
    </nav>
  </div>
</body>
</html>
