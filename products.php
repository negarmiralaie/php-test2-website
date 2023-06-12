<?php
    include($_SERVER['DOCUMENT_ROOT'] . '/connect.php');
    $conn = openCon();

    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

// ******************** END OF CHECKING CONNECTION TO DB *******************************
    $sql = "SELECT pf.id AS productFilter_id, p.id AS product_id, p.name AS product_name, f.filterName AS filter_name FROM product p INNER JOIN productFilter pf ON p.id = pf.product_id INNER JOIN filter f ON pf.filter_id = f.id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='card' style='width: 18rem;'>";
            // echo "<img src='" . $row['product_name'] . "' class='card-img-top' alt='...'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title' id='cardTitle'>" . $row['product_name'] . "</h5>";
            echo "<p class='card-text'>" . $row['filter_name'] . "</p>";
            echo "<a href='#' class='btn btn-primary'>Go somewhere</a>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "No results found";
    }

?>