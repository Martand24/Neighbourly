<!DOCTYPE html>

<?php
session_start();

include("connection.php");

if (!isset($_SESSION['id'])) {
    header("location: login.php");
}
?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">    
	<link rel="icon"  href="/logo.png">
	<link rel="stylesheet" href="./assets/css/navbar.css">
	<link rel="stylesheet" href="./assets/css/itemShared.css">
	<link rel="stylesheet" href="./assets/css/footer.css">	
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>Neighbourly</title>
    </head> 
<body>
    <!--navbar-->
    <?php require './includes/navbar.php'; ?>

    <!--shared items-->

    <p style="font-size: 40px; margin-left: 2rem; font-weight: bold;">Items Received</p>
    <div class="shared-items">
<?php
	$user_id = $_SESSION["id"];
	$query = "SELECT images, name,category, id,shared_on FROM items WHERE shared_to_id = ?";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("i", $user_id);
	$stmt->execute();
	$result = $stmt->get_result();



	while ($row = $result->fetch_assoc()) {

		$images = json_decode($row['images'], true);

		/*    $firstImage = (!empty($images) && is_array($images)) ? $images[0] : './assets/images/logo.png';*/

	if (empty($images) || !is_array($images)) {
        echo "<p class='no-image' style='color:black;'>Share your first image</p>";
        continue; // Skip the rest of the loop
    }

    $firstImage = $images[0];

		echo "<div class='item'>";
		echo "<img src='./" . htmlspecialchars($firstImage) . "' class='image' alt='' style='width:6rem; height:6rem; border-radius:10px; margin:4px;'>";
            echo "<div class='item-details'>";
		echo "<a class='item-category' >" . htmlspecialchars($row["category"]) . "</a>";
		echo "<p class='item-name' onclick=\"window.location.href='./item.php?id=" . htmlspecialchars($row['id']) . "'\">" . htmlspecialchars($row["name"]) . "</p>";
		echo "<p> <b>Shared on : </b><span class='shared-on'>" . htmlspecialchars($row["shared_on"]) . "</span></p>";

                echo "<p> <b>Shared to : </b> <a  class='shared-to'></a></p>";
           echo " </div>";
		echo "</div>";
	}

	$stmt->close();
	$conn->close();
?>	    
    </div>

    <!-- footer -->
     <?php require './includes/footer.php'; ?>
<script src="./assets/js/navbar.js"></script>
</body>
</html>
