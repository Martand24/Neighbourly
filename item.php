<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">    
        <link rel="icon"  href="./assets/images/logo.png">
        <link rel="stylesheet" href="./assets/css/item.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Neighbourly</title>
    </head>    
<body>
    <!--navbar-->
    <?php require './includes/navbar.php'; ?>

    <!--location-->
    <div class="location-bar"><i class="fa-solid fa-location-dot"></i> <span class="city"> City,</span> <span class="state"> State</span> </div>
    
    <!-- item details -->
    <div class="item-details">
        <div class="item-carousel">
            <div id="carouselExampleIndicators"  class="carousel slide">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active" data-bs-interval="false">
                    <img src="/bag.png" class=" item-image d-block cursor-pointer mx-auto w-60" alt="...">
                  </div>
                  <div class="carousel-item" data-bs-interval="false">
                    <img src="/bottle.png" class=" item-image d-block mx-auto w-60" alt="...">
                  </div>
                  <div class="carousel-item" data-bs-interval="false">
                    <img src="/penstand.png" class="item-image d-block mx-auto w-60" alt="...">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
        </div>
        <div class="item-description">
            <a href="">School bags</a>
            <p>Blue Schoolbag</p>
            <div class="item-about">
                <h1>About this item : </h1>
                <p class="about-item-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, laudantium quibusdam magni facere sunt perferendis. Ipsam inventore veniam sit delectus placeat aspernatur, quae eveniet ullam nobis ex itaque magnam! Illo! Lorem ipsum dolor, sit amet consectetur adipisicing elit. Veritatis, praesentium. Non nulla, ut incidunt dicta recusandae saepe. Nam, assumenda error iure veritatis accusantium eligendi, tempora voluptas unde nobis a aut. <br> Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa labore expedita corporis dolorem accusantium, maiores et nam aliquam voluptate minus officia nulla laborum, similique sapiente asperiores quam quas sed doloribus. Lorem</p>
                <a href=""> Show more <i class="fa-solid fa-chevron-down"></i></a>
            </div>
            <div class="st-line"></div>
            <p style="font-size: 18px; margin-top: 5px;"> <b style="color:#566c63;">Posted on : </b> <span class="item-date" style="font-weight: normal; font-size: 16px;" >21st January, 2025</span> </p>
            <p style="font-size: 18px;"> <b style="color:#566c63;">Condition : </b> <span class="item-condition" style="font-weight: normal; font-size: 16px;" >Good</span> </p>
        </div>
        <div class="user-description">
            <h1>Shared by : </h1>
            <div class="user-img"> 
                <img src="/random_user.jpeg" alt="">
            </div>
            <p class="user-name">Random name</p>
            <p class="user-location">Kolkata, West Bengal</p>
            <p class="user-phone"><i class="fa-solid fa-phone"></i>+91 9876543210</p>
            <button class="view-user">View User</button>
        </div>
    </div>

    <!-- similar items -->
     <p style="font-size: 60px; margin-left: 10px; font-weight: bold;">Similar items</p>
     <div class="similar-items">
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
     </div>
     <!-- footer -->
  <?php require './includes/footer.php'; ?>
</body>
</html>
