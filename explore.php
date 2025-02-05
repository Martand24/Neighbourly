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
  <!--Navbar-->
    <?php require './includes/navbar.php'; ?>

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
    <div class="dropdown">
      <select  id="category-box" name="category-box">
        <option value="category1">All Categories</option>
        <option value="category2">Books</option>
        <option value="category3">Electronic</option>
        <option value="category4">Stationary</option>
        <option value="category5">Home appliances</option>
        <option value="category6">Clothes</option>
      </select>
    </div>
    <input type="text" class="search-box-filter dropdown-box" placeholder="Search item">
    <div class="dropdown">
      <select  id="category-box" name="category-box">
        <option value="category1">Any</option>
        <option value="category2">Very Good</option>
        <option value="category3">Good</option>
        <option value="category4">Moderate</option>
        <option value="category5">Poor</option>
      </select>
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
  <?php require './includes/footer.php'; ?>
</body>
</html>
