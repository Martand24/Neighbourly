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
        <title>Explore - Neighbourly</title>
    </head>    
<body>


<?php
include './includes/navbar.php'; // Include navbar

// Database connection
$conn = new mysqli("localhost", "root", "1234", "Neighbourly");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get search query and filters
$searchQuery = isset($_GET['query']) ? trim($_GET['query']) : '';
$category = isset($_GET['category-box']) ? trim($_GET['category-box']) : '';
$cond = isset($_GET['condition-box']) ? trim($_GET['condition-box']) : '';

// Base SQL Query
$sql = "SELECT * FROM items WHERE 1";

// Append filters
if (!empty($searchQuery)) {
    $sql .= " AND name LIKE ?";
}
if (!empty($category) && $category !== 'category1') {
    $sql .= " AND category = ?";
}
if (!empty($cond) && $cond !== 'category1') {
    $sql .= " AND `condition` = ?";
}

// Prepare and bind query
$stmt = $conn->prepare($sql);
$bindParams = [];
$types = '';

if (!empty($searchQuery)) {
    $searchTerm = "%" . $searchQuery . "%";
    $bindParams[] = &$searchTerm;
    $types .= 's';
}
if (!empty($category) && $category !== 'category1') {
    $bindParams[] = &$category;
    $types .= 's';
}
if (!empty($cond) && $cond !== 'category1') {
    $bindParams[] = &$cond;
    $types .= 's';
}

// Bind dynamically
if (!empty($bindParams)) {
    $stmt->bind_param($types, ...$bindParams);
}

$stmt->execute();
$result = $stmt->get_result();
?>

<!-- location -->
<div class="location-bar"><i class="fa-solid fa-location-dot"></i> <span class="user-city">City,</span><span class="user-city">State</span></div>

<!-- filter section -->
<form action="" class="filter-categories" method="get">
    <div class="dropdown">
        <select id="category-box" name="category-box">
            <option value="category1">All Categories</option>
            <option value="book">Books</option>
            <option value="Electronic">Electronic</option>
            <option value="Stationary">Stationary</option>
            <option value="Home appliances">Home Appliances</option>
            <option value="Clothes">Clothes</option>
        </select>
    </div>
    <input type="text" name="query" class="search-box-filter dropdown-box" placeholder="Search item">
    <div class="dropdown">
        <select id="condition-box" name="condition-box">
            <option value="category1">Any</option>
            <option value="New">New</option>
            <option value="Good">Good</option>
            <option value="Bad">Bad</option>
            <option value="Too Bad">Too Bad</option>
        </select>
    </div>
    <button class="filter-button" type="submit" name="search">Filter</button>
</form>

<!-- item results -->
<div class="item-box">
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='item-container'>";
            echo "<div class='image-box'>";
            $images = json_decode($row['images'], true);

    // Check if it's a valid array and has at least one image
    $firstImage = (!empty($images) && is_array($images)) ? $images[0] : './assets/images/logo.png';
            echo "<img src='./" . htmlspecialchars($firstImage) . "' class='image' alt=''>";
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

<?php
$stmt->close();
$conn->close();
?>
</body>
</html>
