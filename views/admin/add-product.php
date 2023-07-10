<?php
    require './connect.php';

    error_reporting(E_ALL);

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];

        if (is_dir('img') && is_writable('img')) {
            echo "The directory exists and is writable.";
        } else {
            echo "The directory does not exist or it is not writable.";
        }
        

        if ($_FILES['image']['error'] === 4) {
            echo '111';
            echo
            "<script> alert('Image does not exist') </script>";
        } else {
            echo '222';
            $fileName = $_FILES['image']['name'];
            $fileSize = $_FILES['image']['size'];
            $tmpName = $_FILES['image']['tmp_name'];

            $validImgExtensions = ['jpg', 'jpeg', 'png'];
            $imgExtension = explode('.', $fileName);
            $imgExtension = strtolower(end($imgExtension));
            if (!in_array($imgExtension, $validImgExtensions)) {
                echo
                "<script> alert('Invalid image extension!') </script>";
            } else if($fileSize > 1000000) {
                echo
                "<script> alert('Image size is too large!') </script>";
            }
            else {
                $newImgName = uniqid();
                $newImgName .= '.' . $imgExtension;

                if (copy($tmpName, 'img/' . $newImgName)) {
                    echo "File copied successfully.";
                } else {
                    echo "Error occurred while copying the file.";
                }

                // move_uploaded_file($tmpName, 'img/' . $newImgName);
                // $query = "INSERT INTO table VALUES(``, `$name`, `$newImgName`)";
                // mysqli_query($conn, $query);
                echo
                "<script>
                    alert(`Successfully added!`);
                </script>";
                
            }      
        }
        return false;
    }

?>

<form onsubmit="myFunction()" id="imageUploadForm" method='POST' autocomplete="off" enctype="multipart/form-data">
    <label for="name" id='name' value=''>Name:</label>
    <input type="text" name='name' required>
    <br> <br>
    <label>Image:</label>    
    <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png" value="">
    <br>

    <input type="submit" name="submit">
</form>

<script>
    $('#imageUploadForm').on('submit', function(e) {
    e.preventDefault();

    $.ajax({
        url: './add-product.php',
        type: 'POST',
        data: new FormData(this),
        processData: false,
        contentType: false,
        success: function(response) {
            
        },
        error: function() {

        }
    });
});

function myFunction(event) {
       event.preventDefault(); // Prevent the default form submission behavior
       // Perform AJAX request to submit form data to the server
     }

</script>