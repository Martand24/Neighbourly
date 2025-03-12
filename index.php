<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="icon"  href="./assets/images/logo.png">
    <link rel="stylesheet" href="./assets/css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

    <script>
        $(function () {
            $("#search_input").autocomplete({
                source: "./includes/fetchData.php"
            });
        });
    </script>


  </head>
    <title>Neighbourly</title>
</head>
<body>
    <?php require './includes/navbar.php'; ?>

    <div class="header">
        <div class="text-box">
            <div class="catch-phrase">SHARE AND MAKE A CHANGE</div>
            <div class="catch-phrase-subtext">Got unused items lying around? Share them with a neighbour and spread some joy!</div>
        </div>
        <div class="item-carousel">
            <div id="carouselExampleIndicators" data-bs-ride="carousel" class="carousel slide">
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                  <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                  <div class="carousel-item active" data-bs-interval="2000">
                    <img src="/bag.png" class="d-block cursor-pointer mx-auto w-60" alt="...">
                  </div>
                  <div class="carousel-item" data-bs-interval="2000">
                    <img src="/bottle.png" class="d-block mx-auto w-60" alt="...">
                  </div>
                  <div class="carousel-item" data-bs-interval="2000">
                    <img src="/penstand.png" class="d-block mx-auto w-60" alt="...">
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
    </div>
    <div class="content">
        <div class="location">Currently in <i class="fa-solid fa-location-dot"></i> XYZ</div>
        <div class="main-content">
          <div class="content-item" id="one">
            <img class="item-img" src="/penstand.png" alt="">
            <h4 class="item-title">Wooden Penstand</h4> 
            <!-- <p class="item-data"><b>Posted on : </b> dd/mm/yyyy</p>
            <p class="item-desc">Size : 10inch <br> Material : wood </p> -->
            <a href="">See more</a>
          </div>
          <div class="content-item" id="two">
            <img  class="item-img" src="/bag.png" alt="">
            <h4 class="item-title">School bag</h4> 
            <!-- <p class="item-data"><b>Posted on : </b> dd/mm/yyyy</p>
            <p class="item-desc">Size : 10inch <br> Material : wood </p> -->
            <a href="">See more</a>
          </div>
          <div class="content-item" id="three">
            <img  class="item-img" src="/bottle.png" alt="">
            <h4 class="item-title">Wooden Penstand</h4> 
            <!-- <p class="item-data"><b>Posted on : </b> dd/mm/yyyy</p>
            <p class="item-desc">Size : 10inch <br> Material : wood </p> -->
            <a href="">See more</a>
          </div>
          <div class="content-item" id="four">
            <img class="item-img" id="item-4" src="/color.jpeg" alt="">
            <h4 class="item-title">Wooden Penstand</h4> 
            <!-- <p class="item-data"><b>Posted on : </b> dd/mm/yyyy</p>
            <p class="item-desc">Size : 10inch <br> Material : wood </p> -->
            <a href="">See more</a>
          </div>
          <div class="content-item" id="five">
            <img  class="item-img" src="/bag.png" alt="">
            <h4 class="item-title">School bag</h4> 
            <!-- <p class="item-data"><b>Posted on : </b> dd/mm/yyyy</p>
            <p class="item-desc">Size : 10inch <br> Material : wood </p> -->
            <a href="">See more</a>
          </div>
        </div>
    </div>

    <?php require './includes/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
