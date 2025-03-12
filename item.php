<?php
// Include the database connection
$conn = new mysqli("localhost", "root", "1234", "Neighbourly");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if 'id' is set in the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $item_id = $_GET['id'];

    // Fetch item details from database
    $stmt = $conn->prepare("SELECT * FROM items WHERE id = ?");
    $stmt->bind_param("i", $item_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if item exists
    if ($result->num_rows > 0) {
        $item = $result->fetch_assoc();
        $userid = $item['user_id'];
        $stmt2 = $conn->prepare("SELECT * FROM users WHERE id= ?");
        $stmt2->bind_param("i",$userid);
        $stmt2->execute();
        $res2 = $stmt2->get_result();
        $user = $res2->fetch_assoc();


        $stmt3 = $conn->prepare("SELECT * from items WHERE category = ?");
        $stmt3->bind_param("i",$item['category']);
        $stmt3->execute();
        $item_result= $stmt3->get_result();



    } else {
        die("Item not found.");
    }

    $stmt->close();
} else {
    die("Invalid item ID.");
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">    
        <link rel="icon"  href="./assets/images/logo.png">
        <link rel="stylesheet" href="./assets/css/item.css">
        
        <link rel="stylesheet" href="./assets/css/footer.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="./assets/css/navbar.css">
        <title><?php echo htmlspecialchars($item['name']); ?> - Neighbourly</title>
    </head>    
<body>
    <!--navbar-->
    <?php require './includes/navbar.php'; ?>

    <!--location-->
    <div class="location-bar"><i class="fa-solid fa-location-dot"></i> <span class="user-city">City,</span><span class="user-city">State</span></div>
    <!-- item details -->
    <div class="item-details">

    
    <div class="item-carousel">
    <?php
    // Decode images stored as JSON
    $images = json_decode($item['images'], true);
    if (!empty($images) && is_array($images)) {
        // Unique carousel ID for each item
        $carouselId = "carouselExampleIndicators-" . $item['id'];
    ?>
        <div id="<?php echo $carouselId; ?>" class="carousel slide" data-bs-ride="carousel">
            <!-- Carousel Indicators -->
            <div class="carousel-indicators">
                <?php foreach ($images as $index => $image) : ?>
                    <button type="button" data-bs-target="#<?php echo $carouselId; ?>" data-bs-slide-to="<?php echo $index; ?>" class="<?php echo $index === 0 ? 'active' : ''; ?>" aria-label="Slide <?php echo $index + 1; ?>"></button>
                <?php endforeach; ?>
            </div>

            <!-- Carousel Items -->
            <div class="carousel-inner">
                <?php foreach ($images as $index => $image) : ?>
                    <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                        <img src="./<?php echo htmlspecialchars($image); ?>" class="item-image d-block w-100" alt="Item Image">
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#<?php echo $carouselId; ?>" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#<?php echo $carouselId; ?>" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    <?php
    } else {
        echo '<img src="./assets/images/logo.png" class="item-image d-block mx-auto w-60" alt="No Image Available">';
    }
    ?>
</div>






        <div class="item-description">
            <a href=""><?php echo htmlspecialchars($item['category']); ?></a>
            <p><?php echo htmlspecialchars($item['name']); ?></p>
            <div class="item-about">
                <h1>About this item : </h1>
                <p class="about-item-text"><?php echo htmlspecialchars($item['description']); ?></p>
            </div>
            <div class="st-line"></div>
            <p style="font-size: 18px; margin-top: 5px;"> <b style="color:#566c63;">Posted on : </b> <span class="item-date" style="font-weight: normal; font-size: 16px;" ><?php echo htmlspecialchars($item['shared_on']); ?></span> </p>
            <p style="font-size: 18px;"> <b style="color:#566c63;">Condition : </b> <span class="item-condition" style="font-weight: normal; font-size: 16px;" ><?php echo htmlspecialchars($item['condition']); ?></span> </p>
        </div>
        <div class="user-description">
            <h1>Shared by : </h1>
            <div class="user-img"> 
                <img src="<?php echo htmlspecialchars($user['photo'] ?? 'Unknown'); ?>" alt="">
            </div>
            <p class="user-name"><?php echo htmlspecialchars($user['username'] ?? 'Unknown'); ?></p>
            <p class="user-location"><?php echo htmlspecialchars($user['address'] ?? 'Not provided'); echo ", ".htmlspecialchars($user['city'] ?? 'Not provided'); echo ", ".htmlspecialchars($user['state'] ?? 'Not provided');?></p>
            <p class="user-phone"><i class="fa-solid fa-phone"></i><?php echo htmlspecialchars($user['phone_number'] ?? 'Unknown'); ?></p>
            <button class="view-user"><a href="./user.php?id=<?php echo htmlspecialchars($user['id']);?>">View User</a></button>
        </div>
    </div>

    <!-- similar items -->
     <p style="font-size: 60px; margin-left: 10px; font-weight: bold;">Similar items</p>
     <div class="similar-items">
        <?php
    if ($item_result->num_rows > 0) {
        while ($row = $item_result->fetch_assoc()) {
            echo "<div class='item-container'>";
            echo "<div class='image-box'>";
            $images = json_decode($row['images'], true);

    // Check if it's a valid array and has at least one image
    $firstImage = (!empty($images) && is_array($images)) ? $images[0] : './assets/images/logo.png';
            echo "<img src='./" . htmlspecialchars($firstImage) . "' class='image' alt='item image'>";
            echo "</div>";
            echo "<a class='item-category'>" . htmlspecialchars($row['category']) . "</a>";
            echo "<div class='item-title'>" . htmlspecialchars($row['name']) . "</div>";
            echo "<div class='item-desc'>" . htmlspecialchars($row['description']) . "</div>";
            echo "<div class='horizontal-line'></div>";
            echo "<div class='posted-on'><b>Posted on:</b> " . htmlspecialchars($row['shared_on']) . "</div>";
            echo "<div class='condition'><b>Condition:</b> " . htmlspecialchars($row['condition']) . "</div>";
            echo "<button class='view-button' onclick=\"window.location.href='./item.php?id=" . htmlspecialchars($row['id']) . "'\">View</button>";

            echo "</div>";
        }
    } else {
        echo "<p>No items found.</p>";
    }
    ?>
          
     </div>
     <!-- footer -->
  <?php require './includes/footer.php'; ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
