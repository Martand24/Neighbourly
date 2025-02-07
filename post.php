<!DOCTYPE html>
<head>

    <title>Create Post - Neighbourly</title>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="stylesheet" href="post.css">

</head>

<body>

    <?php require './includes/navbar.php'; ?>

    <div class="container">
        <h1 class="title">CREATE POST</h1>
        <form id="create-post-form" action="/submit_post.php" method="POST" enctype="multipart/form-data">

            <div class="form-container">
                <div class="form-left">

                    <label class="category">Category :</label>
                    <select name="category" id="category" required>
                        <option value="book">book</option>
                        <option value="stationary">Stationary</option>
                        <option value="clothes">clothes</option>
                        <option value="gadgets">gadgets</option>
                    </select>



                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" placeholder="Enter title" style="font-size: large;"
                        required>


                    <label for="description">Description:</label>
                        <div class="disccontainer">

                        <div id="editor-container"></div>
                        <input type="hidden" id="description" name="description">

                    </div>

                    <label for="location">Location:</label>
                    <input type="text" id="location" name="location" placeholder="Enter location" required>


                    <label for="condition">Condition :</label>
                    <select name="condition" id="condition" required>
                        <option value="new">new</option>
                        <option value="good">good</option>
                        <option value="bad">bad</option>
                        <option value="too bad">too bad</option>
                    </select>


                </div>

                <div class="form-right">
                    <label for="imageUpload" >Upload Image : </label>
                    <div class="upload-box">
                     

                        <div class="imgcontainer">
                            <div id="image-container">

         <!--change-->                    <div id="image-preview"></div>  </div>
          <!--change-->                   <input type="file" id="imageUpload" name="imageUpload[]" accept="image/*" multiple required>


                            </div>


                        </div>

                    </div>
                   
                </div>
            </div>

            <button type="submit" class="share-btn">SHARE</button>
        </form>
    </div>
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <script src="post.js"></script>
</body>

</html>


<?php
$servername = "your_servername";
$username = "your_username";
$password = "your_password";
$dbname = "your_dbname";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $condition = mysqli_real_escape_string($conn, $_POST['condition']);

    
    $targetDir = "uploads/";

    
    if (!is_dir($targetDir)) {
        echo "Directory does not exist. Please create the 'uploads' directory.";
        exit;
    }

    if (!is_writable($targetDir)) {
        echo "Directory is not writable. Please check the permissions of the 'uploads' directory.";
        exit;
    }

    $uploadedFiles = [];
    $uploadOk = 1;
    $errorMsg = '';

    foreach ($_FILES["imageUpload"]["name"] as $key => $name) {
        
        $targetFile = $targetDir . uniqid() . "_" . basename($name);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

       
        $check = getimagesize($_FILES["imageUpload"]["tmp_name"][$key]);
        if ($check === false) {
            $uploadOk = 0;
            $errorMsg = "Invalid image file.";
            break;
        }

       
        if ($_FILES["imageUpload"]["size"][$key] > 5000000) {
            $uploadOk = 0;
            $errorMsg = "File too large (5MB limit).";
            break;
        }

       
        if (!in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
            $uploadOk = 0;
            $errorMsg = "Invalid file type.";
            break;
        }

        
        if ($_FILES["imageUpload"]["error"][$key] !== UPLOAD_ERR_OK) {
            $uploadOk = 0;
            $errorMsg = "Upload error: " . $_FILES["imageUpload"]["error"][$key];
            break;
        }

        
        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["imageUpload"]["tmp_name"][$key], $targetFile)) {
                $uploadedFiles[] = $targetFile;  
            } else {
                $uploadOk = 0;
                $errorMsg = "Sorry, there was an error uploading your file.";
                break;
            }
        }
    }

   
    if ($uploadOk == 1) {
        $filePaths = implode(",", $uploadedFiles); 
        $sql = "INSERT INTO posts (category, title, description, location, condition, images)
                VALUES ('$category', '$title', '$description', '$location', '$condition', '$filePaths')";

        if ($conn->query($sql) === TRUE) {
            echo "Post submitted successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        
        echo "<div class='error'>" . $errorMsg . "</div>";
    }
}

$conn->close();
?>


