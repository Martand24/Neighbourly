<?php
session_start();
include("connection.php");

// Check if user is logged in
if (!isset($_SESSION['id'])) {
    header('Location: login.php');
    exit();
}
$user_id = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Sanitize form inputs
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $condition = mysqli_real_escape_string($conn, $_POST['condition']);

    $targetDir = "uploads/";

    // Ensure the uploads directory exists
    if (!is_dir($targetDir) || !is_writable($targetDir)) {
        die("Error: Upload directory is not accessible.");
    }

    $uploadedFiles = [];
    $uploadOk = 1;

    foreach ($_FILES["imageUpload"]["name"] as $key => $name) {
        $targetFile = $targetDir . uniqid() . "_" . basename($name);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        $check = getimagesize($_FILES["imageUpload"]["tmp_name"][$key]);
        if ($check === false) {
            die("Error: Invalid image file.");
        }

        if ($_FILES["imageUpload"]["size"][$key] > 5000000) {
            die("Error: File too large (5MB limit).");
        }

        if (!in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
            die("Error: Invalid file type.");
        }

        if ($_FILES["imageUpload"]["error"][$key] !== UPLOAD_ERR_OK) {
            die("Error: Upload error.");
        }

        if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"][$key], $targetFile)) {
            $uploadedFiles[] = $targetFile;
        } else {
            die("Error: Failed to upload file.");
        }
    }

    // Convert uploaded images to JSON format
    $filePaths = json_encode($uploadedFiles);

    // FIX: Escape `condition` because it's a MySQL keyword
    $sql = "INSERT INTO items (category, name, description, location, `condition`, images, user_id) 
            VALUES ('$category', '$title', '$description', '$location', '$condition', '$filePaths', '$user_id')";

    if ($conn->query($sql) === TRUE) {
        echo "Post submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post - Neighbourly</title>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/post.css">
    <link rel="stylesheet" href="./assets/css/navbar.css" >
    <link rel="stylesheet" href="./assets/css/footer.css" >
</head>

<body>

    <?php require './includes/navbar.php'; ?>

    <div class="container">
        <h1 class="title">CREATE POST</h1>
        <form id="create-post-form" action="post.php" method="POST" enctype="multipart/form-data">

            <div class="form-container">
                <div class="form-left">

                    <label class="category">Category :</label>
                    <select name="category" id="category" required>
                        <option value="book">Book</option>
                        <option value="stationary">Stationary</option>
                        <option value="clothes">Clothes</option>
                        <option value="gadgets">Gadgets</option>
                    </select>

                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" placeholder="Enter title" required>

                    <label for="description">Description:</label>
                    <div class="disccontainer">
                        <div id="editor-container"></div>
                        <input type="hidden" id="description" name="description">
                    </div>

                    <label for="location">Location:</label>
                    <input type="text" id="location" name="location" placeholder="Enter location" required>

                    <!-- for fetching the location of the user where the item is being shared from -->
                    <input type="button" value="Fetch Location" onclick="getLocation()">

                    <label for="condition">Condition :</label>
                    <select name="condition" id="condition" required>
                        <option value="new">New</option>
                        <option value="good">Good</option>
                        <option value="bad">Bad</option>
                        <option value="too bad">Too Bad</option>
                    </select>

                </div>

                <div class="form-right">
                    <label for="imageUpload">Upload Image : </label>
                    <div class="upload-box">
                        <div class="imgcontainer">
                            <div id="image-container">
                                <div id="image-preview"></div>
                            </div>
                            <input type="file" id="imageUpload" name="imageUpload[]" accept="image/*" multiple required>
                        </div>
                    </div>
                </div>
            </div>

            <button type="submit" class="share-btn">SHARE</button>
        </form>
    </div>

    <?php require "./includes/footer.php"; ?>

     <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
            } else {
                alert("Geolocation is not supported by this browser.");
            }
        }

        function successCallback(position) {
            let latitude = position.coords.latitude;
            let longitude = position.coords.longitude;

            document.getElementById("location").value= `Latitude: ${latitude}, Longitude: ${longitude}`;

            // Send location to PHP via AJAX
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "save_location.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.send("latitude=" + latitude + "&longitude=" + longitude);
        }

        function errorCallback(error) {
            alert("Error fetching location: " + error.message);
        }
    </script>

    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script src="./assets/js/post.js"></script>
</body>
</html>
