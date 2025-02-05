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
