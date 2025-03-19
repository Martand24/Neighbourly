<?php
// Include the database connection
include "connection.php";



// Check if 'id' is set in the URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $user_id = $_GET['id'];

    // Fetch item details from database
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if item exists
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $stmt2 = $conn->prepare("SELECT * from items WhERE user_id = ?");
        $stmt2->bind_param("i",$user['id']);
        $stmt2->execute();
        $item_result =$stmt2->get_result();
    } else {
        die("User not found.");
    }

    $stmt->close();
} else {
    die("Invalid user ID.");
}

$conn->close();
?>



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
        <title><?php echo htmlspecialchars($user['username']); ?>Neighbourly</title>
</head>
<body>
   <!--navbar-->
    <?php require './includes/navbar.php'; ?>   

    <div class="about-user">
        <div class="user-img">
            <img src=<?php echo htmlspecialchars($user['photo']); ?> alt="user photo">
        </div>
        <div class="user-details">
            <p><b>Name : </b> <span class="user-name"><?php echo htmlspecialchars($user['first_name'])." ".htmlspecialchars($user['last_name']); ?></span></p>
            <p><b>Location : </b> <span class="city"><?php echo htmlspecialchars($user['address']).", ".htmlspecialchars($user['city']); ?></span><span class="state"><?php echo htmlspecialchars($user['state']); ?></span></p>
            <p><b>Contact : </b><span class="user-email"><?php echo htmlspecialchars($user['email']); ?></span></p>
            <p><b>Phone number : </b><span class="user-phone"><?php echo htmlspecialchars($user['phone_number']); ?></span></p>
          
           <button class="message-user" onclick="window.location.href='chat.php?user_id=<?php echo htmlspecialchars($user['id']); ?>'">
    <i class="fa-solid fa-message"></i> Message
</button>   




	   </div>
    </div>

    <!-- items shared by user -->
     <p style="font-size: 40px; font-weight: bold; color: #566c63; margin:20px;">items shared by <span class="user-name"><?php echo htmlspecialchars($user['username']); ?></span></p>



    <div class="shared-items">
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

</body>
</html>
