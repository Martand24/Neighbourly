<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">    
        <link rel="icon"  href="/logo.png">
        <link rel="stylesheet" href="./assets/css/user.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Neighbourly</title>
</head>
<body>
   <!--navbar-->
    <?php require './includes/navbar.php'; ?>   

    <div class="about-user">
        <div class="user-img">
            <img src="/random_user.jpeg" alt="">
        </div>
        <div class="user-details">
            <p><b>Name : </b> <span class="user-name">Random User</span></p>
            <p><b>Location : </b> <span class="city">Howrah,</span><span class="state">West Bengal</span></p>
            <p><b>Contact : </b><span class="user-email">abc@gmail.com</span></p>
            <p><b>Phone number : </b><span class="user-phone">9876123405</span></p>
            <button class="message-user"><i class="fa-solid fa-message"></i> Message</button>
        </div>
    </div>

    <!-- items shared by user -->
     <p style="font-size: 40px; font-weight: bold; color: #566c63; margin:20px;">items shared by <span class="user-name">Random User</span></p>
    <div class="shared-items">
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
